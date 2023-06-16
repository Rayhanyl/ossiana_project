<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Svg\Tag\Rect; 
use App\Models\Order;
use App\Models\Inspection;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{

    private function generateOrderCode($prefix = 'OSN') {
        $text = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3);
        $random = str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
        $timestamp = time();
        return $prefix . '-' . $text . $random . $timestamp;
    }

    public function customer_dashboard(){
        $orders = Order::where('user_id', Auth::id())->get();
        $order = $orders->count();
        $approved = $orders->where('status','approved')->count();
        $waiting = $orders->where('status','waiting')->count();
        $rejected = $orders->whereIn('status', 'rejected')->count();
        return view('customer.index',compact('orders','order','approved','waiting','rejected'));
    }

    public function catalog_page(){
        return view('customer.catalog');
    }

    public function order_page(){

        $orders = Order::where('user_id',Auth::id())->get();
        
        return view('customer.order_page',compact('orders'));
    }

    public function order_form(){

        $users = Auth::user();
        return view('customer.order_form', compact('users'));
    }

    public function order_action(Request $request){

        try {

            $order_code = $this->generateOrderCode();
            
            Order::create([
                'order_code'            => $order_code,
                'user_id'               => Auth::id(),
                'book_date'             => $request->book_date,
                'delivery_tire'         => $request->delivery_tire,
                'size_tire'             => $request->size_tire,
                'total_tire'            => $request->total_tire,
                'detail_order'          => $request->detail_order,
                'payment_status'        => 'waiting',
                'tire_status'           => 'waiting',
                'status'                => 'waiting',
            ]);
            
            Alert::toast('Berhasil Order','success'); 
            return redirect()->route('order.page');

        } catch (\Throwable $e) {
            
            dd($e);
            Alert::warning('Error', 'Gagal Melakukan Order');
            return redirect()->back();

        }

    }

    public function customer_detail_page($id){

        $orders = Order::where('id', $id)->get();

        return view('customer.detail_order',compact('orders'));
    }

    public function upload_dp(Request $request){

        try {
        
            $file = $request->file('file_dp');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = public_path().'/assets/dp';
            $file->move($tujuan_upload,$nama_file);

            Order::where('id', $request->order_id)->update([
                'pict_down_payment' => $nama_file,
            ]);

            Alert::toast('Successful upload payment','success'); 
            return redirect()->back();
            
        } catch (\Throwable $e) {

            dd($e);
            return redirect()->back();
        
        }

    }

    public function upload_fp(Request $request){
        try {
        
            $file = $request->file('file_fp');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = public_path().'/assets/fp';
            $file->move($tujuan_upload,$nama_file);

            Order::where('id', $request->order_id)->update([
                'pict_full_payment' => $nama_file,
            ]);

            Alert::toast('Successful upload payment','success'); 
            return redirect()->back();
            
        } catch (\Throwable $e) {

            dd($e);
            return redirect()->back();
        
        }

    }
}
