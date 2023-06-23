<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Brand;
use App\Models\Company;
use App\Models\CompanyType;
use App\Models\GeographicDetail;
use App\Models\Township;
use App\Models\State;
use App\Models\Colony;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = $request->input('q'); // obtener el valor del input de búsqueda

        // si hay un valor de búsqueda, buscar las compañías que coincidan
        if (!empty($query)) {
            $companies = Company::where('identifier_key', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->paginate(4);
        } else {
            // si no hay un valor de búsqueda, obtener todas las compañías
            $companies = Company::paginate(4);
        }

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
        $geographic_detail = new GeographicDetail();
        $brands = Brand::pluck('name', 'id');
        $companies = CompanyType::pluck('name', 'id');
        $colonies = Colony::pluck('name', 'id');
        $townships = Township::pluck('name', 'id');
        $states = State::pluck('name', 'id');

        //$geographicDetails = new GeographicDetail();


        return view('company.create', compact('geographic_detail', 'colonies', 'townships', 'states', 'company', 'brands', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStoreRequest $request)
    {
        $companies = $request->except('_token');

        if ($request->hasFile('image_path')) {
            $companies['image_path'] = $request->file('image_path')->store('images/companies', 'public');
        }

        $geographic_detail = $request->only('latitude', 'longitude', 'address', 'zip_code', 'colony_id', 'township_id', 'state_id');
        $geographic_detail = GeographicDetail::create($geographic_detail); // Crear el registro en la tabla GeographicDetail

        $companies['geographic_detail_id'] = $geographic_detail->id; // Asignar el ID del detalle geográfico a geographic_detail_id

        $company = Company::create($companies); // Crear el registro en la tabla Company

        return redirect('company')->with('mensaje', 'Empresa ingresada con éxito');
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
        $geographic_detail = $company->geographicDetail;
        $brands = Brand::pluck('name', 'id');
        $companies = CompanyType::pluck('name', 'id');
        $colonies = Colony::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');
        $townships = Township::pluck('name', 'id');
        $states = State::pluck('name', 'id');

        return view('company.edit', compact('geographic_detail', 'colonies', 'townships', 'states', 'company', 'brands', 'companies'));
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
            Storage::delete('public/' . $company->image_path);
            // Subimos la nueva imagen y obtenemos la ruta
            $companies['image_path'] = $request->file('image_path')->store('images/companies', 'public');
        }

        // Actualizamos la compañía en la base de datos
        $company->update($companies);

        // Redirigimos al usuario a la vista de index de la compañía actualizada
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        // Eliminamos el detalle geográfico asociado a la compañía
        if ($company->geographicDetail) {
            $company->geographicDetail->delete();
        }

        // Eliminamos la imagen de la compañía (si existe)
        if ($company->image_path) {
            Storage::delete('public/' . $company->image_path);
        }

        // Eliminamos la compañía de la base de datos
        $company->delete();

        return redirect('company')->with('mensaje', 'Empresa eliminada con éxito');
    }
}
