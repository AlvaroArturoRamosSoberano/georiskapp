<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Brand;
use App\Models\Company;
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
        $brands = Brand::pluck('name', 'id');
        $companies = Company::pluck('kind_company', 'id')->unique();
        return view('company.create', compact('company', 'brands', 'companies'));
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
            $companies['image_path'] = $request->file('image_path')->store('images/companies', 'public');
        }

        Company::insert($companies);

        //return response()->json($companies);
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
        $brands = Brand::pluck('name', 'id');
        $companies = Company::pluck('kind_company', 'id')->unique();
        
        return view('company.edit', compact('company', 'brands', 'companies'));
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
        //
        $company = Company::findOrFail($id);

        // Eliminamos la imagen de la compañía (si existe)
        if ($company->image_path) {
            Storage::delete('public/' . $company->image_path);
        }

        // Eliminamos la compañía de la base de datos
        $company->delete();
        return redirect('company')->with('mensaje', 'Empresa eliminada con éxito');
    }
}
