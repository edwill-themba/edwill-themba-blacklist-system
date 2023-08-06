<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\ProcessUpload;
use Illuminate\Support\Facades\Redis;
use App\Models\BlackList;
use DB;

class StudentTeacher extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'province',
        'city',
        'street_name',
        'unversity'
    ];

    /**
     * Saves imported data to database
     * 
     */
    public function save_records()
    {
        // get all files with .csv
        $directory_path = resource_path('loading_files/*.csv');
        // get all the file saved
        $files = glob($directory_path);
        foreach ($files as $file) {
            ProcessUpload::dispatch($file);
        }
    }

    /**
     * Checks if student exisis
     * 
     * @return boolean
     */
    public function is_student_found($name)
    {
        $student = DB::table('student_teachers')
            ->where('fname', '=', $name)
            ->get()
            ->first();

        return $student;
    }


    /**
     * has many relationship with blacklist
     */
    public function blacklist()
    {
        return $this->hasMany('App\Models\BlackList');
    }

}
