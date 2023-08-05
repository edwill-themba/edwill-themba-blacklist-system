@extends('welcome')
@section('content')
  <div class="container">
    <div class="row">
       <div class="col-md-12 offset-md-0 col-xs-12">
          <div class="students-lists">
             <h3>View Student Teacher List</h3>
             <hr/>
             <div class="student-teacher-info">
                <a href="{{ route('student_teacher.create') }}" class="btn btn-warning btn">add import student</a>
                <a href="{{ route('dashboard.view') }}" class="btn btn-info btn">view dashboard</a>
             </div>
             @if(count($st) > 0)
            
                <table class="table table-striped">
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Province</th>
                      <th>City / Town</th>
                      <th>Street Name</th>
                      <th>University/College</th>
                      <th>Update Student</th>
                    </tr>
                  @foreach ($st as  $s)
                      <tr>
                       <td>{{ $s->fname }}</td>
                       <td>{{ $s->lname }}</td>
                       <td>{{ $s->province }}</td>
                       <td>{{ $s->city }}</td>
                       <td>{{ $s->street_name }}</td>
                       <td>{{ $s->unversity }}</td>
                      <td><a href="/student_teacher/{{ $s->id }}/edit"><i class="fas fa-pen icon-1"></i></a></td>
                      </tr> 
                  @endforeach
                </table>
             @else
                <h1>No Student Teacher Found</h1>
             @endif
          </div>
       </div>
    </div>
  </div>
@endsection