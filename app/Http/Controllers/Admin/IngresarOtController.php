<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Ots;
use App\Http\Requests\CreateOtsRequest;
use App\Http\Requests\UpdateOtsRequest;
use Illuminate\Http\Request;

use App\Clientes;
use App\Conductores;


class IngresarOtController extends Controller {

	/**
	 * Display a listing of ots
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $ots = Ots::with("clientes")->with("conductores")->get();

		return view('comunes.ots.index', compact('ots'));
	}

	/**
	 * Show the form for creating a new ots
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $clientes = Clientes::pluck("cli_cod", "id")->prepend('Please select', null);
$conductores = Conductores::pluck("cond_nom", "id")->prepend('Please select', null);

	    
        $ots_tip_cam = Ots::$ots_tip_cam;

	    return view('comunes.ots.create', compact("clientes", "conductores", "ots_tip_cam"));
	}

	/**
	 * Store a newly created ots in storage.
	 *
     * @param CreateOtsRequest|Request $request
	 */
	public function store(CreateOtsRequest $request)
	{
	    
		Ots::create($request->all());

		return redirect()->route(config('quickadmin.route').'.ots.index');
	}

	/**
	 * Show the form for editing the specified ots.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$ots = Ots::find($id);
	    $clientes = Clientes::pluck("cli_cod", "id")->prepend('Please select', null);
$conductores = Conductores::pluck("cond_nom", "id")->prepend('Please select', null);

	    
        $ots_tip_cam = Ots::$ots_tip_cam;

		return view('comunes.ots.edit', compact('ots', "clientes", "conductores", "ots_tip_cam"));
	}

	/**
	 * Update the specified ots in storage.
     * @param UpdateOtsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateOtsRequest $request)
	{
		$ots = Ots::findOrFail($id);

        

		$ots->update($request->all());

		return redirect()->route(config('quickadmin.route').'.ots.index');
	}

	/**
	 * Remove the specified ots from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Ots::destroy($id);

		return redirect()->route(config('quickadmin.route').'.ots.index');
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
            Ots::destroy($toDelete);
        } else {
            Ots::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.ots.index');
    }

}
