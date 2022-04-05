

@extends('layouts.tdashboard')

@section('title', 'Class Broadsheet')

@section('tboard')



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
               
                <th scope="col">Dead Line</th>
                <th scope="col">Posted</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($assignment as $key=> $item)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{App\Subject::find($item->subject_id)->name}}</td>
                    <td>{{$item->title}}</td>
                   
                    <td>{{$item->dead_line}}</td>
                    <td>{{$item->created_at->diffForHumans()}}</td>
                    <td>
                      
                      <a href="{{route('show',[$item->id])}}" class="btn btn-success" >
                        view
                      </a>
                      <a href="{{route('destroyAss',[$item->id])}}" class="btn btn-danger" >
                        Delete
                      </a>
                      

                    
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter-{{$key}}">
                        Edit
                      </button>
                       <div class="modal fade" id="exampleModalCenter-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Edit {{$item->title}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="{{route('updateASSG',[$item->id])}}" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              
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
                                  <input class="form-control" name="title" value="{{$item->title}}" type="text"> 
                              </div>
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Instructions</label>
                                  </div>
                                  <textarea class="form-control text-black-50" name="instruction" rows="5" cols="7">{{$item->instruction}} </textarea>
                              </div>
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Assignment</label>
                                  </div>
                                  <textarea class="form-control" name="body" rows="5" cols="7">{{$item->body}}</textarea>
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
                              <button type="submit" class="btn btn-outline-success btn-md">Update</button>
                          </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                            </div>
                          </div>
                        </div>
                      </div>

                    </td>
                    
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
</div>
<!-- Modal -->

@endsection