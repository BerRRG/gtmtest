<body>
  <head>
    <script src="http://code.jquery.com/jquery.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
  </head>

<!-- Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

{!! $calendar_details->script() !!}

<div class="container">
    <p class="title">Agendamento de consultas</p>
    <hr>
    <a class="btn btn-primary caption menu" href="{{ URL::to('calendario') }}"> Listar consultas</a>
    <a class="btn btn-primary caption menu" href="{{ URL::to('clients/create') }}"> Adicionar cliente</a>
    <a class="btn btn-primary caption menu" href="{{ URL::to('treatments/create') }}">Adicionar tratamento</a>
    <a class="btn btn-primary caption menu" href="{{ URL::to('professionals/create') }}">Adicionar profissional</a>
    <a class="btn btn-primary caption menu" href="{{ URL::to('clinics/create') }}">Adicionar consultório</a>
    <div class="panel panel-primary calendarHeader">
      <div class="panel-body">
        <div class="calendar-title">
          <p>Configuração de data e duração do tratamento</p>
          <hr class="reports-bar">
        </div>
           {!! Form::open(array('route' => 'events.add','method'=>'POST','files'=>'true')) !!}
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                  @if (Session::has('success'))
                     <div class="alert alert-success">{{ Session::get('success') }}</div>
                  @elseif (Session::has('warnning'))
                      <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                  @endif
              </div>
              <div class="row calendar-panel">
                <div class="col-sm-2">
                  <div class="form-group">
                    {!! Form::label('full_day','Período integral?') !!}
                    {!! Form::checkbox('full_day', 1) !!}
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    {{ Form::label('repeat', 'Duração em semanas:') }}
                    {{Form::number('repeat', null, ['class' => 'form-control'])}}
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    {!! Form::label('start_date','Data inicio:') !!}    
                    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                  </div> 
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    {!! Form::label('start_time','Horário inicio:') !!}
                    {!! Form::time('start_time',null, ['class' => 'form-control']) !!}
                    {!! $errors->first('start_time', '<p class="alert alert-danger">:message</p>') !!}
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    {!! Form::label('end_date','Data término:') !!}
                    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    {!! Form::label('end_date','Horário término:') !!}
                    {!! Form::time('end_time',null, ['class' => 'form-control']) !!}
                    {!! $errors->first('end_time', '<p class="alert alert-danger">:message</p>') !!}
                  </div>
                </div>
              </div>
            </div>
            <div class="calendar-title">
              <p>Configuração dos tratamentos</p>
              <hr class="reports-bar">
            </div>
            <div class="row calendar-panel">
              <div class="col-sm-3">
                <div class="form-group">
                  {!! Form::label('treatment_id','Tratamentos:') !!}
                  {!! Form::select('treatment_id', $treatments, [], ['class' => 'form-control']) !!}
                  {!! $errors->first('treatment_id', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  {!! Form::label('client_id','Clientes:') !!}
                  {!! Form::select('client_id', $clients, [], ['class' => 'form-control']) !!}
                  {!! $errors->first('client_id', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  {!! Form::label('professional_id','Profissionais:') !!}
                  {!! Form::select('professional_id', $professionals, [], ['class' => 'form-control']) !!}
                  {!! $errors->first('professional_id', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  {!! Form::label('clinic_id','Consultório:') !!}
                  {!! Form::select('clinic_id', $clinics, [], ['class' => 'form-control']) !!}
                  {!! $errors->first('clinic_id', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                {!! Form::submit('Adicionar' ,['class'=>'btn btn-primary buttonCalendar']) !!}
              </div>
            </div>
            </div>
           {!! Form::close() !!}
 
    </div>
    <div class="panel panel-primary">    
      <div class="panel-body" >
          {!! $calendar_details->calendar() !!}
      </div>
    </div>
    </div>
</body>