<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    public function index() {
        $merchandise = Merchandise::orderBy('brand', 'ASC')->get();
        return response()->json($merchandise);
    }

    public function view(Merchandise $merchandise) {
        $merchandise->load('purchased_items');
        $merchandise->load('sold_items');
        return response()->json($merchandise);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'brand' => 'string|required',
            'description' => 'string|required',
            'retail_price' => 'integer|required',
            'whole_sale_price' =>  'integer|required',
            'whole_sale_qty' =>  'integer|required',
            'qty_stock' =>  'integer|required'

        ]);

        $merchandise = Merchandise::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new merchandise record has been created with an ID# of ' . $merchandise->id
        ]);
    }

    //update
    public function update(Request $request, Merchandise $merchandise){
        $fields = $request->validate([
            'brand' => 'string',
            'description' => 'string',
            'retail_price' => 'integer',
            'whole_sale_price' =>  'integer',
            'whole_sale_qty' =>  'integer',
            'qty_stock' =>  'integer'
        ]);

        $merchandise->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Merchandise with ID # ' . $merchandise->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(Merchandise $merchandise){
        $details = $merchandise->last_name . ' , ' . $merchandise->first_name;
        $merchandise->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The merchandise $details has been deleted."
        ]);
    }
}
