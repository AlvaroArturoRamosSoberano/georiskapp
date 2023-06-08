<?php

namespace App\Http\Controllers;

use App\Models\GasPlant;
use App\Models\Company;
use Illuminate\Http\Request;

class GasPlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('gasPlant.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies = Company::pluck('identifier_key', 'id');
        return view('gasPlant.create', compact('companies'));
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
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
