<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categrory\StoreRequest;
use App\Http\Requests\Admin\Categrory\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $keyword=$request->get('keyword');
        if(!$keyword){
             $data=Category::all();
        }else{
            $data=Category::query()->where('name','like','%'.$keyword.'%')->get();
        }

        return view('admin/categories/index',['data'=>$data]);
        }
     public function create()
    {
      return view('admin/categories/create');
    }
     public function store(StoreRequest $request)
    {
        $data=  $request->except('_token');
        Category::create($data);
        return redirect()->route('admin.categories.index');
    }
     public function edit($id)
    {
        $data= Category::find($id);
        return view('admin/categories/edit',['data'=>$data]);
    }
     public function update(UpdateRequest $request ,$id)
    {
       $data= $request->except('_token');
        $cate=Category::find($id);
        $cate->update($data);
        return redirect()->route('admin.categories.index');
    }
     public function delete($id)
    {
        $cate=Category::find($id);
        $cate->delete();
        return redirect()->route('admin.categories.index');
    }

}
