@extends('welcome')
@section('content')
  <div class="container">
   <div class="row">
     <div class="col-md-6 offset-md-3 col-xs-12"> 
        <div class="student-teacher-info edit-info">
            <a href="{{ route('student_teacher.create') }}" class="btn btn-warning btn">add import student</a>
            <a href="{{ route('dashboard.view') }}" class="btn btn-info btn">view dashboard</a>
         </div>
       @foreach ($st as $s)
        <form action="/student_teacher/{{ $s->id }}" method="POST">
          {{  csrf_field() }}
          <input type="hidden" name="_method" value="patch">
        <fieldset>
          <h5 class="edit-heading">edit student teacher details</h5>
          <fieldset class="form-group input">
          <input type="text" name="fname"  class="form-control form" value="{{ $s->fname }}">
          </fieldset>
          <fieldset class="form-group input">
            <input type="text" name="lname"  class="form-control form" value="{{ $s->lname }}">
          </fieldset>
          <fieldset class="form-group input">
           <select name="province" class="form-control">
               <option value="">please select your residing province</option>
               <option value="Limpopo">Limpopo</option>
               <option value="Mpumalanga">Mpumalanga</option>
               <option value="Gauteng">Gauteng</option>
               <option value="Free State">Free State</option>
               <option value="North West">North West</option>
               <option value="Northern Cape">Northern Cape</option>
               <option value="Western Cape">Western Cape</option>
               <option value="Eastern Cape">Eastern Cape</option>
               <option value="KwaZulu Natal">KwaZulu Natal</option>
           </select>
           </fieldset>
           <fieldset class="form-group input">
            <input type="text" name="city"  class="form-control form" value="{{ $s->city }}">
           </fieldset>
           <fieldset class="form-group input">
            <input type="text" name="street_name"  class="form-control form" value="{{ $s->street_name }}">
           </fieldset>
           <fieldset class="form-group input">
           <input type="text" name="unversity"  class="form-control form" value="{{ $s->unversity }}">
           </fieldset>
        </fieldset>
          <button style=" background-color: #08b608;border:1px solid #08b608" class="btn btn-primary pull-xs-right" type="submit">
            update
          </button>
        </form>
       @endforeach
     </div>
   </div>
  </div>
@endsection