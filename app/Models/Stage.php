<?php

namespace App\Models;

use App\Models\Year;
use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stage extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function schools(){
        return $this->hasMany(School::class);
    }

    public function years(){
        return $this->hasMany(Year::class);
    }
}
