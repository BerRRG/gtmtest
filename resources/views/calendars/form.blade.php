    <div class="form-group">
      {!! Form::label('start_date','Data de inicio:') !!}
      {!! Form::date('start_date', 'start_date', ['class' => 'form-control']) !!}
      {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
      {!! Form::time('start_time',null, ['class' => 'form-control']) !!}
      {!! $errors->first('start_time', '<p class="alert alert-danger">:message</p>') !!}
    </div>

    <div class="form-group">
      {!! Form::label('end_date','Data de fim:') !!}
      {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
      {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
      {!! Form::time('end_time',null, ['class' => 'form-control']) !!}
      {!! $errors->first('end_time', '<p class="alert alert-danger">:message</p>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('treatment_id','Tratamentos:') !!}
        {!! Form::select('treatment_id', $treatments, [], ['class' => 'form-control']) !!}
        {!! $errors->first('treatment_id', '<p class="alert alert-danger">:message</p>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('client_id','Clientes:') !!}
        {!! Form::select('client_id', $clients, [], ['class' => 'form-control']) !!}
        {!! $errors->first('client_id', '<p class="alert alert-danger">:message</p>') !!}
    </div>

     <div class="form-group">
        {!! Form::label('professional_id','Profissionais:') !!}
        {!! Form::select('professional_id', $professionals, [], ['class' => 'form-control']) !!}
        {!! $errors->first('professional_id', '<p class="alert alert-danger">:message</p>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('clinic_id','Sala:') !!}
        {!! Form::select('clinic_id', $clinics, [], ['class' => 'form-control']) !!}
        {!! $errors->first('clinic_id', '<p class="alert alert-danger">:message</p>') !!}
    </div>
