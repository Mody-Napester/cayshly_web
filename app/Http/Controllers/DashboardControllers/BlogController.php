<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        // Check Authority
        if (!check_authority('index.blog')){
            return redirect('/');
        }

        $data['resources'] = Blog::paginate(config('vars.pagination'));
        return view('@dashboard.blog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        // Check Authority
        if (!check_authority('create.blog')){
            return redirect('/');
        }

        return view('@dashboard.blog.create');
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
        if (!check_authority('store.blog')){
            return redirect('/');
        }

        // Validation
        $rules = [
            'picture' => 'required',
            'cover' => 'required',
            'is_active' => 'required',
        ];

        foreach (langs("short_name") as $lang) {
            $rules['title_' . $lang] = 'required';
            $rules['details_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $title = [];
        $details = [];

        foreach (langs("short_name") as $lang) {
            $title[$lang] = $request->input('title_' . $lang);
            $details[$lang] = $request->input('details_' . $lang);
        }

        if($request->hasFile('picture')){
            $upload = upload_file('image', $request->file('picture'), 'assets_public/images/blog/picture');
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
            $upload = upload_file('image', $request->file('cover'), 'assets_public/images/blog/cover');
            if ($upload['status'] == true){
                $cover = $upload['filename'];
            }else{
                return back()->with('message',[
                    'type'=> 'danger',
                    'text'=> 'Image ' . $upload['message']
                ]);
            }
        }

        $resource = Blog::create([
            'slug' => Str::slug($title['en'], '_'),
            'title' => json_encode($title),
            'details' => json_encode($details),
            'picture' => (isset($picture))? $picture : '',
            'cover' => (isset($cover))? $cover : '',
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'created_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('blog.index'))->with('message', [
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
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        // Check Authority
        if (!check_authority('show.blog')){
            return redirect('/');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return String
     */
    public function edit(Blog $blog)
    {
        // Check Authority
        if (!check_authority('edit.blog')){
            return redirect('/');
        }

        $data['resource'] = $blog;
        return view('@dashboard.blog.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return String
     */
    public function update(Request $request, Blog $blog)
    {
        // Check Authority
        if (!check_authority('update.blog')){
            return redirect('/');
        }

        $data['resource'] = $blog;

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
            $rules['title_' . $lang] = 'required';
            $rules['details_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $title = [];
        $details = [];

        foreach (langs("short_name") as $lang) {
            $title[$lang] = $request->input('title_' . $lang);
            $details[$lang] = $request->input('details_' . $lang);
        }

        if($request->hasFile('picture')){
            $upload = upload_file('image', $request->file('picture'), 'assets_public/images/blog/picture');
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
            $upload = upload_file('image', $request->file('cover'), 'assets_public/images/blog/cover');
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
            'slug' => Str::slug($title['en'], '_'),
            'title' => json_encode($title),
            'details' => json_encode($details),
            'picture' => (isset($picture))? $picture : $data['resource']->picture,
            'cover' => (isset($cover))? $cover : $data['resource']->cover,
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'updated_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('blog.index'))->with('message', [
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
     * @param  \App\Models\Blog  $blog
     * @return String
     */
    public function destroy(Blog $blog)
    {
        // Check Authority
        if (!check_authority('delete.blog')){
            return redirect('/');
        }

        $data['resource'] = $blog;

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
