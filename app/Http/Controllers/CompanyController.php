<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Company::paginate(10);
        $data['company'] = $items;
        $data['_view'] = 'Admin.Company.index';
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
        $data['_view'] = 'Admin.Company.form';
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
        Company::create($data);
        return redirect('company')->with('status', 'Company added!');
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
        $data['company'] = Company::find($id);
        $data['_view'] = 'Admin.Company.detail';
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
        $data['company'] = Company::find($id);
        $data['_view'] = 'Admin.Company.form';
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
        $country = Company::find($id);
        $country->update($data);
        $lastPage = session('current_page', 1);
        return redirect('company')->with('status', 'Company updated!');
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
        $company = Company::find($id);
        $company->delete($id);
        $lastPage = session('current_page', 1);
        return redirect()->route('company.index', ['page' => $lastPage])->with('status', 'Company deleted!');
    }

    public function search(Request $request)
    {
        //
        $search = $request['keyword'];
        $data['company'] = Company::where('company_name','LIKE',"%{$search}%")->paginate(10);
        $data['_view'] = 'Admin.Company.result';
        return view('Layout.body',$data);
    }
}
