@extends('layouts.dashboard')

@section('title', 'Student in Class List')

@section('content')




    <div class="container-fluid">

        <!-- Page Heading -->
    <h2 class="h3 mb-2 text-success">{{$class_T->name}} {{$class_T->description}}</h2>
      

    <terms :terms="{{$terms}}" :myclass="{{$class_T}}"></terms>

    </div>

@endsection
