<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class ReportController extends Controller
{
    //
    public function index(){
        $data['_view'] = 'Staff.Report.index';
        return view('Layout.body',$data);
    }
    public function get_storage()
    {
        $data =  \DB::table('products')->join('stock','stock.product_id','=','products.id')
        ->join('categories','categories.id','=','products.category_id')
        ->join('sub_categories','sub_categories.id','=','products.sub_category_id')
        ->select('stock.product_id','stock.stock','categories.name','products.product_name','products.buying_price','products.selling_price','products.brand','products.qty')->get(); 
        return DataTables::of($data)->make(true);
    }
}
