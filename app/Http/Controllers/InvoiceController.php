<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Models\Item_invoice;
use App\Models\Company;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InvoiceExport;
use App\Models\Product;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Invoice::orderBy('id','desc')->take(100)->paginate(10);
        $data['invoice'] = $items;
        $data['_view'] = 'Staff.Invoice.index';
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
        $data['_view'] = 'Staff.Invoice.form';
        $data['customer'] = Customer::all()->pluck('customer_name','id');
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
            'customer_id' => ['required'],
            'invoice_no' => ['required'],]);

         $data = array(
            'invoice_no'=>$request->invoice_no,
            'customers_id'=>$request->customers_id,
            'date_of_invoice'=>$request->date_of_invoice,
            'users_id'=>$request->users_id,
            'description'=>$request->description,
            'internal_notes'=>$request->internal_notes,
            'total_cost'=>$request->total_cost,
            'amount_paid'=>$request->amount_paid
        );
        $invoice = Invoice::create($data);
        for ($i = 0; $i < count($request->product_id); $i++) {
            $item_invoice = Item_invoice::create([
                 
                 'invoice_id' => $invoice->id,
                 'product_id' => $request->product_id[$i],
                 'item_cost' => $request->item_cost[$i],
                 'item_quantity' => $request->item_quantity[$i],
                 'item_total' => $request->item_total[$i],

             ]);
         }
        return redirect('invoice')->with('status', 'Invoice added!');
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
        $data['invoice'] = Invoice::find($id);
        $data['_view'] = 'Staff.Invoice.detail';
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
        $data['invoice'] = Invoice::find($id);
        $data['product'] = Product::where('status','active')->pluck('product_name','id');
        $data['customer'] = Customer::all()->pluck('customer_name','id');
        $data['item_invoice'] = DB::table('item_invoices')->where('invoice_id', $id)->get();
        $data['_view'] = 'Staff.Invoice.form';
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
            'amount_paid' => ['required'],
            'customers_id' => ['required'],]);
            $invoice = Invoice::find($id);
            $data = array(
                'customers_id'=>$request->customers_id,
                'date_of_invoice'=>$request->date_of_invoice,
                'users_id'=>$request->users_id,
                'description'=>$request->description,
                'internal_notes'=>$request->internal_notes,
                'total_cost'=>$request->total_cost,
                'amount_paid'=>$request->amount_paid
            );
            $purchase->update($data);

            $item_invoice = Item_invoice::where('invoice_id',$request->track_invoice_id)->delete();
            for ($i = 0; $i < count($request->product_id); $i++) {
                $item_invoice = Item_invoice::create([
                     
                    'invoice_id' => $request->track_invoice_id,
                    'product_id' => $request->product_id[$i],
                    'item_cost' => $request->item_cost[$i],
                    'item_quantity' => $request->item_quantity[$i],
                    'item_total' => $request->item_total[$i],
    
                 ]);
             }

        $lastPage = session('current_page', 1);
        return redirect()->route('invoice.index', ['page' => $lastPage])->with('status', 'Invoice updated!');
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
        $invoice = Invoice::find($id);
        $invoice->delete($id);
        Item_invoice::where('invoice_id',$id)->delete();
        $lastPage = session('current_page', 1);
        return redirect()->route('invoice.index', ['page' => $lastPage])->with('status', 'Invoice deleted!');
    }

    public function get_customer(Request $request)
    {
        $data = \DB::table('customers')->where('id', '=', $request->sid)->first();
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
        $data['invoice'] = Invoice::where('invoice_no','LIKE',"%{$search}%")->get();
        $data['_view'] = 'Staff.Invoice.result';
        return view('Layout.body',$data);
    }

    public function download($id)
    {

        $invoice  = Invoice::find($id);
        $data['invoice'] = Invoice::find($id);
        $data['company'] = Company::where('status','active')->first();
        $data['customer'] = Customer::where('id',$invoice->customers_id)->first();
        PDF::setOption(['dpi' => 96, 'defaultFont' => 'sans-serif', 'defaultPaperSize' => 'a4']);
        $pdf = PDF::loadview('Staff/Invoice/invoice_template',$data);
        return $pdf->stream();
    }

    public function export($export_type)
    {
        if ($export_type == '2'){
            return Excel::download(new InvoiceExport, 'invoice.xlsx');
        }else if ($export_type == '1'){
            $data['invoice'] = Invoice::orderBy('id','desc')->take(50)->get();
            PDF::setOption(['dpi' => 96, 'defaultFont' => 'sans-serif', 'defaultPaperSize' => 'a4']);
            $pdf = PDF::loadview('Staff/Invoice/print_template',$data);
            return $pdf->download('invoice');
        }
    }
}
