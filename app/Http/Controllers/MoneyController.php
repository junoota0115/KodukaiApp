<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Money;
use DB;
use Illuminate\Support\Facades\Auth;

class MoneyController extends Controller
{
    //
    public function index(){
        if (Auth::check()) {
            // ログインしている場合の処理
        } else {
            return redirect('/login');
        }
        
        $total_prices = Money::selectRaw('SUM(price) as total_prices')->where('user_id','=',\Auth::id())
         ->get();
       return view('money.index',compact('total_prices')); 
    }

    public function showCreate(){
        return view('money.create');
    }

    public function exeCreate(Request $request){
        $money = $request->all();
        DB::transaction(function() use($money){
        Money::create(['price' => $money['price'],'comment'=>$money['comment'],'user_id'=>\Auth::id()]);
        });

        return redirect('index');
    }

    public function showDetail(){
        $query = Money::select('money.*')->where('user_id','=',\Auth::id())->orderBy("created_at","DESC");
        $money_logs = $query->get();
        return view('money.detail', compact('money_logs'));
    }


    public function exeData()
    {
        $data = DB::table('Money')->where('user_id','=',\Auth::id())->sum('price');

        return response()->json($data);
    }
}
