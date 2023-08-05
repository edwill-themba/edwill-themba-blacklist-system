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
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Province</th>
                      <th>City / Town</th>
                      <th>Street Name</th>
                      <th>University/College</th>
                      <th>Show Edit</th>
                      <th></th>
                    </tr>
                  @foreach ($student_teacher as  $st)
                      <tr>
                       <td>{{ $st->fname }}</td>
                       <td>{{ $st->lname }}</td>
                       <td>{{ $st->province }}</td>
                       <td>{{ $st->city }}</td>
                       <td>{{ $st->street_name }}</td>
                       <td>{{ $st->unversity }}</td>
                       <td><a href="/student_teacher/{{ $st->id }}"><i class="fas fa-pen icon-1"></i></a></td>
                       <td>
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