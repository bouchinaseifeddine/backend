<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['name' ,'last' , 'key_id'];

    public static function boot(){
        parent::boot();
        static::created(function ($model) {
            $model->key()->create([]);
        });
    }

    public function key(){
		return $this->morphOne( Key::class , 'profileable' ) ;
	}

}
