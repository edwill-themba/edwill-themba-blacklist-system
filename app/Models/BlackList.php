<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School;
use App\Models\StudentTeacher;

class BlackList extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reason',
        'school_name',
        'proof'

    ];

    /**
     * creates a relationship between school and blacklist
     * 
     */
    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }
    /**
     * creates a relationship between student and blacklist
     * 
     */
    public function student()
    {
        return $this->belongsTo(' App\Models\StudentTeacher');
    }
}
