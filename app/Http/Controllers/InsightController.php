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

class InsightController extends Controller
{
    public function random(){
        $random_user = DB::table('users')
        ->inRandomOrder()
        ->first();

        $id = $random_user->id;
            if($id == Auth::id()){
                return redirect(route('index'));
            };
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
