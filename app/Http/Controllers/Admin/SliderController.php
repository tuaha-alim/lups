<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(2);
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'image' => 'required|mimes:jpg,jpeg,png|max:400',


        ]);
        if ($request->hasFile('image')) {
            //file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //GET JUST EXT
            $extension = $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //Upload Image
            $path = $request->file('image')->storeAs('public/slider/', $fileNameToStore);

        } else {
            $fileNameToStore = "default.png";
        }
        $slider = new Slider();

        $slider->image = $fileNameToStore ;
        $slider->save();
        $notification = array(
            'ttitle' => 'Slider Successfully Added',
            'tmsg' => 'You have added a Slider',
            'ticon' => 'success',
        );
        return back()->with($notification);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

    }
    public function delete(Request $request)
    {
        Slider::find ( $request->id )->delete ();
        $picture=$request->picture;
        $url="storage/slider/";
        $image_path=$url.$picture;
        if(file_exists( $image_path)){
            unlink($image_path);
        }
        return response ()->json ();
    }

}
