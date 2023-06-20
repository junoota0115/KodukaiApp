<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Money;

class MoneyController extends Controller
{
    //
    public function index(){
        $query = Money::query();
        $money_logs = $query->get();
       return view('money.index', compact('money_logs')); 
    }

    public function showCreate(){
        return view('money.create');
    }

    public function exeCreate(Request $request){
        $money = $request->all();
        Money::create($money);

        return redirect('index');
    }
}
