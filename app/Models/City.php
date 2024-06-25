<?php

namespace App\Models;

use App\Models\Wilaya;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function wilaya(){
        return $this->belongsTo(Wilaya::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function schools(){
        return $this->hasMany(School::class);
    }
}
