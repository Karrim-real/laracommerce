            <!-- Begin Product Area -->
            <div class="product-area pt-60 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a></li>
                   </ul>
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach ($products as $product )

                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ url('single-product/'.$product->id.'/'.$product->name ) }}">
                                                    <img class="img-product" src="{{ asset('uploads/products/images/'.$product->image)}} " alt="{{ $product->name }}">
                                                    {{-- {{ asset('uploads/products/images/'.$items->image)}} --}}
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="{{ url('category/'.$product->categorys->id.'/'.$product->categorys->name ) }}">{{ $product->categorys->name  }}</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="{{ url('single-product/'.$product->id.'/'.$product->name  ) }}"> {{ $product->name }}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">${{ number_format($product->selling_price, 2) }}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="{{ url('single-product/'.$product->id.'/'.$product->name  ) }}">Add to cart</a></li>
                                                        <li><a class="links-details" href="{{ url('wishlist/'.$product->id.'/'.$product->name  ) }}"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- single-product-wrap end -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <!-- Begin Li's Static Banner Area -->
            <div class="li-static-banner">
                <div class="container">
                    <div class="row">
                        <!-- Begin Single Banner Area -->
                        @foreach ($catid as $ID)

                        <div class="col-lg-4 col-md-4 text-center">
                            <div class="single-banner">
                                <a href="{{ url('category/'.$ID->id.'/'.$ID->name) }}">
                                    <img src="{{ asset('frontend/assets/images/banner/1_3.jpg')}}" alt="Li's Static Banner">
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <!-- Single Banner Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Li's Static Banner Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-60 pb-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Laptop</span>
                                </h2>

                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach ($products as $prods )

                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ url('single-product/'.$prods->id.'/'.$prods->name) }}">
                                                    <img class="img-product" src="{{ asset('uploads/products/images/'. $prods->image)}}" alt="{{ $prods->name }}">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="{{ url('category/'.$prods->cat_id.'/'.$prods->categorys->name) }}">{{ $prods->categorys->name }}</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="{{ url('single-product/'.$prods->id.'/'.$prods->name) }}">{{ $prods->name }}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">$ {{ number_format($prods->discount_price, 2) }}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="{{ url('single-product/'.$prods->id.'/'.$prods->name) }}">Add to cart</a></li>
                                                        <li><a class="links-details" href="{{ url('wishlist/'.$prods->id.'/'.$prods->name) }}"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="{{ url('single-product/'.$prods->id.'/'.$prods->name) }}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Li's Laptop Product Area End Here -->

