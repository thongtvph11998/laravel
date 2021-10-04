@extends('frontend/layout')

@section('title')
		home page
@endsection
@section('contents-fe')
<div class="col-sm-9 padding-right">
	<div class="product-details">
			<h3 class="text-center text-primary ">Chi Tiết sản phẩm</h3> <br>
		<!--product-details-->
    @foreach ($product as $item)
		<div class="col-sm-5">
			<div class="view-product">
			<img src="{{asset('upload/'.$item->image)}}" alt="" height="250"/>
				<h3>ZOOM</h3>
			</div>
		</div>
		<div class="col-sm-7">
			<div class="product-information">

				<!--/product-information-->
				<h2>Tên sản phẩm :{{$item->name}}</h2>
					<label>Số lượng :{{$item->quantity}}</label><br>
				<p>Web ID: 1089772</p>
				<img src="frontend/images/product-details/rating.png" alt="" />
				<span>
					<span>Giá sản phẩm:{{$item->price}}$</span><br>

					<button type="button" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Add to cart
					</button>
				</span>
				<p><b>Availability:</b> In Stock</p>
				<p><b>Condition:</b> New</p>
				<p><b>Brand:</b> E-SHOPPER</p>
				<a href=""><img src="frontend/images/product-details/share.png" class="share img-responsive" alt="" /></a>
			</div>
			@endforeach
			<!--/product-information-->
		</div>


	</div>
	<!--/product-details-->
</div>
<div class="=col -sm-12 ">
	<h3 class="text-primary">Sản phẩm liên quan</h3>
	<div>
				@foreach ($cate_pro as $item)
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset('upload/'.$item->image)}}" alt="" height="290"/>
											<h2 class="">{{$item->name}}</h2>
											<p>{{$item->price}}$</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											<a href="{{route('frontend.pro-detail',['id'=>$item->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i></i>Detail</a>
										</div>
									</div>
								</div>
							</div>
						@endforeach
	</div>
</div>
@endsection
