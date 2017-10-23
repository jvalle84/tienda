<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class CartController extends Controller
{
	public function __construct()
	{
		if(!\Session::has('cart')) \Session::put('cart', array());
	}

    // Show cart
    public function show()
    {
    	$cart = \Session::get('cart');
    	//$total = $this->total();
        $total = $this->subtotal();
    	return view('store.cart', compact('cart', 'total'));
    }

    // Add item
    public function add(Product $product)
    {
    	$cart = \Session::get('cart');

        // Si ya existe en el carrito entonces regresa a la vista de carrito sin hacer nada
        //if (isset($cart[$product->slug]))
        if (isset($cart[$product->id]))
            return redirect()->route('cart-show');

    	$product->quantity = 1;
    	//$cart[$product->slug] = $product;
        $cart[$product->id] = $product;
    	\Session::put('cart', $cart);

    	return redirect()->route('cart-show');
    }

    // Delete item
    public function delete(Product $product)
    {
    	$cart = \Session::get('cart');
    	//unset($cart[$product->slug]);
        unset($cart[$product->id]);
    	\Session::put('cart', $cart);

    	return redirect()->route('cart-show');
    }

    // Update item
    public function update(Product $product, $quantity)
    {
    	$cart = \Session::get('cart');
    	//$cart[$product->slug]->quantity = $quantity;
        $cart[$product->id]->quantity = $quantity;
    	\Session::put('cart', $cart);

    	return redirect()->route('cart-show');
    }

    // Trash cart
    public function trash()
    {
    	\Session::forget('cart');

    	return redirect()->route('cart-show');
    }

    // Total
    //private function total()
    // Subtotal
    private function subtotal()
    {
    	$cart = \Session::get('cart');
    	$total = 0;
    	foreach($cart as $item){
    		$total += $item->price * $item->quantity;
    	}

    	return $total;
    }

    // Detalle del pedido
    public function orderDetail()
    {
        if(count(\Session::get('cart')) <= 0) return redirect()->route('home');
        $cart = \Session::get('cart');
        //$total = $this->total();
        $subtotal = $this->subtotal();

        //$envio = \Session::get('envio');
        $envio = 0;
        \Session::put('envio', $envio);
        $total = $subtotal+$envio;
        //dd($subtotal,$envio,$total,$cart);

        return view('store.order-detail', compact('cart', 'subtotal','envio','total'));
    }
}
