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
            <div class="col-sm-6">
                <h2>Què és un biorritme?</h2>
                La naturaleza y todo lo que ella comprende: clima, estaciones, reproducción de los
                animales, cosechas, etc., se rigen por ciclos biológicos o ritmos. Existen diferentes
                biorritmos que afectan nuestro comportamiento en distintas maneras. Se ha
                comprobado estadísticamente que la energía física se comporta cíclicamente en
                periodos de 23 días, la energía emotiva en periodos 28 días y la energía intelectual en
                33 días. Al momento de nacer, cada ciclo comienza desde cero y empieza a subir en
                una fase positiva, durante la cual las energías y las capacidades son altas

            </div>
            <div class="col-sm-6">
                <h2>Calcula el teu biorritme</h2>
                <form action="" method="post">
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
@endsection

@section('botoInici')
    display: none;
@endsection