@extends('layouts.dashboard')

@section('title', 'Import Students')

@section('content')


<import_students :terms="{{$terms}}" :class_="{{$class_}}"></import_students>
@endsection