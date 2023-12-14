<?php

namespace App\Http\Controllers;

use App\Models\Purchased_Item;
use Illuminate\Http\Request;

class PurchasedItemController extends Controller
{
    public function index() {
        $purchases = Purchased_Item::orderBy('id')->get();
        return response()->json($purchases);
    }

    public function view(Purchased_Item $purchased_item) {
        $purchased_item->load('merchandise');
        $purchased_item->load('purchase');
        return response()->json($purchased_item);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'merchandise_id' =>  'exists:merchandises,id|required',
            'purchase_id' =>  'exists:purchases,id|required',
            'whole_sale_qty' =>  'integer|required',
            'purchase_price' =>  'integer|required'
        ]);

        $purchase = Purchased_Item::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new purchase_item record has been created with an ID# of ' . $purchase->id
        ]);
    }

    //update
    public function update(Request $request, Purchased_Item $purchased_item){
        $fields = $request->validate([
            'merchandise_id' =>  'exists:merchandises,id',
            'purchase_id' =>  'exists:purchases,id',
            'whole_sale_qty' =>  'integer',
            'purchase_price' =>  'integer'
        ]);

        $purchased_item->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Purchased_Item with ID # ' . $purchased_item->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(Purchased_Item $purchased_item){
        $details = $purchased_item->last_name . ' , ' . $purchased_item->first_name;
        $purchased_item->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The purchase_item $details has been deleted."
        ]);
    }
}
