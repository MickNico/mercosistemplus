<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Especiales;
use App\Http\Requests\CreateEspecialesRequest;
use App\Http\Requests\UpdateEspecialesRequest;
use Illuminate\Http\Request;

use App\Clientes;


class EspecialesController extends Controller {

	/**
	 * Display a listing of especiales
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $especiales = Especiales::with("clientes")->get();

		return view('admin.especiales.index', compact('especiales'));
	}

	/**
	 * Show the form for creating a new especiales
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $clientes = Clientes::pluck("cli_cod", "id")->prepend('Please select', null);

	    
        $esp_tipo = Especiales::$esp_tipo;

	    return view('admin.especiales.create', compact("clientes", "esp_tipo"));
	}

	/**
	 * Store a newly created especiales in storage.
	 *
     * @param CreateEspecialesRequest|Request $request
	 */
	public function store(CreateEspecialesRequest $request)
	{
	    
		Especiales::create($request->all());

		return redirect()->route(config('quickadmin.route').'.especiales.index');
	}

	/**
	 * Show the form for editing the specified especiales.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$especiales = Especiales::find($id);
	    $clientes = Clientes::pluck("cli_cod", "id")->prepend('Please select', null);

	    
        $esp_tipo = Especiales::$esp_tipo;

		return view('admin.especiales.edit', compact('especiales', "clientes", "esp_tipo"));
	}

	/**
	 * Update the specified especiales in storage.
     * @param UpdateEspecialesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateEspecialesRequest $request)
	{
		$especiales = Especiales::findOrFail($id);

        

		$especiales->update($request->all());

		return redirect()->route(config('quickadmin.route').'.especiales.index');
	}

	/**
	 * Remove the specified especiales from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Especiales::destroy($id);

		return redirect()->route(config('quickadmin.route').'.especiales.index');
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
            Especiales::destroy($toDelete);
        } else {
            Especiales::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.especiales.index');
    }

}
