<aside class="mini-cart" id="miniCart">
    <div class="mini-cart-wrapper">
        <div class="mini-cart__close">
            <a href="#" class="btn-close"><i class="la la-remove"></i></a>
        </div>
        <div class="mini-cart-inner">
            <h3 class="mini-cart__heading mb--45">Your Cart</h3>
            @if (Cart::count() > 0)
            <div class="mini-cart__content">
                @foreach ( Cart::content() as $item )
                <ul class="mini-cart__list">
                    <li class="mini-cart__product">
                        <a href="{{route('cart.remove', $item->rowId)}}" class="mini-cart__product-remove">
                            <i class="la la-remove"></i>
                        </a>
                        <div class="mini-cart__product-image">
                            <img src="{{Voyager::image($item->model->image)}}" alt="products">
                        </div>
                        <div class="mini-cart__product-content">
                            @if ($item->model->type == 4)
                            <a class="mini-cart__product-title"
                                href="{{route('product', $item->model->slug)}}">{{$item->name}}</a>
                            <span class="mini-cart__product-quantity">1000ml - SL:{{$item->qty}} x
                                {{number_format($item->price,0)}}₫</span>
                            @else
                            <a class="mini-cart__product-title"
                                href="{{route('product', $item->model->slug)}}">{{$item->name}}</a>
                            @if($item->options->size == "1")
                            <span class="mini-cart__product-quantity">250gr - SL:{{$item->qty}} x
                                {{number_format($item->price,0)}}₫</span>
                            @elseif($item->options->size == "2")
                            <span class="mini-cart__product-quantity">500gr - SL:{{$item->qty}} x
                                {{number_format($item->price,0)}}₫</span>
                            @else
                            <span class="mini-cart__product-quantity">1kg - SL:{{$item->qty}} x
                                {{number_format($item->price,0)}}₫</span>
                            @endif
                            @endif
                        </div>
                    </li>
                </ul>
                @endforeach

                <div class="mini-cart__total">
                    <span>Total: </span>
                    <span class="ammount">{{Cart::subtotal(0,'.',',')}}₫</span>
                </div>
                <div class="mini-cart__buttons">
                    <a href="{{route('cart.index')}}" class="btn btn-fullwidth btn-bg-primary mb--20">Cart Details</a>
                    <a href="{{route('checkout')}}" class="btn btn-fullwidth btn-bg-primary">Process Checkout</a>
                </div>
            </div>
            @else
            <div class="mini-cart__content">
                No products in the cart
            </div>
            @endif

        </div>
    </div>
</aside>