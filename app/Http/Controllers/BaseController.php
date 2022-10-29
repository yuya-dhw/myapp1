<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use App\Models\Base;

class BaseController extends Controller
{
    public function index(){
        $base_value = Base::where('global_id', Auth::id())->first(); 
        $td = Carbon::today(); 
        $today = $td->toDateString();
        
        $rd = new Carbon($base_value->release_date);
        $release_date = $rd->toDateString();
        
        //$release_month = $release_date->month;
        //$release_day = $release_date->day;
        $ed = new Carbon($base_value->event_date);
        $event_date = $ed->toDateString();
        //$event_month = $event_date->month;
        //$event_day = $event_date->day;
        return view('profile.edit.edit_base', compact(
            'base_value', 
            'release_date',
            'event_date',
            'today',
        ));
    }
    
    public function update(Request $request){
        $new_base = Base::where('global_id', Auth::id())->first();
        $validator = $request->validate([
            'project_name'=>'bail|required|max:25',
            'copy'=>'bail|required|max:40',
            'genre'=>'required',
            'type'=>'required',
            'place'=>'required',
            'release_exist'=>'required',
            'release_date'=>'nullable',
            'release_type'=>'required',
            'release_name'=>'bail|required|max:40',
            'release_link'=>'nullable|max:255|url',
            'event_exist'=>'required',
            'event_date'=>'nullable',
            'event_pref'=>'required',
            'event_place'=>'nullable|max:20',
            'event_name'=>'bail|required|max:30',
            'event_link'=>'nullable|max:255|url',
            'event_link_com'=>'nullable|max:255|url',
        ]);
            
        $new_base->update([
            'project_name'=>$request->input('project_name'),
            'copy'=>$request->input('copy'),
            'genre'=>$request->input('genre'),
            'type'=>$request->input('type'),
            'place'=>$request->input('place'),
            'release_exist'=>$request->input('release_exist'),
            'release_date'=>$request->input('release_date'),
            'release_type'=>$request->input('release_type'),
            'release_name'=>$request->input('release_name'),
            'release_link'=>$request->input('release_link'),
            'release_exist'=>$request->input('release_exist'),
            'event_date'=>$request->input('event_date'),
            'event_pref'=>$request->input('event_pref'),
            'event_place'=>$request->input('event_place'),
            'event_name'=>$request->input('event_name'),
            'event_link'=>$request->input('event_link'),
            'event_link_con'=>$request->input('event_link_com'),
        ]);
        return redirect('profile');
    }
}
