@extends('layouts.dashboard')

@section('title', 'Class Broadsheet')

@section('content')


<div class="container-fluid">
    <form method="POST" action="{{route('class_student')}}">
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
            @foreach ($terms as $item)
                <option value="{{$item->id}}">{{$item->name}}| {{$item->session}}</option>
            @endforeach
        

            </select>
        </div>
        
        <button type="submit" class="btn btn-outline-success btn-md">Fetch</button>
    </form>
</div>
@endsection