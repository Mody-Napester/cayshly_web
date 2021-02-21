<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Lookup;
use App\Models\Store;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        $data['resources'] = Product::paginate(config('vars.pagination'));
        return view('@dashboard.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();
        $data['stores'] = Store::all();
        $data['conditions'] = lookups('condition');
        return view('@dashboard.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return String
     */
    public function store(Request $request)
    {
        // Validation
        $rules = [
            'brand_id' => 'required',
            'category_id' => 'required',
            'store_id' => 'required',
            'price' => 'required',
            'picture' => 'required',
            'is_active' => 'required',
        ];

        foreach (config('vars.langs') as $lang) {
            $rules['name_' . $lang] = 'required';
            $rules['details_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $name = [];
        $details = [];

        foreach (config('vars.langs') as $lang) {
            $name[$lang] = $request->input('name_' . $lang);
            $details[$lang] = $request->input('details_' . $lang);
        }

        if($request->hasFile('picture')){
            $upload = upload_file('image', $request->file('picture'), 'assets_public/images/product/picture');
            if ($upload['status'] == true){
                $picture = $upload['filename'];
            }else{
                return back()->with('message',[
                    'type'=> 'danger',
                    'text'=> 'Image ' . $upload['message']
                ]);
            }
        }

        $brand_id = ($brand = Brand::getOneBy('uuid', $request->brand_id))? $brand->id : 0;
        $category_id = ($category = Category::getOneBy('uuid', $request->category_id))? $category->id : 0;
        $store_id = ($store = Store::getOneBy('uuid', $request->store_id))? $store->id : 0;
        $lookup_condition_id = ($condition = Lookup::getOneBy('uuid', $request->lookup_condition_id))? $condition->id : 0;

        $points = pointify($request->price);

        $resource = Product::create([
            'brand_id' => $brand_id,
            'category_id' => $category_id,
            'store_id' => $store_id,
            'slug' => Str::slug($name['en'], '_'),
            'name' => json_encode($name),
            'details' => json_encode($details),
            'picture' => (isset($picture))? $picture : '',
            'price' => $request->price,
            'points' => $points,
            'lookup_condition_id' => $lookup_condition_id,
            'warranty' => ($request->has('warranty'))? $request->warranty : '-',
            'video' => ($request->has('video'))? $request->video : '-',
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'created_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('product.index'))->with('message', [
                'type' => 'success',
                'text' => 'Created successfully'
            ]);
        }else{
            return back()->with('message', [
                'type' => 'error',
                'text' => 'Error!, Please try again.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return String
     */
    public function edit(Product $product)
    {
        $data['resource'] = $product;
        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();
        $data['stores'] = Store::all();
        $data['conditions'] = lookups('condition');
        return view('@dashboard.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return String
     */
    public function update(Request $request, Product $product)
    {
        $data['resource'] = $product;

        // Return
        if(!$data['resource']){
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! not exists.'
            ]);
        }

        $rules = [
            'brand_id' => 'required',
            'category_id' => 'required',
            'store_id' => 'required',
            'price' => 'required',
//            'picture' => 'required',
            'is_active' => 'required',
        ];

        foreach (config('vars.langs') as $lang) {
            $rules['name_' . $lang] = 'required';
            $rules['details_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $name = [];
        $details = [];

        foreach (config('vars.langs') as $lang) {
            $name[$lang] = $request->input('name_' . $lang);
            $details[$lang] = $request->input('details_' . $lang);
        }

        if($request->hasFile('picture')){
            $upload = upload_file('image', $request->file('picture'), 'assets_public/images/product/picture');
            if ($upload['status'] == true){
                $picture = $upload['filename'];
            }else{
                return back()->with('message',[
                    'type'=> 'danger',
                    'text'=> 'Image ' . $upload['message']
                ]);
            }
        }

        $brand_id = ($brand = Brand::getOneBy('uuid', $request->brand_id))? $brand->id : 0;
        $category_id = ($category = Category::getOneBy('uuid', $request->category_id))? $category->id : 0;
        $store_id = ($store = Store::getOneBy('uuid', $request->store_id))? $store->id : 0;
        $lookup_condition_id = ($condition = Lookup::getOneBy('uuid', $request->lookup_condition_id))? $condition->id : 0;

        $points = pointify($request->price);

        $resource = $data['resource']->update([
            'brand_id' => $brand_id,
            'category_id' => $category_id,
            'store_id' => $store_id,
            'slug' => Str::slug($name['en'], '_'),
            'name' => json_encode($name),
            'details' => json_encode($details),
            'picture' => (isset($picture))? $picture : $data['resource']->picture,
            'price' => $request->price,
            'points' => $points,
            'lookup_condition_id' => $lookup_condition_id,
            'warranty' => ($request->has('warranty'))? $request->warranty : '-',
            'video' => ($request->has('video'))? $request->video : '-',
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'updated_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('product.index'))->with('message', [
                'type' => 'success',
                'text' => 'Updated successfully'
            ]);
        }else{
            return back()->with('message', [
                'type' => 'error',
                'text' => 'Error!, Please try again.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $product
     * @return String
     */
    public function destroy(Product $product)
    {
        $data['resource'] = $product;

        if($data['resource']){
            $data['resource']->delete();

            return redirect()->back()->with('message',[
                'type'=>'success',
                'text'=>'Deleted Successfully.'
            ]);
        }else{
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! not exists.'
            ]);
        }
    }
}
