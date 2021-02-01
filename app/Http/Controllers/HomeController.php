<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function oldindex()
    {
        return view('home');
    }

    public function index(){
        $requests = $_GET;
        if(isset($_GET['hmac'])){
            $hmac = $_GET['hmac'];
        }
        else{
            $hmac = '';
        }
        $serializeArray = serialize($requests);
        $requests = array_diff_key($requests, array('hmac' =>'' ));
        $token="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";
          $shop="the-big-dash-forcash.myshopify.com";
        $order_list = Helper::shopifyCall($token, $shop, "/admin/api/2021-01/orders.json?status=any", array(), 'GET');
        $order_list = json_decode($order_list['response']);
        return view('orders.index', [
            'order_list' => $order_list,
        ]);
    }
}
