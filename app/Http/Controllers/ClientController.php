<?php

namespace App\Http\Controllers;

use App\Model\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ClientController extends BaseController
{
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the clients
        $clients = Client::all();
        // load the view and pass the clients
        return View::make('clients.index')
            ->with('clients', $clients);
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('clients.create');
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
            'name' => 'required',
            'address' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'uf' => 'required',
            'celphone' => 'required',
            'occupation' => 'required',
            'marital_status' => 'required',
            'phone' => 'required',
            'cep' => 'required',
            'email' => 'required|email',
            'cpf' => 'required',
            'birth_date' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('clients/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $client = new Client;
            $client->name = Input::get('name');
            $client->email = Input::get('email');
            $client->address = Input::get('address');
            $client->neighborhood = Input::get('neighborhood');
            $client->city = Input::get('city');
            $client->uf = Input::get('uf');
            $client->celphone = Input::get('celphone');
            $client->occupation = Input::get('occupation');
            $client->marital_status = Input::get('marital_status');
            $client->phone = Input::get('phone');
            $client->cep = Input::get('cep');
            $client->cpf = Input::get('cpf');
            $client->birth_date = Input::get('birth_date');;

            $client->save();

            // redirect
            Session::flash('message', 'Cliente criado com sucesso!');
            return Redirect::to('clients');
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
        // get the client
        $client = Client::find($id);
        // show the view and pass the client to it
        return View::make('clients.show')
            ->with('client', $client);
    }
    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the client
        $client = Client::find($id);
        // show the edit form and pass the client
        return View::make('clients.edit')
            ->with('client', $client);
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
            'name' => 'required',
            'address' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'uf' => 'required',
            'celphone' => 'required',
            'occupation' => 'required',
            'marital_status' => 'required',
            'phone' => 'required',
            'cep' => 'required',
            'email' => 'required|email',
            'cpf' => 'required',
            'birth_date' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('clients/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $client = Client::find($id);
            $client->name = Input::get('name');
            $client->email = Input::get('email');
            $client->address = Input::get('address');
            $client->neighborhood = Input::get('neighborhood');
            $client->city = Input::get('city');
            $client->uf = Input::get('uf');
            $client->celphone = Input::get('celphone');
            $client->occupation = Input::get('occupation');
            $client->marital_status = Input::get('marital_status');
            $client->phone = Input::get('phone');
            $client->cep = Input::get('cep');
            $client->birth_date = Input::get('birth_date');
            $client->cpf = Input::get('cpf');
            $client->save();

            // redirect
            Session::flash('message', 'Cliente atualizado com sucesso!');
            return Redirect::to('clients');
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
        $client = Client::find($id);

        $client->delete();
        // redirect
        Session::flash('message', 'Cliente deletado com sucesso!');
        return Redirect::to('clients');
    }
}