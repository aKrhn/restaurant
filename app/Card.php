<?php
namespace App;

class Card
{
  public $items = [];
  public $totalQuantity;
  public $totalPrice;

  public function __construct($card = null)
  {
  if($card)
  {
    $this -> items = $card -> items;
    $this -> totalQuantity = $card -> totalQuantity;
    $this -> totalPrice = $card -> totalPrice;
  } else
  {
    $this -> items = [];
    $this -> totalQuantity = 0;
    $this -> totalPrice = 0;
  }
  }

  public function add($product)
  {
  $item =
  [
    'id' => $product -> id,
    'name' => $product -> name,
    'price' => $product -> price,
    'quantity' => 0,
    'image' => $product -> image,
  ];

  if(!array_key_exists($product -> id, $this -> items))
  {
    $this -> items[$product -> id] = $item;
    $this -> totalQuantity += 1;
    $this -> totalPrice += $product -> price;
  } else
  {
    $this -> totalQuantity += 1;
    $this -> totalPrice += $product -> price;
  }
    $this -> items[$product -> id]['quantity'] += 1;
  }

  public function updateQuantity($id, $quantity)
  {
    $this -> totalQuantity -= $this -> items[$id]['quantity'];
    $this -> totalPrice -= $this -> items[$id]['price'] * $this -> items[$id]['quantity'];
    $this -> totalQuantity += $quantity;
    $this -> totalPrice += $this -> items[$id]['price'] * $quantity;
  }

  public function destroy($id)
  {
    if(array_key_exists($id, $this -> items))
    {
        $this -> totalQuantity -= $this -> items[$id]['quantity'];
        $this -> totalPrice -= $this -> items[$id]['quantity'] * $this -> items[$id]['price'];
        unset($this -> items[$id]);
    }
  }

}

?>
