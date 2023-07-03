<?php

namespace App\Http\Controllers;

use App\Models\RiskAspect;
use Illuminate\Http\Request;

class RiskAspectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $riskAspects = RiskAspect::paginate(5);
        return view('riskAspect.index', compact('riskAspects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $riskAspect = new RiskAspect();
        return view('riskAspect.create', compact('riskAspect'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $riskAspects = request()->except('_token');
        RiskAspect::create($riskAspects);
        return redirect('riskAspect')->with('mensaje', 'Aspecto de riesgo agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(RiskAspect $riskAspect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $riskAspect = RiskAspect::findOrFail($id);
        return view('riskAspect.edit', compact('riskAspect'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $riskAspect = RiskAspect::findOrFail($id);
        $riskAspects = $request->except(['_token', '_method']);

        // Actualizamos en la base de datos
        $riskAspect->update($riskAspects);
        // Redirigimos al usuario a la vista de index actualizada
        return redirect()->route('riskAspect.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $riskAspect = RiskAspect::findOrFail($id);
        //Elinamos de la base de datos
        $riskAspect->delete();
        return redirect('riskAspect')->with('mensaje', 'Aspecto de riesgo eliminado correctamente');
    }
}
