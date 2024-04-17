<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cameras;
use Illuminate\Support\Facades\Auth;
use App\Models\Accessories;
use App\Models\Videocameras;
use App\Models\OrdersModel;

class CartController extends Controller
{
    public function addToCart(Request $request, $type, $id)
    {
        $previousUrl = url()->previous();

        if ($type == 'camera') {
            $product = Cameras::find($id);
            $name = $product->Модель;
        } elseif ($type == 'videocamera') {
            $product = Videocameras::find($id);
            $name = $product->Модель;
        } elseif ($type == 'accessory') {
            $product = Accessories::find($id);
            $name = $product->Название;
        } else {
            abort(404);
        }


        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $name,
                'quantity' => 1,
                'price' => $product->Цена,
                'photo' => $product->Фото,
                'type' => $type,
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
    public function submitCheckoutForm(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'card_number' => 'required',
            'csv' => 'required',
        ]);

        $cart = session()->get('cart');

        $order = new OrdersModel;
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->card_number = $request->card_number;
        $order->csv = $request->csv;
        $order->total_price = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        $order->save();

        foreach ($cart as $id => $details) {
            $type = $details['type'];
            if ($type == 'camera') {
                $product = Cameras::find($id);
                $order->cameras()->attach($product, ['quantity' => $details['quantity']]);
            } elseif ($type == 'videocamera') {
                $product = Videocameras::find($id);
                $order->videocameras()->attach($product, ['quantity' => $details['quantity']]);
            } else {
                $product = Accessories::find($id);
                $order->accessories()->attach($product, ['quantity' => $details['quantity']]);
            }
        }


        session()->forget('cart');

        return redirect()->route('cart')->with('success', 'Заказ Успешно Оформлен!');
    }



}
