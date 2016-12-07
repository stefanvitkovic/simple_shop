<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Sale;

use Illuminate\Support\Facades\Auth;

use App\User;


class UserController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$sales = Product::where('user_id',Auth::id())->get();
    	return view('profile',['sales'=>$sales]);
    }
}
