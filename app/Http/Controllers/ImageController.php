<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\Image;

class ImageController extends Controller
{
    public function index(){
        $image = Image::where('global_id', Auth::id())->first();
        return view('profile.edit.edit_image', compact('image'));
    }
    public function store(Request $request){
        $old_image = Image::where('global_id', Auth::id())->first();
        $old_path = $old_image->path;
        
        


        $image = $request->file('profile_image');
        if($image == null){
            return redirect(route('image_edit'));
        }
        $name = $image->hashName();
        $image->storeAs('public/profile', $name);

        $new_image = Image::where('global_id', Auth::id())->first();
        $new_image->update([
            'path'=>'storage/' . 'profile/' . $name,
        ]);
        if($old_path !== "storage/profile/default.png"){
            $delete_object = str_replace('storage/', 'public/', $old_path);
            Storage::delete($delete_object);
        }
        
        return redirect(route('index'));
    }
}
