<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Support\Str;


class Role extends SpatieRole
{
    protected $primaryKey = 'id';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string'
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
