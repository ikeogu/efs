@extends('errors::minimal')

@section('title', __('Page Expired'))
<div class="container-fluid">
    @section('code')
    <!-- 404 Error Text -->
    <div class="text-center">
      <div class="error mx-auto" data-text="404">Session Expired!</div>
      <p class="lead text-gray-800 mb-5"></p>
      <p class="text-gray-500 mb-0"></p>
      <a href="/login">&larr; Back to Login</a>
    </div>

  </div>
  @endsection
@section('message', __('Page Expired'))
