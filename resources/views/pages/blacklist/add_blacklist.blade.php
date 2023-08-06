@extends('welcome')
@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-6 offset-md-3 col-xs-12">
          <div class="add-blacklist">
              <h3>black list this student</h3>
           <form action="{{ route('blacklist.store') }}" method="POST" enctype="multipart/form-data">
                {{  csrf_field() }}
                @foreach ($st as $s)
                 <input type="hidden" name="student_id" value="{{ $s->id }}"> 
                @endforeach
               <fieldset>
                <fieldset class="form-group input">
                 <input type="text" name="school_name"  class="form-control form" placeholder="enter school name">
                </fieldset>
                <fieldset class="form-group input">
                 <textarea name="reason" class="form-control" cols="30" rows="5" placeholder="reason for black list..."></textarea>
                </fieldset>
                <fieldset class="form-group input">
                   <label class="ml-2">please upload evidence</label>
                  <input type="file" name="proof"  class="form-control form"  style="border:none">
                 </fieldset>
               </fieldset>
                <button style=" background-color: #08b608;border:1px solid #08b608" class="btn btn-primary pull-xs-right" type="submit">
                  blacklist student
                </button>
            </form>
          </div>
         </div>
     </div>
 </div>
@endsection