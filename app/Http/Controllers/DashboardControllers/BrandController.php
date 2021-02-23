<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        $data['resources'] = Brand::paginate(config('vars.pagination'));
        return view('@dashboard.brand.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        return view('@dashboard.brand.create');
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
            'picture' => 'required',
            'cover' => 'required',
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
            $upload = upload_file('image', $request->file('picture'), 'assets_public/images/brand/picture');
            if ($upload['status'] == true){
                $picture = $upload['filename'];
            }else{
                return back()->with('message',[
                    'type'=> 'danger',
                    'text'=> 'Image ' . $upload['message']
                ]);
            }
        }

        if($request->hasFile('cover')){
            $upload = upload_file('image', $request->file('cover'), 'assets_public/images/brand/cover');
            if ($upload['status'] == true){
                $cover = $upload['filename'];
            }else{
                return back()->with('message',[
                    'type'=> 'danger',
                    'text'=> 'Image ' . $upload['message']
                ]);
            }
        }

        $resource = Brand::create([
            'slug' => Str::slug($name['en'], '_'),
            'name' => json_encode($name),
            'details' => json_encode($details),
            'picture' => (isset($picture))? $picture : '',
            'cover' => (isset($cover))? $cover : '',
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'created_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('brand.index'))->with('message', [
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
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return String
     */
    public function edit(Brand $brand)
    {
        $data['resource'] = $brand;
        return view('@dashboard.brand.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return String
     */
    public function update(Request $request, Brand $brand)
    {
        $data['resource'] = $brand;

        // Return
        if(!$data['resource']){
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! not exists.'
            ]);
        }

        $rules = [
//            'picture' => 'required',
//            'cover' => 'required',
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
            $upload = upload_file('image', $request->file('picture'), 'assets_public/images/brand/picture');
            if ($upload['status'] == true){
                $picture = $upload['filename'];
            }else{
                return back()->with('message',[
                    'type'=> 'danger',
                    'text'=> 'Image ' . $upload['message']
                ]);
            }
        }

        if($request->hasFile('cover')){
            $upload = upload_file('image', $request->file('cover'), 'assets_public/images/brand/cover');
            if ($upload['status'] == true){
                $cover = $upload['filename'];
            }else{
                return back()->with('message',[
                    'type'=> 'danger',
                    'text'=> 'Image ' . $upload['message']
                ]);
            }
        }

        $resource = $data['resource']->update([
            'slug' => Str::slug($name['en'], '_'),
            'name' => json_encode($name),
            'details' => json_encode($details),
            'picture' => (isset($picture))? $picture : $data['resource']->picture,
            'cover' => (isset($cover))? $cover : $data['resource']->cover,
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'updated_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('brand.index'))->with('message', [
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
     * @param  \App\Models\Brand  $brand
     * @return String
     */
    public function destroy(Brand $brand)
    {
        $data['resource'] = $brand;

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
