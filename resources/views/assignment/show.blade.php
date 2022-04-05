
  @extends('layouts.studentboard')

  @section('title', 'Student Dashboard')

  @section('sboard')


  <div class="container-fluid">
      
    <div class="card col-8">
      <div class="card-header">
        <p>Assignment on {{App\Subject::find($ass->subject_id)->name}}</p>
        <small>{{$ass->title}}</small>
      </div>
      <div class="card-body">
        <article  class="row">
          {{$ass->instruction}}
        </article>
        <article  class="row">
             <?php echo  $ass->body ?>
        </article>
        
      </div>
        <div class="card-footer">
        @if(file_exists($ass->file))
            <em>Download file.</em>
            <a href="{{route('DA',[$ass->id])}}" class="btn btn-success"> Download</a>
        @endif
        </div>
    </div>

  </div>

@endsection
