<?php

namespace App\Http\Controllers;

use App\Models\CompanyRiskAspect;
use App\Models\Company;
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
        $company = Company::pluck('identifier_key', 'id');
        return view('companyRiskAspect.create', compact('companyRiskAspect', 'company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(CompanyRiskAspect $companyRiskAspect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyRiskAspect $companyRiskAspect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyRiskAspect $companyRiskAspect)
    {
        //
    }
}
