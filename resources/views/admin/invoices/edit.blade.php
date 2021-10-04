@extends('layout')
@section('title')
    Update invoice
@endsection
@section('contents')
<div class="m-5">
<h2 class="text-center"> thêm mới invoice</h2>
<form method="POST" action="{{route('admin.invoices.update',['id'=>$data->id])}}" class="mt-5" enctype="multipart/form-data">
@csrf
    <div>
        <label>user_id</label>
        <input class="mt-3 form-control" type="number" name="user_id" value="{{$data->user_id}}" />
          @error('user_id')
            <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <div>
        <label>number</label>
        <input class="mt-3 form-control" type="text" name="number"value="{{$data->number}}" />
         @error('number')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <div>
        <label>address</label>
        <input class="mt-3 form-control" type="text" name="address"value="{{$data->address}}" />
         @error('address')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <div>
        <label>total_price</label>
        <input type="text" class="mt-3 form-control" name="total_price" value="{{$data->total_price}}">
         @error('total_price')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
     <div>
          <label>status</label> <br>
       <select class="mt-3 form-control" name="status">
           @foreach (config('common.invoice.status') as $statusName=>$statusValue)
           <option value="{{$statusValue}}">
             {{ __('invoice.status.'. $statusName)}}
            </option>

           @endforeach
       </select>
        @error('status')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>


    <button class="mt-3 btn btn-primary">Create</button>
</form>
</div>
@endsection
