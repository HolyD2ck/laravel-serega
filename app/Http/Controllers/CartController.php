<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cameras;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Cameras::find($id);

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->Модель,
                'quantity' => 1,
                'price' => $product->Цена,
                'photo' => $product->Фото,
            ];
        }

        session()->put('cart', $cart);


        $shopUrl = session()->get('shop_url', '/');
        return redirect($shopUrl)->with('success', 'Товар добавлен в корзину!');
    }
    public function removeFromCart(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            } else {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Товар удален из корзины!');
    }


    public function showCheckoutForm(Request $request)
    {
        if (!session()->has('cart') || empty(session()->get('cart'))) {
            return redirect()->back()->with('error', 'Ваша корзина пуста!');
        }

        $cart = session()->get('cart');
        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        return view('checkout', compact('cart', 'total'));
    }


}
