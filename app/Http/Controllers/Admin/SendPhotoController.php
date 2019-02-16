<?php

namespace App\Http\Controllers\Admin;

use App\photo;
use App\Submit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SendPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sendPhoto= Submit::latest()->paginate(5);
        return view('admin.submit_photo.index',compact('sendPhoto'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photos = Submit::where('name',$id)->first();

        return view('admin.submit_photo.show',compact('photos'));
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
        $photo = Submit::find($id);
        $photoAlbums = photo::where('submit_id',$photo->id)->get();




        foreach ($photoAlbums as $photoAlbum ){

            if(Storage::disk('public')->exists('photoGallery/'.$photoAlbum->image)){
                Storage::disk('public')->delete('photoGallery/'.$photoAlbum->image);
            }

            $photoAlbum->delete();
        }
        $photo->delete();
        return redirect()->back()->with('deleteMsg','Photo Gallery Successfully deleted');
    }
    public function delete($id)
    {
        $album = photo::find($id);

        if(Storage::disk('public')->exists('photoGallery/'.$album->image)){
            Storage::disk('public')->delete('photoGallery/'.$album->image);
        }
        $album->delete();

        return redirect()->back()->with('deleteMsg_album','Photo Album Successfully deleted');
    }



}
