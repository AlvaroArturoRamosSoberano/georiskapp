<?php

namespace App\Http\Controllers;

use App\Models\CompanyRiskAspect;
use App\Models\Company;
use App\Models\RiskAspect;
use Illuminate\Http\Request;

class CompanyRiskAspectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $companyRiskAspects = CompanyRiskAspect::paginate(5);
        return view('companyRiskAspect.index', compact('companyRiskAspects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companyRiskAspect = new CompanyRiskAspect();
        $companies = Company::pluck('identifier_key', 'id');
        $riskAspects = RiskAspect::pluck('name', 'id');
        return view('companyRiskAspect.create', compact('companyRiskAspect', 'companies', 'riskAspects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $companyRiskAspects = request()->except('_token');
        CompanyRiskAspect::create($companyRiskAspects);

        return redirect('companyRiskAspect')->with('mensaje', 'Riesgo agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyRiskAspect $companyRiskAspect)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $companyRiskAspect = CompanyRiskAspect::findOrFail($id);
        $companies = Company::pluck('identifier_key', 'id');
        $riskAspects = RiskAspect::pluck('name', 'id');

        return view('companyRiskAspect.edit', compact('companyRiskAspect', 'companies', 'riskAspects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $companyRiskAspect = CompanyRiskAspect::findOrFail($id);
        $companyRiskAspects = $request->except(['_token', '_method']);

        // Actualizamos en la base de datos
        $companyRiskAspect->update($companyRiskAspects);
        // Redirigimos al usuario a la vista de index actualizada
        return redirect()->route('companyRiskAspect.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $companyRiskAspect = CompanyRiskAspect::findOrFail($id);
        $companyRiskAspect->delete();
        return redirect('companyRiskAspect')->with('mensaje', 'Eliminado con éxito');
    }
}
