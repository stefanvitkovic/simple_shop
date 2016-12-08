<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Sale;

use Illuminate\Support\Facades\Auth;

use App\User;

use DB;


class UserController extends Controller
{
	
	// public function __construct()
 //    {
 //        $this->middleware('auth');
 //    }

    public function index(User $id)
    {
    	$sales = Product::where([
            ['user_id',$id->id],
            ['quantity','>=','1']
            ])->get();

        $join = DB::table('sales')
        ->join('products','products_id','=','products.id')
        ->select('products.name','products.description','sales.quantity','sales.price','sales.created_at')
        ->where('buyer_id',$id->id)->get();

    	return view('profile',['sales'=>$sales,'purchases'=>$join,'user'=>$id]);
    }
}
