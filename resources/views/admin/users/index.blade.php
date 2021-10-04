@extends('layout')
@section('title')
    quản lí user
@endsection
@section('contents')
<div class="m-5">
<div  class="row">
  <div class="col-6">
    <h2 class="text-center"> Quản trị User</h2>
    {{-- <a class="btn btn-success" href="{{ route('admin.users.create') }}" >Thêm mới</a> --}}
    <button class="btn btn-success " role="button" data-toggle="modal" data-target="#modal_create">Create</button>
     <form class="d-flex m-2">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

<div class="modal fade" id="modal_create" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Thêm mới người dùng</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form method="POST" id="form_create" action="{{ route('admin.users.store') }}">
@csrf
<div class="mt-3">
<label>Name</label>
<input class="mt-3 form-control" type="text" name="name"  />
</div>
<div class="mt-3">
<label>Email</label>
<input class="mt-3 form-control" type="email" name="email" />
</div>
<div class="mt-3">
<label>Address</label>
<input class="mt-3 form-control" type="text" name="address"  />
</div>
<div class="mt-3">
<label>Password</label>
<input class="mt-3 form-control" type="password" name="password" />
</div>

<div class="mt-3">
<label>Gender</label>
<select class="mt-3 form-control" name="gender">
<option value="{{ config('common.user.gender.male') }}">
Male
</option>
<option value="{{ config('common.user.gender.female') }}">
Female
</option>
</select>
</div>
<div class="mt-3">
<label>Role</label>
<select class="mt-3 form-control" name="role">
<option
value="{{ config('common.user.role.user') }}">
User
</option>
<option
value="{{ config('common.user.role.admin') }}">
Admin
</option>
</select>
</div>

<div class="mt-3">
<button class="mt-3 btn btn-primary">Create</button>
<button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
</div>
</form>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
  </div>
</div>
@if (!empty ($data))

     <table class="table table-light table-sm table-hover">
   <head >
     <tr class="fs-4">
       <td>Id</td>
       <td>Name</td>
       <td>Email</td>
       <td>Address</td>
       <td>Invoice No</td>
       <td>Gender</td>
       <td>Role</td>
       <td colspan="2" class="text-center">Action</td>
     </tr>
   </head>
   <tbody>
     @foreach ($data as $item)
         <tr>
           <td>{{$item->id}}</td>
            <td><a href="{{route('admin.users.show',['id'=>$item->id])}}">
            {{$item->name}}
            </a></td>
            <td>{{$item->email}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->invoices->count()}}</td>
            <td>{{$item->gender ==config('comom.user.gender.male')?"nam":"nữ"}}</td>
            <td>{{$item->role==config('common.user.role.user')?"User":"Admin"}}</td>
           <td>
                            <a
                                class="btn btn-primary"
                                href="{{ route('admin.users.edit', [ 'id' => $item->id ]) }}">
                                Update
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $item->id }}">Delete</button>

                            <div class="modal fade" id="confirm_delete_{{ $item->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class=" btn btn-danger" >
                                        Xác nhận xóa bản ghi này?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                        <form method="POST" action="{{ route('admin.users.delete', [ 'id' => $item->id ]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </td>
         </tr>
     @endforeach
   </tbody>
</table>
@else
    <h2>không có dữ liệu</h2>
@endif
</div>
@endsection
@push('script')
      <script>
        $("#form_create").on('submit',function (event){
          event.prevenDefault();
          const url="{{ route('admin.users.store') }}"
          let name=$("#form_create input[name='name']").val();
          let email=$("#form_create input[name='email']").val();
          let address=$("#form_create input[name='address']").val();
          let gender=$("#form_create select[name='gender']").val();
          let role=$("#form_create select[name='role']").val();
          let _token=$("#form_create input[name='_token']").val();
          const data={
                 _token,
                 name,
                 email,
                 address,
                 gender,
                 role,
               };
               console.log(data);
               fetch(url,{
                 method:' POST',
                 body:JSON.stringify(data),
                 headers:{
                   "X-CSRF_Token":_token,
                   "conten-Type":"application/json",
                   "X-Requested-With":"XMLHttpRequest",
                 },
               })
               .then(response=>response.json())
               .then(data=>{
                 console.log(data);
                 if(data.status==200){
                   window.location.reload();
                 }
               })

        })
      </script>
@endpush
