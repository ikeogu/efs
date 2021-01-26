@extends('layouts.dashboard')

@section('title', 'Class List')

@section('content')



<div class="container-fluid">

<termclasses :term_1 = "{{$classes}}" :sess="{{$term}}"></termclasses>

</div>

@endsection
