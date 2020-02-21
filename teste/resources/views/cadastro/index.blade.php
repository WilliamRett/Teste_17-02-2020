
@extends('layouts.app')
@section('content')
@foreach ($cadastros as $result)
<p> {{ $result }}</p>
@endforeach
@endsection
