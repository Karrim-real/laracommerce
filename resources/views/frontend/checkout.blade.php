@include('layouts.frontend.heads')
@include('layouts.frontend.navs')
<!-- Li's Breadcrumb Area End Here -->
            <!--Checkout Area Strat-->
            <div class="checkout-area pt-60 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-accordion">
                                @include('layouts.frontend.error')
                                <!--Accordion Start-->
                                @if (Auth::user()->exists())
                                <a href="{{ url('profile/'.Auth::user()->id) }}"><h3>Welcome Back  <span id="showlogin" class="fa fa-user">{{ Auth::user()->name }}</span> </h3>
                                </a>
                                @else
                                <a href="{{ url('login') }}"><h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                                </a>
                                @endif
                                <!--Accordion End-->
                                <!--Accordion Start-->

                                <!--Accordion End-->
                            </div>
                        </div>
                    </div>

                    @if (!count($cart_items))
                    <div class="empty col-md-10">
                        <div class="alert alert-warning">
                            <h5 class="text-center">Checkout is empty, please add products to cart. </h5>
                        </div>
                    </div>
                    @else

                    <div class="row">

                        @if (!count($address))
                        @foreach ($address as $adres)

                       
                        @endforeach
                        @endif
                        <div class="col-lg-6 col-12">
                            <form action="{{ url('place-order')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="checkbox-form">
                                    <h3>Billing Details</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="country-select clearfix">
                                                <label>Country <span class="required">*</span></label>
                                                <select class="nice-select wide" name="country">
                                                  <option data-display="Nigeria">Nigeria</option>
                                                  <option value="uk">London</option>
                                                  <option value="rou">Romania</option>
                                                  <option value="fr">French</option>
                                                  <option value="de">Germany</option>
                                                  <option value="aus">Australia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input placeholder="" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>First Name <span class="required">*</span></label>
                                                <input placeholder="" type="text" name="firstname" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input placeholder="" type="text" name="lastname" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Company Name</label>
                                                <input placeholder="" type="text" name="company">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Address <span class="required">*</span></label>
                                                <input placeholder="Street address" type="text" name="street">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Town / City <span class="required">*</span></label>
                                                <input type="text" name="city" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>State / County <span class="required">*</span></label>
                                                <input placeholder="" type="text" name="state" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Local Government <span class="required">*</span></label>
                                                <input placeholder="" type="text" name="local" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Email Address <span class="required">*</span></label>
                                                <input placeholder="e.g info@gmail.com" type="email" name="email" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Phone  <span class="required">*</span></label>
                                                <input type="text" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-12">


                                        </div>
                                    </div>
                                    <div class="different-address">
                                        <div class="ship-different-title">
                                            <h3>
                                                <label>Ship to a different address?</label>
                                                <input id="ship-box" type="checkbox">
                                            </h3>
                                        </div>
                                        <div class="order-notes">
                                            <div class="checkout-form-list">
                                                <label>Order Notes</label>
                                                <textarea id="checkout-mess" name="message" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_qty = 0;
                                                $total_price = 0;
                                            @endphp
                                            @foreach ($cart_items as $items)


                                            <tr class="cart_item">
                                              <td class="cart-product-name"> <a href="{{ url('single-product/'.$items->prod_id.'/'.$items->products->name) }}">{{ $items->products->name }}<strong class="product-quantity"> × {{ $items->prod_qty }}</strong> </a> </td>
                                              <td class="cart-product-total"><span class="amount">${{ number_format($items->products->selling_price, 2) }}</span></td>
                                            </tr>
                                            @php
                                            $total_qty += $items->prod_qty;
                                            $total_price += $items->products->selling_price * $items->prod_qty;
                                            @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Product Quantity</th>
                                                <td><span class="amount">{{ $total_qty }}</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total Amount</th>
                                                <input type="hidden" id="currency" name="currency" value="NGN">
                                                <input type="hidden" name="amount" value="{{ $total_price * 100}}">
                                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                                                <td><strong><span class="amount">${{number_format( $total_price, 2) }}</span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion">
                                          <div class="card">
                                            <div class="card-header" id="#payment-1">
                                              <h5 class="panel-title">
                                                <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Direct Bank Transfer.
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="card">
                                            <div class="card-header" id="#payment-2">
                                              <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Cheque Payment
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="card">
                                            <div class="card-header" id="#payment-3">
                                              <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  PayPal
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="order-button-payment">
                                            {{-- <button type="submit" class="btn btn-info">Place Order</button> --}}
                                            <input value="Place order"  id="place-order" type="submit" name="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    @endif
                </div>
            </div>
            <!--Checkout Area End-->
            <!-- Begin Footer Area -->
            @include('layouts.frontend.footer')
