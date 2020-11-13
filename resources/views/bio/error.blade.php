@extends('layouts.master')

@section('title')
    ERROR!
@endsection

@section('header')
    ERROR! <br>
    No s'ha pogut calcular el biorritme
@endsection

@section('content')
<div class="alert alert-danger">
    <strong>ERROR!</strong> No s'ha pogut fer el càlcul del biorritme. Si us plau, revisa les dades.
  </div>
@endsection