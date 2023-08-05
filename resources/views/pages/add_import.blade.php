@extends('welcome')
@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-6 offset-md-3 col-xs-12">
               <div class="add-student-teacher">
                   <h3>Add New Student Teacher</h3>
                   <p>
                      <span>import csv</span><input type="radio" name="add_student" class="radio-one" value="csv"> or
                      <span>add student teacher manually</span><input type="radio" name="add_student" class="radio-two" value="manual">
                   </p>
                    <div class="import-csv">
                       <div class="csv">
                       <form action="{{ route('student_teacher.store') }}" method="post" enctype="multipart/form-data">
                               {{ csrf_field() }}
                               <input type="hidden" name="add_choice"  value="csv">
                               <div class="form-group">
                                  <label class="file_upload">please select a file to upload</label>
                                  <input type="file" name="file_to_upload" class="form-control" style="border:none">
                               </div>
                               <button type="submit" style="background-color: #08b608;border:1px solid #08b608;color:#fff;" class="btn btn-default btn-block">submit</button>
                           </form>
                       </div>
                    </div>
                    <div class="add-manually">
                      <div class="new-student">
                      <form action="{{ route('student_teacher.store') }}" method="POST">
                            {{  csrf_field() }}
                          <fieldset>
                            <fieldset class="form-group input">
                             <input type="text" name="fname"  class="form-control form" placeholder="enter first name">
                            </fieldset>
                            <fieldset class="form-group input">
                              <input type="text" name="lname"  class="form-control form" placeholder="enter last name">
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
                              <input type="text" name="city"  class="form-control form" placeholder="enter city">
                             </fieldset>
                             <fieldset class="form-group input">
                              <input type="text" name="street_name"  class="form-control form" placeholder="enter street name">
                             </fieldset>
                             <fieldset class="form-group input">
                             <input type="text" name="unversity"  class="form-control form" placeholder="university">
                             </fieldset>
                          </fieldset>
                            <button style=" background-color: #08b608;border:1px solid #08b608" class="btn btn-primary pull-xs-right" type="submit">
                              save student
                            </button>
                        </form>
                      </div>
                    </div>
               </div>
           </div>
       </div>
   </div>
@endsection