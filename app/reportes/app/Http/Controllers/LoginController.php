<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{
    //
    public function index(){
		return view('login.index');
    }

    public function postLogin(Request $request){
    	Sentinel::authenticate($request->all());
    	return redirect('/reporteconsignatario');
    }



}
