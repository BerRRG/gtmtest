<!DOCTYPE html>
<html>
<head>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PCRZN9J');</script>
        <!-- End Google Tag Manager -->



    <title>Detalhes do Cliente</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>


        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PCRZN9J"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->



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