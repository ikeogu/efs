@extends('layouts.tdashboard')

@section('title', 'Class Assignment')

@section('tboard')


<div class="container-fluid">
    @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
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
    <form method="POST" action="{{route('ASSG')}}" enctype="multipart/form-data">
        @csrf
         <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Name</label>
            </div>
           
           <input class="form-control" id="inputGroupSelect01" value="{{Auth::user()->name}}" readonly>
        </div>
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
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Subject</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="subject_id">
            <option selected>Choose...</option>
            
             
            @foreach ($subjects as $item)
                <option value="{{$item->id}}">{{$item->name}}| {{$item->description}}</option>
            @endforeach
        

            </select>
        </div>
         <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Title</label>
            </div>
            <input class="form-control" name="title" placeholder="Title of Assignment" type="text"> 
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Instructions</label>
            </div>
            <textarea class="form-control" name="instruction" rows="5" cols="7">Enter Intruction.... </textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Assignment</label>
            </div>
            <textarea class="form-control" name="body" rows="5" cols="7">Enter Assignment.... </textarea>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Upload(PDF,IMAGE,WORD)</label>
            </div>
            <input type="file" class="form-control" name="file" >
        </div>
         <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">When To Turn In</label>
            </div>
            <input type="date" class="form-control" name="dead_line" >
        </div>
        <button type="submit" class="btn btn-outline-success btn-md">Create</button>
    </form>
</div>
@endsection