<?php

namespace App\Models;

use App\Models\City;
use App\Models\Stage;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name','max_students' , 'city_id' , 'stage_id'];

    public static function boot(){
        parent::boot();
        static::created(function ($model) {
            $model->key()->create([
                "value" => Str::random(10),
            ]);
        });
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function stage(){
        return $this->belongsTo(Stage::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function key(){
        return $this->morphOne(Key::class , 'profileable');
    }

}
