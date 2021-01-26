@extends('layouts.tdashboard')

@section('title', 'Teacher Dashboard')

@section('tboard')



<div class="container-fluid">

<stud :students="{{$students}}" :term="{{$t}}" :classes="{{$classes}}"></stud>

</div>

@endsection
