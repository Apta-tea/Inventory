<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Item_purchase;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\XlsExport;


class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Purchase::orderBy('id','desc')->take(100)->paginate(10);
        $data['purchase'] = $items;
        $data['_view'] = 'Staff.Purchase.index';
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
        $data['_view'] = 'Staff.Purchase.form';
        $data['supplier'] = Supplier::all()->pluck('company','id');
        //$p = Product::where('status','active')->get('product_name','id');
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
            'amount_paid' => ['required'],
            'supplier_id' => ['required'],]);

         $data = array(
            'date_of_purchase'=>$request->date_of_purchase,
            'description'=>$request->description,
            'internal_notes'=>$request->internal_notes,
            'supplier_id'=>$request->supplier_id,
            'users_id'=>$request->users_id,
            'total_cost'=>$request->total_cost,
            'amount_paid'=>$request->amount_paid,
            'purchase_no'=>$request->purchase_no
        );
        $purchase = Purchase::create($data);
        for ($i = 0; $i < count($request->product_id); $i++) {
            $item_purchase = Item_purchase::create([
                 
                 'purchase_id' => $purchase->id,
                 'product_id' => $request->product_id[$i],
                 'item_cost' => $request->item_cost[$i],
                 'item_quantity' => $request->item_quantity[$i],
                 'item_total' => $request->item_total[$i],

             ]);
         }
        return redirect('purchase')->with('status', 'Purchase added!');
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
        $data['purchase'] = Purchase::find($id);
        $data['_view'] = 'Staff.Purchase.detail';
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
        $data['purchase'] = Purchase::find($id);
        $data['product'] = Product::where('status','active')->pluck('product_name','id');
        $data['supplier'] = Supplier::all()->pluck('company','id');
        $data['item_purchase'] = DB::table('item_purchases')->where('purchase_id', $id)->get();
        $data['_view'] = 'Staff.Purchase.form';
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
        $this->validate($request,[
            'product_id' => ['required'],
            'amount_paid' => ['required'],]);
            $item_purchase = Item_purchase::where('purchase_id',$request->track_purchase_id)->delete();
            for ($i = 0; $i < count($request->product_id); $i++) {
                $item_purchase = Item_purchase::create([
                     
                     'purchase_id' => $request->track_purchase_id,
                     'product_id' => $request->product_id[$i],
                     'item_cost' => $request->item_cost[$i],
                     'item_quantity' => $request->item_quantity[$i],
                     'item_total' => $request->item_total[$i],
    
                 ]);
             }

        $purchase = Purchase::find($id);
        $data = array(
            'date_of_purchase'=>$request->date_of_purchase,
            'description'=>$request->description,
            'internal_notes'=>$request->internal_notes,
            'supplier_id'=>$request->supplier_id,
            'users_id'=>$request->users_id,
            'total_cost'=>$request->total_cost,
            'amount_paid'=>$request->amount_paid
        );
        $purchase->update($data);
        $lastPage = session('current_page', 1);
        return redirect()->route('purchase.index', ['page' => $lastPage])->with('status', 'Purchase updated!');
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
        $purchase = Purchase::find($id);
        $purchase->delete($id);
        Item_purchase::where('purchase_id',$id)->delete();
        $lastPage = session('current_page', 1);
        return redirect()->route('purchase.index', ['page' => $lastPage])->with('status', 'Purchase deleted!');
    }

    public function get_supplier(Request $request)
    {
        $data = \DB::table('suppliers')->where('id', '=', $request->sid)->first();
        return response()->json($data);
        die;
        
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
        $data['purchase'] = Purchase::where('purchase_no','LIKE',"%{$search}%")->get();
        $data['_view'] = 'Staff.Purchase.result';
        return view('Layout.body',$data);
    }

    public function download($id)
    {

        $purchase  = Purchase::find($id);
        $data['purchase'] = Purchase::find($id);
        $data['company'] = Company::where('status','active')->first();
        $data['supplier'] = Supplier::where('id',$purchase->supplier_id)->first();
        PDF::setOption(['dpi' => 96, 'defaultFont' => 'sans-serif', 'defaultPaperSize' => 'a4']);
        $pdf = PDF::loadview('Staff/Purchase/purchase_template',$data);
    	//return $pdf->download('receipt-pdf');
        return $pdf->stream();
    }

    public function export($export_type)
    {
        if ($export_type == '2'){
            return Excel::download(new XlsExport, 'purchase.xlsx');
        }else if ($export_type == '1'){
            $data['purchase'] = Purchase::orderBy('id','desc')->take(50)->get();
            PDF::setOption(['dpi' => 96, 'defaultFont' => 'sans-serif', 'defaultPaperSize' => 'a4']);
            $pdf = PDF::loadview('Staff/Purchase/print_template',$data);
            return $pdf->download('purchase');
        }
    }
}
