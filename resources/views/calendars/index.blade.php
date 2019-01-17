<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
    <title>Lista de Calendario</title>
    
</head>
<body>
<div class="container">
    <p class="title">Listagem de consultas</p>
    <hr>
    <a class="btn btn-primary caption menu" href="{{ URL::to('calendario-agenda') }}">Adicionar consulta</a></li>
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

<table id="registration-tables"class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nome do cliente</td>
            <td>Nome do profissional</td>
            <td>Sala</td>
            <td>Começo</td>
            <td>Fim</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
    @foreach($calendars as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->client()->first()->name }}</td>
            <td>{{ $value->professional()->first()->name }}</td>
            <td>{{ $value->clinic()->first()->name }}</td>
            <td>{{ $value->start_date }}</td>
            <td>{{ $value->end_date }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <div class="pull-right">
                    <a class="btn btn-small btn-success" href="{{ URL::to('calendario/' . $value->id) }}">Detalhar</a>

                    <a class="btn btn-small btn-info" href="{{ URL::to('calendario/' . $value->id . '/edit') }}">Editar</a>

                    {{ Form::open(array('url' => 'calendario/' . $value->id, 'class' => 'btn')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Apagar', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
