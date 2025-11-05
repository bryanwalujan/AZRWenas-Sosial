<?php

namespace App\Http\Controllers;

use App\Models\Orphanage;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $orphanages = Orphanage::with(['children', 'needs', 'inventories'])->get();
        return view('public.index', compact('orphanages'));
    }

    public function show($id)
    {
        $orphanage = Orphanage::with(['children', 'needs', 'inventories', 'contacts'])
            ->findOrFail($id);

        return view('public.show', compact('orphanage'));
    }
}