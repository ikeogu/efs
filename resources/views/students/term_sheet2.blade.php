@extends('layouts.studentboard')

@section('title', 'My term sheet')

@section('sboard')

<div class="container-fluid">
    

        <!-- Page Heading -->
        <div class="row">

            <div class="col-9">
                <p class=" mb-2 text-gray-800 text-success"style=" font-size:13px;"> Session: {{$term->session}} {{$term->name}} </h2>
            </div>
            <div class="col-3" style="float:right;">
                <p class=" mb-2 text-gray-800  text-success"style=" font-size:13px;">Class: {{$class_T->name}} </h5>
            </div>
           
        </div>
    
            <div class="pr-3-">
                <p class="text-black-800 text-success">Name: {{$student->name}} {{$student->oname}} {{$student->surname}} </h5>
            </div>
            
        
        @if ($class_T->status === 'Junior High School' || $class_T->status === 'Senior High School')
        <div class="row">
            <div class="col-4 d-flex ">
            <a href="{{route('cat1',[$student->id,$term->id,$class_T->id])}}" class=" btn btn-block btn-success">C.A.T 1</a>
            </div>
            <div class="col-4 d-flex justify-content-between">
            <a href="{{route('cat2',[$student->id,$term->id,$class_T->id])}}" class=" btn  btn-block btn-success">C.A.T 2</a>
            </div>
            <div class="col-4 d-flex justify-content-end">
            <a href="{{route('result',[$student->id,$term->id,$class_T->id])}}" class=" btn  btn-block btn-success ">Result </a>
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
       
    <term-sheet :s_details ="{{$student}}" :term="{{$term}}" :class_T="{{$class_T}}"></term-sheet>

</div>

@endsection
