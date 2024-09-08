<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Customer::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->save();

        return $customer;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $customer = Customer::find($id); 
        return $customer ?? response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $customer = Customer::find($id);
        if(!$customer) {
            return response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND); 
        }

        $customer->name = $request->name;
        $customer->save();

        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
        }

        $customer->delete();

        return response()->json(['status' => 'Deleted'], Response::HTTP_OK);
    }
}
