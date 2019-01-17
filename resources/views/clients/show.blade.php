<!DOCTYPE html>
<html>
<head>

    @include('gtm-header')
    <title>Detalhes do Cliente</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>
    @include('gtm-body')
<div class="container">
    <p class="title">Detalhes do Cliente</p>
    <hr>
    <a class="btn btn-primary caption menu" href="{{ URL::to('clients') }}">Listar clientes</a>
    <a class="btn btn-primary caption menu" href="{{ URL::to('clients/create') }}">Adicionar clientes</a>

    <div class="panel panel-primary register">
        <p class="title-detail">{{ $client->name }}</p>
        <p class="details">
        <strong>Data de Nascimento:</strong> {{ $client->birth_date }}<br>            
        <strong>Email:</strong> {{ $client->email }}<br>
        <strong>Telefone:</strong> {{ $client->phone }}<br>
        <strong>Celular:</strong> {{ $client->celphone }}<br>
        <strong>Endereço:</strong> {{ $client->address }}<br>
        <strong>Bairro:</strong> {{ $client->neighborhood }}<br>
        <strong>CEP:</strong> {{ $client->cep }}<br>
        <strong>Cidade:</strong> {{ $client->city }}<br>
        <strong>Estado:</strong> {{ $client->uf }}<br>
        <strong>Trabalho:</strong> {{ $client->occupation }}<br>
        <strong>Estado civil:</strong> {{ $client->marital_status }}<br>
        </p>
    </div>
    <div>       
        <a class="btn btn-small btn-primary" href="{{ URL::to('clients') }}">Voltar</a>
    </div>
<br/>
</div>
</body>
</html>