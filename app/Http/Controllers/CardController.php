<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Card;

class CardController extends Controller
{
    public function addToCard(Product $product)
    {
        if(session() -> has('card'))
        {
            $card = new Card(session() -> get('card'));
        } else
        {
            $card = new Card();
        }
        $card -> add($product);
        // dd($card);
        session() -> put('card', $card);
        notify() -> success('Product added to card!');
        return redirect() -> back();
    }

    public function showCard()
    {
        if(session() -> has('card'))
        {
            $card = new Card(session() -> get('card'));
        } else
        {
            $card = null;
        }
        return view('card', compact('card'));
    }
}
