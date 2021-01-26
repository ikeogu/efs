@extends('layouts.dashboard')

@section('title', 'Year school Student List')

@section('content')

    <div class="container-fluid">
  
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success"> {{$h->count()}} Students Record</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    
                    <th>Roll#</th>
                    <th>Reg.No</th>
                    <th>First Name</th>
                    <th>Other Name</th>
                    <th>Surame</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    
                  
                  
                </thead>
                <tbody>
                  @foreach ($h as $key => $item)
                  <tr>
                    <th>{{$key + 1}}</th>
                    <th scope="row">{{ $item->reg_no }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->oname }}</td>
                    <td>{{ $item->surname }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ App\User::where('student_id',$item->id)->first()->keep_track }}</td>
                    <td>
                      @if($item->gender == 1)
                      MALE
                      @else
                      FEMALE
                      @endif 
                    </td>
                    <td>{{ date('jS F, Y', strtotime($item->dob)) }}</td>
                  
                  </tr>
                  @endforeach
                  
                </tbody>
                
                </table>
             
              </div>
            </div>
          </div>
         
    </div>
@endsection
  