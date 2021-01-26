@extends('layouts.dashboard')

@section('title', 'My term sheet')

@section('content')

<div class="container-fluid">
    

        <!-- Page Heading -->
        <div class="row">

            <div class="col-9">
                <p class=" mb-2 text-gray-800"style=" font-size:9px;"> Session: {{$term->session}} {{$term->name}} </h2>
            </div>
            <div class="col-3" style="float:right;">
                <p class=" mb-2 text-gray-800 "style=" font-size:9px;">Class: {{$class_T->name}} </h5>
            </div>
           
        </div>
        <div class="row">
            <div  style="float:right;">
                <p class=" mb-2 text-gray-800 ">Name: {{$student->name}} {{$student->oname}} {{$student->surname}} </h5>
            </div>
            
        </div>
        @if ($class_T->status === 'Junior High School' || $class_T->status === 'Senior High School')
        <div class="row">
            <div class="col-4 d-flex ">
            <a href="{{route('cat1',[$student->id,$term->id,$class_T->id])}}" class="col-4 col-sm-4 btn btn-block btn-success">C.A.T 1</a>
            </div>
            <div class="col-4 d-flex justify-content-between">
            <a href="{{route('cat2',[$student->id,$term->id,$class_T->id])}}" class="col-4 btn  col-sm-4 btn-block btn-success">C.A.T 2</a>
            </div>
            <div class="col-4 d-flex justify-content-end">
            <a href="{{route('result',[$student->id,$term->id,$class_T->id])}}" class="col-4 btn col-sm-4 btn-block btn-success ">Result </a>
            </div>
          </div> 
        @elseif($class_T->status === 'Year School' || $class_T->status === 'Year School')
        <div class="row">
            <div class="row">
                <a href="{{route('sum',[$student->id,$term->id,$class_T->id])}}" class="col-6 col-sm-6 btn btn-block btn-success">Summative </a>
                <div class="col-md-6">
                <a href="{{route('result',[$student->id,$term->id,$class_T->id])}}" class="col-6  col-sm-6 btn btn-block btn-success ">Result </a>
                </div>
              </div> 
         
        @endif
       
    <term-sheet :s_details ="{{$student}}" :term="{{$term}}" :class_T="{{$class_T}}"></term-sheet>

</div>

@endsection
