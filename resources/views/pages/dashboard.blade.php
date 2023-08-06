@extends('welcome')
@section('content')
   <div class="container">
     <div class="row">
         <div class="col-md-3 col-sm-3 sidebar">
            <h4>Dashboard</h4>
            <h6>Student Teacher Information</h6>
            <ul class="dashboard_menu">
                <li>
                <a href="{{ route('student_teacher.create') }}">Import Student Teacher</a>
                </li>
                <li>
                <a href="{{ route('student_teacher.lists') }}">View Student Teacher</a>
                </li>
            </ul>
            <h6>School Information</h6>
            <ul class="dashboard_menu">
                <li>
                  <a href="{{ route('school.create') }}">Add School</a>
                </li>
                <li>
                   <a href="{{ route('school.lists') }}">View All School</a>
                </li>
             </ul>
         </div>
         <div class="col-md-9 col-sm-9 content">
             <div class="search-form">
                 <h4>search for a school or student</h4>
                 <form action="{{ route('search')}}" method="post">
                     {{ csrf_field() }}
                     <div class="form-group">
                            <input type="search" name="name" class="form-control" placeholder="search...">
                     </div>
                     <button type="submit" class="btn btn-warning btn-block">search</button>
                 </form>
             </div>
         </div>
     </div>
   </div>
@endsection