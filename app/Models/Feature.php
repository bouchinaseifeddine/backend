<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = ['tall','weight','veiled','full_veiled'];

    public function student(){
        return $this->belongsTo(Student::class);
    }

}
