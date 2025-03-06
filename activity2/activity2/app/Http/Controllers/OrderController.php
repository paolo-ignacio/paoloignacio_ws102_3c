<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    //
    public function act(){
        return View('links');
    }
    public function customer($cust_id, $name, $address){

        return View('Customer', compact('cust_id', 'name', 'address'));
    }
    public function item($item_no, $name, $price){

        return View('Item', compact('item_no', 'name', 'price'));
    }

    public function order($cust_id, $name, $order_no, $date ){
        return View('Order', compact('cust_id', 'name', 'order_no', 'date'));
    }

    public function orderdetails($trans_no, $order_no, $item_id, $name, $price,  $quantity){
        return View('Orderdetails', compact('trans_no', 'order_no', 'item_id', 'name', 'price', 'quantity'));
    }
}
