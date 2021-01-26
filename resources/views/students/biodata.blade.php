@extends('layouts.studentboard')

@section('title', 'Student Dashboard')

@section('sboard')

<div class="container-fluid">
  
  
    
    <biodata :stud_login ="{{$stud}}"></biodata>
  
</div>

@endsection
