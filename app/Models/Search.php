<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Search extends Model
{
    use HasFactory;

    /**
     * searches school
     */
    public function search_school($name)
    {
        $school = DB::table('schools')
            ->where('name', 'like', '%' . $name . '%')
            ->get()
            ->first();

        return $school;
    }

    /**
     * searches student teacher
     */
    public function search_student($name)
    {
        $student = DB::table('student_teachers')
            ->where('fname', 'like', '%' . $name . '%')
            ->get()
            ->first();

        return $student;
    }
}
