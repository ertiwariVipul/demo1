<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class ModelLanguage extends Model
{
    use HasFactory;


    protected $table = 'model_languages';
    protected $fillable = [
        'userId',
        'languageId',
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

    public function model_language()
	{		
        return $this->hasMany('App\Models\Language', 'id', 'languageId');
	}
}
