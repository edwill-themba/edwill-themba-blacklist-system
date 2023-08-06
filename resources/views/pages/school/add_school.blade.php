@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-6 offset-md-3 col-xs-12">
        <div class="add-school">
            <h3>add new school</h3>
            <form action="{{ route('school.store') }}" method="POST">
                {{  csrf_field() }}
              <fieldset>
                <fieldset class="form-group input">
                 <input type="text" name="name"  class="form-control form" placeholder="enter school name">
                </fieldset>
                <fieldset class="form-group input">
                  <input type="text" name="location"  class="form-control form" placeholder="enter school location">
                </fieldset>
                </fieldset>
                  <button style=" background-color: #08b608;border:1px solid #08b608" class="btn btn-primary pull-xs-right" type="submit">
                     save school
                  </button>
               </fieldset>
            </form>
        </div>
     </div>
    </div>
</div>
@endsection