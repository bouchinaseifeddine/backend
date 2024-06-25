<?php

namespace App\Models;

use App\Models\Stage;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function stage(){
        return $this->belongsTo(Stage::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }
}
