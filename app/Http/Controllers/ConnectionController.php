<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Image;
use App\Models\Connection;

class ConnectionController extends Controller
{
    public function add(Request $request){
        $id = $request->input('connected_id');
        $user = User::find($id);
        $name = $user->name;
        Connection::create([
            'global_id'=>Auth::id(),
            'connected_id'=>$id,
            'link'=>$request->input('connected_link'),
            'path'=>$request->input('connected_path'),
            'name'=>$request->input('connected_name'),
            'genre'=>$request->input('connected_genre'),
            'place'=>$request->input('connected_place'),
            'type'=>$request->input('connected_type'),
            'description'=>null,
        ]);
        return redirect(route('browse',['name'=>$name]));
        }
    public function delete(Request $request){
        $id = $request->input('connected_id');
        $user = User::find($id);
        $name = $user->name;
        $connection = Connection::where([
            ['global_id', Auth::id()],
            ['connected_id', $id],
        ])->first();
        $connection->delete();
        return redirect(route('browse',['name'=>$name]));
    }
    public function index(Request $request, $id){
        $connection = Connection::find($id);
        return view('profile.edit.detail.edit_connection', compact('connection'));
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'connection_description'=>'nullable|max:25',
        ]);
        if($validator->fails()){
            return redirect(route('connection_edit', ['id'=>$id]))
            ->withErrors($validator)
            ->withInput();
        }
        $connection = Connection::find($id);
        $connection->update([
            'description'=>$request->input('connection_description'),
        ]);
        return redirect('/profile');
    }
}
