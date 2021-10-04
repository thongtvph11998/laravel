@extends('layout')
@section('title')
   Thông tin người dùng
@endsection
@section('contents')
<div class="m-5">
<div class="row mt-5 mb-5">
  <div class="col-12 row">
    <div class="col-6 d-inline-block">
      <label for="" class="col-3">Họ Tên:</label>
      <label for="" class="col-8">{{$user->name}}</label>
    </div>
    <div class="col-6 d-inline-block">
      <label for="" class="col-3">Email::</label>
      <label for="" class="col-8">{{$user->email}}</label>
    </div>
  </div>

  <div class="col-12">
  <p>Lich su mua hang</p>
  <table class="table table-stripped">
      <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Number</td>
          <td>Address</td>
          <td>Price</td>
          <td>Invoice Status</td>
          <td>Created At</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($user->invoices as $invoice)
            <tr>
              <td>{{$invoice->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$invoice->number}}</td>
              <td>{{$invoice->address}}</td>
              <td>{{$invoice->total_price}}</td>
              <td>{{$invoice->status}}</td>
              <td>{{$invoice->created_at}}</td>
            </tr>
        @endforeach
      </tbody>
  </table>
  </div>
</div>
</div>
@endsection
