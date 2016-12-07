<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Sale;

class SalesController extends Controller
{
    
    public function store(Request $request)
    {
    	$sale = new Sale($request->all());
    	$sale->buyer_id = Auth::id();
    	$sale->save();

    	response('kupljeno');
    }

}
