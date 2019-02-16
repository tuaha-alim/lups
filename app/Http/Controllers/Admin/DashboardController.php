<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\photo;
use App\Picture;
use App\Submit;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(){
    
        $submitted_people = Submit::count();
        $submitted_pic = photo::count();
        $category = Category::count();
        $user = User::count();
        return view('admin.dashboard',compact('submitted_people','submitted_pic','category','user'));
    }
}
