@extends('layout')
@section('title')
   update User
@endsection
@section('contents')
<div class="m-5">
<h2>  update User</h2>
<form method="POST" action="{{route('admin.users.update',['id' =>$data->id])}}" class="mt-5">
@csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" value="{{$data->name}}" name="name" />
          @error('name')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>
    <div>
        <label>Email</label>
        <input class="mt-3 form-control" type="email"value="{{$data->email}}"  name="email" />
    </div>
     @error('emial')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    <div>
        <label>Address</label>
        <input class="mt-3 form-control" type="text"value="{{$data->address}}" name="address" />
         @error('address')
          <span class="text-danger" >
               {{ $message }}
            </span>
          @enderror
    </div>

    <div>
        <label>Gender</label>
        <select class="mt-3 form-control" name="gender">
            <option value="{{config('common.user.gender.male')}}" {{$data->gender==config('common.user.gender.male') ? "selected":""}}>Male</option>
            <option value="{{config('common.user.gender.female')}}"{{$data->gender==config('common.user.gender.female') ? "selected":""}}>Female</option>
        </select>
    </div>
    <div>
        <label>Role</label>
        <select class="mt-3 form-control" name="role">
            <option value="{{config('common.user.role.user')}}"  {{$data->role==config('common.user.role.user') ? "selected":""}}>User</option>
            <option value="{{config('common.user.role.admin')}}"  {{$data->role==config('common.user.role.admin') ? "selected":""}}>Admin</option>
        </select>
    </div>

    <button class="mt-3 btn btn-primary">submit</button>
</form>
</div>
@endsection
