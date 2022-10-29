<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Song;

class SongController extends Controller
{
    public function index(){
        //これまでの入力値をvalueに渡して表示

        $song = Song::where('global_id', Auth::id())->first();
        return view('profile.edit.edit_song', compact('song'));
    }
    public function store(Request $request){
        //バリデーション
        $validator = Validator::make($request->all(),[
            'song'=>'nullable|file',
            'song_name'=>'required',
            'song_description'=>'bail|required|max:40',
        ]);
        if($validator->fails()){
            return redirect('/profile/edit/song')
            ->withErrors($validator)
            ->withInput();
        };

        //楽曲ファイルの保存
        $song = $request->file('song');
        $name = $song->hashName();
        $song->storeAs('public/audio', $name);

        //pathと入力値のデータベースへの保存
        $new_song = Song::where('global_id', Auth::id())->first();
        $song_name = $request->input('song_name');
        $song_description = $request->input('song_description');

        $new_song->update([
            'path'=>'storage/' . 'audio/' . $name,
            'name'=>$song_name,
            'description'=>$song_description,
        ]);
        return redirect('/profile');
    }
}
