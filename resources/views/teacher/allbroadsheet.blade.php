@extends('layouts.dashboard')

@section('title', 'Class Broadsheet')

@section('content')


<div class="container-fluid">
    <form method="POST" action="{{route('class_broad')}}">
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
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Broadsheet</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="broadsheet">
            <option selected>Choose...</option>
            
             <option value="1">C.A.T 1</option>
             <option value="2">C.A.T 2</option>
             <option value="3">Exam</option>
             <option value="4">Summative</option>
             <option value="5">T.C.A</option>
             <option value="6">M.S.C</option>
             <option value="7">Grand Total</option>
            
        

            </select>
        </div>
        <button type="submit" class="btn btn-outline-success btn-md">Check</button>
    </form>
</div>
@endsection