<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Rutas;
use App\Http\Requests\CreateRutasRequest;
use App\Http\Requests\UpdateRutasRequest;
use Illuminate\Http\Request;

use App\Clientes;


class RutasController extends Controller {

	/**
	 * Display a listing of rutas
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $rutas = Rutas::with("clientes")->get();

		return view('admin.rutas.index', compact('rutas'));
	}

	/**
	 * Show the form for creating a new rutas
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $clientes = Clientes::pluck("cli_cod", "id")->prepend('Please select', null);

	    
        $rut_loc_pro_int = Rutas::$rut_loc_pro_int;

	    return view('admin.rutas.create', compact("clientes", "rut_loc_pro_int"));
	}

	/**
	 * Store a newly created rutas in storage.
	 *
     * @param CreateRutasRequest|Request $request
	 */
	public function store(CreateRutasRequest $request)
	{
	    
		Rutas::create($request->all());

		return redirect()->route(config('quickadmin.route').'.rutas.index');
	}

	/**
	 * Show the form for editing the specified rutas.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$rutas = Rutas::find($id);
	    $clientes = Clientes::pluck("cli_cod", "id")->prepend('Please select', null);

	    
        $rut_loc_pro_int = Rutas::$rut_loc_pro_int;

		return view('admin.rutas.edit', compact('rutas', "clientes", "rut_loc_pro_int"));
	}

	/**
	 * Update the specified rutas in storage.
     * @param UpdateRutasRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRutasRequest $request)
	{
		$rutas = Rutas::findOrFail($id);

        

		$rutas->update($request->all());

		return redirect()->route(config('quickadmin.route').'.rutas.index');
	}

	/**
	 * Remove the specified rutas from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Rutas::destroy($id);

		return redirect()->route(config('quickadmin.route').'.rutas.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Rutas::destroy($toDelete);
        } else {
            Rutas::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.rutas.index');
    }

}
