@extends('welcome')
@section('content')
  <div class="container">
        <div class="row">
                <div class="col-md-12 offset-md-0 col-xs-12">
                   <div class="students-lists">
                      <h3>View All Schools </h3>
                      <hr/>
                      <div class="student-teacher-info">
                         <a href="{{ route('school.create') }}" class="btn btn-warning btn">add school</a>
                         <a href="{{ route('dashboard.view') }}" class="btn btn-info btn">view dashboard</a>
                      </div>
                      @if(count($schools) > 0)
                       <div class="pagination">
                         {{ $schools->links('pagination::bootstrap-4') }}
                       </div>
                         <table class="table table-striped">
                             <tr>
                               <th>School Name</th>
                               <th>School Location</th>
                               <th>Show Edit</th>
                               <th>Delete School</th>
                               <th>Show blackListed Student </th>
                             </tr>
                           @foreach ($schools as  $school)
                               <tr>
                                <td>{{ $school->name }}</td>
                                <td>{{ $school->location }}</td>
                                <td><a href="/school/{{ $school->id }}"><i class="fas fa-pen icon-1"></i></a></td>
                                <td style="padding-left:40px;">
                                  <form action="/school/{{ $school->id }}" method="post">
                                   {{  csrf_field() }}
                                   <input type="hidden" name="_method" value="delete">
                                   <button><i class="fas fa-trash"></i></button>
                                 </form>
                                </td>
                                <td style="padding-left:50px;">
                                   <a href="/school_blacklist/{{ $school->name }}"><i class="fas fa-times blacklist"></i></a>
                                 </td>
                               </tr> 
                           @endforeach
                         </table>
                      @else
                         <h1>No Schools Found</h1>
                      @endif
                   </div>
                </div>
             </div>
  </div>
@endsection