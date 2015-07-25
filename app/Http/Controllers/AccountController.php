<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\User;
use CodeCommerce\Order;
use Illuminate\Support\Facades\Auth;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AccountController extends Controller
{

    
    public function orders()
    {

    	$orders = Auth::user()->orders()->paginate(10);    	    	
    	
    
    	return view('store.orders', compact('orders'));
    }
}
