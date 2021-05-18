@extends('layouts.tdashboard')

@section('title', 'Teacher Dashboard')

@section('tboard')



<div class="container-fluid table-responsive">
     @if($classt->count() > 0)
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Term</th>
            <th scope="col">Class</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($classt as $key => $item)
            <tr>
                <td scope="row">{{$key + 1}}</td>
                <td>{{$item->term->name}}</td>
                <td>{{$item->s5_class->name}}</td>
                <td>
                <a type="button" href="/api/students_in_term2/{{$item->term_id}}/class/{{$item->s5_class_id}}" class="btn btn-success btn-block">View</a>
                </td>
            </tr>
            @endforeach
          
          
        </tbody>
     </table>
     @else
     <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Notice</h6>
      </div>
      <div class="card-body">
        <p>Oops!!    <span class="emoji">&#128512;</span></p>
        <p class="mb-0">Currently not a class Teacher.</p>
        <p> Complain to Mr. Emmanuel, Okay!</p>
      </div>
    </div>
    @endif
</div>
 <style>
   span.emoji {
  font-size: 30px;
  vertical-align: middle;
  line-height: 2;
}
 </style>
@endsection
