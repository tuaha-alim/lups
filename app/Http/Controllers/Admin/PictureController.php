<?php

namespace App\Http\Controllers\Admin;

use App\Picture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = Picture::latest()->paginate(6);
        return view('admin.picture.index',compact('pictures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.picture.create');
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
            'title' => 'required',
            'date' => 'required',
            'image.*' => 'required|image|max:5000',
            'image' => 'required',
        ]);

     $a=count($request->image);
         if($a>5){
            return back()->withErrors(['image'=>"You Can Upload Only 5 Photos at Once"]);
         }




        $picture=array();
        $currentDate = Carbon::now()->toDateString();
        if($files=$request->file('image')){



            foreach($files as $file){
                $name= $currentDate.'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/picture/',$name);
                $picture[]=$name;
            }
        }
        $imagesAvailable=count($picture);
        for ($i=0;$i<$imagesAvailable;$i++){

            Picture::insert( [
                'image'=> $picture[$i],
                'title' => $request['title'],
                'date' => $request['date'],
            ]);

        }
        return redirect()->route('admin.picture.create')->with('successMsg','Photo  Successfully Send');


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
        $picture =Picture::find($id);
        if(Storage::disk('public')->exists('picture/'.$picture->image)){
            Storage::disk('public')->delete('picture/'.$picture->image);
        }

        $picture->delete();
        return redirect()->back()->with('deleteMsg','Photo  Successfully deleted');
    }
}
