<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\countrys;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $items = countrys::paginate(10);
        $data['country'] = $items;
        $data['_view'] = 'Admin.Country.index';
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
        $data['_view'] = 'Admin.Country.form';
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
        countrys::create($data);
        return redirect('country')->with('status', 'Country added!');
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
        $data['country'] = countrys::find($id);
        $data['_view'] = 'Admin.Country.detail';
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
        $data['country'] = countrys::find($id);
        $data['_view'] = 'Admin.Country.form';
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
        $country = countrys::find($id);
        $country->update($data);
        $lastPage = session('current_page', 1);
        return redirect()->route('country.index', ['page' => $lastPage])->with('status', 'Country updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = countrys::find($id);
        $country->delete($id);
        $lastPage = session('current_page', 1);
        return redirect()->route('country.index', ['page' => $lastPage])->with('status', 'Country deleted!');
    }

     public function search(Request $request)
    {
        //
        $search = $request['keyword'];
        $data['country_s'] = countrys::where('country','LIKE',"%{$search}%")->paginate(10);
        $data['_view'] = 'Admin.Country.result';
        return view('Layout.body',$data);
    }


}
