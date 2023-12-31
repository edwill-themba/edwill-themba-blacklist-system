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
            
                <table class="table table-striped mt-3">
                    <tr>
                      <th class="table-title">First Name</th>
                      <th class="table-title">Last Name</th>
                      <th class="table-title">Province</th>
                      <th class="table-title">City / Town</th>
                      <th class="table-title">Street Name</th>
                      <th class="table-title">University/College</th>
                      <th class="table-title">Update Student</th>
                      <th class="table-title">BlackList</th>
                      <th class="table-title">View Blacklist</th>
                    </tr>
                  @foreach ($st as  $s)
                      <tr>
                       <td class="table-header">{{ $s->fname }}</td>
                       <td class="table-header">{{ $s->lname }}</td>
                       <td class="table-header">{{ $s->province }}</td>
                       <td class="table-header">{{ $s->city }}</td>
                       <td class="table-header">{{ $s->street_name }}</td>
                       <td class="table-header">{{ $s->unversity }}</td>
                      <td><a href="/student_teacher/{{ $s->id }}/edit"><i class="fas fa-pen icon-1"></i></a></td>
                      <td class="table-header" style="padding-left:40px;">
                          <a href="/blacklist/{{ $s->id }}"><i class="fas fa-times blacklist-icon"></i></a>
                          </td>
                          <td class="table-header" style="padding-left:40px;">
                             <a href="/student_blacklist/{{ $s->id }}"><i class="fas fa-times blacklist"></i></a>
                        </td>
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