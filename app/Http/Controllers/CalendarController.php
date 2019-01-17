<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Model\Calendar as CalendarModel;
use App\Model\Clinic;
use App\Model\Client;
use App\Model\Professional;
use App\Model\Treatment;
use Carbon\Carbon;
use Auth;
use Calendar;
use Validator;
class CalendarController extends Controller
{
    public function showCalendar(){
        $events = CalendarModel::get();
        $event_list = [];
        foreach ($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->event_name,
                $event->full_day,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date)
            );
        }
        $calendar_details = Calendar::addEvents($event_list);
        $clients = Client::all()->pluck('name', 'id')->toArray();
        $clinics = Clinic::all()->pluck('name', 'id')->toArray();
        $professionals = Professional::all()->pluck('name', 'id')->toArray();
        $treatments = Treatment::all()->pluck('name', 'id')->toArray();
        return view('events', compact('calendar_details'))
        ->withclients($clients)
        ->withTreatments($treatments)
        ->withClinics($clinics)
        ->withProfessionals($professionals);
    }
    public function addEvent(Request $request)
    {
        $client = Client::find($request->input('client_id'));
        $professional = Professional::find($request->input('professional_id'));
        $clinic = Clinic::find($request->input('clinic_id'));
        $treatment = Treatment::find($request->input('treatment_id'));
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'end_time' => 'required',
            'start_time' => 'required',
            'clinic_id' => 'required',
            'client_id' => 'required',
            'professional_id' => 'required',
            'treatment_id' => 'required',
        ]);
        if ($validator->fails()) {
            \Session::flash('warnning','Favor preencher os campos');
            return Redirect::to('/calendario-agenda')->withInput()->withErrors($validator);
        }
        $eventName = $client->name.' - '.$clinic->name;
        $start = $request->input('start_date').' '.$request->input('start_time');
        $end = $request->input('end_date').' '.$request->input('end_time');
        if ($request->input('repeat')) {
            $this->addEventWeek(
                $request,
                $eventName,
                $start,
                $end,
                $clinic,
                $client,
                $professional,
                $treatment
            );
        }
        $event = new CalendarModel;
        $event->clinic_id = $clinic->id;
        $event->client_id = $client->id;
        $event->professional_id = $professional->id;
        $event->treatment_id = $treatment->id;
        $event->event_name = $eventName;
        $event->start_date = $start;
        $event->end_date = $end;
        $duplicatedClinic = CalendarModel::select('*')
            ->where('clinic_id', $clinic->id)
            ->where('end_date', '>=', $start)
            ->where('start_date', '<=', $end)
            ->first();
        $duplicatedProfessional = CalendarModel::select('*')
            ->where('professional_id', $professional->id)
            ->where('end_date', '>=', $start)
            ->where('start_date', '<=', $end)
            ->first();
        if ($duplicatedClinic) {
            \Session::flash('warnning','Calendario duplicado sala em uso');
            return Redirect::to('/calendario-agenda')->withInput();
        }
        if ($duplicatedProfessional) {
            \Session::flash('warnning','Calendario duplicado profissional já alocado');
            return Redirect::to('/calendario-agenda')->withInput();
        }
        $event->save();
        \Session::flash('success','Cadastrado com sucesso!');
        return Redirect::to('/calendario-agenda');
    }
    protected function addEventWeek($request, $eventName, $start, $end, $clinic, $client, $professional, $treatment)
    {
        $i = 1;
        while($i <= $request->input('repeat')) {
            $event = new CalendarModel;
            $event->clinic_id = $clinic->id;
            $event->client_id = $client->id;
            $event->professional_id = $professional->id;
            $event->treatment_id = $treatment->id;
            $event->event_name = $eventName;
            $event->start_date = (new Carbon($start))->addWeeks($i);
            $event->end_date = (new Carbon($end))->addWeeks($i);
            $event->save();
            $i++;
        }
    }
    public function index()
    {
        $calendars = CalendarModel::all();
        return View::make('calendars.index')
            ->with('calendars', $calendars);
    }
    public function show($id)
    {
        $calendar = CalendarModel::find($id);
        return View::make('calendars.show')
            ->with('calendar', $calendar);
    }
    public function edit($id)
    {
        $calendar = CalendarModel::find($id);
        $clients = Client::all()->pluck('name', 'id')->toArray();
        $clinics = Clinic::all()->pluck('name', 'id')->toArray();
        $professionals = Professional::all()->pluck('name', 'id')->toArray();
        $treatments = Treatment::all()->pluck('name', 'id')->toArray();
        return View::make('calendars.edit')
            ->with('calendar', $calendar)
            ->with('clients', $clients)
            ->with('clinics', $clinics)
            ->with('professionals', $professionals)
            ->with('treatments', $treatments);
    }
    public function update($id)
    {
        $client = Client::find(Input::get('client_id'));
        $professional = Professional::find(Input::get('professional_id'));
        $clinic = Clinic::find(Input::get('clinic_id'));
        $treatment = Treatment::find(Input::get('treatment_id'));
        $rules = array(
            'client_id' => 'required',
            'clinic_id' => 'required',
            'professional_id' => 'required',
            'treatment_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('calendario/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }
        $eventName = $client->name.' - '.$clinic->name;
        $start = Input::get('start_date').' '.Input::get('start_time');
        $end = Input::get('end_date').' '.Input::get('end_time');
        $event = new CalendarModel;
        $event->clinic_id = $clinic->id;
        $event->client_id = $client->id;
        $event->professional_id = $professional->id;
        $event->treatment_id = $treatment->id;
        $event->event_name = $eventName;
        $event->start_date = $start;
        $event->end_date = $end;
        $event->save();
        Session::flash('message', 'Successfully updated client!');
        return Redirect::to('calendario');
    }
    public function destroy($id)
    {
        $calendar = CalendarModel::find($id);
        $calendar->delete();
        Session::flash('message', 'Successfully deleted the client!');
        return Redirect::to('calendario');
    }
}