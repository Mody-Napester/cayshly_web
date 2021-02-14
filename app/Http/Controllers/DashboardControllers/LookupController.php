<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Lookup;
use Illuminate\Http\Request;

class LookupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        $data['resources'] = Lookup::paginate(config('vars.pagination'));
        return view('@dashboard.lookup.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        $data['parents'] = Lookup::getAllBy('parent_id', 0);
        return view('@dashboard.lookup.create', $data);
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
            'parent_id' => 'required',
            'is_active' => 'required',
        ];

        foreach (config('vars.langs') as $lang) {
            $rules['name_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $name = [];

        foreach (config('vars.langs') as $lang) {
            $name[$lang] = $request->input('name_' . $lang);
        }

        $parent = (Lookup::getOneBy('uuid', $request->parent_id))? Lookup::getOneBy('uuid', $request->parent_id)->id : 0;
        $resource = Lookup::create([
            'parent_id' => $parent,
            'key' => Str::slug($name['en'], '_'),
            'name' => json_encode($name),
            'is_active' => ($request->is_active == 1)? 1 : 0,
//            'created_by' => auth()->user()->id,
            'created_by' => 1,
        ]);

        // Return
        if($resource){
            return redirect(route('lookup.index'))->with('message', [
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
     * @param  \App\Models\Lookup  $lookup
     * @return \Illuminate\Http\Response
     */
    public function show(Lookup $lookup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lookup  $lookup
     * @return String
     */
    public function edit(Lookup $lookup)
    {
        $data['resource'] = $lookup;
        $data['parents'] = Lookup::getAllBy('parent_id', 0);
        return view('@dashboard.lookup.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookup  $lookup
     * @return String
     */
    public function update(Request $request, Lookup $lookup)
    {
        $data['resource'] = $lookup;

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

        foreach (config('vars.langs') as $lang) {
            $rules['name_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $name = [];

        foreach (config('vars.langs') as $lang) {
            $name[$lang] = $request->input('name_' . $lang);
        }

        $parent = (Lookup::getOneBy('uuid', $request->parent_id))? Lookup::getOneBy('uuid', $request->parent_id)->id : 0;

        $resource = $data['resource']->update([
            'parent_id' => $parent,
            'key' => Str::slug($name['en'], '_'),
            'name' => json_encode($name),
            'is_active' => ($request->is_active == 1)? 1 : 0,
//            'updated_by' => auth()->user()->id,
            'updated_by' => 1,
        ]);

        // Return
        if($resource){
            return redirect(route('lookup.index'))->with('message', [
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
     * @param  \App\Models\Lookup  $lookup
     * @return String
     */
    public function destroy(Lookup $lookup)
    {
        $data['resource'] = $lookup;

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
