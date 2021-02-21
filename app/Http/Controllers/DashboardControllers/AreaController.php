<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        $data['resources'] = Area::all();
        return view('@dashboard.area.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        $data['cities'] = City::all();
        return view('@dashboard.area.create', $data);
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
            'city' => 'required',
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

        $resource = Area::create([
            'name' => json_encode($name),
            'city_id' => City::getOneBy('uuid', $request->city)->id,
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'created_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('area.index'))->with('message', [
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
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return String
     */
    public function edit(Area $area)
    {
        $data['resource'] = $area;
        $data['cities'] = City::all();
        return view('@dashboard.area.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return String
     */
    public function update(Request $request, Area $area)
    {
        $data['resource'] = $area;

        // Return
        if(!$data['resource']){
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! not exists.'
            ]);
        }

        $rules = [
            'city' => 'required',
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

        $resource = $data['resource']->update([
            'name' => json_encode($name),
            'city_id' => City::getOneBy('uuid', $request->city)->id,
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'updated_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('area.index'))->with('message', [
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
     * @param  \App\Models\Area  $area
     * @return String
     */
    public function destroy(Area $area)
    {
        $data['resource'] = $area;

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
