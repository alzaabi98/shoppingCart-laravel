@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        @if($cart)
        <div class="col-md-8">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            @foreach( $cart->items as $product)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $product['title'] }}
                    </h5>
                    <div class="card-text">
                        ${{ $product['price'] }}


                        <form action="{{ route('product.update',$product['id'])}}" method="post">
                            @csrf
                            @method('put')
                            <input type="text" name="qty" id="qty" value={{ $product['qty']}}>
                            <button type="submit" class="btn btn-secondary btn-sm">Change</button>

                        </form>

                        <form action="{{ route('product.remove', $product['id'] )}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm ml-4 float-right" style="margin-top: -30px;">Remove</button>


                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            <p><strong>Total : ${{$cart->totalPrice}}</strong></p>

        </div>

        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h3 class="card-titel">
                        Your Cart
                        <hr>
                    </h3>
                    <div class="card-text">
                        <p>
                            Total Amount is ${{$cart->totalPrice}}
                        </p>
                        <p>
                            Total Quantities is {{$cart->totalQty}}
                        </p>
                        <a href="{{ route('cart.checkout', $cart->totalPrice)}}" class="btn btn-info">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <p>There are no items in the cart</p>

        @endif
    </div>
</div>

@endsection