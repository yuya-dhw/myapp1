<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Goal;

class GoalController extends Controller
{
    public function index(){
        $goal = Goal::where('global_id', Auth::id())->first();
        return view('profile.edit.detail.edit_goal', compact('goal'));
    }
    public function update(Request $request){
        $validator = $request->validate([
            'goal_body'=>'required|max:255',
        ]);
        $goal = Goal::where('global_id', Auth::id())->first();
        $goal->update([
            'body'=>$request->input('goal_body'),
        ]);
        return redirect('/profile');
    }
}

