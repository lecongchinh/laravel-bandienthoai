@extends('client.layout')

@section('title', 'Cart')

@section('content')
<section class="cart-section spad" id="cart-products">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="showProducts">
                    <div class="cart-table">
                        <h3>Your Cart</h3>
                        @if($products == null)
                            <div>
                                <p>Empty product in cart!</p>
                            </div>
                        @else
                            <div class="cart-table-warp">
                                <table>
                                <thead>
                                    <tr>
                                        <th class="product-th">Product</th>
                                        <th class="quy-th">Quantity</th>
                                        <th class="total-th">Price</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td class="product-col">
                                                <img src="/images/cart/2.jpg" alt="">
                                                <div class="pc-title">
                                                    <h4>{{$product[0][0]->name}}</h4>
                                                    <p>${{$product[0][0]->price}}</p>
                                                </div>
                                            </td>
                                            <td class="quy-col">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <span class="dec qtybtn" data-id="{{$product[0][0]->id}}">-</span>
                                                        <input disabled type="text" value="{{$product['quantity']}}">
                                                        <span class="inc qtybtn" data-id="{{$product[0][0]->id}}">+</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total-col"><h4 class="total-price">${{$product[0][0]->price*$product['quantity']}}</h4></td>
                                            <td style="text-align:center"><button onclick="deleteProductInCart({{$product[0][0]->id}})" class="btn btn-danger flaticon-remove"></button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div class="total-cost">
                                <h6>Total <span>${{$totalPrice}}</span></h6>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 card-right">
                <a href="/checkout" class="site-btn">Proceed to checkout</a>
                <a href="/" class="site-btn sb-dark">Continue shopping</a>
            </div>
        </div>
    </div>
</section>
@endsection