<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        // Check Authority
        if (!check_authority('index.country')){
            return redirect('/');
        }

        $data['resources'] = Country::all();
        return view('@dashboard.country.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        // Check Authority
        if (!check_authority('create.country')){
            return redirect('/');
        }

        return view('@dashboard.country.create');
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
        if (!check_authority('store.country')){
            return redirect('/');
        }

        // Validation
        $rules = [
            'nicename' => 'required',
            'iso' => 'required',
            'iso3' => 'required',
            'numcode' => 'required',
            'phonecode' => 'required',
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

        $resource = Country::create([
            'name' => json_encode($name),
            'nicename' => $request->nicename,
            'iso' => $request->iso,
            'iso3' => $request->iso3,
            'numcode' => $request->numcode,
            'phonecode' => $request->phonecode,
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'created_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('country.index'))->with('message', [
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
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return String
     */
    public function edit(Country $country)
    {
        // Check Authority
        if (!check_authority('edit.country')){
            return redirect('/');
        }

        $data['resource'] = $country;
        return view('@dashboard.country.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return String
     */
    public function update(Request $request, Country $country)
    {
        // Check Authority
        if (!check_authority('update.country')){
            return redirect('/');
        }

        $data['resource'] = $country;

        // Return
        if(!$data['resource']){
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! not exists.'
            ]);
        }

        $rules = [
            'nicename' => 'required',
            'iso' => 'required',
            'iso3' => 'required',
            'numcode' => 'required',
            'phonecode' => 'required',
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

        $resource = $data['resource']->update([
            'name' => json_encode($name),
            'nicename' => $request->nicename,
            'iso' => $request->iso,
            'iso3' => $request->iso3,
            'numcode' => $request->numcode,
            'phonecode' => $request->phonecode,
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'updated_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('country.index'))->with('message', [
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
     * @param  \App\Models\Country  $country
     * @return String
     */
    public function destroy(Country $country)
    {
        // Check Authority
        if (!check_authority('delete.country')){
            return redirect('/');
        }

        $data['resource'] = $country;

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
