@extends('welcome')
@section('content')
  <div class="container">
   <div class="row">
     <div class="col-md-6 offset-md-3 col-xs-12"> 
        <div class="student-teacher-info edit-info">
            <a href="{{ route('school.create') }}" class="btn btn-warning btn">add school</a>
            <a href="{{ route('dashboard.view') }}" class="btn btn-info btn">view dashboard</a>
         </div>
       @foreach ($st as $s)
        <form action="/school/{{ $s->id }}" method="POST">
          {{  csrf_field() }}
          <input type="hidden" name="_method" value="patch">
        <fieldset>
          <h5 class="edit-heading">edit student teacher details</h5>
          <fieldset class="form-group input">
          <input type="text" name="name"  class="form-control form" value="{{ $s->name }}">
          </fieldset>
          <fieldset class="form-group input">
            <input type="text" name="location"  class="form-control form" value="{{ $s->location }}">
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