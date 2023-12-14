<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index() {
        $purchases = Purchase::orderBy('id')->get();
        return response()->json($purchases);
    }

    public function view(Purchase $purchase) {
        $purchase->load('purchased_items');
        $purchase->load('user');
        $purchase->load('supplier');
        return response()->json($purchase);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'date' => 'date|required',
            'total' => 'integer|required',
            'invoice_no' => 'integer|required',
            'user_id' =>  'exists:users,id|required',
            'supplier_id' =>  'exists:suppliers,id|required'
        ]);

        $purchase = Purchase::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new purchase record has been created with an ID# of ' . $purchase->id
        ]);
    }

    //update
    public function update(Request $request, Purchase $purchase){
        $fields = $request->validate([
            'date' => 'date',
            'total' => 'integer',
            'invoice_no' => 'integer',
            'user_id' =>  'exists:users,id',
            'supplier_id' =>  'exists:suppliers,id'
        ]);

        $purchase->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Purchase with ID # ' . $purchase->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(Purchase $purchase){
        $details = $purchase->last_name . ' , ' . $purchase->first_name;
        $purchase->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The purchase $details has been deleted."
        ]);
    }
}
