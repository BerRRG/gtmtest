    
    <div class="painel panel-primary register">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('name', 'Nome') }}
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                </div>
            </div> 
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('cpf', 'CPF') }}
                    {{ Form::text('cpf', Input::old('cpf'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('marital_status', 'Estado civil') }}
                    {{ Form::text('marital_status', null, array('class' => 'form-control')) }}
                </div>
            </div>
        </div>

        <div class="row">
            
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('phone', 'Telefone') }}
                    {{ Form::text('phone', null, array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('celphone', 'Celular') }}
                    {{Form::text('celphone', null, array('class' => 'form-control'))}}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('birth_date', 'Data de nascimento') }}
                    <div class="form-group">
                    {{Form::date('birth_date', \Carbon\Carbon::now())}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {{ Form::label('cep', 'CEP') }}
                    {{ Form::text('cep', null, ['class' => 'form-control'])}}
                </div>
            </div>  
            <div class="col-sm-9">
                <div class="form-group">
                    {{ Form::label('address', 'Endereço') }}
                    {{ Form::text('address', null, array('class' => 'form-control')) }}
                </div>
            </div>  
        </div>

        
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    {{ Form::label('city', 'Cidade') }}
                    {{ Form::text('city', null, array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    {{ Form::label('neighborhood', 'Bairro') }}
                    {{ Form::text('neighborhood', null, array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('uf', 'Estado') }}
                    {{ Form::text('uf', null, array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
         
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group">
                    {{ Form::label('occupation', 'Profissão') }}
                    {{ Form::text('occupation', null, array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
    </div>