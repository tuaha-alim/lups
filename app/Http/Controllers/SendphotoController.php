<?php

namespace App\Http\Controllers;

use App\Category;

use App\photo;
use App\Submit;

use Carbon\Carbon;
use Illuminate\Http\Request;

class SendphotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        return view('photo_send',compact('categories'));
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
             'name' => 'required',
             'email' => 'required',
             'message' => 'required',
             'image.*' => 'required|image|max:5000',
             'image' => 'required',
             'category_id'=>'required'

         ]);


         $a=count($request->image);
         if($a>5){
            return back()->withErrors(['image'=>"You Can Upload Only 5 Photos at Once"]);
         }

        $gallery_image=array();
        $currentDate = Carbon::now()->toDateString();
        if($files=$request->file('image')){



        foreach($files as $file){
            $name= $currentDate.'-'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/photoGallery/',$name);
            $gallery_image[]=$name;
        }
        }


        $submitted_user = new Submit();
        $submitted_user->name = $request->name;
        $submitted_user->email = $request->email;
        $submitted_user->message = $request->message;
        $submitted_user->category_id = $request->category_id;
        $submitted_user->save();

        $imagesAvailable=count($gallery_image);
        for ($i=0;$i<$imagesAvailable;$i++){

            photo::insert( [
                'image'=> $gallery_image[$i],
                'category_id'=>$request->category_id,
                'submit_id' => $submitted_user->id,


            ]);

        }


        return redirect()->route('send_photo.create')->with('successMsg','Photo  Successfully Send');
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

    }
}
