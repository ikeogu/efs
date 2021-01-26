@extends('layouts.dashboard')

@section('title', 'Student List')

@section('content')

<div class="container-fluid">
    <div>
        <a href="{{route('lock')}}" class="btn btn-danger">Lock out students</a>
        <a href="{{route('unlock')}}" class="btn btn-warning">Unlock Students</a>

    </div>

  <students></students>

</div>

@endsection
