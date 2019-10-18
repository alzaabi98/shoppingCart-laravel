<?php

namespace App;

class Cart
{
    public $items = [];
    public $totalQty ;
    public $totalPrice;

    public function __Construct($cart = null) {
        if($cart) {
            
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        } else {
            
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }

    public function add($product) {
        $item = [
            'title' => $product->title,
            'price' => $product->price,
            'qty' => 0,
            'image' => $product->image,
        ];

        if( !array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = $item ;
            $this->totalQty +=1;
            $this->totalPrice += $product->price; 
            
        } else {
            
            $this->totalQty +=1 ;
            $this->totalPrice += $product->price; 
        }
        
        $this->items[$product->id]['qty']  += 1 ;
        
    }


}
