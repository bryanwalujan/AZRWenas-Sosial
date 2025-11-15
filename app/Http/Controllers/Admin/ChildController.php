<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orphanage;
use App\Models\Child;
use Illuminate\Http\Request;

class ChildController extends Controller
{
public function index(Orphanage $orphanage)
{
    // QUERY LANGSUNG → PASTI MUNCUL
    $children = Child::where('orphanage_id', $orphanage->id)
        ->orderBy('name')
        ->paginate(25);

    // HAPUS dd() JIKA SUDAH YAKIN
    // dd($children->toArray(), $orphanage->id);

    return view('admin.children.index', compact('orphanage', 'children'));
}

    /**
     * Form tambah anak (mirip create inventories)
     */
    public function create(Orphanage $orphanage)
    {
        return view('admin.children.create', compact('orphanage'));
    }

    /**
     * Simpan anak baru (mirip store inventories)
     */
    public function store(Request $request, Orphanage $orphanage)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'gender' => 'required|in:LAKI-LAKI,PEREMPUAN',
            'birth_place' => 'required|string|max:50',
            'birth_date' => 'required|date',
            'education_level' => 'required|string|max:100',
            'status' => 'required|in:YATIM,PIATU,YATIM PIATU,TERLANTAR,EKONOMI LEMAH',
            'in_house' => 'nullable|boolean',
        ]);

        $data = $request->only([
            'name', 'gender', 'birth_place', 'birth_date', 'education_level', 'status', 'in_house'
        ]);

        $orphanage->children()->create($data);

        return redirect()
            ->route('admin.orphanages.children.index', $orphanage)
            ->with('success', 'Anak berhasil ditambahkan.');
    }

    /**
     * Form edit anak (mirip edit inventories)
     */
    public function edit(Orphanage $orphanage, Child $child)
    {
        // Pastikan anak milik panti (mirip keamanan inventories)
        if ($child->orphanage_id !== $orphanage->id) {
            abort(404);
        }

        return view('admin.children.edit', compact('orphanage', 'child'));
    }

    /**
     * Update anak (mirip update inventories)
     */
    public function update(Request $request, Orphanage $orphanage, Child $child)
    {
        if ($child->orphanage_id !== $orphanage->id) {
            abort(404);
        }

        $request->validate([
            'name' => 'required|string|max:100',
            'gender' => 'required|in:LAKI-LAKI,PEREMPUAN',
            'birth_place' => 'required|string|max:50',
            'birth_date' => 'required|date',
            'education_level' => 'required|string|max:100',
            'status' => 'required|in:YATIM,PIATU,YATIM PIATU,TERLANTAR,EKONOMI LEMAH',
            'in_house' => 'nullable|boolean',
        ]);

        $data = $request->only([
            'name', 'gender', 'birth_place', 'birth_date', 'education_level', 'status', 'in_house'
        ]);

        $child->update($data);

        return redirect()
            ->route('admin.orphanages.children.index', $orphanage)
            ->with('success', 'Data anak berhasil diperbarui.');
    }

    /**
     * Hapus anak (mirip destroy inventories)
     */
    public function destroy(Orphanage $orphanage, Child $child)
    {
        if ($child->orphanage_id !== $orphanage->id) {
            abort(404);
        }

        $child->delete();

        return redirect()
            ->route('admin.orphanages.children.index', $orphanage)
            ->with('success', 'Anak berhasil dihapus.');
    }
}