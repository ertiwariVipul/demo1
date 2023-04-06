<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ModelEventCategory extends Model
{
    use HasFactory;
    protected $table = 'model_event_categories';
    protected $fillable = [
        'userId',
        'eventId',
        'categoryId',
        'status',
    ];
    protected $casts = [
        'id' => 'string',
    ];
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category','categoryId','id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User','userId','id')->with('model_images','model_details');
    }
    
    public function model_details()
    {
        return $this->belongsTo('App\Models\ModelDetails','userId','userId');
    }
}
