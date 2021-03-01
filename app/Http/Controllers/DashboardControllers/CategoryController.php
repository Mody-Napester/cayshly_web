<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Specification;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        // Check Authority
        if (!check_authority('index.category')){
            return redirect('/');
        }

        $data['resources'] = Category::paginate(config('vars.pagination'));
        return view('@dashboard.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        // Check Authority
        if (!check_authority('create.category')){
            return redirect('/');
        }

        $data['parents'] = Category::getAllBy('parent_id', 0);
        return view('@dashboard.category.create', $data);
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
        if (!check_authority('store.category')){
            return redirect('/');
        }

        // Validation
        $rules = [
            'parent_id' => 'required',
            'icon' => 'required',
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
            $upload = upload_file('image', $request->file('picture'), 'assets_public/images/category/picture');
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
            $upload = upload_file('image', $request->file('cover'), 'assets_public/images/category/cover');
            if ($upload['status'] == true){
                $cover = $upload['filename'];
            }else{
                return back()->with('message',[
                    'type'=> 'danger',
                    'text'=> 'Image ' . $upload['message']
                ]);
            }
        }

        $parent = (Category::getOneBy('uuid', $request->parent_id))? Category::getOneBy('uuid', $request->parent_id)->id : 0;
        $resource = Category::create([
            'parent_id' => $parent,
            'slug' => Str::slug($name['en'], '_'),
            'name' => json_encode($name),
            'details' => json_encode($details),
            'icon' => $request->icon,
            'picture' => (isset($picture))? $picture : '',
            'cover' => (isset($cover))? $cover : '',
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'created_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('category.index'))->with('message', [
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return String
     */
    public function edit(Category $category)
    {
        // Check Authority
        if (!check_authority('edit.category')){
            return redirect('/');
        }

        $data['resource'] = $category;
        $data['parents'] = Category::getAllBy('parent_id', 0);
        return view('@dashboard.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return String
     */
    public function update(Request $request, Category $category)
    {
        // Check Authority
        if (!check_authority('update.category')){
            return redirect('/');
        }

        $data['resource'] = $category;

        // Return
        if(!$data['resource']){
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! not exists.'
            ]);
        }

        $rules = [
            'parent_id' => 'required',
            'icon' => 'required',
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
            $upload = upload_file('image', $request->file('picture'), 'assets_public/images/category/picture');
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
            $upload = upload_file('image', $request->file('cover'), 'assets_public/images/category/cover');
            if ($upload['status'] == true){
                $cover = $upload['filename'];
            }else{
                return back()->with('message',[
                    'type'=> 'danger',
                    'text'=> 'Image ' . $upload['message']
                ]);
            }
        }

        $parent = (Category::getOneBy('uuid', $request->parent_id))? Category::getOneBy('uuid', $request->parent_id)->id : 0;
        $resource = $data['resource']->update([
            'parent_id' => $parent,
            'slug' => Str::slug($name['en'], '_'),
            'name' => json_encode($name),
            'details' => json_encode($details),
            'icon' => $request->icon,
            'picture' => (isset($picture))? $picture : $data['resource']->picture,
            'cover' => (isset($cover))? $cover : $data['resource']->cover,
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'updated_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('category.index'))->with('message', [
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
     * @param  \App\Models\Category  $category
     * @return String
     */
    public function destroy(Category $category)
    {
        // Check Authority
        if(!check_authority('delete.category')){
            return redirect('/');
        }

        $data['resource'] = $category;

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

    /**
     * Remove the specified resource from storage.
     */
    public function index_specifications(Request $request)
    {
        // Check Authority
        if(isset($request->product)){
            $data['product_id'] = Product::getOneBy('uuid', $request->product)->id;
        }
        if(isset($request->categories) && count($request->categories) > 0){
            $data['categories'] = Category::whereIn('uuid', $request->categories)->pluck('id')->toArray();
            $data['specifications'] = Specification::whereIn('category_id', $data['categories'])->get();
            $data['has_data'] = true;
        }else{
            $data['has_data'] = false;
        }
        $data['view'] = view('@dashboard.category._partials.specifications', $data)->render();
        return response($data);
    }
}
