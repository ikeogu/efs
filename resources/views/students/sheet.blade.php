@extends('layouts.dashboard')

@section('title', '{{$tudent->name}}')

@section('content')




    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">

            <div class="col-4 col-sm-4">
                <p class="mb-2  text-success text-capitalize">{{$term->name}}</p>
                <p class="mb-2 text-success text-success">{{$term->session}}</p>
            </div>
            <div class="col-4 justify-content-left flaot" >
                <p class=" mb-2  text-success">CLASS: {{$class_T->name}} </p>
                <p class=" mb-2  text-success">NAME: {{$class_T->description}} </p>
            </div>
            <div class="col-4 justify-content-left flaot" >
                <p class=" mb-2 text-success ">School: {{$student->level}} </p>
            </div>
        </div>
        <div class="row">

            <div class="col-4 justify-content-center">
                <p class=" mb-2 text-white btn btn-success">{{$student->surname}} {{$student->name}} </p>
            </div>
            
        </div>
        @if ($class_T->status === 'Junior High School')
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
        @elseif($class_T->status ==='Senior High School')
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
        @else
        <div class="row">
            <a href="{{route('sum',[$student->id,$term->id,$class_T->id])}}" class="col-lg-6 col-md-6 btn btn-block btn-success">Summative </a>
            <div class="col-6-lg col-sm-6 col-md-6">
            <a href="{{route('result',[$student->id,$term->id,$class_T->id])}}" class="col-lg-6  col-md-6 btn btn-block btn-success ">Result </a>
            </div>
          </div> 
        @endif
       
        

    <student-record :studs_data ="{{$data}}" :s_details ="{{$student}}" :term="{{$term}}" :class_T="{{$class_T}}"></student-record>

    </div>

@endsection
<style>
    .float{float:right;}
</style>