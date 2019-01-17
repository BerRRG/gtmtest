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


    <title>Editar Cliente</title>
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

	<p class="title">Editar cliente:  {{ $client->name }}</p>
    <hr>
    <a class="btn btn-primary caption menu" href="{{ URL::to('clients') }}">Listar clientes</a>
    <a class="btn btn-primary caption menu" href="{{ URL::to('clients/create') }}">Adicionar cliente</a>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
{{ Form::model($client, array('route' => array('clients.update', $client->id), 'method' => 'PUT')) }}

{{ Form::model($client, array('route' => array('clients.update', $client->id), 'method' => 'PUT'))}}

@include('clients.form')

<a class="btn btn-small btn-primary buttonCad" href="{{ URL::to('clients') }}">Voltar</a>
{{ Form::submit('Salvar alterações', array('class' => 'btn btn-primary buttonCad')) }}

{{ Form::close() }}   	


</div>
</body>
</html>
