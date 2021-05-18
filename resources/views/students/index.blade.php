@extends('layouts.dashboard')

@section('title', 'Student List')

@section('content')

<div class="container-fluid">
    <div class="row">
            @if(session('success'))
              <div class="alert alert-success">
                  {!! session('success') !!}
              </div>
            @endif

            @if(session('error'))
              <div class="alert alert-danger">
                  {!! session('error') !!}
              </div>
            @endif
    </div>
    <div class="row">
        <a href="{{route('lockh')}}" class="btn btn-outline-danger col-4 label">Lock High School Students</a>

        <a href="{{route('locky')}}" class="btn btn-outline-danger col-4 label">Lock Year School Students</a>
        <a href="{{route('locke')}}" class="btn btn-outline-danger col-4 label ">Lock Early Years Students</a>
    </div>
    <div class="row">
        
        <a href="{{route('unlockh')}}" class="btn btn-outline-info col-4 ">Unlock High School Students</a>
        <a href="{{route('unlocky')}}" class="btn btn-outline-info col-4 ">Unlock Year School Students</a>
        <a href="{{route('unlocke')}}" class="btn btn-outline-info col-4 ">Unlock Early Years Students</a>

    </div>

  <students></students>

</div>

@endsection
