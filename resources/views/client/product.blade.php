@extends('client.layout')

@section('title', 'Sản phẩm')

@section('content')
<section class="product-section">
    <div class="container">
        <div class="back-link">
            <a href="/"> &lt;&lt; Quay về trang chủ</a>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="product-pic-zoom">
                    <img class="product-big-img" src="/images/single-product/1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 product-details">
                <h2 class="p-title">White peplum top</h2>
                <h3 class="p-price">$39.90</h3>
                <h4 class="p-stock">Available: <span>In Stock</span></h4>
                <div class="quantity">
                    <p>Quantity</p>
                    <div class="pro-qty">
                        <span class="dec qtybtn" data-id="">-</span>
                        <input disabled type="text" value="1">
                        <span class="inc qtybtn" data-id="">+</span>
                    </div>
                </div>
                <a href="#" class="site-btn">SHOP NOW</a>
                <div id="accordion" class="accordion-area">
                    <div class="panel">
                        <div class="panel-header" id="headingOne">
                            <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
                        </div>
                        <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                                <p>Approx length 66cm/26" (Based on a UK size 8 sample)</p>
                                <p>Mixed fibres</p>
                                <p>The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5'8"</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-header" id="headingTwo">
                            <button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">comments </button>
                        </div>
                        <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection