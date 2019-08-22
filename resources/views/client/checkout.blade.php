@extends('client.layout')

@section('title', 'Checkout')

@section('content')
<section class="checkout-section spad" id="checkout-products">
    <div class="container">
        <div class="showCheckoutProducts">
            <div class="showCheckout">
                @if($products == null)
                    <div>
                        <p>Empty product in cart!</p>
                    </div>
                @else
                    <div class="row">
                        <div class="col-lg-8 order-2 order-lg-1">
                            <form class="checkout-form">
                                <div class="cf-title">Billing Address</div>
                                <div class="row address-inputs">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fullname">Họ tên: </label>
                                            <input value="{{Auth::user()->name}}" disabled class="fullname" name="fullname" type="text">
                                        </div>
                                        <input hidden value="{{Auth::user()->email}}" class="email_val" name="email_val" type="text">
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input value="{{Auth::user()->email}}" disabled class="email" name="email" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại:</label>
                                            <input placeholder="Mời bạn nhập số điện thoại" class="phone" name="phone" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="note">Note:</label>
                                            <input placeholder="Note" class="note" name="note" type="text">
                                        </div>
                                        <ul class="address-filter-menu nav" role="tablist">
                                            <li><a class="tabShowAddressRegular active" data-toggle="tab" href="#address_regular">Địa chỉ thường dùng</a></li>
                                            <li><a class="tabShowAddressAnother" data-toggle="tab" href="#address_another">Chọn 1 địa chỉ khác</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="address_regular" class="tab-pane fade active show">
                                                @if(!Auth::user()->address)
                                                    <div>
                                                        <span><i style="color:red">Bạn chưa lưu địa chỉ thường dùng</i>, bạn cần vào <a href="/user/setting">Đây</a> để update địa chỉ của mình hoặc ấn vào tab "Chọn 1 địa chỉ khác" rồi điền thông tin địa chỉ ship để tiếp tục checkout</span>
                                                    </div>
                                                @else
                                                    <div class="form-group">
                                                        <label for="address">Address: </label>
                                                        <input  value="{{Auth::user()->address}}" disabled type="text" class="address" name="address">
                                                    </div>
                                                @endif
                                            </div>
                                            <div id="address_another" class="tab-pane fade">
                                                <input hidden disabled value="active" class="value_active" name="value_active" type="text">
                                                <div class="form-group">
                                                    <label for="Location">Location:</label>
                                                    <input disabled value="" class="location" name="location" type="text" placeholder="Location">
                                                </div>
                                                <div class="form-group">
                                                    <label for="province">Tỉnh/ Thành phố</label>
                                                    <select disabled id="province" class="form-control province" name="province">
                                                        <option value="">---Tỉnh/ Thành phố---</option>
                                                        @foreach($province as $province)
                                                            <option value="{{$province->provinceid}}">{{$province->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="district">Quận/ Huyện</label>
                                                    <select disabled id="district" class="form-control district" name="district">
                                                        <option value="">----------</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ward">Phường/ Xã</label>
                                                    <select disabled id="ward" class="form-control ward" name="ward">
                                                        <option value="">----------</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="village">Xóm/ Làng</label>
                                                    <select disabled id="village" class="form-control village" name="village">
                                                        <option>----------</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="site-btn submit-order-btn">Đặt hàng</button>
                            </form>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2">
                            <div class="checkout-cart">
                                <h3>Your Cart</h3>
                                <ul class="product-list">
                                    @foreach($products as $product)
                                        <li>
                                            <div class="pl-thumb"><img src="/images/cart/1.jpg" alt=""></div>
                                            <h6>{{$product[0][0]->name}}</h6>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>Giá: </td>
                                                        <td>${{$product[0][0]->price}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Số lượng: </td>
                                                        <td>{{$product['quantity']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tổng giá: </td>
                                                        <td>${{$product[0][0]->price*$product['quantity']}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="price-list">
                                    <li class="total">Total<span>${{$totalPrice}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection