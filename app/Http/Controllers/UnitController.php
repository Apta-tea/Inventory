<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Unit::paginate(10);
        $data['unit'] = $items;
        $data['_view'] = 'Admin.Unit.index';
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
        $data['_view'] = 'Admin.Unit.form';
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
        Unit::create($data);
        return redirect('unit')->with('status', 'Unit added!');
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
        $data['unit'] = Unit::find($id);
        $data['_view'] = 'Admin.Unit.detail';
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
        $data['unit'] = Unit::find($id);
        $data['_view'] = 'Admin.Unit.form';
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
        $unit = Unit::find($id);
        $unit->update($data);
        $lastPage = session('current_page', 1);
        return redirect()->route('unit.index', ['page' => $lastPage])->with('status', 'Unit updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $unit = Unit::find($id);
        $unit->delete($id);
        $lastPage = session('current_page', 1);
        return redirect()->route('unit.index', ['page' => $lastPage])->with('status', 'Unit deleted!');
    }

     public function search(Request $request)
    {
        //
        $search = $request['keyword'];
        $data['unit_s'] = Unit::where('unit','LIKE',"%{$search}%")->paginate(10);
        $data['_view'] = 'Admin.Unit.result';
        return view('Layout.body',$data);
    }
    
}
