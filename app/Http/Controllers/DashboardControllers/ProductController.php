<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Events\ImportProductEvent;
use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Lookup;
use App\Models\Option;
use App\Models\Specification;
use App\Models\Store;
use App\Models\User;
use DB;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Import Excel Sheet For Products.
     */
    public function import(Request $request){
        // Check Authority
        if (!check_authority('index.product')){
            return redirect('/');
        }

        if ($request->hasFile('file')) {

            // validate incoming request
            $request->validate([
                'file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
            ]);

            if ($request->file('file')->isValid()) {
                // Upload files
                $extention = strtolower($request->file('file')->getClientOriginalExtension());
                $validExtentions = ['xls','xlsx','csv'];

                if (in_array($extention, $validExtentions)) {

                    $filename = 'products-' . time() . '.' .$extention;
                    $destinationPath = get_path('assets_dashboard/files/products');
                    $upload = $request->file('file')->move($destinationPath, $filename);

                    $brand_id = ($brand = Brand::getOneBy('uuid', $request->brand_id))? $brand->id : 0;
                    $store_id = ($store = Store::getOneBy('uuid', $request->store_id))? $store->id : 0;
                    $lookup_condition_id = ($condition = Lookup::getOneBy('uuid', $request->lookup_condition_id))? $condition->id : 0;

                    $data['filepath'] = $destinationPath . '/' . $filename;
                    $data['brand_id'] = $brand_id;
                    $data['store_id'] = $store_id;
                    $data['lookup_condition_id'] = $lookup_condition_id;
                    $data['category'] = ($request->has('category'))? $request->input('category') : [] ;

                    if ($upload) {
                        // File Uploaded
                        $message = 'Imported Successfully With No Duplication';

                        event(new ImportProductEvent($data));

                        return redirect(route('product.index'))->with('message', [
                            'type' => 'success',
                            'text' => $message
                        ]);
                    }else{
                        // Error Uploading
                        $message = 'Error Uploading';
                    }

                }else{
                    // File not valid
                    $message = 'File not valid';
                }
            }
        }else{
            $message = 'Please select an excel file';
        }

        return back()->with('message', [
            'type' => 'error',
            'text' => $message
        ]);
    }

    /**
     * Export Excel Sheet For Products.
     */
    public function export(){
        // Check Authority
        if (!check_authority('index.product')){
            return redirect('/');
        }

        $filename = 'products-' . date('d-m-Y') . '-' . time() . '.xlsx';
        return Excel::download(new ProductExport(), $filename);
    }

    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(Request $request){
        // Check Authority
        if (!check_authority('index.product')){
            return redirect('/');
        }

//        $rrr = json_encode($request->name);
//        dd(explode('"', $rrr));

        // $r = utf8_encode($request->name);
        // dd(utf8_decode($r));

        $data['brands'] = Brand::all();
        $data['categories'] = Category::where('parent_id', '<>' ,0)->get();
        $data['stores'] = Store::all();
        $data['conditions'] = lookups('condition');

        if($request->has('brand') || $request->has('date') || $request->has('by') || $request->has('status')){
            $data['resources'] = new Product;

            if($request->has('brand') && !is_null($request->brand) && $request->brand != 'Choose'){
                $data['resources'] = $data['resources']->where('brand_id', $request->brand);
            }
            if($request->has('store') && !is_null($request->store) && $request->store != 'Choose'){
                $data['resources'] = $data['resources']->where('store_id', $request->store);
            }
//            if($request->has('category') && !is_null($request->category) && $request->category != 'Choose'){
//                $data['resources'] = $data['resources']->where('category_id', $request->category);
//            }
            if($request->has('condition') && !is_null($request->condition) && $request->condition != 'Choose'){
                $data['resources'] = $data['resources']->where('lookup_condition_id', $request->condition);
            }
            if($request->has('name') && !is_null($request->name)){

//                $data['resources'] = $data['resources']->where(function ($r) use ($request){
//                    $encoded_name = utf8_encode($request->name);
//                    $r->where('name', 'like', "%".$request->name."%");
//                    $r->orWhere('name', 'like', "%".$encoded_name."%");
//                });

                $data['resources'] = $data['resources']->where('name', 'like', "%".$request->name."%");
            }
            if($request->has('code') && !is_null($request->code)){
                $data['resources'] = $data['resources']->where('code', $request->code);
            }
            if($request->has('price') && !is_null($request->price)){
                $data['resources'] = $data['resources']->where('price', $request->price);
            }
            if($request->has('is_active') && !is_null($request->is_active) && $request->is_active != 'Choose'){
                $data['resources'] = $data['resources']->where('is_active', $request->is_active);
            }

            $data['resources'] = $data['resources']->paginate(50);

        }else{
            $data['resources'] = Product::paginate(config('vars.pagination'));
        }

        return view('@dashboard.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        // Check Authority
        if (!check_authority('create.product')){
            return redirect('/');
        }

        $data['brands'] = Brand::all();
        $data['categories'] = Category::where('parent_id', '<>' ,0)->get();
        $data['stores'] = Store::all();
        $data['conditions'] = lookups('condition');
        $data['options'] = Option::where('is_active', 1)->where('parent_id', 0)->get();
        $data['has_data'] = false;
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
        // Check Authority
        if (!check_authority('store.product')){
            return redirect('/');
        }

        // Validation
        $rules = [
            'brand_id' => 'required',
            'category' => 'required',
            'store_id' => 'required',
            'price' => 'required',
            'picture' => 'required',
            'is_active' => 'required',
        ];

        foreach (langs("short_name") as $lang) {
            $rules['name_' . $lang] = 'required';
            $rules['details_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $name = [];
        $details = [];

        foreach (langs("short_name") as $lang) {
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
        $store_id = ($store = Store::getOneBy('uuid', $request->store_id))? $store->id : 0;
        $lookup_condition_id = ($condition = Lookup::getOneBy('uuid', $request->lookup_condition_id))? $condition->id : 0;

        $slug = Str::slug($name['en'], '_');
        if(Product::getOneBy('slug', $slug)){
            $slug = $slug.time();
        }

        $points = pointify($request->price);

        $resource = Product::create([
            'brand_id' => $brand_id,
            'store_id' => $store_id,
            'slug' => $slug,
            'name' => json_encode($name),
            'details' => json_encode($details),
            'picture' => (isset($picture))? $picture : '',
            'price' => $request->price,
            'code' => ($request->has('code'))? $request->code : '',
            'points' => $points,
            'discount_type' => ($request->has('discount_type') && in_array($request->discount_type, [1,2,3]))? $request->discount_type : 1,
            'discount_unit' => ($request->has('discount_type') && in_array($request->discount_type, [2,3]))? $request->discount_unit : null,
            'lookup_condition_id' => $lookup_condition_id,
            'warranty' => ($request->has('warranty'))? $request->warranty : '',
            'video' => ($request->has('video'))? $request->video : '',
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'created_by' => auth()->user()->id,
        ]);

        // Relations
        if ($request->has('category')){
            $resource->categories()->detach();

            foreach ($request->input('category') as $category){
                $resource->categories()->attach(Category::getOneBy('uuid', $category)->id);
            }
        }
        if ($request->has('specification')){
            $resource->specifications()->detach();

            foreach ($request->input('specification') as $key => $specification){
                if($specification != ''){
                    $specification_data = Specification::getOneBy('uuid', $key);
                    $resource->specifications()->attach($specification_data->id,
                        [
                            'value' => $specification
                        ]);
                }
            }
        }
        if ($request->has('product_options')){
            $resource->options()->detach();

            foreach ($request->input('product_options') as $key => $option){
                if($option != ''){
                    $option_data = Option::getOneBy('uuid', $option);
                    $resource->options()->attach($option_data->id);
                }
            }
        }

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
        // Check Authority
        if (!check_authority('edit.product')){
            return redirect('/');
        }

        $data['resource'] = $product;
        $data['brands'] = Brand::all();
        $data['categories'] = Category::where('parent_id', '<>' ,0)->get();
        $data['stores'] = Store::all();
        $data['conditions'] = lookups('condition');
        $data['options'] = Option::where('is_active', 1)->where('parent_id', 0)->get();
        $data['product_options'] = DB::table('options')->join('product_option', 'options.id', '=','product_option.option_id')
            ->where('product_id', $data['resource']->id)
            ->groupBy('parent_id')
            ->select('options.parent_id')
            ->pluck('parent_id')
            ->toArray();
        $data['has_data'] = false;
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
//        dd($request->all());
//        $d = ($request->has('discount_type') && in_array($request->discount_type, [2,3]))? $request->discount_unit : '';
//        dd($d);
        // Check Authority
        if (!check_authority('update.product')){
            return redirect('/');
        }

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
            'category' => 'required',
            'store_id' => 'required',
            'price' => 'required',
//            'picture' => 'required',
            'is_active' => 'required',
        ];

        foreach (langs("short_name") as $lang) {
            $rules['name_' . $lang] = 'required';
            $rules['details_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $name = [];
        $details = [];

        foreach (langs("short_name") as $lang) {
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
        }else{
            $picture = $request->picture_name;
        }

        $brand_id = ($brand = Brand::getOneBy('uuid', $request->brand_id))? $brand->id : 0;
        $store_id = ($store = Store::getOneBy('uuid', $request->store_id))? $store->id : 0;
        $lookup_condition_id = ($condition = Lookup::getOneBy('uuid', $request->lookup_condition_id))? $condition->id : 0;

        $slug = Str::slug($name['en'], '_');
//        if($slug == $data['resource']->slug){
//
//        }
        if(Product::where('slug', $slug)->where('id', '<>', $data['resource']->id)->first()){
            $slug = $slug.time();
        }

        $points = pointify($request->price);

        $resource = $data['resource']->update([
            'brand_id' => $brand_id,
            'store_id' => $store_id,
            'slug' => $slug,
            'name' => json_encode($name),
            'details' => json_encode($details),
            'picture' => (isset($picture))? $picture : $data['resource']->picture,
            'price' => $request->price,
            'code' => ($request->has('code'))? $request->code : $data['resource']->code,
            'points' => $points,
            'discount_type' => ($request->has('discount_type') && in_array($request->discount_type, [1,2,3]))? $request->discount_type : 1,
            'discount_unit' => ($request->has('discount_type') && in_array($request->discount_type, [2,3]))? $request->discount_unit : null,
            'lookup_condition_id' => $lookup_condition_id,
            'warranty' => ($request->has('warranty'))? $request->warranty : '-',
            'video' => ($request->has('video'))? $request->video : '-',
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'updated_by' => auth()->user()->id,
        ]);

        // Relations
        if ($request->has('category')){
            $data['resource']->categories()->detach();

            foreach ($request->input('category') as $category){
                $data['resource']->categories()->attach(Category::getOneBy('uuid', $category)->id);
            }
        }
        if ($request->has('specification')){
            $data['resource']->specifications()->detach();

            foreach ($request->input('specification') as $key => $specification){
                if($specification != ''){
                    $specification_data = Specification::getOneBy('uuid', $key);
                    $data['resource']->specifications()->attach($specification_data->id,
                        [
                            'value' => $specification
                        ]);
                }
            }
        }
        if ($request->has('product_options')){
            $data['resource']->options()->detach();

            foreach ($request->input('product_options') as $key => $option){
                if($option != ''){
                    $option_data = Option::getOneBy('uuid', $option);
                    $data['resource']->options()->attach($option_data->id);
                }
            }
        }

        // Return
        if($resource){
            return back()->with('message', [
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
        // Check Authority
        if (!check_authority('delete.product')){
            return redirect('/');
        }

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
