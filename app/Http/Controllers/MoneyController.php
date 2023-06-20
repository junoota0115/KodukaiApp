<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MoneyController extends Controller
{
    //
    public function index(){
       return view('money.index'); 
    }

    public function showCreate(){
        return view('money.create');
    }

    public function exeCreate(Request $request){
        $money = $request->all();
        dd($money);
    }
}
