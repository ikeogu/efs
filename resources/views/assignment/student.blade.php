@extends('layouts.studentboard')

@section('title', 'Student Dashboard')

@section('sboard')

<div class="container-fluid">
    @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    
  {{-- <form method="POST" action="{{route('VA')}}">
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
    </form>--}}
    <hr>
    @if(!empty($assignments))
       <div class="table table-responsive jumbotron-fluid">
        <table class="table table-light">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Title</th>
                <th scope="col">Class</th>
                <th scope="col">Term</th>
                <th scope="col">Dead Line</th>
                <th scope="col">Posted</th>
                <th scope="col">Action</th>
               
              </tr>
            </thead>
            <tbody>
                @foreach ($assignments as $key=> $item)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{App\Subject::find($item->subject_id)->name}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{App\Subject::findClass($item->s5_class_id)}}</td>
                      <td>{{App\Subject::findTerm($item->term_id)}}</td>
                    <td>{{$item->dead_line}}</td>
                    <td>{{$item->created_at}}</td>
                    
                     <td>
                       <a href="{{route('show',[$item->id])}}" class="btn btn-success">view</a>
                     </td>
                    
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
    @endif

</div>

@endsection
