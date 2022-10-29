<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Image;
use App\Models\Base;
use App\Models\Song;
use App\Models\Goal;
use App\Models\Member;
use App\Models\Film;
use App\Models\Connection;

class BrowseController extends Controller
{
    public function index($name){
        $specific_user = User::where('name', $name)->first();
        $id = $specific_user->id;
     
        //マイページ画像の定義
        if(Auth::check()){
            $page = Image::where('global_id', Auth::id())->first();
            $mypage = $page->path;
        }else{
            $mypage = 1;
        }
       


        if($id == Auth::id()){
            return redirect('profile');
        }
        $user = User::find($id);
        $image = Image::where('global_id', $id)->first();
        $base = Base::where('global_id', $id)->first();
        $song = Song::where('global_id', $id)->first();
        $goal = Goal::where('global_id', $id)->first();
        $members = Member::where('global_id', $id)->get();
        $films = Film::where('global_id', $id)->get();
        $connections = Connection::where('global_id', $id)->get();
        return view('profile.browse.profile_all', compact(
            'mypage',
            'user',
            'image',
            'base',
            'song',
            'goal',
            'members',
            'films',
            'connections',
        ));
    }
}
