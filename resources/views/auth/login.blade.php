@extends('welcome')
@section('content')
 <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 col-xs-12">
          <div class="login">
            <h3>please enter your login details</h3>
            <p>Are you a member?</p>
            <form action="{{route('login')}}" method="POST">
                {{  csrf_field() }}
              <fieldset>
                <fieldset class="form-group input">
                 <input type="text" name="email"  class="form-control form" placeholder="enter email">
                </fieldset>
                <fieldset class="form-group input">
                 <input type="password" name="password"  class="form-control" placeholder="enter password">
                </fieldset>
                <button style=" background-color: #08b608;border:1px solid #08b608" class="btn btn-primary pull-xs-right" type="submit">
                 sign in
                </button>
              </fieldset>
            </form>
          </div>
      </div>
    </div>
 </div>
@endsection