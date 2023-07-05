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
        return redirect('dreamDetail');
    }

    public function dreamDetail(){
        $dream_total_prices = Dream::selectRaw('SUM(dream_price) as dream_total_prices')->where('user_id','=',\Auth::id())
         ->get();

        $query = Dream::select('id','dream_price','comment')->where('user_id','=',\Auth::id())->orderBy("created_at","DESC");
        $dream_logs = $query->get();
        return view('dream.detail',compact('dream_total_prices','dream_logs'));
    }

    public function dreamDelete(Request $request){
        $db_data = new Dream;
        $db_data->destroy($request->id);
        return response()->json(['result'=>'成功']);
    }
}
