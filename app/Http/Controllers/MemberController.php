<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Member;

class MemberController extends Controller
{
    public function index(){
        $members = Member::where('global_id', Auth::id())->get();
        return view('profile.edit.detail.edit_member', compact('members')); 
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'member_name'=>'bail|required|max:25',
            'member_part'=>'nullable|max:40',
            'member_role'=>'required',
            'member_link'=>'nullable|max:255|url',
        ]);
        if($validator->fails()){
            return redirect('/profile/edit/member')
            ->withErrors($validator)
            ->withInput();
        };
        Member::create([
            'global_id'=>Auth::id(),
            'name'=>$request->input('member_name'),
            'part'=>$request->input('member_part'),
            'role'=>$request->input('member_role'),
            'link'=>$request->input('member_link'),
        ]);
        return redirect('/profile/edit/member');
    }
    public function prepare(Request $request,$id){
        $members = Member::where('global_id', Auth::id())->get();
        $old_member = Member::find($id);
        return view('profile.edit.detail.edit_member_indivisual',compact('members','old_member'));
    }
    public function update(Request $request, $id){
        $old_member = Member::find($id);
        $old_member->update([
            'name'=>$request->input('member_name'),
            'part'=>$request->input('member_part'),
            'role'=>$request->input('member_role'),
        ]);
        return redirect('/profile/edit/member');
    }
    public function delete(Request $request, $id){
        $member = Member::find($id);
        $member->delete();
        return redirect('/profile/edit/member');
    }
}
