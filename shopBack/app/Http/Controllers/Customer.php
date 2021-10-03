<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
class Customer extends Controller
{
    public function AddCart(Request $request)
    {  
       $cart = new Cart();
       $customerId        = $request->input("customerID");
       $productid         = $request->input('product_id');
       $productExist      = Cart::where("productId",$productid)
                                 ->where("customerId",$customerId)
                                 ->first();
                                  
       if($productExist)
       {
        return ["msg"=>"Product already in cart"];   
       }elseif($customerId=="" || $productid =="" ){
        return ["msg"=>"Submit empty data"];   
       }else
       {
           $cart ->customerId =$customerId;
           $cart ->productId =$productid;
           $cart ->quantity =1;
           $cart->save();
           return $cart;
       }

    }
    public function CartProduct($id){
        $cartProduct = DB::table("products")
                     ->join('carts','products.id','=','carts.productId')
                     ->select('products.*','carts.*')
                     ->where("carts.customerId",'=',$id)
                     ->get();
                     return $cartProduct;
    }
    public function updateCartValue(Request $request){
       $quantity  = $request->input('product_quantity');
       $productid = $request->input('product_id');
       $cartUpdate = Cart::where("productId",$productid)->first();
       $cartUpdate->quantity = $quantity;
       $cartUpdateValue = $cartUpdate->save();
       $quantity = Cart::where("productId","$productid")->first();
         return $quantity->quantity;
    }
    public function placeOrder($id)
    {
         $order = new Order();
         $CartItem = Cart::where("customerId",$id)->get();
         if($CartItem){
             foreach($CartItem as $orderItem){
               DB::table('orders')->insert([
                   'OrdercustomerId' =>$orderItem->customerId,
                   'OrderproductId' => $orderItem->productId,
                   'Orderquantity' => $orderItem->quantity
               ]);
            }
            DB::table('carts')->where('customerId',$id)->delete();
         }
       
    }
    public function delteFromCart(Request $request)
    {
        $productId =$request->input("productId");
        $customerId =$request->input("customerDelId");
       $del = DB::table('carts')
       ->where('customerId',$customerId)
       ->where('productId',$productId)
       ->delete();
       return $del;
    }
    public function Single_Order(Request $request)
    {   
        $customerId =$request->input("customerId");
        $productId =$request->input("productId");
        $quantity =$request->input("quantity");
         
        $productExist      = Order::where("OrderproductId",$productId)
                                 ->where("OrdercustomerId",$customerId)
                                 ->first();
            if($productExist){
              return ["msg"=>"product already exist"];
            }else{
                DB::table('orders')->insert([
                    'OrdercustomerId' =>$customerId,
                    'OrderproductId' => $productId,
                    'Orderquantity' => $quantity
                ]);
                return ["msg"=>"Ordered successfully"];
            }
    }
    public function brand_name()
    {
      return Brand::all();
    }
    public function BrandProduct($brandName)
    {
       return Product::where("brandName",$brandName)->get();
    }
    public function Search_product($searchValue)
    {
        return Product::where("productName","like","%$searchValue%")
         ->limit(4)
         ->get();
    }
    public function CustomerOrder($id)
    {
        $cartProduct = DB::table("products")
        ->join('orders','products.id','=','orders.OrderproductId')
        ->select('products.*','orders.*')
        ->where("orders.OrdercustomerId",'=',$id)
        ->get();
        return $cartProduct; 
    }
    public function customerAddress($id)
    {
        $user = DB::table('customers')->find($id);
        return json_encode($user);
    }
    public function submitUpdateData(Request $request)
    {
        $Cus_id    = $request->input("id");
        $phone     = $request->input("Cus_phone");
        $address   = $request->input("Cus_address");
        $affected = DB::table('customers')
              ->where('id',$Cus_id)
              ->update([
                  'phone' =>$phone,
                  'address'=>$address
                ]);
    }
    public function userLogin(Request $request)
    {    
        // $request;
         $phone = $request->input("userPhone");
         $otp =$request->input("userOtp");
         $customer = DB::table("customers")
                   ->where("phone",'=',$phone)
                   ->first();
                return json_encode($customer);
    }
    public function cancelOrder($id)
    {
        $canceOrder =Order::find($id);
        $canceOrder->delete();
        return ["msg"=>"your order canceled"];
    }
    public function productPaginate(){
        return Product::paginate(10);
    }
}
