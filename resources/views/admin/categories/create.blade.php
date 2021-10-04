@extends('layout')
@section('title')
    Thêm mới cactegory
@endsection
@section('contents')
<div class="m-5">
    <h2 class="text-center">Thêm mới cactegory</h2>
    <form method="POST" action="{{route('admin.categories.store')}}" >
     @csrf
    <div>
        <label>Name category</label>
        <input class="mt-3 form-control" type="text" name="name" value="{{old('name')}}" />
         @error('name')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <button class="mt-3 btn btn-primary">Create</button>

    </form>
</div>
@endsection
