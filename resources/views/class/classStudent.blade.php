@extends('layouts.dashboard')

@section('title', "Class's Students")

@section('content')




    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="float-left col-md-6 col-sm-6">
            <p class=" mb-2 text-gray-800">{{$t->name}} {{$t->session}}</p>
            </div>
            <div class="float-right col-md-6 col-sm-6">
            <p class=" mb-2 text-gray-800">{{$class_->name}} {{$class_->description}}</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <a href="{{route('summative',[$t->id,$class_->id])}}"  class="btn btn-success">Summative BroadSheet</a>
            </div>
            <div class="col-md-3">
                <a href="{{route('tca',[$t->id,$class_->id])}}"  class="btn btn-success">TCA BroadSheet</a>
            </div>
            <div class=" col-md-3 py-3">
                <a href="{{route('exam',[$t->id,$class_->id])}}"  class="btn btn-success">Exam BroadSheet</a>
            </div>
            <div class="col-md-3">
                <a href="{{route('gt',[$t->id,$class_->id])}}"  class="btn btn-success">Grand Total BroadSheet</a>
            </div>
        </div>

    <class-student :students="{{$students}}" :t="{{$t}}" :class_T="{{$class_}}"></class-student>

    </div>

@endsection
