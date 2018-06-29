<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;
use App\Model\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::check()){
            // \Session::put('success','Welcome New Customer Successfully!!');
            $customer = Customer::orderBy('customer', 'asec')->paginate(5);
            return view('customers.index',compact('customer'));    
        }
        else{
            return redirect('login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uuid = Uuid::generate(4);
        $customer = new Customer();
        $customer->uuid = $uuid;
        $customer->customer = $request->customer;
        $customer->gender = $request->gender;
        $customer->telephone = $request->telephone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->save();    
        $customer = Customer::orderBy('customer', 'asec')->paginate(5);   
        return response()->json($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $customer = Customer::find($request->id);
        return response()->json($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $customer = Customer::find($request->id);
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->uuid = $request->uuid;
        $customer->customer = $request->customer;
        $customer->gender = $request->gender;
        $customer->telephone = $request->telephone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->save();       
        $customer = Customer::orderBy('customer', 'asec')->paginate(5);
        return response()->json($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->delete();
        return response()->json($customer);
    }
}
