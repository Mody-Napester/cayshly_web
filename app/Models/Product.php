<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','brand_id','category_id','store_id','slug','name','details',
        'picture','code','price','points','lookup_condition_id',
        'discount_type','discount_unit','warranty',
        'video','views','is_active','created_by','updated_by',
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

    /*
     * Scope Active
     * */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
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
     *  Created By Relation
     */
    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     *  Updated By Relation
     */
    public function updated_by_user()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    /**
     *  Brand Relation
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     *  Category Relation
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class , 'product_category')->withTimestamps();
    }

    /**
     *  Specification Relation
     */
    public function specifications()
    {
        return $this->belongsToMany(Specification::class , 'product_specification')->withTimestamps()->withPivot('value');
    }

    /**
     *  Options Relation
     */
    public function options()
    {
        return $this->belongsToMany(Option::class , 'product_option')->withTimestamps();
    }

    /**
     *  Store Relation
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     *  Lookup Condition Relation
     */
    public function condition()
    {
        return $this->belongsTo(Lookup::class, 'lookup_condition_id', 'id');
    }
}
