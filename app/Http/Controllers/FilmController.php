<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Film;

class FilmController extends Controller
{
    public function index(Request $request){
        $films = Film::Where('global_id', Auth::id())->get();
        return view('profile.edit.detail.edit_film', compact('films'));
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'film_name'=>'required|max:30',
            'film_link'=>'bail|required|max:255|url',
        ]);
        if($validator->fails()){
            return redirect('/profile/edit/film')
            ->withErrors($validator)
            ->withInput();
        };
        Film::create([
            'global_id'=>Auth::id(),
            'name'=>$request->input('film_name'),
            'link'=>$request->input('film_link'),
        ]);
        return redirect('/profile/edit/film');
    }
    public function prepare(Request $request, $id){
        $films = Film::Where('global_id', Auth::id())->get();
        $old_film = Film::find($id);
        return view('layouts.form.detail.form_film_indivisual', compact('films','old_film'));
    }
    public function update(Request $request, $id){
        $film = Film::find($id);
        $film->update([
            'name'=>$request->input('film_name'),
            'link'=>$request->input('film_link'),
        ]);
        return redirect('/profile/edit/film');
    }
    public function delete(Request $request, $id){
        $film = Film::find($id);
        $film->delete();
        return redirect('/profile/edit/film');

    }
}
