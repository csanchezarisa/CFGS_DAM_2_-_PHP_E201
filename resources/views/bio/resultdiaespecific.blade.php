@extends('layouts.master')

@section('title')
    Càlcul biorritme de {{$nomUsuari}}
@endsection

@section('header')
    Biorritme de <strong>{{$nomUsuari}}</strong> <br>
    amb data de naixement <strong>{{$dataNaixement}}</strong>
@endsection

@section('content')
    <h2>El dia: {{$dataActual}}</h2>
    <h3>Els teus resultats són:</h3>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-sm-3 text-left">
                <strong>Biorritme físic:</strong>
            </div>
            <div class="col-sm-9">
                <div class="progress" style="height:20px;">
                    <div class="progress-bar bg-danger" style="height:20px; width: {{($resultatFisic + 1) * 100 / 2}}%;" data-toggle="tooltip" title="{{($resultatFisic + 1) * 100 / 2}}%">
                        <strong>{{($resultatFisic + 1) * 100 / 2}}%</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 text-left">
                <strong>Biorritme emotiu:</strong>
            </div>
            <div class="col-sm-9">
                <div class="progress" style="height:20px;">
                    <div class="progress-bar bg-success" style="height:20px; width: {{($resultatEmotiu + 1) * 100 / 2}}%;" data-toggle="tooltip" title="{{($resultatEmotiu + 1) * 100 / 2}}%">
                        <strong>{{($resultatEmotiu + 1) * 100 / 2}}%</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 text-left">
                <strong>Biorritme intel·lectual:</strong>
            </div>
            <div class="col-sm-9">
                <div class="progress" style="height:20px;">
                    <div class="progress-bar" style="height:20px; width: {{($resultatIntelectual + 1) * 100 / 2}}%;" data-toggle="tooltip" title="{{($resultatIntelectual + 1) * 100 / 2}}%">
                        <strong>{{($resultatIntelectual + 1) * 100 / 2}}%</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px; margin-bottom: 50px;">
        <h3>Així és l'evolució dels teus biorritmes durant aquest mes:</h3>
        <div id="grafica"></div>
    </div>
    <div class="container text-right">
        <h2>Vols calcular el biorritme d'un altre dia?</h2>
        <form action="/biorritme_dia_especific" method="POST">
            @csrf
            <label style="width: 25%;">
                <strong>Dia desitjat:</strong>
                <!-- Input de tipus data per introduir la data desitjada per analitzar. Aquesta data no pot tenir un valor inferior al de la data de naixement -->
                <input type="date" name="datadesitjada" id="datadesitjada" class="form-control" min="{{$dataNaixementSenseTransformar}}"/>
                <!-- Inputs que tindran els valors del nom d'usuari i de la data de naixement que s'omplaran automàticament i seran invisibles per l'usuari -->
                <input type="text" name="nomusuari" id="nomusuari" value="{{$nomUsuari}}" style="display: none;"/>
                <input type="date" name="datanaixement" id="datanaixement" value="{{$dataNaixementSenseTransformar}}" style="display: none;" />
            </label>
            <button type="submit" class="btn btn-primary">Calcula!</button>
        </form>
    </div>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script>
        // S'encarrega de generar la gràfica
        // La seva pàgina web https://plotly.com/javascript/
        var fisic = {
        x: [
            @foreach ($resultatsEixX as $data)
"{{$data}}",
            @endforeach
            ],
        y: [
            @foreach ($resultatsFisicEixY as $data)
"{{$data}}",
            @endforeach
            ],
        type: 'scatter',
        line: {
            color: 'rgb(205, 92, 92)',
            width: 3
        },
        name: 'Físic'
        };

        var emotiu = {
        x: [
            @foreach ($resultatsEixX as $data)
"{{$data}}",
            @endforeach
            ],
        y: [
            @foreach ($resultatsEmotiuEixY as $data)
"{{$data}}",
            @endforeach
            ],
        type: 'scatter',
        line: {
            color: 'rgb(92, 205, 92)',
            width: 3
        },
        name: 'Emotiu'
        };

        var intelectual = {
        x: [
            @foreach ($resultatsEixX as $data)
"{{$data}}",
            @endforeach
            ],
        y: [
            @foreach ($resultatsIntelectualEixY as $data)
"{{$data}}",
            @endforeach
            ],
        type: 'scatter',
        line: {
            color: 'rgb(92, 92, 205)',
            width: 3
        },
        name: 'Intel·lectual'
        };

    var data = [fisic, emotiu, intelectual];

    var layout = {
        title: 'Biorritmes'
    }

    Plotly.newPlot('grafica', data, layout);
    </script>
    <script>
        // S'encarrega d'executar i obrir els tooltip de les barres de progés
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
@endsection