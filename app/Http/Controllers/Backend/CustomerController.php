<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
// use Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer = Customer::paginate();
        $keyword = $request->keyword;
        if ($keyword) {
            $customer = Customer::where('last_name','like','%'.$keyword.'%')->paginate();
        }
        return view('admin.customer.index', compact('customer'));
    }


    public function show(Customer $customer)
    {
        
    }

    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', compact('customer'));
    }
}
