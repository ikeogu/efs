@extends('layouts.studentboard')

@section('title', '{{$tudent->name}}')

@section('content')




    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">

            <div class="col-4 col-sm-4">
                <p class="mb-2  text-success text-capitalize">{{$term->name}}</p>
                <p class="mb-2 text-success text-success">{{$term->session}}</p>
            </div>
            <div class="col-4  float-left" >
                <p class=" mb-2  text-success">CLASS: {{$class_T->name}} </p>
                <p class=" mb-2  text-success">NAME: {{$class_T->description}} </p>
            </div>
            <div class="col-4  float-right" >
                <p class=" mb-2 text-success ">School: {{$student->level}} </p>
            </div>
        </div>
        

        <div class="col-9 d-flex justify-content-center">
            <p class=" mb-2 text-white btn btn-success">{{$student->surname}} {{$student->name}} </p>
        </div>
            
        
        @if ($class_T->status === 'Junior High School'|| $class_T->status ==='Senior High School')
          <div class="row">
            <div class="col-4 ">
            <a href="{{route('cat1',[$student->id,$term->id,$class_T->id])}}" class="btn btn-block btn-success">C.A.T 1</a>
            </div>
            <div class="col-4">
            <a href="{{route('cat2',[$student->id,$term->id,$class_T->id])}}" class="btn btn-block btn-success">C.A.T 2</a>
            </div>
            <div class="col-4">
            <a href="{{route('result',[$student->id,$term->id,$class_T->id])}}" class="btn  btn-block btn-success ">Result </a>
            </div>
          </div> 
        
        @elseif($class_T->status ==="Year School")
        <div class="row">
            <div class="col-4 ">
                <a href="{{route('sum1',[$student->id,$term->id,$class_T->id])}}" class="btn btn-block btn-success">Summative 1</a>
            </div>
            <div class="col-4 ">
                <a href="{{route('sum',[$student->id,$term->id,$class_T->id])}}" class="btn btn-block btn-success">Summative 2</a>
            </div>
            <div class="col-4">
                <a href="{{route('result',[$student->id,$term->id,$class_T->id])}}" class="btn btn-block btn-success">Result </a>
            </div>
        </div>
        @elseif($class_T->status ==="Early Years")
        <div class="row">
            <div class="col-6 float-left ">
                <a href="{{route('sum',[$student->id,$term->id,$class_T->id])}}" class="btn btn-block btn-success">Summative </a>
            </div>
            <div class="col-6 float-right">
                <a href="{{route('result',[$student->id,$term->id,$class_T->id])}}" class="btn btn-block btn-success">Result </a>
            </div>
        </div>
        @endif
       
        
        

    <student-record :studs_data ="{{$data}}" :s_details ="{{$student}}" :term="{{$term}}" :class_T="{{$class_T}}"></student-record>

    </div>

@endsection
<style>
    .float{float:right;}
</style>