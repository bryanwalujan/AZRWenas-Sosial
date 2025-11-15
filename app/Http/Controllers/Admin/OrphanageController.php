<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orphanage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrphanageController extends Controller
{
    public function index()
    {
        $orphanages = Orphanage::with(['children', 'needs'])->get();
        return view('admin.orphanages.index', compact('orphanages'));
    }

    public function create()
    {
        return view('admin.orphanages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'child_count' => 'required|integer|min:0',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'facilities' => 'nullable|string',
            'categories' => 'nullable|string',
            'target_service' => 'nullable|string',
            'legal_documents' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('orphanages', 'public');
        }

        $arrayFields = ['facilities', 'categories', 'target_service', 'legal_documents'];
        foreach ($arrayFields as $field) {
            if ($request->filled($field)) {
                $items = array_filter(array_map('trim', explode(',', $request->$field)));
                $data[$field] = json_encode($items);
            } else {
                $data[$field] = json_encode([]);
            }
        }

        $data['capacity'] = $data['capacity'] ?? 0;
        $data['in_house_male'] = $data['in_house_male'] ?? 0;
        $data['in_house_female'] = $data['in_house_female'] ?? 0;
        $data['external_male'] = $data['external_male'] ?? 0;
        $data['external_female'] = $data['external_female'] ?? 0;
        $data['land_area'] = $data['land_area'] ?? null;

        Orphanage::create($data);

        return redirect()->route('admin.orphanages.index')->with('status', 'Panti berhasil ditambahkan!');
    }

    public function edit(Orphanage $orphanage)
    {
        return view('admin.orphanages.edit', compact('orphanage'));
    }

    public function update(Request $request, Orphanage $orphanage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'child_count' => 'required|integer|min:0',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($orphanage->photo) {
                Storage::disk('public')->delete($orphanage->photo);
            }
            $data['photo'] = $request->file('photo')->store('orphanages', 'public');
        }

        $arrayFields = ['facilities', 'categories', 'target_service', 'legal_documents'];
        foreach ($arrayFields as $field) {
            if ($request->filled($field)) {
                $items = array_filter(array_map('trim', explode(',', $request->$field)));
                $data[$field] = json_encode($items);
            } else {
                $data[$field] = json_encode([]);
            }
        }

        $data['capacity'] = $data['capacity'] ?? 0;
        $data['in_house_male'] = $data['in_house_male'] ?? 0;
        $data['in_house_female'] = $data['in_house_female'] ?? 0;
        $data['external_male'] = $data['external_male'] ?? 0;
        $data['external_female'] = $data['external_female'] ?? 0;
        $data['land_area'] = $data['land_area'] ?? null;

        $orphanage->update($data);

        return redirect()->route('admin.orphanages.index')->with('status', 'Panti berhasil diperbarui!');
    }

    public function destroy(Orphanage $orphanage)
    {
        if ($orphanage->photo) {
            Storage::disk('public')->delete($orphanage->photo);
        }
        $orphanage->delete();
        return redirect()->route('admin.orphanages.index')->with('status', 'Panti berhasil dihapus!');
    }
}