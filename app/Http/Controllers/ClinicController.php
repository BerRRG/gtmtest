<?php

namespace App\Http\Controllers;

use App\Model\Clinic;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ClinicController extends BaseController
{
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the clinics
        $clinics = Clinic::all();
        // load the view and pass the clinics
        return View::make('clinics.index')
            ->with('clinics', $clinics);
    }
    /*
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('clinics.create');
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
        );
        $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('clinics/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $clinic = new Clinic;
            $clinic->name       = Input::get('name');
            $clinic->save();
            // redirect
            Session::flash('message', 'Consultório adicionado com sucesso!');
            return Redirect::to('clinics');
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
        $clinic = Clinic::find($id);

        return View::make('clinics.show')
            ->with('clinic', $clinic);
    }
    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $clinic = Clinic::find($id);

        return View::make('clinics.edit')
            ->with('clinic', $clinic);
    }
    /*
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $rules = array(
            'name'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('clinics/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $clinic = Clinic::find($id);
            $clinic->name       = Input::get('name');
            $clinic->save();
            // redirect
            Session::flash('message', 'Consultório editado com sucesso!');
            return Redirect::to('clinics');
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
        $clinic = Clinic::find($id);
        $clinic->delete();
        // redirect
        Session::flash('message', 'Consultório deletado com sucesso!');
        return Redirect::to('clinics');
    }
}