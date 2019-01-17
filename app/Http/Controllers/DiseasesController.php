<?php

namespace App\Http\Controllers;

use App\Model\Diseases;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class DiseasesController extends BaseController
{
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the diseases
        $diseases = Diseases::all();
        // load the view and pass the diseases
        return View::make('diseases.index')
            ->with('diseases', $diseases);
    }
    /*
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('diseases.create');
    }
    /*
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('diseases/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $diseases = new Diseases;
            $diseases->save();

            // redirect
            Session::flash('message', 'Successfully created Diseases!');
            return Redirect::to('diseases');
        }
    }
    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the Diseases
        $diseases = Diseases::find($id);
        // show the view and pass the Diseases to it
        return View::make('diseases.show')
            ->with('Diseases', $diseases);
    }
    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the Diseases
        $diseases = Diseases::find($id);
        // show the edit form and pass the Diseases
        return View::make('diseases.edit')
            ->with('Diseases', $diseases);
    }
    /*
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('diseases/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $diseases = Diseases::find($id);            $diseases->save();
            // redirect
            Session::flash('message', 'Successfully updated Diseases!');
            return Redirect::to('diseases');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $diseases = Diseases::find($id);
        $diseases->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the Diseases!');
        return Redirect::to('diseases');
    }
}