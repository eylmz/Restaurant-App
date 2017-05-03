@extends('Layout.index')

@section('Title','Dikkat')

@section('Body')

<div class="alert alert-{{ $type }}">
    <strong>Dikkat!</strong> {{ $alert }}
</div>

@endsection