@extends('welcome')
@section('content')
   <div class="container">
     <div class="students-lists">
        <h3>Student Teacher Black List</h3>
        <hr/>
        <div class="student-teacher-info">
           <a href="{{ route('student_teacher.create') }}" class="btn btn-warning btn">add import student</a>
           <a href="{{ route('dashboard.view') }}" class="btn btn-info btn">view dashboard</a>
        </div>
         @if(count($students) > 0)
         <div class="row">
             <div class="col-md-12">
                 <table class="table table-dark mt-2">
                     <th>Proof Of Bad Behaviour</th>
                     <th>School Name</th>
                     <th>Reason Of Black List</th>
                     <th>Date & Time </th>
                   @foreach ($students as  $s)
                      <tr>
                          <td><a href="/storage/proof/{{ $s->proof }}">{{ $s->proof }}</a></td>
                          <td>{{ $s->school_name }}</td>
                          <td>{{ $s->reason }}</td>
                          <td>{{ $s->created_at }}</td>
                      </tr>
                    @endforeach
                </table>
             </div>
           </div> 
           @else
            <h1>This Student Teacher Is Not Blacklisted</h1>
           @endif
       </div>
    </div>
@endsection