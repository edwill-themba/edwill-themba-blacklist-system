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
             @if(count($student_teacher) > 0)
              <div class="pagination">
                {{ $student_teacher->links('pagination::bootstrap-4') }}
              </div>
                <table class="table table-striped">
                    <tr>
                      <th class="table-title">First Name</th>
                      <th class="table-title">Last Name</th>
                      <th class="table-title">Province</th>
                      <th class="table-title">City / Town</th>
                      <th class="table-title">Street Name</th>
                      <th class="table-title">University/College</th>
                      <th class="table-title">BlackList</th>
                      <th class="table-title">View BlackList</th>
                      <th class="table-title">Show Edit</th>
                      <th class="table-title">Delete</th>
                    </tr>
                  @foreach ($student_teacher as  $st)
                      <tr>
                       <td class="table-header">{{ $st->fname }}</td>
                       <td class="table-header">{{ $st->lname }}</td>
                       <td class="table-header">{{ $st->province }}</td>
                       <td class="table-header">{{ $st->city }}</td>
                       <td class="table-header">{{ $st->street_name }}</td>
                       <td class="table-header">{{ $st->unversity }}</td>
                       <td class="table-header" style="padding-left:40px;">
                       <a href="/blacklist/{{ $st->id }}"><i class="fas fa-times blacklist-icon"></i></a>
                       </td>
                       <td class="table-header" style="padding-left:40px;">
                          <a href="/student_blacklist/{{ $st->id }}"><i class="fas fa-times blacklist"></i></a>
                       </td>
                       <td class="table-header"><a href="/student_teacher/{{ $st->id }}"><i class="fas fa-pen icon-1"></i></a></td>
                       <td style="padding-left:30px;">
                         <form action="/student_teacher/{{ $st->id }}" method="post">
                          {{  csrf_field() }}
                          <input type="hidden" name="_method" value="delete">
                          <button><i class="fas fa-trash"></i></button>
                        </form>
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