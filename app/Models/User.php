<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'modelNo',
        'firstName',
        'middleName',
        'lastName',
        'fullName',
        'email',
        'countryCode',
        'password',
        'country',
        'city',
        'user_role',
        'profile',
        'status',
        'comments',
        'emailVerifiedAt',
        'deviceToken',
        'deviceType',
        'slug',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
        "model_no"=>"string"

    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->incrementing = false;
            $model->id = (string) Str::uuid();
            $model->modelNo = (string) rand();
        });
    }

    public static function user()
    {
        return static::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->join('roles','roles.id','=','model_has_roles.role_id')
            ->where('roles.name', 'user');
    }

    public static function admin()
    {
        return static::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->join('roles','roles.id','=','model_has_roles.role_id')
            ->where('roles.name', 'admin');
    }


    public static function models()
    {
        return static::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->join('roles','roles.id','=','model_has_roles.role_id')
            ->where('roles.name', 'model');
    }


    // public function temp(){
    //     return $this->whereHas('roles', function($q){
    //             $q->where('name', 'model');
    //         });
    // }

    public function model_details()
	{
		return $this->belongsTo('App\Models\ModelDetails', 'id', 'userId')->with('profile_level');
	}

    public function countries()
	{
		return $this->belongsTo('App\Models\Country', 'country', 'id');
	}

    public function profiles()
	{
		return $this->belongsTo('App\Models\ProfileLevel', 'subscriptionPlan', 'id');
	}

    public function model_images()
	{
		return $this->hasOne('App\Models\ModelImage', 'userId', 'id');
	}

    public function model_image()
	{
		return $this->hasMany('App\Models\ModelImage', 'userId', 'id');
	}
}
