@extends('layout')
@section('title')
  Update cactegory
@endsection
@section('contents')
<div class="m-5">
    <h2 class="text-center"> Update cactegory</h2>
    <form method="POST" action="{{route('admin.categories.update',['id'=>$data->id])}}" >
     @csrf
    <div>
        <label>Name category</label>
        <input class="mt-3 form-control" type="text" name="name"  value="{{$data->name}}"/>
            @error('name')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <button class="mt-3 btn btn-primary">Submit</button>

    </form>
  </div>
@endsection
