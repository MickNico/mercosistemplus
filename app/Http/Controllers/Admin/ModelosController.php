<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Modelos;
use App\Http\Requests\CreateModelosRequest;
use App\Http\Requests\UpdateModelosRequest;
use Illuminate\Http\Request;

use App\Clientes;


class ModelosController extends Controller {

	/**
	 * Display a listing of modelos
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $modelos = Modelos::with("clientes")->get();

		return view('admin.modelos.index', compact('modelos'));
	}

	/**
	 * Show the form for creating a new modelos
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $clientes = Clientes::pluck("cli_cod", "id")->prepend('Please select', null);

	    
	    return view('admin.modelos.create', compact("clientes"));
	}

	/**
	 * Store a newly created modelos in storage.
	 *
     * @param CreateModelosRequest|Request $request
	 */
	public function store(CreateModelosRequest $request)
	{
	    
		Modelos::create($request->all());

		return redirect()->route(config('quickadmin.route').'.modelos.index');
	}

	/**
	 * Show the form for editing the specified modelos.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$modelos = Modelos::find($id);
	    $clientes = Clientes::pluck("cli_cod", "id")->prepend('Please select', null);

	    
		return view('admin.modelos.edit', compact('modelos', "clientes"));
	}

	/**
	 * Update the specified modelos in storage.
     * @param UpdateModelosRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateModelosRequest $request)
	{
		$modelos = Modelos::findOrFail($id);

        

		$modelos->update($request->all());

		return redirect()->route(config('quickadmin.route').'.modelos.index');
	}

	/**
	 * Remove the specified modelos from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Modelos::destroy($id);

		return redirect()->route(config('quickadmin.route').'.modelos.index');
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
            Modelos::destroy($toDelete);
        } else {
            Modelos::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.modelos.index');
    }

}
