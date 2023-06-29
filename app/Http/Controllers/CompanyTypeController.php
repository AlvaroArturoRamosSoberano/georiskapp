<?php

namespace App\Http\Controllers;

use App\Models\CompanyType;
use Illuminate\Http\Request;

class CompanyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $companies = CompanyType::paginate(5);
        return view('companyType.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $company = new CompanyType();
        return view('companyType.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $companies = request()->except('_token');
        CompanyType::create($companies);
        return redirect('companyType')->with('mensaje', 'Tipo de compañia ingresada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyType $companyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $company = CompanyType::findOrFail($id);
        return view('companyType.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $company = CompanyType::findOrFail($id);
        $companies = $request->except(['_token', '_method']);

        // Actualizamos la compañía en la base de datos
        $company->update($companies);
        // Redirigimos al usuario a la vista de index de la compañía actualizada
        return redirect()->route('companyType.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $company = CompanyType::findOrFail($id);
        // Eliminamos la compañía de la base de datos
        $company->delete();
        return redirect('companyType')->with('mensaje', 'Tipo compañia eliminada con éxito');
    }
}
