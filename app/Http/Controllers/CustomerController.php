<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::orderBy('name', 'ASC')->get();
        return response()->json($customers);
    }

    public function view(Customer $customer) {
        $customer->load('sales');
        return response()->json($customer);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'balance' =>  'integer|required'
        ]);

        $customer = Customer::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new customer record has been created with an ID# of ' . $customer->id
        ]);
    }

    //update
    public function update(Request $request, Customer $customer){
        $fields = $request->validate([
            'name' => 'strin',
            'address' => 'strin',
            'phone' => 'string',
            'balance' =>  'intege'
        ]);

        $customer->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Customer with ID # ' . $customer->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(Customer $customer){
        $details = $customer->last_name . ' , ' . $customer->first_name;
        $customer->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The customer $details has been deleted."
        ]);
    }
}
