<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\ModelImage;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'noOfGirls',
        'date',
        'time',
        'type',
        'description',
        'image',
        'eventStatus',
        'status',
    ];
    public $incrementing = false;
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function eventCategories()
	{
		return $this->hasMany('App\Models\ModelEventCategory', 'eventId', 'id');
	}

}
