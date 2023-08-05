@extends('welcome')
@section('content')
   <div class="container">
     <div class="row">
         <div class="col-md-3 col-sm-3 sidebar">
            <h4>Dashboard</h4>
            <ul class="dashboard_menu">
                <li>
                <a href="{{ route('student_teacher.create') }}">Import Student Teacher</a>
                </li>
                <li>
                <a href="{{ route('student_teacher.lists') }}">View Student Teacher</a>
                </li>
            </ul>
         </div>
         <div class="col-md-9 col-sm-9 content">

         </div>
     </div>
   </div>
@endsection