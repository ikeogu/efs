@extends('layouts.dashboard')

@section('title', 'Class Broadsheet')

@section('content')



<div class="container-fluid">
    <p>{{$term->name}} | {{$term->session}} | {{$class_->name}} {{$class_->description}}</p>
    <div class="table table-responsive">
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">FirstName</th>
                <th scope="col">Othername</th>
                <th scope="col">Lastname</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($students as $key=> $item)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->oname}}</td>
                    <td>{{$item->surname}}</td>
                    @if(auth()->user()->teacher_id != null)
                        @if ($class_->status =='Early Years'|| $class_->status == 'Year School')
                            <td>
                                <a href="{{route('sum_ct',[$item->id,$term->id,$class_->id])}}" class="btn btn-success">Summative</a>
                            </td>
                        @else
                            <td>
                                <a href="{{route('cat1_ct',[$item->id,$term->id,$class_->id])}}" class="btn btn-success">C.A.T 1</a>
                            </td>
                            <td>
                                <a href="{{route('cat2_ct',[$item->id,$term->id,$class_->id])}}" class="btn btn-success">C.A.T 2</a>
                            </td>
                        @endif
                        
                        <td>
                            <a href="{{route('result_ct',[$item->id,$term->id,$class_->id])}}" class="btn btn-success">Report Card</a>
                        </td>
                    @else
                    
                        @if ($class_->status =='Early Years'|| $class_->status == 'Year School')
                            <td>
                                <a href="{{route('sum',[$item->id,$term->id,$class_->id])}}" class="btn btn-success">Summative</a>
                            </td>
                        @else
                            <td>
                                <a href="{{route('cat1',[$item->id,$term->id,$class_->id])}}" class="btn btn-success">C.A.T 1</a>
                            </td>
                            <td>
                                <a href="{{route('cat2',[$item->id,$term->id,$class_->id])}}" class="btn btn-success">C.A.T 2</a>
                            </td>
                        @endif
                        
                        <td>
                            <a href="{{route('result',[$item->id,$term->id,$class_->id])}}" class="btn btn-success">Report Card</a>
                        </td>
                    @endif
                    
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
</div>
@endsection