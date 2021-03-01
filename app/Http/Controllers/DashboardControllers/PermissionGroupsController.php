<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\PermissionGroup;
use Illuminate\Http\Request;
use Validator;

class PermissionGroupsController extends Controller
{
    /**
     * Class object
     * @var resource
     */
    public $resource;

    /**
     * PermissionGroupsController constructor.
     */
    public function __construct()
    {
        $this->resource = new PermissionGroup();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check Authority
        if (!check_authority('index.permission_groups')){
            return redirect('/');
        }

        $data['resources'] = PermissionGroup::all();
        return view('@dashboard.permission_groups.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check Authority
        if (!check_authority('create.permission_groups')){
            return redirect('/');
        }

        return view('@dashboard.permission_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check Authority
        if (!check_authority('store.permission_groups')){
            return redirect('/');
        }

        // Check permissions

        // Check validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:permission_groups'
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // Do Code
        $resource = PermissionGroup::store([
            'name' => $request->name,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        // Return
        if($resource){
            return redirect(route('permission-groups.index'))->with('message', [
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        // Check Authority
        if (!check_authority('edit.permission_groups')){
            return redirect('/');
        }

        $data['resource'] = PermissionGroup::getBy('uuid', $uuid);
        return view('@dashboard.permission_groups.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        // Check Authority
        if (!check_authority('update.permission_groups')){
            return redirect('/');
        }

        // Check permissions

        // Check validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // Do Code
        $data['resource'] = PermissionGroup::getBy('uuid', $uuid);

        $resource = PermissionGroup::edit([
            'name' => $request->name,
            'updated_by' => auth()->user()->id
        ], $data['resource']->id);

        // Return
        if($resource){
            return redirect(route('permission-groups.index'))->with('message', [
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
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        // Check Authority
        if (!check_authority('delete.permission_groups')){
            return redirect('/');
        }

        $data['resource'] = PermissionGroup::getBy('uuid', $uuid);

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
