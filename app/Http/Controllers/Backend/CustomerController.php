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
        return view('admin.customer.edit', compact($customer));
    }

    // public function proflie(Customer $customer)
    // {
    //     return view('site.customer-edit', compact('customer'));
    // }


    // public function post_proflie(Request $request, Customer $customer)
    // {
    //     $data = $request->only('email','phone','address');
    //     return redirect()->route('site.index')->with('true', 'Cập nhật thông tin thành công');
    // }


}
