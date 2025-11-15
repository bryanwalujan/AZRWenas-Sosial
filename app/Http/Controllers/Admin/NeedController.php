<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orphanage;
use App\Models\Need;
use Illuminate\Http\Request;

class NeedController extends Controller
{
    public function index(Orphanage $orphanage)
    {
        $needs = $orphanage->needs()->orderBy('item')->get();
        return view('admin.needs.index', compact('orphanage', 'needs'));
    }

    public function create(Orphanage $orphanage)
    {
        return view('admin.needs.create', compact('orphanage'));
    }

    public function store(Request $request, Orphanage $orphanage)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $orphanage->needs()->create($request->all());

        return redirect()->route('admin.orphanages.needs.index', $orphanage)
            ->with('success', 'Kebutuhan berhasil ditambahkan.');
    }

    public function edit(Orphanage $orphanage, Need $need)
    {
        if ($need->orphanage_id !== $orphanage->id) {
            abort(404);
        }
        return view('admin.needs.edit', compact('orphanage', 'need'));
    }

    public function update(Request $request, Orphanage $orphanage, Need $need)
    {
        if ($need->orphanage_id !== $orphanage->id) {
            abort(404);
        }

        $request->validate([
            'item' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $need->update($request->all());

        return redirect()->route('admin.orphanages.needs.index', $orphanage)
            ->with('success', 'Kebutuhan berhasil diperbarui.');
    }

    public function destroy(Orphanage $orphanage, Need $need)
    {
        if ($need->orphanage_id !== $orphanage->id) {
            abort(404);
        }

        $need->delete();

        return redirect()->route('admin.orphanages.needs.index', $orphanage)
            ->with('success', 'Kebutuhan berhasil dihapus.');
    }
}