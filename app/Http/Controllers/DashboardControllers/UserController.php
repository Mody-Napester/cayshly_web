<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Lookup;
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

     */
    public function index()
    {
        // Check Permission
        if (!check_authority('index.users')){
            return redirect('/');
        }

        $data['resources'] = User::paginate(50);
        return view('@dashboard.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check Permission
        if (!check_authority('create.users')){
            return redirect('/');
        }

        $data['roles'] = Role::all();
        $data['genders'] = lookups('gender');
        return view('@dashboard.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check permissions
        if (!check_authority('store.users')){
            return redirect('/');
        }

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
            'parent_id' => 1,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => ($request->has('phone'))? $request->phone : '',
            'dob' => ($request->has('dob'))? $request->dob : '',
            'lookup_gender_id' => Lookup::getOneBy('uuid', $request->lookup_gender_id)->id,
            'password' => bcrypt($request->password),
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'created_by' => auth()->user()->id,
        ]);

        // Relation
        if ($resource){
            foreach ($request->roles as $role){
                $resource->roles()->attach(Role::getBy('uuid', $role)->id);
            }
        }

        // Return
        if($resource){
            return redirect(route('user.index'))->with('message', [
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
        // Check permissions
        if (!check_authority('show.users')){
            return redirect('/');
        }
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
     */
    public function edit($uuid)
    {
        // Check permissions
        if (!check_authority('edit.users')){
            return redirect('/');
        }

        $data['resource'] = User::getBy('uuid', $uuid);
        $data['roles'] = Role::all();
        $data['genders'] = lookups('gender');
        return view('@dashboard.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        // Check permissions
        if (!check_authority('update.users')){
            return redirect('/');
        }

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
            'phone' => ($request->has('phone'))? $request->phone : '',
            'dob' => ($request->has('dob'))? $request->dob : '',
            'lookup_gender_id' => Lookup::getOneBy('uuid', $request->lookup_gender_id)->id,
            'password' => (($request->has('password') && !empty($request->password))? bcrypt($request->password) : $resource->password),
            'is_active' => ($request->is_active == 1)? 1 : 0,
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
        if($resource){
            return redirect(route('user.index'))->with('message', [
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
     */
    public function destroy($uuid)
    {
        // Check permissions
        if (!check_authority('delete.users')){
            return redirect('/');
        }

        $resource = User::getBy('uuid', $uuid);

        if ($resource){
            $resource->roles()->detach();
            $deletedResource = User::remove($resource->id);

            if($deletedResource){
                return redirect()->back()->with('message',[
                    'type'=>'success',
                    'text'=>'Deleted Successfully.'
                ]);
            }else{
                return redirect()->back()->with('message',[
                    'type'=>'danger',
                    'text'=>'Error Deleting.'
                ]);
            }
        }else{
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! not exists.'
            ]);
        }

    }

    /**
     * Reset Password
     */
    public function resetPassword($user)
    {
        // Check permissions
//        if (!check_authority('index.user')){
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
//        if (!check_authority('index.user')){
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
