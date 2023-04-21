<?php
namespace App;
class Cart{
       public $products = null;
       public $tonggia = 0;
       public $tongsoluong = 0;

      public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->tonggia = $cart->tonggia;
            $this->tongsoluong = $cart->tongsoluong;
        }
      }

      public function AddCart($product , $id){
        $newProduct = ['soluong'=>0,'price'=>$product->price_buy, 'productinfo'=>$product];
         if($this->products){
               if(array_key_exists($id,$this->products)){
                $newProduct = $this->products[$id];
               }
         }
         $newProduct['soluong']++;
         $newProduct['price'] =  $newProduct['soluong'] * $product->price_buy;
         $this->products[$id] = $newProduct;
         $this->tonggia+=  $product->price_buy;
         $this->tongsoluong++;

      }

      public function deleteCart($id){
        $this->tongsoluong -= $this->products[$id]['soluong'];
        $this->tonggia -= $this->products[$id]['price'];
        uset($this->products[$id]);
      }

}
?>