@include('layouts.frontend.heads')
@include('layouts.frontend.navs')

@if(session('status'))
<script>
    swal({
        title: 'Oops!, Product Removed',
        text: '{{ session('status') }}',
        icon: 'success'
      });
</script>
@endif
<!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="active"><a href="{{ url('cart') }}">Shopping Cart </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Shopping Cart Area Strat-->
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                    @if (!count($carts))
                    <div class="empty col-md-6">
                        <div class="alert alert-info">
                            <h5 class="text-center">Cart is empty</h5>
                        </div>
                    </div>

                    @else


                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th class="li-product-thumbnail">images</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="li-product-price">Unit Price</th>
                                                <th class="li-product-quantity">Quantity</th>
                                                <th class="li-product-subtotal">Total</th>
                                                <th class="li-product-remove">remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $total_price = 0;
                                            $total_qty = 0;
                                        @endphp
                                            @foreach ($carts as $cart_item)

                                            <tr>
                                                <td class="li-product-thumbnail"><a href="#"><img width="100px" height="100px" src="{{ asset('uploads/products/images/'.$cart_item->products->image)}}" alt="Li's Product Image"></a></td>
                                                <td class="li-product-name"><a href="{{ url('single-product/'.$cart_item->prod_id.'/'.$cart_item->products->name) }}">{{ $cart_item->products->name }}</a></td>
                                                <td class="li-product-price"><span class="amount"> ${{ $cart_item->products->selling_price }}</span></td>
                                                <td style="display: none" class="li-product-price"><input type="hidden" id="prod_id" value="{{ $cart_item->prod_id }}"></td>
                                                <td class="quantity">
                                                    <label>Quantity</label>
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" id="prod_qty" value="{{ $cart_item->prod_qty }}" type="text">
                                                        <div class="dec qtybutton qtybuttonDecr"><i class="fa fa-angle-down"></i></div>
                                                        <div class="inc qtybutton qtybuttonInc"><i class="fa fa-angle-up"></i></div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span class="amount">${{ $cart_item->products->selling_price * $cart_item->prod_qty }}</span></td>
                                                <td class="li-product-remove" >
                                                   <a href="{{ url('cart-remove/'.$cart_item->prod_id.'/'.$cart_item->products->name) }}">
                                                    <button class="btn btn-danger"><i class="fa fa-trash"></i>
                                                    </a>
                                                    </button>
                                                </td>
                                    @php
                                        $total_qty += $cart_item->prod_qty;
                                        $total_price += $cart_item->products->selling_price * $cart_item->prod_qty;

                                        @endphp
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                                <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                            </div>
                                            <div class="coupon2">
                                                <input class="button" id="update-cart" name="update_cart" value="Update cart" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Cart totals</h2>
                                            <ul>
                                                <li>Total Products Quantity <span>{{ $total_qty }}</span></li>
                                                <li>Total <span>${{ number_format($total_price, 2) }}</span></li>
                                            </ul>
                                            <a href="{{ url('checkout') }}">Proceed to checkout</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
@include('layouts.frontend.footer')

