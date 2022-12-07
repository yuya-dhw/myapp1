<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Base;
use App\Models\Mail;

class MailController extends Controller
{
    public function index(){
        $yourmails = Mail::where('address', Auth::id());
        $sender_name = Mail::select('sender')
        ->where('address', Auth::id())
        ->latest('created_at')
        ->get();
        $senders = Base::where('sender', $sender_name);
        return view('mail.list',compact(
            'yourmails', 
            'sender_name', 
            'senders'
        ));
    }
    public function check($name){
        $yourmails = Mail::where('address',Auth::id())
        ->where('sender', $name)
        ->latest('created_at')
        ->get();

    }
    public function prepare($name){
        $sender = User::find(Auth::id());
        return view('mail.edit',compact(
            'sender',
            'name'
        ));


    }
    public function post(Request $request, $name){

    }
}
