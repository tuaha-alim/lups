<?php

namespace App\Http\Controllers;
use App\Activity;
use App\Category;
use App\photo;
use App\PhotoGallery;
use App\Picture;
use App\Slider;
use App\Submit;
use App\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::latest()->take(3)->get();
        $ativitries = Activity::latest()->get();
        return view('welcome',compact('sliders','ativitries'));
    }

    public function activityRelatedGallery($name){

        $activity_Gallery = Activity::where('name',$name)->first();

        return view('activity_related_pic',compact('activity_Gallery'));

    }
    public function activitis_gallery_album($id){

            $id_decode = base64_decode($id);

            $activity_Gallery_album = PhotoGallery::where('id', $id_decode)->first();


        return view('gallery_allbum_pic',compact('activity_Gallery_album'));

    }





    public function about()
    {
        return view('about');
    }
    public function gallery()
    {
        $gallery = Picture:: latest()->paginate(20);
        return view('gallery',compact('gallery'));
    }
    public function activitis()
    {
        return view('activitis');
    }



}
