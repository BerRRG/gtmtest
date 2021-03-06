<!DOCTYPE html>
<html>
<head>

    @include('gtm-header')

    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<script type="text/javascript">
    function ConfirmDelete()
    {
        var x = confirm('Quer realmente deletar?');
        if (x) {
            return true;
        }
        return false;
    }
</script>
<body>

@include('gtm-body')


<div class="container">
    <p class="title">Listagem de Clientes</p>
    <hr>
    <!-- <a class="caption" href="{{ URL::to('clients') }}"> Listar clientes</a> -->
    <a class="btn btn-primary caption menu" href="{{ URL::to('clients/create') }}"> Adicionar cliente</a>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table id="registration-tables" class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Telefone</td>
            <td>Celular</td>
            <td>Funcionalidades</td>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->phone }}</td>
            <td>{{ $value->celphone }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <div class="positionButtons">                   
                    <a class="btn btn-small btn-success" href="{{ URL::to('clients/' . $value->id) }}">Detalhar</a>

                    <a class="btn btn-small btn-info" href="{{ URL::to('clients/' . $value->id . '/edit') }}">Editar</a>

                    {{ Form::open(array('url' => 'clients/' . $value->id, 'class' => 'btn','onsubmit' => 'ConfirmDelete()')) }}
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
