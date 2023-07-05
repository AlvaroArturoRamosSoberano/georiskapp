<?php

namespace App\Http\Controllers;

use App\Models\RegulatoryAspect;
use App\Models\RegulatoryLicense;
use App\Models\License;
use Illuminate\Http\Request;

class RegulatoryAspectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('regulatoryAspect.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $regulatoryAspect = new RegulatoryAspect();
        $regulatoryAspect->conservation_program = true;
        $regulatoryAspect->gas_production = false;
        $regulatoryAspect->emergency_plan = false;

        $licenses = License::pluck('name', 'id')->toArray();
        return view('regulatoryAspect.create', compact('regulatoryAspect', 'licenses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $regulatoryAspects = request()->except('_token');
        $regulatoryAspects = RegulatoryAspect::create($regulatoryAspects);
        foreach ($request->license_id as $license) {
            RegulatoryLicense::firstOrCreate(['license_id' => $license, 'regulatory_aspect_id' => $regulatoryAspects->id]);
        }
        return redirect('regulatoryAspect')->with('mensaje', 'Ingresado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(RegulatoryAspect $regulatory_aspect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegulatoryAspect $regulatory_aspect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegulatoryAspect $regulatory_aspect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegulatoryAspect $regulatory_aspect)
    {
        //
    }
}
