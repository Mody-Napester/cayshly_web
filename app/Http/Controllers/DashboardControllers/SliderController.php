<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        // Check Authority
        if (!check_authority('index.slider')){
            return redirect('/');
        }

        $data['resources'] = Slider::paginate(config('vars.pagination'));
        return view('@dashboard.slider.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return String
     */
    public function create()
    {
        // Check Authority
        if (!check_authority('create.slider')){
            return redirect('/');
        }

        return view('@dashboard.slider.create');
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
        if (!check_authority('store.slider')){
            return redirect('/');
        }

        // Validation
        $rules = [
            'image' => 'required',
            'button_1_link' => 'required',
            'button_2_link' => 'required',
        ];

        foreach (langs("short_name") as $lang) {
            $rules['text_1_' . $lang] = 'required';
            $rules['text_2_' . $lang] = 'required';
            $rules['text_3_' . $lang] = 'required';
            $rules['button_1_text_' . $lang] = 'required';
            $rules['button_2_text_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $text_1 = [];
        $text_2 = [];
        $text_3 = [];
        $button_1_text = [];
        $button_2_text = [];

        foreach (langs("short_name") as $lang) {
            $text_1[$lang] = $request->input('text_1_' . $lang);
            $text_2[$lang] = $request->input('text_2_' . $lang);
            $text_3[$lang] = $request->input('text_3_' . $lang);
            $button_1_text[$lang] = $request->input('button_1_text_' . $lang);
            $button_2_text[$lang] = $request->input('button_2_text_' . $lang);
        }

        if($request->hasFile('image')){
            $upload = upload_file('image', $request->file('image'), 'assets_public/images/slider');
            if ($upload['status'] == true){
                $image = $upload['filename'];
            }else{
                return back()->with('message',[
                    'type'=> 'danger',
                    'text'=> 'Image ' . $upload['message']
                ]);
            }
        }

        $resource = Slider::create([
            'text_1' => json_encode($text_1),
            'text_2' => json_encode($text_2),
            'text_3' => json_encode($text_3),
            'button_1_text' => json_encode($button_1_text),
            'button_2_text' => json_encode($button_2_text),
            'button_1_link' => $request->button_1_link,
            'button_2_link' => $request->button_2_link,
            'image' => $image,
            'is_featured' => ($request->is_featured == 1)? 1 : 0,
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'created_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('slider.index'))->with('message', [
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
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        // Check Authority
        if (!check_authority('edit.slider')){
            return redirect('/');
        }

        $data['resource'] = $slider;
        return view('@dashboard.slider.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return String
     */
    public function update(Request $request, Slider $slider)
    {
        // Check Authority
        if (!check_authority('update.slider')){
            return redirect('/');
        }

        $data['resource'] = $slider;

        // Return
        if(!$data['resource']){
            return redirect()->back()->with('message',[
                'type'=>'danger',
                'text'=>'Sorry! page not exists.'
            ]);
        }

        // Validation
        $rules = [
//            'image' => 'required',
            'button_1_link' => 'required',
            'button_2_link' => 'required',
        ];

        foreach (langs("short_name") as $lang) {
            $rules['text_1_' . $lang] = 'required';
            $rules['text_2_' . $lang] = 'required';
            $rules['text_3_' . $lang] = 'required';
            $rules['button_1_text_' . $lang] = 'required';
            $rules['button_2_text_' . $lang] = 'required';
        }

        $request->validate($rules);

        // Code
        $text_1 = [];
        $text_2 = [];
        $text_3 = [];
        $button_1_text = [];
        $button_2_text = [];

        foreach (langs("short_name") as $lang) {
            $text_1[$lang] = $request->input('text_1_' . $lang);
            $text_2[$lang] = $request->input('text_2_' . $lang);
            $text_3[$lang] = $request->input('text_3_' . $lang);
            $button_1_text[$lang] = $request->input('button_1_text_' . $lang);
            $button_2_text[$lang] = $request->input('button_2_text_' . $lang);
        }

        if($request->hasFile('image')){
            $upload = upload_file('image', $request->file('image'), 'assets_public/images/slider');
            if ($upload['status'] == true){
                $image = $upload['filename'];
            }else{
                return back()->with('message',[
                    'type'=> 'danger',
                    'text'=> 'Image ' . $upload['message']
                ]);
            }
        }

        $resource = $data['resource']->update([
            'text_1' => json_encode($text_1),
            'text_2' => json_encode($text_2),
            'text_3' => json_encode($text_3),
            'button_1_text' => json_encode($button_1_text),
            'button_2_text' => json_encode($button_2_text),
            'button_1_link' => $request->button_1_link,
            'button_2_link' => $request->button_2_link,
            'image' => (isset($image)? $image : $data['resource']->image),
            'is_featured' => ($request->is_featured == 1)? 1 : 0,
            'is_active' => ($request->is_active == 1)? 1 : 0,
            'updated_by' => auth()->user()->id,
        ]);

        // Return
        if($resource){
            return redirect(route('slider.index'))->with('message', [
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
     * @param  \App\Slider  $slider
     * @return String
     */
    public function destroy(Slider $slider)
    {
        // Check Authority
        if (!check_authority('delete.slider')){
            return redirect('/');
        }

        $data['resource'] = $slider;

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
