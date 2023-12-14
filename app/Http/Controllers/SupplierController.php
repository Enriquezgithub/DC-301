<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() {
        $suppliers = Supplier::orderBy('company_name', 'ASC')->get();
        return response()->json($suppliers);
    }

    public function view(Supplier $supplier) {
        $supplier->load('purchases');
        return response()->json($supplier);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'company_name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'contact_person' =>  'string|required'
        ]);

        $supplier = Supplier::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new supplier record has been created with an ID# of ' . $supplier->id
        ]);
    }

    //update
    public function update(Request $request, Supplier $supplier){
        $fields = $request->validate([
              'company_name' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'contact_person' =>  'string'
        ]);

        $supplier->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Supplier with ID # ' . $supplier->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(Supplier $supplier){
        $details = $supplier->last_name . ' , ' . $supplier->first_name;
        $supplier->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The user $details has been deleted."
        ]);
    }
}
