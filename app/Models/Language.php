<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;
    protected $casts = [
        'id' => 'string',

    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->incrementing = false;
            $model->id = (string) Str::uuid();
        });
    }

   
}
