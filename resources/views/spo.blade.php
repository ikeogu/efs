

@extends('layouts.tdashboard')

@section('title', 'Class Broadsheet')

@section('tboard')



<div class="container-fluid">
    <p>{{$term->name}} | {{$term->session}} | {{$class_->name}} {{$class_->description}}</p>
    <div class="table table-responsive">
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>

                <th scope="col">Exam</th>
                <th scope="col">TCA</th>
                <th scope="col">GT</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($scores as $key=> $item)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{App\Student::me($item->student_id)}}</td>
                    <td>{{$item->Exam}}</td>
                    <td>{{$item->TCA}}</td>
                    <td>{{$item->GT}}</td>

                    
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
</div>
@endsection