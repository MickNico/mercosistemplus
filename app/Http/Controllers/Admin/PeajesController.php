<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Peajes;
use App\Http\Requests\CreatePeajesRequest;
use App\Http\Requests\UpdatePeajesRequest;
use Illuminate\Http\Request;



class PeajesController extends Controller {

	/**
	 * Display a listing of peajes
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $peajes = Peajes::all();

		return view('admin.peajes.index', compact('peajes'));
	}

	/**
	 * Show the form for creating a new peajes
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
        $pea_cant_eje = Peajes::$pea_cant_eje;

	    return view('admin.peajes.create', compact("pea_cant_eje"));
	}

	/**
	 * Store a newly created peajes in storage.
	 *
     * @param CreatePeajesRequest|Request $request
	 */
	public function store(CreatePeajesRequest $request)
	{
	    
		Peajes::create($request->all());

		return redirect()->route(config('quickadmin.route').'.peajes.index');
	}

	/**
	 * Show the form for editing the specified peajes.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$peajes = Peajes::find($id);
	    
	    
        $pea_cant_eje = Peajes::$pea_cant_eje;

		return view('admin.peajes.edit', compact('peajes', "pea_cant_eje"));
	}

	/**
	 * Update the specified peajes in storage.
     * @param UpdatePeajesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePeajesRequest $request)
	{
		$peajes = Peajes::findOrFail($id);

        

		$peajes->update($request->all());

		return redirect()->route(config('quickadmin.route').'.peajes.index');
	}

	/**
	 * Remove the specified peajes from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Peajes::destroy($id);

		return redirect()->route(config('quickadmin.route').'.peajes.index');
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
            Peajes::destroy($toDelete);
        } else {
            Peajes::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.peajes.index');
    }

}
