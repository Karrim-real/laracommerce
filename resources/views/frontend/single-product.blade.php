@include('layouts.frontend.heads')
@include('layouts.frontend.navs')
@if(session('response.status'))
<script>
    swal({
        title: 'Good Job',
        text: '{{ session('response.status') }}',
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
                            <li><a href="{{ url('category/'.$single_Prod->cat_id.'/'.$single_Prod->categorys->name ) }}">Home{{ $single_Prod->categorys->name }}</a></li>
                            <li class="active">{{ $single_Prod->name }}</li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- content-wraper start -->
            <div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="{{  $single_Prod->id }}" data-gall="myGallery">
                                            <img  src="{{ asset('uploads/products/images/'.$single_Prod->image)}}" alt="product image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                    <h2>{{ $single_Prod->name }}</h2>
                                    <span class="product-details-ref">Category: {{ $single_Prod->categorys->name }}</span>
                                    <div class="rating-box pt-20">
                                        <ul class="rating rating-with-review-item">
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>

                                        </ul>
                                    </div>
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2">$ {{ number_format($single_Prod->selling_price, 2) }}</span>
                                    </div>
                                    <div class="product-desc">
                                        <p>
                                            <span> {{ $single_Prod->small_desc }}
                                            </span>
                                        </p>
                                    </div>

                                    <div class="single-add-to-cart">
                                        <form action="" class="cart-quantity">

                                            <div class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" id="prod_qty" value="1" type="text">
                                                    <div class="dec qtybutton qtybuttonDecr"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton qtybuttonInc"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="prod_id" value="{{  $single_Prod->id }}">
                                            <button class="add-to-cart" id="add-to-cart" type="submit">Add to cart</button>
                                        </form>
                                        {{-- <button class="add-to-cart" id="add-to-cart" type="submit">Add to cart</button> --}}
                                    </div>
                                    <div class="product-additional-info pt-25">
                                        <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>

                                    </div>
                                    <div class="block-reassurance">
                                        <ul>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </div>
                                                    <p>Security policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-truck"></i>
                                                    </div>
                                                    <p>Delivery policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-exchange"></i>
                                                    </div>
                                                    <p> Return policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            <!-- Begin Product Area -->
            <div class="product-area pt-35">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a></li>
                                </ul>
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <span>{{ $single_Prod->prod_desc }}</span>
                            </div>
                        </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            @include('frontend.favouritesingleproduct')

            <!-- Li's Laptop Product Area End Here -->
            @include('layouts.frontend.footer')

        <script>

        </script>
