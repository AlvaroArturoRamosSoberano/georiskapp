<?php

namespace App\Http\Controllers;

use App\Models\GeographicDetail;
use App\Models\Colony;
use App\Models\Township;
use App\Models\Company;
use App\Models\State;
use App\Models\Brand;
use Illuminate\Http\Request;

class GeographicDetailController extends Controller
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
            $geographic_details = GeographicDetail::where('longitude', 'like', '%' . $query . '%')
                ->orWhere('latitude', 'like', '%' . $query . '%')
                ->paginate(4);
        } else {
            // si no hay un valor de búsqueda, obtener todas las compañías
            $geographic_details = GeographicDetail::paginate(4);
        }

        return view('geographicDetail.index', compact('geographic_details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $geographic_detail = new GeographicDetail();
        $company = new Company();
        $companies = Company::pluck('kind_company', 'id')->unique();
        $colonies = Colony::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');
        $townships = Township::pluck('name', 'id');
        $states = State::pluck('name', 'id');


        return view('geographicDetail.create', compact('geographic_detail', 'colonies', 'townships', 'states', 'company', 'companies', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Obtener los datos para GeographicDetail
        $geographic_details = $request->except('_token');
        // Crear el registro en GeographicDetail
        $geographic_detail = GeographicDetail::create($geographic_details);

        // Obtener los datos para Company
        $company_data = $request->only('identifier_key', 'description', 'image_path', 'kind_company', 'brand_id');
        // Asignar el geographic_detail_id al Company
        $company_data['geographic_detail_id'] = $geographic_detail->id;
        // Crear el registro en Company
        $company = Company::create($company_data);

        return redirect('geographicDetail')->with('mensaje', 'Empresa ingresada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(GeographicDetail $geographic_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        // Obtener el detalle geográfico y la empresa relacionada
        $geographic_detail = GeographicDetail::findOrFail($id);
        $colonies = Colony::pluck('name', 'id');
        $townships = Township::pluck('name', 'id');
        $states = State::pluck('name', 'id');

        // Pasar las variables a la vista
        return view('geographicDetail.edit', compact('geographic_detail', 'colonies', 'townships', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $geographic_detail = GeographicDetail::findOrFail($id);
        $geographic_details = request()->except('_token');
        $geographic_detail->update($geographic_details);

        return redirect()->route('geographicDetail.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $geographic_detail = GeographicDetail::findOrFail($id);
        // Eliminamos la compañía de la base de datos
        $geographic_detail->delete();
        return redirect('geographicDetail')->with('mensaje', 'Empresa eliminada con éxito');
    }
}
