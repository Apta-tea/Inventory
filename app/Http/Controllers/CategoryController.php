<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Category::paginate(10);
        $data['category'] = $items;
        $data['_view'] = 'Staff.Category.index';
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
        $data['_view'] = 'Staff.Category.form';
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
        Category::create($data);
        return redirect('category')->with('status', 'Category added!');
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
        $data['category'] = Category::find($id);
        $data['_view'] = 'Staff.Category.detail';
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
        $data['category'] = Category::find($id);
        $data['_view'] = 'Staff.Category.form';
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
        $category = Category::find($id);
        $category->update($data);
        $lastPage = session('current_page', 1);
        return redirect()->route('category.index', ['page' => $lastPage])->with('status', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete($id);
        $lastPage = session('current_page', 1);
        return redirect()->route('category.index', ['page' => $lastPage])->with('status', 'Category deleted!');
    }

     public function search(Request $request)
    {
        //
        $search = $request['keyword'];
        $data['category'] = Category::where('name','LIKE',"%{$search}%")->get();
        $data['_view'] = 'Staff.Category.result';
        return view('Layout.body',$data);
    }
}
