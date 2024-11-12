<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'logintable';

    protected $fillable = ['LogFirstName', 'LogLastName', 'LogUsername', 'LogPassword', 'LogAddress'];
}
