<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use App\Models\Material;
use App\Models\Item_material;
use App\Models\Product;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MaterialExport;

class RawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Material::orderBy('id','desc')->take(100)->paginate(10);
        $data['material'] = $items;
        $data['_view'] = 'Staff.Material.index';
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
        $data['_view'] = 'Staff.Material.form';
        $data['company'] = Company::all()->pluck('company_name','id');
        $data['product'] = \DB::table('products')->where('status','active')->select('id', 'product_name')->get();
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
        $this->validate($request,[
            'product_id' => ['required'],
            'amount' => ['required'],
            'company_id' => ['required'],
            'issued_no' => ['required'],]);

         $data = array(
            'issued_no'=>$request->issued_no,
            'company_id'=>$request->company_id,
            'issued_date'=>$request->issued_date,
            'user_id'=>$request->users_id,
            'description'=>$request->description,
            'internal_notes'=>$request->internal_notes,
            'amount'=>$request->amount
            
        );
        $material = Material::create($data);
        for ($i = 0; $i < count($request->product_id); $i++) {
            $item_material = Item_material::create([
                 
                 'issued_id' => $material->id,
                 'product_id' => $request->product_id[$i],
                 'item_price' => $request->item_price[$i],
                 'item_quantity' => $request->item_quantity[$i],
                 'item_total' => $request->item_total[$i],

             ]);
         }
        return redirect('material')->with('status', 'Material declared!');
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
        $data['material'] = Material::find($id);
        $data['_view'] = 'Staff.Material.detail';
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
        $data['material'] = Material::find($id);
        $data['product'] = Product::where('status','active')->pluck('product_name','id');
        $data['company'] = Company::all()->pluck('company_name','id');
        $data['item_material'] = DB::table('item_materials')->where('issued_id', $id)->get();
        $data['_view'] = 'Staff.Material.form';
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
        $this->validate($request,[
            'product_id' => ['required'],
            'amount' => ['required'],]);
        $material = Material::find($id);
        $data = array(
            'company_id'=>$request->company_id,
            'issued_date'=>$request->issued_date,
            'user_id'=>$request->users_id,
            'description'=>$request->description,
            'internal_notes'=>$request->internal_notes,
            'amount'=>$request->amount
        );
        $material->update($data);
            $item_material = Item_material::where('issued_id',$request->track_material_id)->delete();
            for ($i = 0; $i < count($request->product_id); $i++) {
                $item_material = Item_material::create([
                     
                     'issued_id' => $request->track_material_id,
                     'product_id' => $request->product_id[$i],
                     'item_price' => $request->item_price[$i],
                     'item_quantity' => $request->item_quantity[$i],
                     'item_total' => $request->item_total[$i],
    
                 ]);
             }

        $lastPage = session('current_page', 1);
        return redirect()->route('material.index', ['page' => $lastPage])->with('status', 'Declaration updated!');
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
        $material = Material::find($id);
        $material->delete($id);
        Item_material::where('issued_id',$id)->delete();
        $lastPage = session('current_page', 1);
        return redirect()->route('material.index', ['page' => $lastPage])->with('status', 'Declaration deleted!');
    }

    public function get_company(Request $request)
    {
        $data = \DB::table('companies')->where('id', '=', $request->sid)->first();
        return response()->json($data);
        
    }

    public function get_product(Request $request)
    {
        $data = \DB::table('products')->where('id', '=', $request->pid)->first();
        return response()->json($data);
        
    }

    public function search(Request $request)
    {
        //
        $search = $request['keyword'];
        $data['material'] = Material::where('issued_no','LIKE',"%{$search}%")->get();
        $data['_view'] = 'Staff.Material.result';
        return view('Layout.body',$data);
    }

    public function download($id)
    {

        $material  = Material::find($id);
        $data['material'] = Material::find($id);
        $data['company'] = Company::where('status','active')->first();
        $data['manufacturer'] = Company::where('id',$material->company_id)->first();
        PDF::setOption(['dpi' => 96, 'defaultFont' => 'sans-serif', 'defaultPaperSize' => 'a4']);
        $pdf = PDF::loadview('Staff/Material/material_template',$data);
        return $pdf->stream();
    }

    public function export($export_type)
    {
        if ($export_type == '2'){
            return Excel::download(new MaterialExport, 'declaration.xlsx');
        }else if ($export_type == '1'){
            $data['material'] = Material::orderBy('id','desc')->take(50)->get();
            PDF::setOption(['dpi' => 96, 'defaultFont' => 'sans-serif', 'defaultPaperSize' => 'a4']);
            $pdf = PDF::loadview('Staff/Material/print_template',$data);
            return $pdf->download('declaration');
        }
    }
}
