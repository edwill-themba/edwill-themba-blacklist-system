<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\ProcessUpload;
use Illuminate\Support\Facades\Redis;
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
            $data = array_map('str_getcsv', file($file));
            foreach ($data as $record) {
                self::updateOrCreate([
                    'fname' => $record[0]
                ], [
                    'lname' => $record[1],
                    'province' => $record[2],
                    'city' => $record[3],
                    'street_name' => $record[4],
                    'unversity' => $record[5]
                ]);
            }
            unlink($file);
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

}
