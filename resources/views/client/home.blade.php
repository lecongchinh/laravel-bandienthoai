@extends('client.layout')

@section('title', 'Home')

@section('content')

<section class="product-filter-section">
	<div class="container">
		<div class="section-title">
			<h2>Sản phẩm</h2>
		</div>
		<ul class="product-filter-menu nav" role="tablist">
			<li><a class="tabShowHangsx active" data-toggle="tab" href="#allhangsx">Tất cả sản phẩm</a></li>
			@foreach($hangsxs as $hangsx)
				<li><a class="tabShowHangsx" data-toggle="tab" href="#hangsx{{$hangsx->id}}">{{$hangsx->name}}</a></li>
			@endforeach
		</ul>
		<div class="tab-content">
			<div id="allhangsx" class="tab-pane fade active show">
				<br>
				<div class="row">
					@foreach($hangsxs as $hangsx)
						@foreach($hangsx->sanphams as $sanpham)
							<div class="col-lg-3 col-sm-6">
								<div class="product-item">
									<div class="pi-pic">
										<a href="/sanpham/{{$sanpham->id}}"><img src="./images/product/5.jpg" alt=""></a>
										<div class="pi-links">
											<a href="#" class="add-card" data-id="{{$sanpham->id}}"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
										</div>
									</div>
									<div class="pi-text">
										<h6>${{$sanpham->price}}</h6>
										<p>{{$sanpham->name}} </p>
									</div>
								</div>
							</div>
						@endforeach
					@endforeach
				</div>
			</div>
			@foreach($hangsxs as $hangsx)
				<div id="hangsx{{$hangsx->id}}" class="tab-pane fade">
					@if(count($hangsx->sanphams) == 0) 
						<br>
						<div class="row">
							<span>Empty data!</span>
						</div>
					@else
						<br>
						<div class="row">
							@foreach($hangsx->sanphams as $sanpham)
								<div class="col-lg-3 col-sm-6">
									<form class="form-product-item" method="POST">
										@csrf
										<div class="product-item">
											<div class="pi-pic">
												<img src="./images/product/5.jpg" alt="">
												<div class="pi-links">
													<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
													<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
												</div>
											</div>
											<div class="pi-text">
												<h6>${{$sanpham->price}}</h6>
												<p>{{$sanpham->name}} </p>
											</div>
										</div>
									</form>
								</div>
							@endforeach
						</div>
					@endif
				</div>
			@endforeach
		</div>
	</div>
</section>
@endsection
