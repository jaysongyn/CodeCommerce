<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Status;
use Illuminate\Http\Request;
use CodeCommerce\User;
use CodeCommerce\Order;
use Illuminate\Support\Facades\Auth;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AccountController extends Controller
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    
    public function orders()
    {

    	$orders = Auth::user()->orders()->paginate(10);    	    	
    	
    
    	return view('store.orders', compact('orders'));
    }

    public function allOrders(){
        $orders = $this->order->paginate(10);

        return view('orders.orders',compact('orders'));
    }

    public function edit($id, Status $status)
    {

        $status = $status->lists('descricao','id');

        $order = $this->order->find($id);

        return view('orders.edit',compact('order','status'));
    }

    public function update(Request $request, $id)
    {
        $this->order->find($id)->update($request->all());

        return redirect()->route('orders.index');
    }
}
