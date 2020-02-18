@extends('layouts.app')
@section('content')
@foreach ($cadastros as $cadastro)
    {{$cadastro->cadastro}}
@endforeach
@endsection