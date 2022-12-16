<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Base;
use App\Models\Mail;

class MailController extends Controller
{
    public function index(){
        $yourmails = Mail::where('address', Auth::user()->name)->get();
        $mymails = Mail::where('sender', Auth::user()->name)->get();
        $sender_names = Mail::select('sender')
        ->where('address', Auth::user()->name)
        ->latest('created_at')
        ->get();
        
        $address_names = Mail::select('address')
        ->where('sender', Auth::user()->name)
        ->latest('created_at')
        ->get();
       
        return view('mail.list',compact(
            'yourmails', 
            'sender_names', 
            
            'mymails',
            'address_names',
            
        ));
    }
    public function check($name){
        $yourmails = Mail::where('address',Auth::user()->name)
        ->where('sender', $name)
        ->latest('created_at')
        ->get();
        return view('mail.list',compact(
            'yourmails',
            'name'
        ));

    }
    public function prepare($name){
        $sender = User::find(Auth::id());
        return view('mail.edit',compact(
            'sender',
            'name'
        ));


    }
    public function post(Request $request, $name){
        $validate = $request->validate([
            'sender'=>'required',
            'address'=>'required',
            'mail_title'=>'bail|required|max:40',
            'mail_body'=>'bail|required|max:400'
        ]);
        Mail::create([
            'sender'=>$request->input('sender'),
            'address'=>$request->input('address'),
            'title'=>$request->input('mail_title'),
            'content'=>$request->input('mail_body')
        ]);
        return redirect(route('mail'));
    }
}
