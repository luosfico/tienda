<?php

namespace App\Http\Controllers;

use App\Region;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Transbank\Webpay\Configuration;
use Transbank\Webpay\Webpay;

class TransactionController extends Controller
{
    private $transaction;


}
