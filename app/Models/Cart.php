<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','product_id','quantity',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        '',
    ];

    /*
     * Change Route Key Name
     * */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) \Webpatser\Uuid\Uuid::generate(config('vars.uuid_version'));
        });
    }

    /**
     *  Get One Resource By
     */
    public static function getOneBy($field, $value)
    {
        return self::where($field, $value)->first();
    }

    /**
     *  Get All Resource By
     */
    public static function getAllBy($field, $value)
    {
        return self::where($field, $value)->get();
    }

    /**
     *  Products Relation
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
