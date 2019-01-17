<?php

namespace App\Http\Controllers;

use App\Model\Reports;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ReportsController extends BaseController
{
	public function index()
    {
        // get all the clinics
        // load the view and pass the clinics
        return View::make('reports.index');
    }
}