<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\BlackList;
use DB;
use function Spatie\Ignition\Config\retrievePath;

class BlackListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function student_black_list($id)
    {
        $students = DB::table('black_lists')
            ->where('student_id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.blacklist.student_blacklist')->with('students', $students);
    }

    /**
     * Display a listing of the resource.
     */
    public function school_black_list($name)
    {
        $schools = DB::table('black_lists')
            ->join('student_teachers', 'black_lists.student_id', '=', 'student_teachers.id')
            ->select('student_teachers.fname', 'student_teachers.lname', 'black_lists.*')
            ->where('black_lists.school_name', '=', $name)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.blacklist.school_blacklist')->with('schools', $schools);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $st = DB::table('student_teachers')
            ->where('id', '=', $id)
            ->get();
        return view('pages.blacklist.add_blacklist')->with('st', $st);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'school_name' => 'required',
            'reason' => 'required|min:3|max:255',
            'proof' => 'required|max:1999'
        ]);
        // handle proof upload
        if ($request->hasFile('proof')) {
            // get the full file name
            $filename = $request->file('proof')->getClientOriginalName();
            // file name without extension
            $filenameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);
            // get the extension
            $extension = $request->file('proof')->getClientOriginalExtension();
            // file to be uploaded
            $fileTobeUploaded = $filename . '_' . time() . '.' . $extension;
            //  store file
            $path = $request->file('proof')->storeAs('/public/proof/', $fileTobeUploaded);
        }

        $school_name = $request->input('school_name');
        $reason = $request->input('reason');
        $student_id = $request->input('student_id');
        $created_at = now();
        $updated_at = now();

        $school = DB::table('schools')
            ->where('name', '=', $school_name)
            ->first();

        if (empty($school)) {
            return redirect('/student_teachers')->with('error_message', 'the school name does not exists');
        }

        \DB::table('black_lists')->insert([
            'reason' => $reason,
            'school_name' => $school_name,
            'proof' => $fileTobeUploaded,
            'student_id' => $student_id,
            'school_id' => $school->id,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ]);

        return \Redirect::route('student.blacklist', $student_id)
            ->with('success_message', 'student teacher is blacklisted successfully');

    }


}
