<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Validator;
use App\Models\PermissionGroup;
use App\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Class object
     * @var resource
     */
    public $resource;

    /**
     * PermissionsController constructor.
     */
    public function __construct()
    {
        $this->resource = new Permission();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['groups'] = PermissionGroup::all();
        $data['resources'] = Permission::all();
        return view('@dashboard.permissions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['groups'] = PermissionGroup::all();
        return view('@dashboard.permissions.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check permissions

        // Check validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:permissions',
            'permission_groups' => 'required'
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // Do Code
        $resource = Permission::store([
            'name' => $request->name,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        // Relation
        if ($resource){
            foreach ($request->input('permission_groups') as $permission_group){
                $resource->permission_groups()->attach(PermissionGroup::getBy('uuid', $permission_group)->id);
            }
        }

        // Return
        if($resource){
            return redirect(route('permissions.index'))->with('message', [
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
        $data['groups'] = PermissionGroup::all();
        $data['resource'] = Permission::getBy('uuid', $uuid);
        return view('@dashboard.permissions.edit', $data);
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
        // Check permissions

        // Get Resource
        $resource = Permission::getBy('uuid', $uuid);

        // Check validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:permissions,name,' . $resource->id
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // Do Code
        $updatedResource = Permission::edit([
            'name' => $request->name,
            'updated_by' => auth()->user()->id
        ], $resource->id);

        // Relation
        if ($request->has('permission_groups')){
            $resource->permission_groups()->detach();
            foreach ($request->input('permission_groups') as $permission_group){
                $resource->permission_groups()->attach(PermissionGroup::getBy('uuid', $permission_group)->id);
            }
        }

        // Return
        if($updatedResource){
            return redirect(route('permissions.index'))->with('message', [
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
        $resource = Permission::getBy('uuid', $uuid);
        if ($resource){
            $deletedResource = Permission::remove($resource->id);

            // Return
            if ($deletedResource){
                return back();
            }
        }

    }
}
