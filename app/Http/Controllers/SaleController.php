<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index() {
        $sales = Sale::orderBy('id')->get();
        return response()->json($sales);
    }

    public function view(Sale $sale) {
        $sale->load('customer');
        $sale->load('user');
        $sale->load('sold_items');
        return response()->json($sale);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'customer_id' =>  'exists:customers,id|required',
            'user_id' =>  'exists:users,id|required',
            'date' =>  'date|required',
            'is_credit' =>  'boolean|required'
        ]);

        $sale = Sale::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new sale record has been created with an ID# of ' . $sale->id
        ]);
    }

    //update
    public function update(Request $request, Sale $sale){
        $fields = $request->validate([
            'customer_id' =>  'exists:customers,id',
            'user_id' =>  'exists:users,id',
            'date' =>  'date',
            'is_credit' =>  'boolean'
        ]);

        $sale->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Sale with ID # ' . $sale->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(Sale $sale){
        $details = $sale->last_name . ' , ' . $sale->first_name;
        $sale->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The sale $details has been deleted."
        ]);
    }
}
