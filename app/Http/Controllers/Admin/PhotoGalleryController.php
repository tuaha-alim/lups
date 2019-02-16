<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Album;
use App\PhotoGallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo_Galleries = PhotoGallery::latest()->paginate(3);
        return view('admin.photo_gallery.index',compact('photo_Galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activity = Activity::pluck('name','id');
        return view('admin.photo_gallery.create',compact('activity'));
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

            'image' => 'required|mimes:jpg,jpeg,png|max:1000',
            'gallery_name' => 'required',
            'activity_id'=>'required',
            'album_image.*' => 'required|mimes:jpg,jpeg,png|max:3000',
            'name' => 'required',
            'date' => 'required',


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
            $path = $request->file('image')->storeAs('public/photo_gallery/', $fileNameToStore);

        } else {
            $fileNameToStore = "default.png";
        }

        $album_image=array();
        if($files=$request->file('album_image')){
            $currentDate = Carbon::now()->toDateString();
            foreach($files as $file){
                $name= $currentDate.'-'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/photoAlbum/',$name);
                $album_image[]=$name;
            }
        }


        $photogallery = new PhotoGallery();
        $photogallery->image = $fileNameToStore ;
        $photogallery->name = $request->gallery_name;
        $photogallery->activity_id = $request->activity_id;
        $photogallery->save();


        $imagesAvailable = count($album_image);
        for ($i=0;$i<$imagesAvailable;$i++){

            Album::insert([
                'album_image'=>  $album_image[$i],
                'photo_gallery_id' => $photogallery->id,
                'name'=>$request->name,
                'date'=>$request->date,

            ]);

        }

        $notification = array(
            'ttitle' => 'Photo Gallery Successfully Added',
            'tmsg' => 'You have added a Photo Gallery',
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
        $Gallery = PhotoGallery::where('id',$id)->first();

        return view('admin.photo_gallery.show',compact('Gallery'));
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
        $photoGallery = PhotoGallery::find($id);
        $photoAlbums = Album::where('photo_gallery_id',$photoGallery->id)->get();

        if(Storage::disk('public')->exists('photo_gallery/'.$photoGallery->image)){
            Storage::disk('public')->delete('photo_gallery/'.$photoGallery->image);
        }




        foreach ($photoAlbums as $photoAlbum ){

            if(Storage::disk('public')->exists('photoAlbum/'.$photoAlbum->album_image)){
                Storage::disk('public')->delete('photoAlbum/'.$photoAlbum->album_image);
            }

            $photoAlbum->delete();
        }
        $photoGallery->delete();
        return redirect()->back()->with('deleteMsg','Photo Gallery Successfully deleted');
    }
    public function deleteGallery(Request $request)
    {
        Album::find ( $request->id )->delete ();
        $picture=$request->picture;
        $url="storage/photoAlbum/";
        $image_path=$url.$picture;
        if(file_exists( $image_path)){
            unlink($image_path);
        }
        return response ()->json ();


    }
}
