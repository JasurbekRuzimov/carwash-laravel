<?php

namespace App\Http\Controllers;

use App\Models\Moyka;
use App\Models\Order;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $moykas = Moyka::all()->sortBy('id');
        return view('welcome', compact('moykas'));
    }

    public function showNavbat($moyka_id)
    {
        $moyka = Moyka::find($moyka_id);
        $orders = Order::all()->where('moyka_id', $moyka_id)->where('from', '>', now())->sortBy('from');
        return view('order.index', compact('moyka', 'orders'));
    }

    public function createOrder($moyka_id)
    {
        $moyka = Moyka::find($moyka_id);
        return view('order.create', compact('moyka'));
    }

    public function storeOrder(Request $request, $moyka_id)
    {
        $order = new Order();
        $order->moyka_id = $moyka_id;
        $order->user_id = auth()->user()->id;
        $order->from = $request->from;
        $order->to = $request->to;
        $order->save();
        return redirect()->route('site.showNavbat', $moyka_id);
    }

    public function destroyOrder($order_id)
    {

        $order = Order::find($order_id);
        $moyka_id = $order->moyka_id;
        $order->delete();
        return redirect()->route('site.showNavbat', $moyka_id);
    }


}
