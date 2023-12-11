<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub_category;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Sub_category::paginate(10);
        $data['scategory'] = $items;
        $data['_view'] = 'Staff.SubCategory.index';
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
        $data['category'] = Category::pluck('name','id');
        $data['_view'] = 'Staff.SubCategory.form';
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
        Sub_category::create($data);
        return redirect('scat')->with('status', 'Sub category added!');
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
        $data['scategory'] = Sub_category::find($id);
        $data['_view'] = 'Staff.SubCategory.detail';
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
        $data['scategory'] = Sub_category::find($id);
        $data['category'] = Category::pluck('name','id');
        $data['_view'] = 'Staff.SubCategory.form';
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
        $scategory = Sub_category::find($id);
        $scategory->update($data);
        $lastPage = session('current_page', 1);
        return redirect()->route('scat.index', ['page' => $lastPage])->with('status', 'Sub category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scategory = Sub_category::find($id);
        $scategory->delete($id);
        $lastPage = session('current_page', 1);
        return redirect()->route('scat.index', ['page' => $lastPage])->with('status', 'Sub category deleted!');
    }

     public function search(Request $request)
    {
        //
        $search = $request['keyword'];
        $data['scategory'] = Sub_category::where('name','LIKE',"%{$search}%")->get();
        $data['_view'] = 'Staff.SubCategory.result';
        return view('Layout.body',$data);
    }
}
