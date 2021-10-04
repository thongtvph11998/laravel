<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;

class UserController extends Controller
{
     public function index( Request $request){
     $keyword= $request->get('keyword');
     if(!$keyword){
     $listUser = User::all();
     }else{
         $listUser=User::query()->where('email','like','%'.$keyword.'%')
        -> orWhere('name','like','%'.$keyword.'%')
         ->get();

     }

    // $user=$listUser->first();
    // dd($user->invoices()->count());
    $listUser->load([
        'invoices',
    ]);
    // dd($listUser);
    return view('admin/users/index' , ['data'=> $listUser ,]);

    }
    public function show($id){
        $user= User::find($id);
        // dd($id);
        return view('admin/users/show',['user'=>$user]);
    }
    public function create(){
        return view('admin/users/create');
    }
    public function store(StoreRequest $request){
        $data=  $request->except('_token');

        $result=USer::create($data);

        //
        if($request->ajax()==true){
            return response()->json([
                'status'=>200,
                'message'=>'ok'
            ]);
        }
        return redirect()->route('admin.users.index');
    }
    public function edit($id){
        $data= User::find($id);
        return view('admin/users/edit',['data'=>$data]);
    }
     public function update(UpdateRequest $request,  $id){
        $data= $request->except('_token');
        $user=User::find($id);
        $user->update($data);
        return redirect()->route('admin.users.index');
    }
     public function delete($id){
         $user=User::find($id);
        $user->delete();
      return redirect()->route('admin.users.index');
    }
}
