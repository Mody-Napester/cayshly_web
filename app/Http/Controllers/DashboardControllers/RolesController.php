<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\Role;
use Illuminate\Http\Request;
use Validator;

class RolesController extends Controller
{
    /**
     * Class object
     * @var resource
     */
    public $resource;

    /**
     * RolessController constructor.
     */
    public function __construct()
    {
        $this->resource = new Role();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['permissions'] = Permission::all();
        $data['resources'] = Role::all();
        return view('@dashboard.roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['permissions'] = Permission::all();
        return view('@dashboard.roles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        // Check permissions

        // Check validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:roles,name',
//            'icon' => 'required|string',
            'class' => 'required|string',
            'color' => 'required|string',
            'permissions-groups' => 'required'
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // Do Code
        $resource = Role::store([
            'name' => $request->name,
            'icon' => (($request->has('icon')? $request->icon : 'any')),
            'class' => $request->class,
            'color' => $request->color,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        // Relation
        if ($resource){
            foreach ($request->input('permissions-groups') as $permissions_groups){
                $group = explode('.', $permissions_groups)[0];
                $permission = explode('.', $permissions_groups)[1];

                $resource->permissions()->attach(
                    Permission::getBy('uuid', $permission)->id, [
                        'permission_group_id' => PermissionGroup::getBy('uuid', $group)->id
                ]);
            }
        }

        // Return
        if($resource){
            return redirect(route('roles.index'))->with('message', [
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
        $data['permissions'] = Permission::all();
        $data['resource'] = Role::getBy('uuid', $uuid);
        return view('@dashboard.roles.edit', $data);
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
        $resource = Role::getBy('uuid', $uuid);

        // Check validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:roles,name,' . $resource->id,
//            'icon' => 'required|string',
            'class' => 'required|string',
            'color' => 'required|string',
            'permissions-groups' => 'required'
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // Do Code
        $updatedResource = Role::edit([
            'name' => $request->name,
//            'icon' => $request->icon,
            'class' => $request->class,
            'color' => $request->color,
            'updated_by' => auth()->user()->id
        ], $resource->id);

        // Relation
        if ($request->has('permissions-groups')){
            $resource->permissions()->detach();

            foreach ($request->input('permissions-groups') as $permissions_groups){
                $group = explode('.', $permissions_groups)[0];
                $permission = explode('.', $permissions_groups)[1];

                $resource->permissions()->attach(
                    Permission::getBy('uuid', $permission)->id, [
                    'permission_group_id' => PermissionGroup::getBy('uuid', $group)->id
                ]);
            }
        }

        // Return
        if($updatedResource){
            return redirect(route('roles.index'))->with('message', [
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
        $resource = Role::getBy('uuid', $uuid);
        if ($resource){
            $resource->permissions()->detach();
            $deletedResource = Role::remove($resource->id);

            // Return
            if ($deletedResource){
                return back();
            }
        }

    }
}
