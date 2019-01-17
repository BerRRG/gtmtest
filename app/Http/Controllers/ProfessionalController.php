<?php

namespace App\Http\Controllers;

use App\Exporters\ProfessionalExporter;
use App\Exporters\ProfessionalWeekExporter;
use App\Exporters\ProfessionalMonthExporter;
use App\Model\Professional;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class ProfessionalController extends BaseController
{
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $professionals = Professional::all();

        return View::make('professionals.index')
            ->with('professionals', $professionals);
    }
    /*
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('professionals.create');
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
            'address'       => 'required',
            'neighborhood'       => 'required',
            'city'       => 'required',
            'uf'       => 'required',
            'celphone'       => 'required',
            'occupation'       => 'required',
            'marital_status'       => 'required',
            'phone'       => 'required',
            'cep'       => 'required',
            'email'      => 'required|email',
            'birth_date'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('professionals/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $professional = new Professional;
            $professional->name       = Input::get('name');
            $professional->email      = Input::get('email');
            $professional->address      = Input::get('address');
            $professional->neighborhood      = Input::get('neighborhood');
            $professional->city      = Input::get('city');
            $professional->uf      = Input::get('uf');
            $professional->celphone      = Input::get('celphone');
            $professional->occupation      = Input::get('occupation');
            $professional->marital_status      = Input::get('marital_status');
            $professional->phone      = Input::get('phone');
            $professional->cep      = Input::get('cep');
            $professional->birth_date      = Input::get('birth_date');;
            $professional->save();
            // redirect
            Session::flash('message', 'Profissional adicionado com sucesso!');
            return Redirect::to('professionals');
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
        $professional = Professional::find($id);

        return View::make('professionals.show')
            ->with('professional', $professional);
    }
    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $professional = Professional::find($id);

        return View::make('professionals.edit')
            ->with('professional', $professional);
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
            'address'       => 'required',
            'neighborhood'       => 'required',
            'city'       => 'required',
            'uf'       => 'required',
            'celphone'       => 'required',
            'occupation'       => 'required',
            'marital_status'       => 'required',
            'phone'       => 'required',
            'cep'       => 'required',
            'email'      => 'required|email',
            'birth_date'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('professionals/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $professional = Professional::find($id);
            $professional->name       = Input::get('name');
            $professional->email      = Input::get('email');
            $professional->address      = Input::get('address');
            $professional->neighborhood      = Input::get('neighborhood');
            $professional->city      = Input::get('city');
            $professional->uf      = Input::get('uf');
            $professional->celphone      = Input::get('celphone');
            $professional->occupation      = Input::get('occupation');
            $professional->marital_status      = Input::get('marital_status');
            $professional->phone      = Input::get('phone');
            $professional->cep      = Input::get('cep');
            $professional->birth_date      = Input::get('birth_date');;
            $professional->save();
            // redirect
            Session::flash('message', 'Profissional editado com sucesso!');
            return Redirect::to('professionals');
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
        $professional = Professional::find($id);
        $professional->delete();
        // redirect
        Session::flash('message', 'Profissional deletado com sucesso!');
        return Redirect::to('professionals');
    }

    public function export()
    {
        return Excel::download(new ProfessionalExporter, 'professional.xlsx');
    }

    public function exportWeek()
    {
        return Excel::download(new ProfessionalWeekExporter, 'professionalWeek.xlsx');
    }

    public function exportMonth()
    {
        return Excel::download(new ProfessionalMonthExporter, 'professionalMonth.xlsx');
    }
}