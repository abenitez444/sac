<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\Coowner;
use App\Models\Residence;


class balanceController extends Controller
{
    public function index()
    {
    	//
    }

    public function create()
    {
    	$balance = Balance::all();
    	$coowner = Coowner::all();
        $residence = Residence::all();

        return view('balance.store', compact('balance', 'coowner', 'residence'));
    }
}
