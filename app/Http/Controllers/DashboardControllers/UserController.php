<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;


class UserController extends Controller
{
    /**
     * Class object
     * @var resource
     */
    public $resource;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->resource = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if (!User::hasAuthority('index.users')){
//            return redirect('/');
//        }
        $data['roles'] = Role::all();
        $data['resources'] = User::all();
        return view('@dashboard.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|max:20',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // Do Code
        $resource = User::store([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        // Relation
        if ($resource){
            foreach ($request->input('roles') as $role){
                $resource->roles()->attach(Role::getBy('uuid', $role)->id);
            }
        }

        // Return
        if ($resource){
            return back();
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
     * Show user profile.
     */
    public function showUserProfile()
    {
        $data['user'] = User::getBy('id', auth()->user()->id);
        return view('@dashboard.users.profile.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $data['roles'] = Role::all();
        $data['resource'] = User::getBy('uuid', $uuid);
        return response([
            'title'=> "Update user " . $data['resource']->name,
            'view'=> view('@dashboard.users.edit', $data)->render(),
        ]);
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
        $resource = User::getBy('uuid', $uuid);

        // Check validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $resource->id,
            'phone' => 'required|max:20',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // Do Code
        $updatedResource = User::edit([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => ($request->has('password')? bcrypt($request->password) : $resource->password),
            'updated_by' => auth()->user()->id
        ], $resource->id);

        // Relation
        if ($request->has('roles')){
            $resource->roles()->detach();

            foreach ($request->input('roles') as $role){
                $resource->roles()->attach(Role::getBy('uuid', $role)->id);
            }
        }

        // Return
        if ($updatedResource){
            return back();
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
        $resource = User::getBy('uuid', $uuid);
        if ($resource){
            $deletedResource = User::remove($resource->id);

            // Return
            if ($deletedResource){
                return back();
            }
        }

    }

    /**
     * Reset Password
     */
    public function resetPassword($user)
    {
        // Check permissions
//        if (!User::hasAuthority('index.user')){
//            return redirect('/');
//        }

        // Get Resource
        $resource = User::getBy('uuid', $user);

        if($resource){
            $resource->password = bcrypt(config('vars.default_password'));
            $resource->save();

            $data['message'] = [
                'msg_status' => 1,
                'type' => 'success',
                'text' => 'Password Has been reset successfully',
            ];
        }else{
            $data['message'] = [
                'msg_status' => 0,
                'type' => 'danger',
                'text' => 'Sorry! User not exists.',
            ];
        }

        return back()->with('message', $data['message']);

    }

    /**
     * Update Password
     */
    public function updatePassword(Request $request,$user)
    {
        // Check permissions
//        if (!User::hasAuthority('index.user')){
//            return redirect('/');
//        }

        // Get Resource
        $resource = User::getBy('uuid', $user);

        if($resource){
            $resource->password = bcrypt($request->password);
            $resource->save();

            $data['message'] = [
                'msg_status' => 1,
                'type' => 'success',
                'text' => 'Password updated successfully',
            ];
        }else{
            $data['message'] = [
                'msg_status' => 0,
                'type' => 'danger',
                'text' => 'Sorry! User not exists.',
            ];
        }

        return back()->with('message', $data['message']);

    }
}
