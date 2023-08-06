@extends('welcome')
@section('content')
  <div class="container">
    <div class="row">
       <div class="col-md-12 offset-md-0 col-xs-12">
          <div class="students-lists">
             <h3>Show school</h3>
             <hr/>
             <div class="student-teacher-info">
                <a href="{{ route('student_teacher.create') }}" class="btn btn-warning btn">add import student</a>
                <a href="{{ route('dashboard.view') }}" class="btn btn-info btn">view dashboard</a>
             </div>
             @if(count($st) > 0)
            
                <table class="table table-striped mt-3">
                    <tr>
                      <th>School Name</th>
                      <th>School location</th>
                      <th>Update School</th>
                      <th>Show Student Black Listed</th>
                    </tr>
                  @foreach ($st as  $s)
                      <tr>
                       <td>{{ $s->name }}</td>
                       <td>{{ $s->location }}</td>
                       <td><a href="/school/{{ $s->id }}/edit"><i class="fas fa-pen icon-1"></i></a></td>
                       <td><a href="/school_blacklist/{{ $s->name }}"><i class="fas fa-times blacklist"></i></a></td>
                      </tr> 
                  @endforeach
                </table>
             @else
                <h1>No School Found</h1>
             @endif
          </div>
       </div>
    </div>
  </div>
@endsection