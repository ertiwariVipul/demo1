<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ModelVisa extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'countryName',
        'expiryDate'
    ];

    protected $casts = [
        'id' => 'string',

    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->incrementing = true;
            $model->id = (string) Str::uuid();
        });
    }
}
