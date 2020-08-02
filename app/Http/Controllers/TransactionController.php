<?php

namespace App\Http\Controllers;

use App\Region;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function loginCheckout()
    {
        return view('public.transaction.login');
    }

    public function stepOne(Request $request)
    {
        $user = new User();
        $user->name     = $request->name;
        $user->surname  = $request->surname;
        $user->rut      = $request->rut;
        $user->email    = $request->email;
        Session::put('user',collect($user));

        $region = Region::all();
        return view('public.transaction.delivery',['region' => $region]);
    }

    public function stepTwo(Request $request)
    {
        return view('public.transaction.pay');
    }
}
