<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Monedas;
use App\Http\Requests\CreateMonedasRequest;
use App\Http\Requests\UpdateMonedasRequest;
use Illuminate\Http\Request;



class MonedasController extends Controller {

	/**
	 * Display a listing of monedas
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $monedas = Monedas::all();

		return view('admin.monedas.index', compact('monedas'));
	}

	/**
	 * Show the form for creating a new monedas
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
        $mon_cod = Monedas::$mon_cod;

	    return view('admin.monedas.create', compact("mon_cod"));
	}

	/**
	 * Store a newly created monedas in storage.
	 *
     * @param CreateMonedasRequest|Request $request
	 */
	public function store(CreateMonedasRequest $request)
	{
	    
		Monedas::create($request->all());

		return redirect()->route(config('quickadmin.route').'.monedas.index');
	}

	/**
	 * Show the form for editing the specified monedas.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$monedas = Monedas::find($id);
	    
	    
        $mon_cod = Monedas::$mon_cod;

		return view('admin.monedas.edit', compact('monedas', "mon_cod"));
	}

	/**
	 * Update the specified monedas in storage.
     * @param UpdateMonedasRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMonedasRequest $request)
	{
		$monedas = Monedas::findOrFail($id);

        

		$monedas->update($request->all());

		return redirect()->route(config('quickadmin.route').'.monedas.index');
	}

	/**
	 * Remove the specified monedas from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Monedas::destroy($id);

		return redirect()->route(config('quickadmin.route').'.monedas.index');
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
            Monedas::destroy($toDelete);
        } else {
            Monedas::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.monedas.index');
    }

}
