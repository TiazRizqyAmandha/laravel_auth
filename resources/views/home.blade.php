@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
    {{session('sukses')}}
</div>
@endif
@endsection