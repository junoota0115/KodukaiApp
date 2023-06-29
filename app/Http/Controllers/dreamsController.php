<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dreamsController extends Controller
{
    //
    public function dreamCreate(){
        return view('dream.create');
    }
}
