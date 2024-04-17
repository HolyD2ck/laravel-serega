<?php

namespace App\Http\Controllers;

use App\Models\OrdersModel;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = OrdersModel::with('cameras', 'videocameras', 'accessories')->get();

        return view('orders.index', compact('orders'));
    }
}