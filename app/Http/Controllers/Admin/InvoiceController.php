<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Invoice\StoreRequest;
use App\Http\Requests\Admin\Invoice\UpdateRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request){
        $keyword=$request->get('keyword');
        if(!$keyword){
             $data=Invoice::all();
        }else{
            $data=Invoice::query()->where('address','like','%'.$keyword.'%')
            ->orWhere('total_price','like','%'.$keyword.'%')->get();
        }

        return view('admin/invoices/index',['data'=>$data]);
    }
    public function create(){
        $invoice=Invoice::all();
        return view('admin/invoices/create',compact('invoice'));
    }
    public function store(StoreRequest $request){
         $data=  $request->except('_token');
         Invoice::query()-> create($data);
        return redirect()->route('admin.invoices.index');

    }
    public function edit($id){
     $data= Invoice::find($id);
      return view('admin/invoices/edit',['data'=>$data]);
    }
    public function update(UpdateRequest $request,$id){
        $data= $request->except('_token');
        $invoice=Invoice::find($id);
        $invoice->update($data);
        return redirect()->route('admin.invoices.index');
    }
    public function delete($id){
        $data=Invoice::find($id);
        $data->delete();
        return redirect()->route('admin.invoices.index');
    }
}
