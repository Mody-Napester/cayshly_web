<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    /**
     *  Cart Details
     */
    public static function details()
    {
//        dd(session('carts'));
        if(auth()->check()){
            $products = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', auth()->user()->id);

            $data['cart_products'] = $products->select('products.*', 'quantity')->get();
            $data['cart_product_count'] = Cart::getAllBy('user_id', auth()->user()->id)->count();
            $data['cart_price_sum'] = 0;
            foreach ($data['cart_products'] as $product){
                $data['cart_price_sum'] += ($product->quantity * getProductAfterDiscount($product)['price']);
            }
        }else{
            if(session()->has('carts')){
                $data['cart_products'] = [];
                $data['cart_price_sum'] = 0;
                foreach (session('carts') as $product_uuid => $product_quantity){
                    $product = Product::getOneBy('uuid', $product_uuid);
                    $product->quantity = $product_quantity[0];
                    $data['cart_products'][] = $product;
                    $single_price = intval(getProductAfterDiscount($product)['price']) * intval($product_quantity[0]);
                    $data['cart_price_sum'] += $single_price;
                }
                $data['cart_product_count'] = count(session('carts'));

            }else{
                $data['cart_products'] = [];
                $data['cart_price_sum'] = 0;
                $data['cart_product_count'] = 0;
            }
        }

        return $data;
    }
}
