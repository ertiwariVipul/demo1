<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ModelDetails extends Model
{
    use HasFactory;

    protected $table = 'model_details';
    protected $fillable = [
        'userId',
        'profileLevelId',
        'height',
        'waist',
        'weight',
        'hips',
        'hair',
        'bust',
        'eyecolor',
        'comments',
        'isAccepted',
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

    public function profile_level()
	{
		return $this->hasOne('App\Models\ProfileLevel', 'id', 'profileLevelId');
	}
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','userId','id')->with('model_images');
    }
}
