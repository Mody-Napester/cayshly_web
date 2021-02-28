<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        // Check Authority
        if (!check_authority('index.option')){
            return redirect('/');
        }

        $data['resources'] = Option::paginate(config('vars.pagination'));
        return view('@dashboard.option.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        // Check Authority
        if (!check_authority('create.option')){
            return redirect('/');
        }

        $data['parents'] = Option::getAllBy('parent_id', 0);
        return view('@dashboard.option.create', $data);
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
        if (!check_authority('store.option')){
            return redirect('/');
        }

        // Validation
        $rules = [
            'parent_id' => 'required',
            'is_active' => 'required',
        ];

        foreach (langs("short_name") as $lang) {
            $rules['name_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $name = [];

        foreach (langs("short_name") as $lang) {
            $name[$lang] = $request->input('name_' . $lang);
        }

        $parent = (Option::getOneBy('uuid', $request->parent_id))? Option::getOneBy('uuid', $request->parent_id)->id : 0;
        $resource = Option::create([
            'parent_id' => $parent,
            'name' => json_encode($name),
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'created_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('option.index'))->with('message', [
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
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return String
     */
    public function edit(Option $option)
    {
        // Check Authority
        if (!check_authority('edit.option')){
            return redirect('/');
        }

        $data['resource'] = $option;
        $data['parents'] = Option::getAllBy('parent_id', 0);
        return view('@dashboard.option.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Option  $option
     * @return String
     */
    public function update(Request $request, Option $option)
    {
        // Check Authority
        if (!check_authority('update.option')){
            return redirect('/');
        }

        $data['resource'] = $option;

        // Return
        if(!$data['resource']){
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! not exists.'
            ]);
        }

        $rules = [
            'parent_id' => 'required',
            'is_active' => 'required',
        ];

        foreach (langs("short_name") as $lang) {
            $rules['name_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $name = [];

        foreach (langs("short_name") as $lang) {
            $name[$lang] = $request->input('name_' . $lang);
        }

        $parent = (Option::getOneBy('uuid', $request->parent_id))? Option::getOneBy('uuid', $request->parent_id)->id : 0;
        $resource = $data['resource']->update([
            'parent_id' => $parent,
            'name' => json_encode($name),
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'updated_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('option.index'))->with('message', [
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
     * @param  \App\Models\Option  $option
     * @return String
     */
    public function destroy(Option $option)
    {
        // Check Authority
        if (!check_authority('destroy.option')){
            return redirect('/');
        }

        $data['resource'] = $option;

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
    public function index_child(Request $request)
    {
        if(isset($request->product)){
            $data['product_id'] = Product::getOneBy('uuid', $request->product)->id;
        }
        if(isset($request->options) && count($request->options) > 0){
            $data['options'] = Option::whereIn('uuid', $request->options)->get();
            $data['has_data'] = true;
        }else{
            $data['has_data'] = false;
        }
        $data['view'] = view('@dashboard.option._partials.child', $data)->render();
        return response($data);
    }

}
