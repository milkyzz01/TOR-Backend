<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'student_table';
    // Specify the primary key column name
    protected $primaryKey = 'studentID';
    protected $fillable = [
        'StudentName',
        'StudentAddress',
        'studentPhone',
        'studentGender',
        'studentGender2',
        'DateOfBirth',
        'email',
        'photo'
    ];
}
