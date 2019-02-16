<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LupsActivity extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lups_activitries =Activity::latest()->paginate(4);
        return view('admin.lups_activity.index',compact('lups_activitries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lups_activity.create');
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

            'image' => 'required|mimes:png|max:100',
            'name' => 'required|unique:activities',
            'description' => 'required|max:200'


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
            $path = $request->file('image')->storeAs('public/lups_activitries/', $fileNameToStore);

        } else {
            $fileNameToStore = "default.png";
        }
        $activity = new Activity();

        $activity->image = $fileNameToStore ;
        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->save();
        $notification = array(
            'ttitle' => 'Lups Activity Successfully Added',
            'tmsg' => 'You have added a Lups Activity',
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
    public function destroy($id)
    {
        //
    }


    public function delete(Request $request)
    {
        Activity::find ( $request->id )->delete ();
        $picture=$request->picture;
        $url="storage/lups_activitries/";
        $image_path=$url.$picture;
        if(file_exists( $image_path)){
            unlink($image_path);
        }
        return response ()->json ();
    }
}
