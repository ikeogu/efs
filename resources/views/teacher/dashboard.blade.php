@extends('layouts.tdashboard')

@section('title', 'Teacher Dashboard')

@section('tboard')



<div class="container-fluid">
    
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <div class="card card-title">
            <h4>Notification</h4>
      </div>
      <div class="card-body">
        
        <p class="card-text">Do well to input accuately the right score for your children, <br> from now henceforth, you will be DISABLED <br>
            from editing of scores when result has been viewed by parent.
        </p>
        
      </div>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

<tboard :t_login="{{$teacher}}" :subjects="{{$subjects}}"></tboard>


</div>

@endsection
