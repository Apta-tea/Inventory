<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Customer::paginate(10);
        $data['customer'] = $items;
        $data['_view'] = 'Staff.Customer.index';
        session(['current_page' => $items->currentPage()]);
        return view('Layout.body',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['_view'] = 'Staff.Customer.form';
        return view('Layout.body',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        Customer::create($data);
        return redirect('customer')->with('status', 'Customer added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['customer'] = Customer::find($id);
        $data['_view'] = 'Staff.Customer.detail';
        return view('Layout.body',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['customer'] = Customer::find($id);
        $data['_view'] = 'Staff.Customer.form';
        return view('Layout.body',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $customer = Customer::find($id);
        $customer->update($data);
        $lastPage = session('current_page', 1);
        return redirect()->route('customer.index', ['page' => $lastPage])->with('status', 'Customer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete($id);
        $lastPage = session('current_page', 1);
        return redirect()->route('customer.index', ['page' => $lastPage])->with('status', 'Customer deleted!');
    }

     public function search(Request $request)
    {
        //
        $search = $request['keyword'];
        $data['customer'] = Customer::where('customer_name','LIKE',"%{$search}%")->get();
        $data['_view'] = 'Staff.Customer.result';
        return view('Layout.body',$data);
    }
}
