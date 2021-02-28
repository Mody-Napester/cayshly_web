<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        // Check Authority
        if (!User::hasAuthority('index.contact')){
            return redirect('/');
        }

        $data['resources'] = Contact::paginate(config('vars.pagination'));
        return view('@dashboard.contact.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        // Check Authority
        if (!User::hasAuthority('create.contact')){
            return redirect('/');
        }

        return view('@dashboard.contact.create');
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
        if (!User::hasAuthority('store.contact')){
            return redirect('/');
        }

        // Validation
        $rules = [
            'picture' => 'required',
            'is_active' => 'required',
        ];

        foreach (langs("short_name") as $lang) {
            $rules['address_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $address = [];

        foreach (langs("short_name") as $lang) {
            $address[$lang] = $request->input('address_' . $lang);
        }

        if($request->hasFile('picture')){
            $upload = upload_file('image', $request->file('picture'), 'assets_public/images/contact/picture');
            if ($upload['status'] == true){
                $picture = $upload['filename'];
            }else{
                return back()->with('message',[
                    'type'=> 'danger',
                    'text'=> 'Image ' . $upload['message']
                ]);
            }
        }

        $resource = Contact::create([
            'address' => json_encode($address),
            'phone' => ($request->has('phone'))? $request->phone : '',
            'mobile' => ($request->has('mobile'))? $request->mobile : '',
            'fax' => ($request->has('fax'))? $request->fax : '',
            'email' => ($request->has('email'))? $request->email : '',
            'picture' => (isset($picture))? $picture : '',
            'working_hours' => ($request->has('working_hours'))? $request->working_hours : '',
            'map' => ($request->has('map'))? $request->map : '',
            'is_default' => ($request->is_default == 1)? 1 : 0,
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'created_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('contact.index'))->with('message', [
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
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return String
     */
    public function edit(Contact $contact)
    {
        // Check Authority
        if (!User::hasAuthority('edit.city')){
            return redirect('/');
        }

        $data['resource'] = $contact;
        return view('@dashboard.contact.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return String
     */
    public function update(Request $request, Contact $contact)
    {
        // Check Authority
        if (!User::hasAuthority('update.contact')){
            return redirect('/');
        }

        $data['resource'] = $contact;

        // Return
        if(!$data['resource']){
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! not exists.'
            ]);
        }

        $rules = [
//            'picture' => 'required',
            'is_active' => 'required',
        ];

        foreach (langs("short_name") as $lang) {
            $rules['address_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $address = [];

        foreach (langs("short_name") as $lang) {
            $address[$lang] = $request->input('address_' . $lang);
        }

        if($request->hasFile('picture')){
            $upload = upload_file('image', $request->file('picture'), 'assets_public/images/contact/picture');
            if ($upload['status'] == true){
                $picture = $upload['filename'];
            }else{
                return back()->with('message',[
                    'type'=> 'danger',
                    'text'=> 'Image ' . $upload['message']
                ]);
            }
        }

        $resource = $data['resource']->update([
            'address' => json_encode($address),
            'phone' => ($request->has('phone'))? $request->phone : '',
            'mobile' => ($request->has('mobile'))? $request->mobile : '',
            'fax' => ($request->has('fax'))? $request->fax : '',
            'email' => ($request->has('email'))? $request->email : '',
            'picture' => (isset($picture))? $picture : $data['resource']->picture,
            'working_hours' => ($request->has('working_hours'))? $request->working_hours : '',
            'map' => ($request->has('map'))? $request->map : '',
            'is_default' => ($request->is_default == 1)? 1 : 0,
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'updated_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('contact.index'))->with('message', [
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
     * @param  \App\Models\Contact  $contact
     * @return String
     */
    public function destroy(Contact $contact)
    {
        // Check Authority
        if (!User::hasAuthority('destroy.contact')){
            return redirect('/');
        }

        $data['resource'] = $contact;

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
