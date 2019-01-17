<?php

namespace App\Http\Controllers;

use App\Model\Treatment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class TreatmentController extends BaseController
{
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the treatments
        $treatments = Treatment::all();
        // load the view and pass the treatments
        return View::make('treatments.index')
            ->with('treatments', $treatments);
    }
    /*
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('treatments.create');
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
            'name'       => 'required',
            'description'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('treatments/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $treatment = new Treatment;
            $treatment->name       = Input::get('name');
            $treatment->description      = Input::get('description');
            $treatment->save();
            // redirect
            Session::flash('message', 'Successfully created treatment!');
            return Redirect::to('treatments');
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
        // get the treatment
        $treatment = Treatment::find($id);
        // show the view and pass the treatment to it
        return View::make('treatments.show')
            ->with('treatment', $treatment);
    }
    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the treatment
        $treatment = Treatment::find($id);
        // show the edit form and pass the treatment
        return View::make('treatments.edit')
            ->with('treatment', $treatment);
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
            'name'       => 'required',
            'description'      => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('treatments/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $treatment = Treatment::find($id);
            $treatment->name       = Input::get('name');
            $treatment->description      = Input::get('description');
            $treatment->save();
            // redirect
            Session::flash('message', 'Successfully updated treatment!');
            return Redirect::to('treatments');
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
        $treatment = Treatment::find($id);
        $treatment->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the treatment!');
        return Redirect::to('treatments');
    }
}