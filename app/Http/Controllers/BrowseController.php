<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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
        if(User::where('name',$name)->doesntExist()){
            abort(404);
        }

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
            return redirect(route('index'));
        }
        $user = User::find($id);
        $image = Image::where('global_id', $id)->first();
        $base = Base::where('global_id', $id)->first();
        $release = $base->release_date;
        $release_date = new Carbon($release);
        $release_month = $release_date->month;
        $release_day = $release_date->day;
        $event = $base->event_date;
        $event_date = new Carbon($event);
        $event_month = $event_date->month;
        $event_day = $event_date->day;
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
            'release',
            'release_date',
            'release_month',
            'release_day',
            'event',
            'event_date',
            'event_month',
            'event_day',
            'song',
            'goal',
            'members',
            'films',
            'connections',
        ));
    }
}
