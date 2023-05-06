<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $companies = Company::paginate(5);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //return view('company.create');

        $company = new Company();
        return view('company.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStoreRequest $request)
    {
        //
        //$companies = request->all();
        $companies = request()->except('_token');

        if ($request->hasFile('image_path')) {
            $companies['image_path'] = $request->file('image_path')->store('uploads', 'public');
        }

        Company::insert($companies);

        return response()->json($companies);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $company = Company::findOrFail($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $company = Company::findOrFail($id);

        $companies = $request->except(['_token', '_method']);
        if ($request->hasFile('image_path')) {
            // Eliminamos la imagen anterior (si existe)
            if ($company->image_path) {
                Storage::delete($company->image_path);
            }

            // Subimos la nueva imagen y obtenemos la ruta
            $image_path = $request->file('image_path')->store('public/images');
            $data['image_path'] = $image_path;
        }

        $company->update($companies);

        // Redirigimos al usuario a la vista de detalle de la compañía actualizada
        return redirect()->route('company.index', $company->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Company::destroy($id);
        return redirect('company');
    }
}
