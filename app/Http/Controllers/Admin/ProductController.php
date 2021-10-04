<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $keyword=$request->get('keyword');
        // $query=Product::query()->with('category');
        $query=DB::table('products')
        ->join('categories','categories.id','=','products.category_id')
        ->select('products.*','categories.name as namecate');
        if(!$keyword){
            $query=$query->orderBy('id', 'desc');
        }else{
            $query=$query->where('products.name','like','%'.$keyword.'%')->orWhere('products.price','like','%'.$keyword.'%');
        }
        $products=$query->get();
        $categories=Category::all();
         return view('admin/products/index', compact('products','categories'));
    }
     public function create(){
         $cate=Category::all();
        return view('admin/products/create',['cate'=>$cate]);
    }
     public function store(StoreRequest $request){
        $model = new Product();
        // gán gtri cho các thuộc tính của object sử dụng massassign ($fillable trong model)
        $model->fill($request->all());
        // lưu ảnh
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('products', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
         return redirect()->route('admin.products.index');
    }
     public function edit($id){
         $data=Product::find($id);
         $cate=Category::all();
        return view('admin/products/edit',['data'=>$data],['cate'=>$cate]);
    }
     public function update(UpdateRequest  $request, $id){
       $model = Product::find($id);
        if (!$model) {
            return redirect(route('admin.products.index'));
        }
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('products', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect()->route('admin.products.index');
    }
     public function delete($id){
        $pro=Product::find($id);
        $pro->delete();
        return redirect()->route('admin.products.index');
    }
}
