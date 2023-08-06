@extends('welcome')
@section('content')
  <div class="container">
    <div class="row">
       <div class="col-md-12 offset-md-0 col-xs-12">
          <div class="students-lists">
             <h3>Show school Results</h3>
             <hr/>
             <div class="student-teacher-info">
                <a href="{{ route('student_teacher.create') }}" class="btn btn-warning btn">add import student</a>
                <a href="{{ route('dashboard.view') }}" class="btn btn-info btn">view dashboard</a>
             </div>
             <table class="table table-striped mt-3">
                    <tr>
                      <th>School Name</th>
                      <th>School location</th>
                      <th>Update School</th>
                      <th>Show Student Black Listed</th>
                    </tr>
                    <tr>
                       <td>{{ $sc->name }}</td>
                       <td>{{ $sc->location }}</td>
                       <td><a href="/school/{{ $sc->id }}/edit"><i class="fas fa-pen icon-1"></i></a></td>
                       <td style="padding-left:40px;"><a href="/school_blacklist/{{ $sc->name }}"><i class="fas fa-times blacklist"></i></a></td>
                    </tr> 
                </table>
             </div>
       </div>
    </div>
  </div>
@endsection