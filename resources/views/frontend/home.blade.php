@extends('frontend/layout')

@section('title')
		home page
@endsection
@section('contents-fe')
						<div class="col-sm-9 padding-right">
					<div class="features_items">
						<!--features_items-->
						<h2 class="title text-center">Home Page</h2>
						@foreach ($products as $item)
							<div class="col-sm-4">
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
					<!--features_items-->

				</div>
			</div>
		</div>
	</section>
@endsection





