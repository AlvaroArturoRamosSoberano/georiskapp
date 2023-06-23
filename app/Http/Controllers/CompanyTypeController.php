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
        $companies = new CompanyType();
        return view('companyType.create', compact('companies'));
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
    public function show(CompanyType $companyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyType $companyType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyType $companyType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyType $companyType)
    {
        //
    }
}
