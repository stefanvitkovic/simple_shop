<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Product;

use App\User;

use App\Sale;

use Image;

use File;

use DB;
class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
                    ->join('users','user_id','=','users.id')
                    ->select('products.*','users.name as uname')->get();
    	return view('welcome',['products'=>$products]);
    }

    public function create()
    {
    	return view('form');
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $filename = $request->input('name') . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/'. $filename);
        Image::make($image)->resize(150,200)->save($location);

        // $location = public_path('small/'. $filename);
        // Image::make($image)->resize(150,130)->save($location);

        $product = new Product($request->all());
        $product->image = $request->input('name');
        $product->user_id = Auth::id();
        $product->status_id = 2;
        $product->save();

        $id = Product::where([
            ['name',$request->input('name')],
            ['description',$request->input('description')],
            ['price',$request->input('price')]
            ])->first();
        $id=$id->id;

    	return back()->with('message','Sale created !');
    }

    public function show(Product $id)
    {
        $user = Auth::id();
        $SellerInfo = User::where('id',$id->user_id)->first();
        return view('product',['product'=>$id,'user'=>$user,'info'=>$SellerInfo]);
    }

    public function buy(Request $request)
    {   
        if(!Auth::check()){
            return redirect('/');
        }

        $sale = new Sale($request->all());
        $sale->buyer_id = Auth::id();
        $sale->save();

        $status = Product::findOrFail($request->products_id);
        $newQuantity = $status->quantity = ($status->quantity) - ($request->quantity);
        if($newQuantity == 0){
            $status->status_id = 1;
        }
        $status->save();
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }
}
