<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $licenses = License::paginate(5);
        return view('license.index', compact('licenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $license = new License();
        return view('license.create', compact('license'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $licenses = request()->except('_token');
        License::create($licenses);
        return redirect('license')->with('mensaje', 'Licencia agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(License $license)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $license = License::findOrFail($id);
        return view('license.edit', compact('license'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $license = License::findOrFail($id);
        $licenses = $request->except(['_token', '_method']);

        // Actualizamos en la base de datos
        $license->update($licenses);
        // Redirigimos al usuario a la vista de index actualizada
        return redirect()->route('license.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $license = License::findOrFail($id);
        //Elinamos de la base de datos
        $license->delete();
        return redirect('license')->with('mensaje', 'Licencia eliminada con éxito');
    }
}
