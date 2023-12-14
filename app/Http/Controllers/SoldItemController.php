<?php

namespace App\Http\Controllers;

use App\Models\Sold_Item;
use Illuminate\Http\Request;

class SoldItemController extends Controller
{
    public function index() {
        $sold = Sold_Item::orderBy('id')->get();
        return response()->json($sold);
    }

    public function view(Sold_Item $sold_item) {
        $sold_item->load('sale');
        $sold_item->load('merchandise');
        return response()->json($sold_item);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'merchandise_id' =>  'exists:merchandises,id|required',
            'sale_id' =>  'exists:sales,id|required',
            'qty' =>  'integer|required',
            'selling_price' =>  'integer|required'
        ]);

        $sold = Sold_Item::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new sold_item record has been created with an ID# of ' . $sold->id
        ]);
    }

    //update
    public function update(Request $request, Sold_Item $sold_item){
        $fields = $request->validate([
            'merchandise_id' =>  'exists:merchandises,id',
            'sale_id' =>  'exists:sales,id',
            'qty' =>  'integer',
            'selling_price' =>  'integer'
        ]);

        $sold_item->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Sold_Item with ID # ' . $sold_item->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(Sold_Item $sold_item){
        $details = $sold_item->last_name . ' , ' . $sold_item->first_name;
        $sold_item->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The sold_item $details has been deleted."
        ]);
    }
}
