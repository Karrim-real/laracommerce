<!-- Begin Header Middle Right Area -->
<div class="header-middle-right">
    <ul class="hm-menu">
        <!-- Begin Header Middle Wishlist Area -->
        <li class="hm-wishlist">
            <a href="wishlist.html">
                <span class="cart-item-count wishlist-item-count">0</span>
                <i class="fa fa-heart-o"></i>
            </a>
        </li>
        <!-- Header Middle Wishlist Area End Here -->
        <!-- Begin Header Mini Cart Area -->
        <li class="hm-minicart">
            <div class="hm-minicart-trigger">
                <span class="item-icon"></span>
                <span class="item-text">£80.00

                    <span class="cart-item-count">2</span>
                </span>
            </div>
            <span></span>
            <div class="minicart">
                <ul class="minicart-product-list">
                    <li>
                        <a href="single-product.html" class="minicart-product-image">
                            <img src="{{ asset('frontend/assets/images/product/small-size/5.jpg') }}" alt="cart products">
                        </a>
                        <div class="minicart-product-details">
                            <h6><a href="single-product.html">Aenean eu tristique</a></h6>
                            <span>£40 x 1</span>
                        </div>
                        <button class="close" title="Remove">
                            <i class="fa fa-close"></i>
                        </button>
                    </li>
                    <li>
                        <a href="single-product.html" class="minicart-product-image">
                            <img src="{{ asset('frontend/assets/images/product/small-size/6.jpg')}}" alt="cart products">
                        </a>
                        <div class="minicart-product-details">
                            <h6><a href="single-product.html">Aenean eu tristique</a></h6>
                            <span>£40 x 1</span>
                        </div>
                        <button class="close" title="Remove">
                            <i class="fa fa-close"></i>
                        </button>
                    </li>
                </ul>
                <p class="minicart-total">SUBTOTAL: <span>£80.00</span></p>
                <div class="minicart-button">
                    <a href="{{ url('cart') }}" class="li-button li-button-fullwidth li-button-dark">
                        <span>View Full Cart</span>
                    </a>
                    <a href="{{ url('checkout') }}" class="li-button li-button-fullwidth">
                        <span>Checkout</span>
                    </a>
                </div>
            </div>
        </li>
        <!-- Header Mini Cart Area End Here -->
