@extends('layouts.master')

@section('title')
    Càlcul biorritme de {{$nomUsuari}}
@endsection

@section('header')
    Biorritme de <strong>{{$nomUsuari}}</strong> <br>
    amb data de naixement <strong>{{$dataNaixement}}</strong>
@endsection

@section('content')
    <label>
        <strong>Biorritme físic:</strong>
        <div class="progress">
            <div class="progress-bar" style="width: {{$resultatFisic * 100}}%;"></div>
        </div>
    </label>
    <label>
        <strong>Biorritme emotiu:</strong>
        <div class="progress">
            <div class="progress-bar" style="width: {{$resultatEmotiu * 100}}%;"></div>
        </div>
    </label>
    <label>
        <strong>Biorritme intelectual:</strong>
        <div class="progress">
            <div class="progress-bar" style="width: {{$resultatIntelectual * 100}}%;"></div>
        </div>
    </label>
@endsection