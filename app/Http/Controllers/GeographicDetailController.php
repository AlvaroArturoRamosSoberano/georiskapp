<?php

namespace App\Http\Controllers;

use App\Models\GeographicDetail;
use App\Models\Colony;
use App\Models\Township;
use App\Models\State;
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
            $geographic_detail = GeographicDetail::where('longitude', 'like', '%' . $query . '%')
                ->orWhere('latitude', 'like', '%' . $query . '%')
                ->paginate(4);
        } else {
            // si no hay un valor de búsqueda, obtener todas las compañías
            $geographic_detail = GeographicDetail::paginate(4);
        }

        return view('geographicDetail.index', compact('geographicDetail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $geographic_detail = new GeographicDetail();
        $colonies = Colony::pluck('name', 'id');
        $townships = Township::pluck('name', 'id');
        $states = State::pluck('name', 'id');

        return view('geographicDetail.create', compact('geographic_detail', 'colonies', 'townships', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $geographic_detail = request()->except('_token');
        GeographicDetail::insert($geographic_detail);

        return redirect('geographic_detail')->with('mensaje', 'Empresa ingresada con éxito');
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
    public function edit(GeographicDetail $geographic_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GeographicDetail $geographic_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeographicDetail $geographic_detail)
    {
        //
    }
}
