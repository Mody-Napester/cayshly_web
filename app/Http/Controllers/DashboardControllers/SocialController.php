<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        // Check Authority
        if (!check_authority('index.social')){
            return redirect('/');
        }

        $data['resources'] = Social::paginate(config('vars.pagination'));
        return view('@dashboard.social.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        // Check Authority
        if (!check_authority('create.social')){
            return redirect('/');
        }

        $data['providers'] = Provider::all();
        return view('@dashboard.social.create', $data);
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
        if (!check_authority('store.social')){
            return redirect('/');
        }

        // Validation
        $rules = [
            'provider_id' => 'required',
            'name' => 'required',
            'link' => 'required',
        ];

        $request->validate($rules);

        $resource = Social::create([
            'provider_id' => $request->provider_id,
            'name' => $request->name,
            'link' => $request->link,
        ]);

        // Return
        if($resource){
            return redirect(route('social.index'))->with('message', [
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
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Social  $social
     * @return String
     */
    public function edit(Social $social)
    {
        // Check Authority
        if (!check_authority('edit.social')){
            return redirect('/');
        }

        $data['resource'] = $social;
        $data['providers'] = Provider::all();
        return view('@dashboard.social.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Social  $social
     * @return String
     */
    public function update(Request $request, Social $social)
    {
        // Check Authority
        if (!check_authority('update.social')){
            return redirect('/');
        }

        $data['resource'] = $social;

        // Return
        if(!$data['resource']){
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! page not exists.'
            ]);
        }

        // Validation
        $rules = [
            'provider_id' => 'required',
            'name' => 'required',
            'link' => 'required',
        ];

        $request->validate($rules);

        $resource = $data['resource']->update([
            'provider_id' => $request->provider_id,
            'name' => $request->name,
            'link' => $request->link,
        ]);

        // Return
        if($resource){
            return redirect(route('social.index'))->with('message', [
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
     * @param  \App\Social  $social
     * @return String
     */
    public function destroy(Social $social)
    {
        // Check Authority
        if (!check_authority('destroy.social')){
            return redirect('/');
        }

        $data['resource'] = $social;

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
