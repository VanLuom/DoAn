<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $quantity = request()->input('quantity', 1);
        $product = Product::find($id);

        $cart = Order::where('user_id', auth()->user()->id)
            ->where('product_id', $id)
            ->first();

        if ($cart) {
            $cart->increment('quantity', $quantity);
        } else {
            Order::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'quantity' => $quantity,

            ]);
        }

        return redirect()->route('cart')->with('success', 'Product added to cart successfully!');
    }

    public function showCart()
    {
        $carts = Order::where('user_id', auth()->user()->id)->get();
        $total = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });

        return view('cart.index', compact('carts', 'total'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $cart = Order::findOrFail($id);
        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->route('cart')->with('success', 'Cập nhật giỏ hàng thành công');
    }

    public function destroy($id)
    {
        $cart = Order::findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }
}
