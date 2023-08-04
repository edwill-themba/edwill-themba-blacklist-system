<!-- checks for laravel error messages  -->
@if(count($errors) > 0)
  @foreach($errors->all() as $error)
   <div class="row mt-3">
       <div class="col-md-6 offset-md-3 col-xs-12">
         <div class="alert alert-danger text-center">
             {{ $error }} 
          </div>
       </div>
   </div>
 @endforeach
@endif
<!-- session success messages -->
@if(session()->has('success_message'))
 <div class="row mt-3">
   <div class="col-md-6 offset-md-3 col-xs-12">
     <div class="alert alert-success text-center">
      {{ session()->get('success_message') }}
     </div>
   </div>
  </div> 
@endif
<!-- session error messages -->
@if(session()->has('error_message'))
 <div class="row mt-3">
  <div class="col-md-6 offset-md-3 col-xs-12">
    <div class="alert alert-danger text-center">
      {{ session()->get('error_message') }}
    </div>
  </div>
 </div>  
@endif