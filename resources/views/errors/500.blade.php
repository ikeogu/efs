@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code')
<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
      <div class="error mx-auto" data-text="404"></div>
      <p class="lead text-gray-800 mb-5">Oops!!!</p>
      <p class="text-gray-500 mb-0">Something went wrong.</p>
      <a href="/">&larr; Back to Dashboard</a>
    </div>

  </div>
@endsection
@section('message', __('Server Error'))
