@extends('layoutcart')

@section('content')
    <div class="container">
        <h2>Your Cart</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($carts->isEmpty())
            <div class="alert alert-warning">
                Your cart is empty!
            </div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <td>{{ $cart->product->name }}</td>
                            <td>${{ $cart->product->price }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>${{ $cart->product->price * $cart->quantity }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ">Xóa</button>
                                </form>

                            </td>
                            <td>
                                <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group">
                                        <input type="number" name="quantity" class="from-update" 
                                            value="{{ $cart->quantity }}" min="1"
                                            max="{{ $cart->product->quantity }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary" >Cập nhật</button>
                                        </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td>${{ $total }}</td>

                    </tr>

                </tbody>
            </table>
            <a href="#" class="btn btn-primary">Checkout</a>
        @endif
    </div>
@endsection
