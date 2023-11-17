<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;

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
        $comp = Company::create($data);
        if (!empty($request->file('file_company_logo'))){
            $name = $request->file('file_company_logo')->getClientOriginalName();
            $path = $request->file('file_company_logo')->move(public_path().'/assets/',$name);
            $file = ['file_company_logo' => $name];
            $company = Company::find($comp->id);
            $company->update($file);
            }
            if (!empty($request->file('file_report_logo'))){
            $name = $request->file('file_report_logo')->getClientOriginalName();
            $path = $request->file('file_report_logo')->move(public_path().'/assets/',$name);
            $file = ['file_report_logo' => $name];
            $company = Company::find($comp->id);
            $company->update($file);
            }
            if (!empty($request->file('file_report_background'))){
            $name = $request->file('file_report_background')->getClientOriginalName();
            $path = $request->file('file_report_background')->move(public_path().'/assets/',$name);
            $file = ['file_report_background' => $name];
            $company = Company::find($comp->id);
            $company->update($file);
            }
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
        $company = Company::find($id);
        $company->update($data);

            if (!empty($request->file('file_company_logo'))){
            $name = $request->file('file_company_logo')->getClientOriginalName();
            $path = $request->file('file_company_logo')->move(public_path().'/assets/',$name);
            $file = ['file_company_logo' => $name];
            $company->update($file);
            }
            if (!empty($request->file('file_report_logo'))){
            $name = $request->file('file_report_logo')->getClientOriginalName();
            $path = $request->file('file_report_logo')->move(public_path().'/assets/',$name);
            $file = ['file_report_logo' => $name];
            $company->update($file);
            }
            if (!empty($request->file('file_report_background'))){
            $name = $request->file('file_report_background')->getClientOriginalName();
            $path = $request->file('file_report_background')->move(public_path().'/assets/',$name);
            $file = ['file_report_background' => $name];
            $company->update($file);
            }
       
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
        $data['company'] = Company::where('company_name','LIKE',"%{$search}%");
        $data['_view'] = 'Admin.Company.result';
        return view('Layout.body',$data);
    }
}
