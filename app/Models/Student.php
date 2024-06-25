<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'last', 'dateOfBirth', 'gender', 'school_id', 'year_id', 'city_id'];

    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $model->key()->create([
                'value' => Str::random(10),
            ]);
        });
    }

    public function key()
    {
        return $this->morphOne(Key::class, 'profileable');
    }

    public function feature()
    {
        return $this->hasOne(Feature::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
