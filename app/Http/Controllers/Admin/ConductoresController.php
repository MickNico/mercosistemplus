<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Conductores;
use App\Http\Requests\CreateConductoresRequest;
use App\Http\Requests\UpdateConductoresRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class ConductoresController extends Controller {

	/**
	 * Display a listing of conductores
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $conductores = Conductores::all();

		return view('admin.conductores.index', compact('conductores'));
	}

	/**
	 * Show the form for creating a new conductores
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.conductores.create');
	}

	/**
	 * Store a newly created conductores in storage.
	 *
     * @param CreateConductoresRequest|Request $request
	 */
	public function store(CreateConductoresRequest $request)
	{
	    $request = $this->saveFiles($request);
		Conductores::create($request->all());

		return redirect()->route(config('quickadmin.route').'.conductores.index');
	}

	/**
	 * Show the form for editing the specified conductores.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$conductores = Conductores::find($id);
	    
	    
		return view('admin.conductores.edit', compact('conductores'));
	}

	/**
	 * Update the specified conductores in storage.
     * @param UpdateConductoresRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateConductoresRequest $request)
	{
		$conductores = Conductores::findOrFail($id);

        $request = $this->saveFiles($request);

		$conductores->update($request->all());

		return redirect()->route(config('quickadmin.route').'.conductores.index');
	}

	/**
	 * Remove the specified conductores from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Conductores::destroy($id);

		return redirect()->route(config('quickadmin.route').'.conductores.index');
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
            Conductores::destroy($toDelete);
        } else {
            Conductores::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.conductores.index');
    }

}
