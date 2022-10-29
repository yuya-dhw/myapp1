<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Image;
use App\Models\Base;
use App\Models\Song;
use App\Models\Goal;
use App\Models\Member;
use App\Models\Film;
use App\Models\Connection;

class ProfileController extends Controller
{
    public function index(){
        if(DB::table('images')->where('global_id', Auth::id())->doesntExist()){
            Image::create([
                'global_id'=>Auth::id(),
            ]);
        }
        if(DB::table('bases')->where('global_id', Auth::id())->doesntExist()){
            Base::create([
                'global_id'=>Auth::id(),
                'release_date'=>null,
                'release_link'=>null,
                'event_date'=>null,
                'event_place'=>null,
                'event_link'=>null,
                'event_link_com'=>null,
            ]);
        }
        if(DB::table('songs')->where('global_id', Auth::id())->doesntExist()){
            Song::create([
                'global_id'=>Auth::id(),
                'path'=>null,
            ]);
        }
        if(DB::table('goals')->where('global_id', Auth::id())->doesntExist()){
            Goal::create([
                'global_id'=>Auth::id(),
            ]);
        }

        $user = User::where('id', Auth::id())->first();
        $image = Image::where('global_id', Auth::id())->first();
        $mypage = $image->path;
        $base = Base::where('global_id', Auth::id())->first();
        $release = $base->release_date;
        $release_date = new Carbon($release);
        $release_month = $release_date->month;
        $release_day = $release_date->day;
        $event = $base->event_date;
        $event_date = new Carbon($event);
        $event_month = $event_date->month;
        $event_day = $event_date->day;
        $song = Song::where('global_id', Auth::id())->first();
        $goal = Goal::where('global_id', Auth::id())->first();
        $members = Member::where('global_id', Auth::id())->get();
        $films = Film::where('global_id', Auth::id())->get();
        $connections = Connection::where('global_id', Auth::id())->get();


        return view('profile.browse.profile_all',compact(
            'user',
            'image',
            'mypage',
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
