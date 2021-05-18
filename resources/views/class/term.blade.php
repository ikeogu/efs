@extends('layouts.dashboard')

@section('title', 'Class List')

@section('content')



<div class="container-fluid">
  <div class="row p-3">
    <div class="col-2 card">
      <p class="card-header bg-warning">Students</p>
      <p class="card-body"> {{App\Student::count()}}</p>
      
    </div>
    <div class="col-2 card p-2">
      <p class="card-header bg-teal">Terms</p>
      <p class="card-body"> {{App\Term::count()}}</p>
      
    </div>
    <div class="col-2 card p-2">
      <p class="card-header bg-success">Subjects</p>
      <p class="card-body"> {{App\Subject::count()}}</p>
      
    </div>
    <div class="col-2 card p-2">
      <p class="card-header bg-teal">Class</p>
      <p class="card-body"> {{App\S5Class::count()}}</p>
      
    </div>
    <div class="col-2 card p-2">
      <p class="card-header bg-success">Teachers</p>
      <p class="card-body"> {{App\Teacher::count()}}</p>
      
    </div>
  </div>

  <term></term>

</div>

@endsection
