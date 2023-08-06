@extends('welcome')
@section('content')
  <div class="container">
    <div class="row">
       <div class="col-md-12 offset-md-0 col-xs-12">
          <div class="students-lists">
             <h3>Student Black Listed</h3>
             <hr/>
             <div class="student-teacher-info">
                <a href="{{ route('student_teacher.create') }}" class="btn btn-warning btn">add import student</a>
                <a href="{{ route('dashboard.view') }}" class="btn btn-info btn">view dashboard</a>
             </div>
             @if(count($schools) > 0)
                <table class="table table-dark mt-3">
                    <tr>
                      <th class="table-title">First Name</th>
                      <th class="table-title">Last Name</th>
                      <th class="table-title">Reason</th>
                      <th class="table-title">Proof</th>
                      <th class="table-title">School Name</th>
                      <th class="table-title">Date Time</th>
                    </tr>
                  @foreach ($schools as  $st)
                      <tr>
                       <td class="table-header">{{ $st->fname }}</td>
                       <td class="table-header">{{ $st->lname }}</td>
                       <td class="table-header">{{ $st->reason }}</td>
                       <td class="table-header">
                          <a href="/storage/proof/{{ $st->proof }}">{{ $st->proof }}</a>
                       </td>
                       <td class="table-header">{{ $st->school_name }}</td>
                       <td class="table-header">{{ $st->created_at }}</td>
                      </tr> 
                  @endforeach
                </table>
             @else
                <h1>No Student Is Black Listed On This School</h1>
             @endif
          </div>
       </div>
    </div>
  </div>
@endsection