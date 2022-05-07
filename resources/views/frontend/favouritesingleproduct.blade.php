<section class="product-area li-laptop-product pt-30 pb-50">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>15 other products in the same category:</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">

                        @foreach ($products as $items)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href=" {{ url('single-product/'.$items->id.'/'.$items->name) }} ">
                                        <img src="{{ asset('uploads/products/images/'.$items->image)}}" class="img-product"  alt="Li's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="{{ url('category/'.$items->categorys->id.'/'.$items->categorys->name) }} ">{{ $items->categorys->name }}</a>
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
                                        <h4><a class="product_name" href="{{ url('single-product/'.$items->id.'/'.$items->name) }}">{{ $items->name }}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">${{ number_format($items->selling_price, 2) }}</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="{{ url('single-product/'.$items->id.'/'.$items->name) }}">Add to cart</a></li>
                                            <li><a class="links-details" href="{{ url('wishlist/'.$items->id.'/'.$items->name) }} "><i class="fa fa-heart-o"></i></a></li>
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
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
