<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandStoreRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brands = Brand::paginate(4);
        return view('brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $brand = new Brand();
        return view('brand.create', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $brands = request()->except('_token');
        if ($request->hasFile('logo_path')) {
            $brands['logo_path'] = $request->file('logo_path')->store('images/brands', 'public');
        }
        Brand::insert($brands);
        return redirect('brand')->with('mensaje', 'Linea ingresada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $brand = Brand::findOrFail($id);
        return view('brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $brand = Brand::findOrFail($id);
        $brands = $request->except(['_token', '_method']);

        if ($request->hasFile('logo_path')) {
            // Eliminamos la imagen anterior (si existe)
            Storage::delete('public/' . $brand->image_path);
            // Subimos la nueva imagen y obtenemos la ruta
            $brands['logo_path'] = $request->file('logo_path')->store('images/brands', 'public');
        }

        // Actualizamos la compañía en la base de datos
        $brand->update($brands);

        // Redirigimos al usuario a la vista de index de la compañía actualizada
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $brand = Brand::findOrFail($id);

        // Eliminamos la imagen de la compañía (si existe)
        if ($brand->logo_path) {
            Storage::delete('public/' . $brand->logo_path);
        }

        // Eliminamos la compañía de la base de datos
        $brand->delete();
        return redirect('brand')->with('mensaje', 'Linea eliminada con éxito');
    }
}
