
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian">
							<!--category-productsr-->@foreach ($categories as $item)
					     	<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">

													<a href="{{route('frontend.cate-pro',['id'=>$item->id])}}">{{$item->name}}</a>


									</h4>
								</div>
							</div>	@endforeach
						</div>
						<!--/category-products-->
					</div>
				</div>
