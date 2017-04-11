<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Clientes;
use App\Http\Requests\CreateClientesRequest;
use App\Http\Requests\UpdateClientesRequest;
use Illuminate\Http\Request;



class ClientesController extends Controller {

	/**
	 * Display a listing of clientes
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $clientes = Clientes::all();

		return view('admin.clientes.index', compact('clientes'));
	}

	/**
	 * Show the form for creating a new clientes
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.clientes.create');
	}

	/**
	 * Store a newly created clientes in storage.
	 *
     * @param CreateClientesRequest|Request $request
	 */
	public function store(CreateClientesRequest $request)
	{
	    
		Clientes::create($request->all());

		return redirect()->route(config('quickadmin.route').'.clientes.index');
	}

	/**
	 * Show the form for editing the specified clientes.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$clientes = Clientes::find($id);
	    
	    
		return view('admin.clientes.edit', compact('clientes'));
	}

	/**
	 * Update the specified clientes in storage.
     * @param UpdateClientesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateClientesRequest $request)
	{
		$clientes = Clientes::findOrFail($id);

        

		$clientes->update($request->all());

		return redirect()->route(config('quickadmin.route').'.clientes.index');
	}

	/**
	 * Remove the specified clientes from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Clientes::destroy($id);

		return redirect()->route(config('quickadmin.route').'.clientes.index');
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
            Clientes::destroy($toDelete);
        } else {
            Clientes::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.clientes.index');
    }

}
