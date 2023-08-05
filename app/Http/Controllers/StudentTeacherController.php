<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentTeacher;
use function Illuminate\Support\implode;
use DB;

class StudentTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student_teacher = DB::table('student_teachers')->paginate(50);
        return view('pages.student_teacher')->with('student_teacher', $student_teacher);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.add_import');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // get the add choice from user input
        $add_choice = $request->input('add_choice');
        // check if add choice is a csv
        if ($add_choice == 'csv') {
            $this->validate($request, [
                'file_to_upload' => 'required|mimes:csv,txt'
            ]);
            // get the file content
            $file_content = file($request->file('file_to_upload')->getRealPath());
            // remove the headings of the file
            $data = array_splice($file_content, 1);
            // split csv file if is bigger
            $file_split = array_chunk($data, 500);

            foreach ($file_split as $key => $file_data) {
                $file_name = resource_path('loading_files/' . time() . $key . '.csv');
                file_put_contents($file_name, $file_data);
            }
            $student_teacher = (new StudentTeacher())->save_records();
            return redirect('/dashboard')->with('success_message', 'file(s) were uploaded scuccessfully view student teacher');
        } else {
            $this->validate($request, [
                'lname' => 'required|min:3|max:191',
                'fname' => 'required|min:3|max:191',
                'province' => 'required|min:3|max:191',
                'city' => 'required|min:3|max:191',
                'street_name' => 'required|min:3|max:191',
                'city' => 'required|min:3|max:191',
                'unversity' => 'required|min:3|max:191',
            ]);
            // get data from user inputs
            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $province = $request->input('province');
            $city = $request->input('city');
            $street_name = $request->input('street_name');
            $unversity = $request->input('unversity');
           
            // check if student exists
            $is_found = (new StudentTeacher())->is_student_found($fname);

            if (!empty($is_found)) {
                return redirect('/student_teacher')->with('error_message', 'the student teacher exists');
            }
            // insert data to the student table
            \DB::table('student_teachers')->insert([
                'fname' => $fname,
                'lname' => $lname,
                'province' => $province,
                'city' => $city,
                'street_name' => $street_name,
                'unversity' => $unversity
            ]);
            return redirect('/dashboard')->with('success_message', 'student teacher data was saved successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $st = DB::table('student_teachers')
            ->where('id', '=', $id)
            ->get();
        return view('pages.show_student')->with('st', $st);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $st = DB::table('student_teachers')
            ->where('id', '=', $id)
            ->get();
        return view('pages.edit_student')->with('st', $st);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'lname' => 'required|min:3|max:191',
            'fname' => 'required|min:3|max:191',
            'province' => 'required|min:3|max:191',
            'city' => 'required|min:3|max:191',
            'street_name' => 'required|min:3|max:191',
            'city' => 'required|min:3|max:191',
            'unversity' => 'required|min:3|max:191',
        ]);
        // get data from user inputs
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $province = $request->input('province');
        $city = $request->input('city');
        $street_name = $request->input('street_name');
        $unversity = $request->input('unversity');

        \DB::table('student_teachers')
            ->where('id', '=', $id)
            ->update([
                'fname' => $fname,
                'lname' => $lname,
                'province' => $province,
                'city' => $city,
                'street_name' => $street_name,
                'unversity' => $unversity
            ]);
        return redirect('/student_teachers')->with('success_message', 'data was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        \DB::table('student_teachers')->where('id', '=', $id)->delete();
        return redirect('/student_teachers')->with('success_message', 'student was successfully deleted');
    }
}
