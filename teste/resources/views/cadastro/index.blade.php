
@extends('layouts.cadastro')
@section('content')
@foreach ($cadastros as $cadastro)
    {{$cadastro->cadastro}}
@endforeach
@endsection
