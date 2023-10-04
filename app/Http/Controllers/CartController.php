<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Relations\HasOne;


class CartController extends Controller
{
    
    public function sendOrder(Request $request) 
    {
        $order = new order;
        $order->user_id = $request->user()->id;

        $reqquantity = $request->input('quantity'); //returns arrays
        $reqproductname = $request->input('name');
        $reqproductprice = $request->input('price');

        $orderstr='';
        $totalprice=0;
        // adds name and quantity to order string
        // sums up the total price for the order
        for ($i = 0; $i <= count($reqquantity)-1; $i++) {
            if ($reqquantity[$i] != NULL) {
                $orderstr .= $reqproductname[$i];
                $orderstr .= ', '.$reqquantity[$i].';';
                $totalprice += ($reqproductprice[$i] * $reqquantity[$i]);
            }
        }

        // write into db
        $order->order = $orderstr;
        $order->total = $totalprice;
        $order->orderDate = $request->input('bestellungsdatum');
        $order->save();
        
        return redirect()->route('cart.confirmation');

    }

    public function cartList(): View
    {
        return view('dashboard', [
            'orders' => Order::with('user')->latest()->get(),
        ]);
    }

    public function latestOrder(): View
    {
        return view('confirmation', [
            'orders' => Order::with('user')->latest()->limit(1)->get(),
        ]);
    }

}
