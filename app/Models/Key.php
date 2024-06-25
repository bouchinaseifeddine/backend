<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Key extends Model
{
    use HasFactory;
    protected $fillable = ['value', 'status', 'profileable_type', 'profileable_id'];

    public function profileable()
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->hasOne(User::class);
    }

}
