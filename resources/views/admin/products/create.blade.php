@extends('layout')
@section('title')
    thêm mới product
@endsection
@section('contents')
<div class="m-5">
<h2 class="text-center"> thêm mới product</h2>
<form method="POST" action="{{route('admin.products.store')}}" class="mt-5" enctype="multipart/form-data">
@csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" value="{{old('name')}}" />
         @error('name')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <div>
        <label>image</label>
        <input class="mt-3 form-control" type="file" name="image" value="{{old('image')}}" />
         @error('image')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <div>
        <label>price</label>
        <input class="mt-3 form-control" type="number" name="price" value="{{old('price')}}" />
         @error('price')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <div>
        <label>quantity</label>
        <input type="number" class="mt-3 form-control" name="quantity"value="{{old('quantity')}}" />
         @error('quantity')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <div>
        <label>category_id</label>
        <select class="mt-3 form-control" name="category_id" value=""> <option value=" ">----Lựa chọn danh mục----</option>
            @foreach ($cate as $cate)
                <option value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach
        </select>
         @error('category_id')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror

    </div>

    <button class="mt-3 btn btn-primary">Create</button>
</form>
</div>
@endsection
