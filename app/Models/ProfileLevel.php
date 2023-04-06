<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'status',
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
