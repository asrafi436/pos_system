<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = Session::get('cart', []);

        $productId = $request->id;
        $productName = $request->name;
        $productPrice = $request->price;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => 1
            ];
        }

        Session::put('cart', $cart);

        return response()->json(['cart' => $cart]);
    }

    public function updateCart(Request $request)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$request->id])) {
            if ($request->action === 'increase') {
                $cart[$request->id]['quantity'] += 1;
            } elseif ($request->action === 'decrease') {
                $cart[$request->id]['quantity'] -= 1;
                if ($cart[$request->id]['quantity'] <= 0) {
                    unset($cart[$request->id]);
                }
            }
        }

        Session::put('cart', $cart);

        return response()->json(['cart' => $cart]);
    }

    public function removeFromCart(Request $request)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
        }

        Session::put('cart', $cart);

        return response()->json(['cart' => $cart]);
    }

    public function clearCart()
    {
        Session::forget('cart');
        return response()->json(['success' => true]);
    }

    public function getCartData()
    {
        return response()->json(['cart' => Session::get('cart', [])]);
    }
}
