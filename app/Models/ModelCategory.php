<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ModelCategory extends Model
{
    use HasFactory;
    protected $table = 'model_category';
    protected $fillable = [
        'userId',
        'categoryId',
        'status',
    ];
    protected $casts = [
        'id' => 'string',

    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','categoryId','id')->with('eventCategory');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','userId','id')->with('model_images');
    }
   
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->incrementing = true;
            $model->id = (string) Str::uuid();
        });
    }

    public function model_service()
	{		
        return $this->hasMany('App\Models\Category', 'id', 'categoryId');
	}

   
}
