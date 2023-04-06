<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
        'quote',
        'image',
        'slug',
        'ststus',
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


    public function models()
	{
		return $this->belongsTo('App\Models\User', 'profile', 'id');
	}
   

}
