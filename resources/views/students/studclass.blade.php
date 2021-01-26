@extends('layouts.studentboard')

@section('title', 'My Class')

@section('content')

<div class="container-fluid">

  <stud_class :terms_class ="{{$term_class}}"></stud_class>

</div>

@endsection
