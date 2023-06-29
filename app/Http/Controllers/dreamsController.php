<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dream;
use DB;

class dreamsController extends Controller
{
    //
    public function dreamCreate(){
        return view('dream.create');
    }

    public function dreamUplode(Request $request){
        $dream = $request->all();
        // dd($dream);
        DB::transaction(function () use($dream){
            Dream::create(['dream_price'=>$dream['dream_price'],'comment'=>$dream['comment'],'user_id'=>\Auth::id()]);
        });
        return redirect('index');
    }
}
