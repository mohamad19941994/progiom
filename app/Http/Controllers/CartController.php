<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Notifications\NewReplyAdded;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $carts = Cart::paginate('10');
        return view('carts.index',compact('carts'));
    }


    public function create()
    {
        return view('carts.create');
    }


    public function store(Request $request)
    {

        $data = [];
        for ($i = 0; $i <= $request->cart_number; $i++) {
            $data[] = [
                'cart_number' => $request->cart_number,
                'price' => $request->price,
                'date' => $request->date,
            ];
        }

        $chunks = array_chunk($data, 500);
        //dd($chunks);
        foreach ($chunks as $chunk) {


            Cart::insert($chunk);
        }

        /*for ($i = 0; $i <= $request_data['cart_number']; $i++)
        Cart::create($request_data);*/
        //$request->notify(new NewReplyAdded($request));
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('carts.index');
    }


    public function show(Cart $cart)
    {
        //
    }


    public function edit(Cart $cart)
    {
        //
    }


    public function update(Request $request, Cart $cart)
    {
        //
    }


    public function destroy(Cart $cart)
    {
        //
    }

    public function home()
    {
        return view('welcome');
    }
}
