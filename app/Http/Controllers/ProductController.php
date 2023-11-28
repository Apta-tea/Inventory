<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Unit;

class ProductController extends Controller
{
    //
    public function index()
    {
        //
        $items = Product::paginate(10);
        $data['product'] = $items;
        $data['_view'] = 'Staff.Product.index';
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
        $data['_view'] = 'Staff.Product.form';
        $data['category'] = Category::where('status','active')->pluck('name','id');
        $data['scategory'] = Sub_category::where('status','active')->pluck('name','id');
        $data['unit'] = Unit::pluck('unit','id');
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
        $u = Product::create($data);
        if (!empty($request->file('file_picture'))){
            $name = $request->file('file_picture')->getClientOriginalName();
            $path = $request->file('file_picture')->move(public_path().'/assets/',$name);
            $file = ['file_picture' => $name];
            $product = Product::find($u->id);
            $product->update($file);
            }
        return redirect('product')->with('status', 'Product added!');
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
        $data['product'] = product::find($id);
        $data['_view'] = 'Staff.Product.detail';
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
        $data['product'] = Product::find($id);
        $data['category'] = Category::where('status','active')->pluck('name','id');
        $data['scategory'] = Sub_category::where('status','active')->pluck('name','id');
        $data['unit'] = Unit::pluck('unit','id');
        $data['_view'] = 'Staff.Product.form';
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
        $product = Product::find($id);
        $product->update($data);
        if (!empty($request->file('file_picture'))){
            $name = $request->file('file_picture')->getClientOriginalName();
            $path = $request->file('file_picture')->move(public_path().'/assets/',$name);
            $file = ['file_picture' => $name];
            $product = Product::find($id);
            $product->update($file);
            }
        $lastPage = session('current_page', 1);
        return redirect()->route('product.index', ['page' => $lastPage])->with('status', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete($id);
        $lastPage = session('current_page', 1);
        return redirect()->route('product.index', ['page' => $lastPage])->with('status', 'Product deleted!');
    }

     public function search(Request $request)
    {
        //
        $search = $request['keyword'];
        $data['product'] = Product::where('product_name','LIKE',"%{$search}%")->get();
        $data['_view'] = 'Staff.Product.result';
        return view('Layout.body',$data);
    }
}
