<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\OrderItems;
use App\Page;
use DB;
use Illuminate\Http\Request;

class ApiController extends Controller
{

  public function login(Request $request){

    $header = $request->header();

    $username = $header['username'];

    $password = $header['password'][0];

    $logintest = User::select('password','auth_token')->where('email',$username)->first();

    if($logintest){
      if($password == $logintest->password)
          return '{"type":"success","msg":"'.$logintest->auth_token.'"}';
      else
          return '{"type":"fail","msg":"Invalid Username/Password"}';
    }
    else
      return '{"type":"fail","msg":"Invalid Username/Password"}';
  }

  public function productlist(Request $request){

      $products = Page::select('id','product_category as type', 'product_image as image', 'product_name as name', 'product_description as description', 'product_price_dollar as ratedollar', 'product_price_euro as rateeuro')->get();

      return '{"type":"success","msg":'.$products.'}';
  }

  public function delivery(Request $request){

      return '{"type":"success","dollar":"20", "euro":"22"}';
  }

  public function confirmation(Request $request){

    $header = $request->header();

    if($header['token'][0] !== 'na'){
        $user = User::where('auth_token','=',$header['token'][0])->first();
        $userid = $user->id;
      }
      else
        $userid = '';


    $currency = $header['currency'][0];
    $carts = json_decode($header['cart'][0]);
    $subtotal = $header['subtotal'][0];
    $grandtotal = $header['grandtotal'][0];
    $name = $header['name'][0];
    $address = $header['address'][0];
    $phone = $header['phone'][0];
    $delivery = $header['delivery'][0];

    DB::beginTransaction();
    try{

        $order = New Order();
        $order->user_id = $userid;
        $order->delivery_address = $name.", ".$address;
        $order->mobile = $phone;

        $order->total = $subtotal;
        $order->delivery_charge = $delivery;
        $order->grand_total = $grandtotal;

        $order->payment_type = 'cod';
        $order->status = 'Pending';

        if($order->save())
        {
          foreach ($carts as $i) {
          $items = New OrderItems();
            $items->order_id = $order->id;
            $items->product_id = $i->id;
            $items->quantity = $i->quantity;
            if($i->ratecurrency === "dollar")
              $items->rate= $i->ratedollar;
            if($i->ratecurrency === "euro")
              $items->rate= $i->rateeuro;

            $items->save();
          }
        }

        DB::commit();
        return '{"type":"success","msg":"'.$order->id.'"}';
      }
      catch(\Exception $e){
          DB::rollback();
          return '{"type":"fail","msg":'.$e.'" - Try Again"}';
      }

  }

  public function orderlist(Request $request){

    $header = $request->header();

    $token = $header['token'];

    $user = User::where('auth_token',$token)->first();

    $orders = Order::where('user_id',$user->id)->get();


      return '{"type":"success","msg":'.$orders.'}';
  }
}
