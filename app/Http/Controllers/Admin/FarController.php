<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Far;
use App\Http\Requests\CreateFarRequest;
use App\Http\Requests\UpdateFarRequest;
use Illuminate\Http\Request;

use App\Ots;


class FarController extends Controller {

	/**
	 * Display a listing of far
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $far = Far::with("ots")->get();

		return view('admin.far.index', compact('far'));
	}

	/**
	 * Show the form for creating a new far
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $ots = Ots::pluck("ots_not", "id")->prepend('Please select', null);

	    
        $far_cli_ot = Far::$far_cli_ot;

	    return view('admin.far.create', compact("ots", "far_cli_ot"));
	}

	/**
	 * Store a newly created far in storage.
	 *
     * @param CreateFarRequest|Request $request
	 */
	public function store(CreateFarRequest $request)
	{
	    
		Far::create($request->all());

		return redirect()->route(config('quickadmin.route').'.far.index');
	}

	/**
	 * Show the form for editing the specified far.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$far = Far::find($id);
	    $ots = Ots::pluck("ots_not", "id")->prepend('Please select', null);

	    
        $far_cli_ot = Far::$far_cli_ot;

		return view('admin.far.edit', compact('far', "ots", "far_cli_ot"));
	}

	/**
	 * Update the specified far in storage.
     * @param UpdateFarRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateFarRequest $request)
	{
		$far = Far::findOrFail($id);

        

		$far->update($request->all());

		return redirect()->route(config('quickadmin.route').'.far.index');
	}

	/**
	 * Remove the specified far from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Far::destroy($id);

		return redirect()->route(config('quickadmin.route').'.far.index');
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
            Far::destroy($toDelete);
        } else {
            Far::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.far.index');
    }

}
