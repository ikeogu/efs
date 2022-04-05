

@extends('layouts.dashboard')

@section('title', 'Assignement')

@section('content')



<div class="container-fluid">
    @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    {{-- <p>{{$term->name}} | {{$term->session}} | {{$class_->name}} {{$class_->description}}</p> --}}
    <div class="table table-responsive">
        <table class="table table-light">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>

                <th scope="col">Title</th>
                <th scope="col">Term</th>
                <th scope="col">Class</th>
                <th scope="col">Dead Line</th>
                <th scope="col">Posted</th>
                <th scope="col">Downloaded</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($ass as $key=> $item)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{App\Subject::find($item->subject_id)->name}}</td>
                    <td>{{$item->title}}</td>
                     <td>{{App\Term::find($item->term_id)->name}} || {{App\Term::find($item->term_id)->session}}</td>
                      <td>{{App\S5Class::find($item->s5_class_id)->name }} || {{App\S5Class::find($item->s5_class_id)->description }}</td>
                    <td>{{$item->dead_line}}</td>
                    <td>{{$item->created_at->diffForHumans()}}</td>
                     <td>{{$item->views}}</td>
                    
                    <td>
                      <a href="{{route('show',[$item->id])}}" class="btn btn-success" >
                        view
                      </a>
                      

                    </td>
                    
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
</div>
<!-- Modal -->

@endsection