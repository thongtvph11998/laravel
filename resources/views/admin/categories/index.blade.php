@extends('layout')
@section('title')
    Quản lý Category
@endsection
@section('contents')
<div class="m-5">
  <div  class="row">
  <div class="col-6">
     <h2 class="text-center"> Quản trị User</h2>
    <a class="btn btn-success" href="{{ route('admin.categories.create') }}" >Thêm mới</a>
    <form class="d-flex m-2">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
</div>
@if (!empty ($data))
     <table class="table table-light table-sm table-hover ">
   <head>
     <tr  class="fs-4">
       <td>Id</td>
       <td>Name Category</td>

       <td colspan="2" class="text-center">Action</td>
     </tr>
   </head>
   <tbody>
     @foreach ($data as $item)
         <tr>
           <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td><button class="btn btn-primary">
              <a style="text-decoration: none"  class="text-white" href="{{route('admin.categories.edit',['id' => $item->id ])}} ">Update</a></button>
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

                                        <form method="POST" action="{{ route('admin.categories.delete', [ 'id' => $item->id ]) }}">
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
