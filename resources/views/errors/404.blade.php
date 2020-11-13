@extends('layouts.master')

@section('title')
    ERROR 404
@endsection

@section('header')
    ERROR 404 <br>
    No s'ha trobat el recurs sol·licitat
@endsection

@section('content')
<div class="alert alert-danger">
    <strong>ERROR!</strong> No s'ha pogut trobar el recurs sol·licitat. Si us plau revisa la URL i torna a intentar-ho.
  </div>
@endsection