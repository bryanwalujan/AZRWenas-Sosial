<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orphanage;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InventoryController extends Controller
{
    /**
     * Menampilkan daftar inventaris per panti (dengan paginasi)
     */
    public function index(Orphanage $orphanage)
    {
        $inventories = $orphanage->inventories()
            ->orderBy('location')
            ->orderBy('item_name')
            ->paginate(25);

        return view('admin.inventories.index', compact('orphanage', 'inventories'));
    }

    /**
     * Form tambah inventaris
     */
    public function create(Orphanage $orphanage)
    {
        return view('admin.inventories.create', compact('orphanage'));
    }

    /**
     * Simpan inventaris baru
     */
    public function store(Request $request, Orphanage $orphanage)
    {
        $request->validate([
            'location'     => 'required|string|max:255',
            'item_name'    => 'required|string|max:255',
            'quantity'     => 'required|string|max:50',
            'source'       => 'required|string|max:255',
            'value'        => 'nullable|numeric|min:0',
            'condition'    => 'required|in:baik,rusak',
            'note'         => 'nullable|string',
            'photo'        => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->only([
            'location', 'item_name', 'quantity', 'source', 'value', 'condition', 'note'
        ]);

        // Upload foto jika ada
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('inventories', 'public');
        }

        $orphanage->inventories()->create($data);

        return redirect()
            ->route('admin.orphanages.inventories.index', $orphanage)
            ->with('success', 'Inventaris berhasil ditambahkan.');
    }

    /**
     * Form edit inventaris
     */
    public function edit(Orphanage $orphanage, Inventory $inventory)
    {
        // Pastikan inventaris milik panti
        if ($inventory->orphanage_id !== $orphanage->id) {
            abort(404);
        }

        return view('admin.inventories.edit', compact('orphanage', 'inventory'));
    }

    /**
     * Update inventaris
     */
    public function update(Request $request, Orphanage $orphanage, Inventory $inventory)
    {
        if ($inventory->orphanage_id !== $orphanage->id) {
            abort(404);
        }

        $request->validate([
            'location'     => 'required|string|max:255',
            'item_name'    => 'required|string|max:255',
            'quantity'     => 'required|string|max:50',
            'source'       => 'required|string|max:255',
            'value'        => 'nullable|numeric|min:0',
            'condition'    => 'required|in:baik,rusak',
            'note'         => 'nullable|string',
            'photo'        => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->only([
            'location', 'item_name', 'quantity', 'source', 'value', 'condition', 'note'
        ]);

        // Upload foto baru (hapus yang lama)
        if ($request->hasFile('photo')) {
            if ($inventory->photo) {
                Storage::disk('public')->delete($inventory->photo);
            }
            $data['photo'] = $request->file('photo')->store('inventories', 'public');
        }

        $inventory->update($data);

        return redirect()
            ->route('admin.orphanages.inventories.index', $orphanage)
            ->with('success', 'Inventaris berhasil diperbarui.');
    }

    /**
     * Hapus inventaris
     */
    public function destroy(Orphanage $orphanage, Inventory $inventory)
    {
        if ($inventory->orphanage_id !== $orphanage->id) {
            abort(404);
        }

        // Hapus foto jika ada
        if ($inventory->photo) {
            Storage::disk('public')->delete($inventory->photo);
        }

        $inventory->delete();

        return redirect()
            ->route('admin.orphanages.inventories.index', $orphanage)
            ->with('success', 'Inventaris berhasil dihapus.');
    }

    /**
     * Hapus foto inventaris (AJAX opsional)
     */
    public function destroyPhoto(Orphanage $orphanage, Inventory $inventory)
    {
        if ($inventory->orphanage_id !== $orphanage->id || !$inventory->photo) {
            return response()->json(['success' => false]);
        }

        Storage::disk('public')->delete($inventory->photo);
        $inventory->update(['photo' => null]);

        return response()->json(['success' => true]);
    }
}