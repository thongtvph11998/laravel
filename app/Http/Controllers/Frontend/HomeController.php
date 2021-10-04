<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $keyword=$request->get('keyword');
        if(!$keyword){
             $products=Product::all();
        }else{
             $products=Product::query()->where('name','like','%'.$keyword.'%')->get();
        }
        return view('frontend/home',compact('products'));
    }
    public function products($id){
        $cate_pro=Product::where('category_id',$id)->get();
        $cate=Category::find($id);
        return view('frontend/products',compact('cate_pro','cate'));
    }
    public function productDetail($id){
        $product=DB::table('products')->where('id',$id)->get();
        $cate_pro=Product::where('category_id',$id)->get();
        return view('frontend/detail-pro',compact('product','cate_pro'));
    }
    public function register(){
      return view('frontend/register');
    }
    public function  store(StoreRequest $request){
        $data=  $request->except('_token');
        $result=User::create($data);

        return redirect()->route('auth.getLoginForm');
    }
}
