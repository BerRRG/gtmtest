<!DOCTYPE html>
<html>
<head>
    <title>Lista de Consultórios</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>
<div class="container">

    <p class="title">Listagem de Consultórios</p>
    <hr>
    <a class="btn btn-primary caption menu"  href="{{ URL::to('clinics/create') }}">Adicionar consultório</a>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table id="registration-tables" class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nome</td>
        </tr>
    </thead>
    <tbody>
    @foreach($clinics as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <div class="pull-right">
                    <a class=" btn btn-small btn-success" href="{{ URL::to('clinics/' . $value->id) }}">Detalhar</a>


                    <a class="btn btn-small btn-info" href="{{ URL::to('clinics/' . $value->id . '/edit') }}">Editar</a>


                    {{ Form::open(array('url' => 'clinics/' . $value->id, 'class' => 'btn')) }}
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
