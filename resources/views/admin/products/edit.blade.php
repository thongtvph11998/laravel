@extends('layout')
@section('title')
   update product
@endsection
@section('contents')
<div class="m-5">
<h2 class="text-center"> update product</h2>
<form method="POST" action="{{route('admin.products.update',['id'=>$data->id])}}" class="mt-5" enctype="multipart/form-data">
@csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name"
        value="{{$data->name}}" />
         @error('name')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <div>
        <label>image</label>
        <input class="mt-3 form-control" type="file" name="image"  value="{{$data->image}}"/>
        <img src="{{asset('upload/'.$data->image)}}" alt="" width="250">
         @error('image')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <div>
        <label>price</label>
        <input class="mt-3 form-control" type="number" name="price" value="{{$data->price}}" />
         @error('price')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <div>
        <label>quantity</label>
        <input type="number" class="mt-3 form-control" name="quantity" value="{{$data->quantity}}" >
         @error('quantity')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <div>
        <label>category_id</label>
        <select class="mt-3 form-control" name="category_id">
            <option value="">----Lựa chọn danh mục----</option>
            @foreach ($cate as $cate)
                <option value="{{$cate->id}}"{{($cate->id==$data->category_id)?'selected':''}}>{{$cate->name}}</option>
            @endforeach
             @error('category_id')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
        </select>
    </div>

    <button class="mt-3 btn btn-primary">Update</button>
</form>
</div>
@endsection
