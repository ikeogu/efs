@extends('layouts.dashboard')

@section('title', 'Class Broadsheet')

@section('content')


<div class="container-fluid">
    <form method="POST" action="{{route('FC')}}">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Class</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="class_">
            <option selected>Choose...</option>
            @foreach ($class_ as $item)
                <option value="{{$item->id}}">{{$item->name}} {{$item->description}}</option>
            @endforeach
            

            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Term</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="term">
            <option selected>Choose...</option>
            @foreach ($term as $item)
                <option value="{{$item->id}}">{{$item->name}}| {{$item->session}}</option>
            @endforeach
        

            </select>
        </div>

    
        <button type="submit" class="btn btn-outline-success btn-md">Fetch</button>
    </form>
    
    @if( is_object($c) &&  is_object($t))
  
        <a href="{{route('DC',[$c->id,$t->id])}}" class="btn btn-warning">Download PDF</a>
        <table class="table table-striped table-bordered" style="width:100%">
            <p> {{$c->name}} | {{$t->name}}</p>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Result Comment</th>
                  <th>Head Academcs Remark</th>
                  
                </tr>
              </thead>
              <tbody>
                  
               
                    @foreach($comments as $key =>$st)
                     <tr  >
                  <td scope="row">{{ $key + 1 }}</td>
                  <td>{{ $st->student->name}}</td>
                 
                  <td>{{ $st->comment}}</td>
                  <td>{{ $st->hcomment}}</td>
                 
                  
                </tr>
               @endforeach
              </tbody>
        </table>
    @endif
</div>
@endsection