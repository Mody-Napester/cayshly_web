<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Lookup;
use Illuminate\Support\Str;
use App\Models\Script;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        $data['resources'] = Script::paginate(config('vars.pagination'));
        return view('@dashboard.script.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        $data['providers'] = lookups('providers');
        return view('@dashboard.script.create', $data);
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
            'lookup_provider_id' => 'required',
            'is_active' => 'required',
            'code' => 'required',
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

        $provider = (Lookup::getOneBy('uuid', $request->lookup_provider_id))? Lookup::getOneBy('uuid', $request->lookup_provider_id)->id : 0;
        $resource = Script::create([
            'lookup_provider_id' => $provider,
            'code' => $request->code,
            'name' => json_encode($name),
            'is_active' => ($request->is_active == 1)? 1 : 0,
//            'created_by' => auth()->user()->id,
            'created_by' => 1,
        ]);

        // Return
        if($resource){
            return redirect(route('script.index'))->with('message', [
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
     * @param  \App\Models\Script  $script
     * @return \Illuminate\Http\Response
     */
    public function show(Script $script)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Script  $script
     * @return String
     */
    public function edit(Script $script)
    {
        $data['resource'] = $script;
        $data['providers'] = lookups('providers');
        return view('@dashboard.script.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Script  $script
     * @return String
     */
    public function update(Request $request, Script $script)
    {
        $data['resource'] = $script;

        // Return
        if(!$data['resource']){
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! not exists.'
            ]);
        }

        $rules = [
            'lookup_provider_id' => 'required',
            'is_active' => 'required',
            'code' => 'required',
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

        $provider = (Lookup::getOneBy('uuid', $request->lookup_provider_id))? Lookup::getOneBy('uuid', $request->lookup_provider_id)->id : 0;
        $resource = $data['resource']->update([
            'lookup_provider_id' => $provider,
            'code' => $request->code,
            'name' => json_encode($name),
            'is_active' => ($request->is_active == 1)? 1 : 0,
//            'updated_by' => auth()->user()->id,
            'updated_by' => 1,
        ]);

        // Return
        if($resource){
            return redirect(route('script.index'))->with('message', [
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
     * @param  \App\Models\Script  $script
     * @return String
     */
    public function destroy(Script $script)
    {
        $data['resource'] = $script;

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
