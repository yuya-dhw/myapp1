<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base;
use App\Models\User;
use App\Models\Image;

class SearchController extends Controller
{
    public function index(){
        $search_status = "";
        return view('search.search',compact('search_status'));
    }
    public function runsearch(Request $request){
        $word = $request->input('search_bar');
        $results = Base::where('project_name','LIKE','%'.$word.'%')->get(); 
        $search_status = "該当アーティストなし";
        return view('search.search',compact('results','search_status'));
    }
}
