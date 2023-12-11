<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Supplier::paginate(10);
        $data['supplier'] = $items;
        $data['_view'] = 'Staff.Supplier.index';
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
        $data['_view'] = 'Staff.Supplier.form';
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
        Supplier::create($data);
        return redirect('supplier')->with('status', 'Supplier added!');
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
        $data['supplier'] = Supplier::find($id);
        $data['_view'] = 'Staff.Supplier.detail';
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
        $data['supplier'] = Supplier::find($id);
        $data['_view'] = 'Staff.Supplier.form';
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
        $supplier = Supplier::find($id);
        $supplier->update($data);
        $lastPage = session('current_page', 1);
        return redirect()->route('supplier.index', ['page' => $lastPage])->with('status', 'Supplier updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete($id);
        $lastPage = session('current_page', 1);
        return redirect()->route('supplier.index', ['page' => $lastPage])->with('status', 'Supplier deleted!');
    }

     public function search(Request $request)
    {
        //
        $search = $request['keyword'];
        $data['supplier'] = Supplier::where('supplier_name','LIKE',"%{$search}%")->get();
        $data['_view'] = 'Staff.Supplier.result';
        return view('Layout.body',$data);
    }
}
