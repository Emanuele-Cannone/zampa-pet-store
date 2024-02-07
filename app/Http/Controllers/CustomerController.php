<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::orderBy('created_at','DESC')->get();
        return view('customer.index',compact('customers'));
    }

    public function create(){
        return view('customer.create');
    }

    public function edit(Customer $customer){
        return view('customer.edit',compact('customer'));
    }

    public function store(Request $request){
        $data = $request->all();
        $customer = Customer::create($data);
        return redirect()->route('customers.index');
    }

    public function update(Request $request, Customer $customer){
        $data = $request->all();
        $customer->update($data);
        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return response()->json('ok',200);
    }
}
