@extends('layouts.master')

@section('title')
    BIORRITMES
@endsection

@section('header')
    Calcula el teu biorritme <br>
    i aconsegueix viure millor!
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 text-justify">
                <h2 class="text-center">Què és un biorritme?</h2>
                La naturalesa i tot el que ella comprèn: clima, estacions, reproducció dels
                animals, collites, etc., es regeixen per cicles biològics o ritmes. hi ha diferents
                bioritmes que afecten el nostre comportament en diferents maneres. s'ha
                comprovat estadísticament que l'energia física es comporta cíclicament en
                períodes de 23 dies, l'energia emotiva en períodes 28 dies i l'energia intel·lectual en
                33 dies. A l'hora de néixer, cada cicle comença des de zero i comença a pujar a
                una fase positiva, durant la qual les energies i les capacitats són altes
            </div>
            <div class="col-sm-6">
                <h2>Calcula el teu biorritme</h2>
                <form action="/biorritme" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm">
                            <label>
                                <strong>Nom d'usuari</strong>
                                <input type="text" name="nomusuari" id="nomusuari" class="form-control" placeholder="Nom d'usuari" />
                            </label>
                            <label>
                                <strong>Data de naixement</strong>
                                <input type="date" name="datanaixement" id="datanaixement" class="form-control" />
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm text-right">
                            <button type="submit" class="btn btn-primary">Calcula!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Controla que en el formulari no s'introdueixi una data més gran que l'actual
        var inputDate = document.getElementById("datanaixement");
        var diaActual = new Date();
        var dd = String(diaActual.getDate()).padStart(2, '0');
        var mm = String(diaActual.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = diaActual.getFullYear();

        diaActual = yyyy + "-" + mm + "-" + dd;

        inputDate.setAttribute("max", diaActual);
    </script>
@endsection

@section('botoInici')
    display: none;
@endsection