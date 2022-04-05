@extends('layouts.tdashboard')

@section('title', 'Student in Class List')

@section('tboard')




    <div class="container-fluid">

        <div class="row">

            <div class="col-6 col-sm-6">
                <p class=" mb-2  text-success text-capitalize">{{$t->name}}</p>
                <p class=" mb-2 text-success text-success">{{$t->session}}</p>
            </div>
            <div class="col-6 col-sm-6" >
                <p class=" mb-2  text-success">CLASS: {{$class_T->name}} </p>
                <p class=" mb-2  text-success">NAME: {{$class_T->description}} </p>
            </div>
            
        </div>
        @if ($class_T->status =='Junior High School'||$class_T->status =='Senior High School')
        <div class="row mt-5">
            <div class="col-md-2 mb-2 ">
                <a href="{{route('cat1s_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">C.A.T 1</a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="{{route('cat2s_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">C.A.T 2</a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="{{route('msc_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">MSC</a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="{{route('tca_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">T.C.A</a>
            </div>
            <div class=" col-md-2 mb-2">
                <a href="{{route('exam_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">Exam </a>
            </div>
            <div class="col-md-2">
                <a href="{{route('gt_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">Grand Total</a>
            </div>
        </div>
        @endif
     
        @if($class_T->status == 'Year School')
        <div class="row mt-5">
            <div class="col-md-3">
                <a href="{{route('summative_ct1',[$t->id,$class_T->id])}}"  class="btn btn-success">Summative 1</a>
            </div>
            <div class="col-md-3">
                <a href="{{route('summative_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">Summative 2</a>
            </div>
            <div class="col-md-3">
                <a href="{{route('tca_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">TCA BroadSheet</a>
            </div>
            
        </div>
        <div class="row">
            <div class=" col-md-3 py-3">
                <a href="{{route('exam_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">Exam BroadSheet</a>
            </div>
            <div class="col-md-3">
                <a href="{{route('gt_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">Grand Total BroadSheet</a>
            </div>
        </div>
        @endif
        @if($class_T->status == 'Early Years')
        <div class="row mt-5">
            <div class="col-md-3">
                <a href="{{route('summative_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">Summative </a>
            </div>
            <div class="col-md-3">
                <a href="{{route('tca_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">TCA BroadSheet</a>
            </div>
            <div class=" col-md-3 py-3">
                <a href="{{route('exam_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">Exam BroadSheet</a>
            </div>
            <div class="col-md-3">
                <a href="{{route('gt_ct',[$t->id,$class_T->id])}}"  class="btn btn-success">Grand Total BroadSheet</a>
            </div>
        </div>
        @endif
       

    <class-ct :terms="{{$terms}}" :t="{{$t}}" :m="{{$class_T}}"></class-ct>
      @if($class_T->status === 'Early Years')
         <subcomment :s5_class_id="{{$class_T->id}}" :term_id="{{$t->id}}"/>
    @endif

    </div>

@endsection
