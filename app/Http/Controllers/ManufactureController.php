<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacture;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use App\Models\Production;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ManufactureExport;

class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Manufacture::orderBy('id','desc')->take(100)->paginate(10);
        $data['manufacture'] = $items;
        $data['_view'] = 'Staff.Manufacture.index';
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
        $data['_view'] = 'Staff.Manufacture.form';
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
            'supplier_id' => ['required'],
            'production_no' => ['required'],]);

         $data = array(
            'production_no'=>$request->production_no,
            'supplier_id'=>$request->supplier_id,
            'stored_date'=>$request->stored_date,
            'user_id'=>$request->users_id,
            'description'=>$request->description,
            'internal_notes'=>$request->internal_notes,
            'amount'=>$request->amount
            
        );
        $manufacture = Manufacture::create($data);
        for ($i = 0; $i < count($request->product_id); $i++) {
            $production = Production::create([
                 
                 'stored_id' => $manufacture->id,
                 'product_id' => $request->product_id[$i],
                 'item_price' => $request->item_price[$i],
                 'item_quantity' => $request->item_quantity[$i],
                 'item_total' => $request->item_total[$i],

             ]);
         }
        return redirect('manufacture')->with('status', 'Product stored!');
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
        $data['manufacture'] = Manufacture::find($id);
        $data['_view'] = 'Staff.Manufacture.detail';
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
        $data['manufacture'] = Manufacture::find($id);
        $data['product'] = Product::where('status','active')->pluck('product_name','id');
        $data['company'] = Company::all()->pluck('company_name','id');
        $data['production'] = DB::table('productions')->where('stored_id', $id)->get();
        $data['_view'] = 'Staff.Manufacture.form';
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
        $manufacture = Manufacture::find($id);
        $data = array(
            'supplier_id'=>$request->supplier_id,
            'stored_date'=>$request->stored_date,
            'user_id'=>$request->users_id,
            'description'=>$request->description,
            'internal_notes'=>$request->internal_notes,
            'amount'=>$request->amount
        );
        $manufacture->update($data);
            $production = Production::where('stored_id',$request->track_manufacture_id)->delete();
            for ($i = 0; $i < count($request->product_id); $i++) {
                $production = Production::create([
                     
                     'stored_id' => $request->track_manufacture_id,
                     'product_id' => $request->product_id[$i],
                     'item_price' => $request->item_price[$i],
                     'item_quantity' => $request->item_quantity[$i],
                     'item_total' => $request->item_total[$i],
    
                 ]);
             }

        $lastPage = session('current_page', 1);
        return redirect()->route('manufacture.index', ['page' => $lastPage])->with('status', 'Production updated!');
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
        $manufacture = Manufacture::find($id);
        $manufacture->delete($id);
        Production::where('stored_id',$id)->delete();
        $lastPage = session('current_page', 1);
        return redirect()->route('manufacture.index', ['page' => $lastPage])->with('status', 'Production deleted!');
    }

    public function get_supplier(Request $request)
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
        $data['manufacture'] = Manufacture::where('production_no','LIKE',"%{$search}%")->get();
        $data['_view'] = 'Staff.Manufacture.result';
        return view('Layout.body',$data);
    }

    public function download($id)
    {

        $manufacture  = Manufacture::find($id);
        $data['manufacture'] = Manufacture::find($id);
        $data['company'] = Company::where('status','active')->first();
        $data['supplier'] = Company::where('id',$manufacture->supplier_id)->first();
        PDF::setOption(['dpi' => 96, 'defaultFont' => 'sans-serif', 'defaultPaperSize' => 'a4']);
        $pdf = PDF::loadview('Staff/Manufacture/manufacture_template',$data);
        return $pdf->stream();
    }

    public function export($export_type)
    {
        if ($export_type == '2'){
            return Excel::download(new ManufactureExport, 'manufacture.xlsx');
        }else if ($export_type == '1'){
            $data['manufacture'] = Manufacture::orderBy('id','desc')->take(50)->get();
            PDF::setOption(['dpi' => 96, 'defaultFont' => 'sans-serif', 'defaultPaperSize' => 'a4']);
            $pdf = PDF::loadview('Staff/Manufacture/print_template',$data);
            return $pdf->download('manufacture');
        }
    }
}
