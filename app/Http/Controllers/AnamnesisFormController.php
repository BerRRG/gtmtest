<?php

namespace App\Http\Controllers;

use App\Model\AnamnesisForm;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AnamnesisFormController extends BaseController
{
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the anamnesis
        $anamnesis = AnamnesisForm::all();
        // load the view and pass the anamnesis
        return View::make('anamnesis.index')
            ->with('anamnesis', $anamnesis);
    }
    /*
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('anamnesis.create');
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
            return Redirect::to('anamnesis/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $anamnesi = new AnamnesisForm;

            $anamnesi->save();

            // redirect
            Session::flash('message', 'Successfully created anamnesi!');
            return Redirect::to('anamnesis');
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
        // get the anamnesi
        $anamnesi = AnamnesisForm::find($id);
        // show the view and pass the anamnesi to it
        return View::make('anamnesis.show')
            ->with('anamnesi', $anamnesi);
    }
    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the anamnesi
        $anamnesi = AnamnesisForm::find($id);
        // show the edit form and pass the anamnesi
        return View::make('anamnesis.edit')
            ->with('anamnesi', $anamnesi);
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
            return Redirect::to('anamnesis/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $anamnesi = AnamnesisForm::find($id);
            $anamnesi->save();

            // redirect
            Session::flash('message', 'Successfully updated anamnesi!');
            return Redirect::to('anamnesis');
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
        $anamnesi = AnamnesisForm::find($id);
        $anamnesi->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the anamnesi!');
        return Redirect::to('anamnesis');
    }
}