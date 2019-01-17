<!DOCTYPE html>
<html>
<head>
    <title>Relatórios</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @include('nav');
</head>
<body>
<div class="container">
    
    <p class="title">Baixar relatórios</p>
    <hr>
    <!-- <a class="btn btn-primary caption menu" href="{{ URL::to('clinics') }}">Listar consultórios</a> -->

    <div class="panel panel-primary panel-reports">
        <p class="reports-title">Tipos de relatórios</p>
        <hr class="reports-bar">
        <div class="reports">
<<<<<<< HEAD
            <h4 class="title-reports">Profissionais com mais trabalho</h4>
            <p class="caption-reports">Relatório que apresenta os funcionários que mais estão trabalhando na clinica</p>
=======
            <h4 class="title-reports">Relatório de profissionais</h4>
>>>>>>> c36d1238ecd8f35a8b4e6903fc27b1ec9621f06e
            {{ Form::open(array('url' => '/professional-reports', 'class' => 'btn')) }}
                {{ Form::hidden('_method', 'GET') }}
                {{ Form::submit('Baixar', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
        <hr class="reports-bar">
        <div class="reports">
<<<<<<< HEAD
            <h4 class="title-reports">Profissionais semanal</h4>
            <p class="caption-reports">Relatório que apresenta os atendimentos e rendimentos dos funcionários por semana</p>
=======
            <h4 class="title-reports">Relatório de profissionais semanal</h4>
>>>>>>> c36d1238ecd8f35a8b4e6903fc27b1ec9621f06e
            {{ Form::open(array('url' => '/professional-week-reports', 'class' => 'btn')) }}
                {{ Form::hidden('_method', 'GET') }}
                {{ Form::submit('Baixar', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
            <hr class="reports-bar">
        <div class="reports">
            <h4 class="title-reports">Profissionais mensal</h4>
            <p class="caption-reports">Relatório que apresenta os atendimentos e rendimentos dos funcionários por mês</p>
            {{ Form::open(array('url' => '/professional-month-reports', 'class' => 'btn')) }}
                {{ Form::hidden('_method', 'GET') }}
                {{ Form::submit('Baixar', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
        <hr class="reports-bar">
    </div>
</div>
</body>
</html>
