<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\FuncCall;
use Carbon\Carbon;

class AdminController extends Controller
{
    
    public function admin_dashboard(){

        $orders = Order::with('user')->get();
        $order = $orders->count();
        $approved = $orders->where('status','approved')->count();
        $waiting = $orders->where('status','waiting')->count();
        $rejected = $orders->whereIn('status', 'rejected')->count();

        return view('admin.index', compact('orders','order','approved','waiting','rejected'));
    }

    public function admin_order_page(){

        $orders = Order::with('user')->get();

        return view('admin.order_list', compact('orders'));
    }

    public function admin_detail_page($id){

        $orders = Order::where('id', $id)->get();

        return view('admin.confirmation_order',compact('orders'));
    }

    public function price_downpayment(Request $request){

        try {
            
            Order::where('id', $request->order_id)->update([
                'price_down_payment' => $request->input('price_down_payment'),
            ]);

            Alert::success('Success', 'Price update successfully');
            return redirect()->back();

        } catch (\Throwable $e) {
            
            dd($e);
            return redirect()->back();

        }

    }

    // public function price_fullpayment(Request $request){

    //     try {
            
    //         Order::where('id', $request->order_id)->update([
    //             'price_down_payment' => $request->input('price_down_payment'),
    //         ]);

    //         Alert::success('Success', 'Price update successfully');
    //         return redirect()->back();

    //     } catch (\Throwable $e) {
            
    //         dd($e);
    //         return redirect()->back();

    //     }

    // }

    public function confirmation_order(Request $request){
        
        $validator = Validator::make($request->all(), [
            'queue_number'           => 'required|unique:orders,queue_number,',
            'status'                 => 'required|in:approved,rejected',
        ],[
            'queue_number'           => 'No antrian sudah ada',
            'status'                 => 'Order status tidak boleh kosong',
        ]);

        if ($request->status == 'rejected') {
                
            try {
        
                Order::where('id', $request->order_id)->update([
                        'status'            => $request->input('status'),
                    ]);
        
                    Alert::success('Success', 'Status update successfully');
                    return redirect()->back();
        
            } catch (\Exception $e) {

                dd($e);
                return redirect()->back();
            }
            
        } else {
            
            $payment   = 'pay_dp';
            $status_dp = 'waiting';
            $tire      = 'inspection';
            $number    = $request->queue_number;

            if ($validator->fails()) {
        
                return redirect()->back()->withErrors($validator)->withInput()->with('warning', 'Field not complete!');
            
            }else{
                
                try {
            
                    Order::where('id', $request->order_id)->update([
                            'status'            => $request->input('status'),
                            'queue_number'      => $number,
                            'payment_status'    => $payment,
                            'tire_status'       => $tire,
                            'status_dp'         => $status_dp,
                        ]);
            
                        Alert::success('Success', 'Status update successfully');
                        return redirect()->back();
            
                } catch (\Exception $e) {
    
                    dd($e);
                    return redirect()->back();
                }
            }
            
        }
        
    }

    public function status_dp(Request $request){


        if ($request->status == 'approved') {

            try {
            
                Order::where('id', $request->order_id)->update([
                    'status_dp'  => $request->input('status'),
                    'status_fp'  => 'waiting',
                ]);
    
                Alert::success('Success', 'Status update successfully');
                return redirect()->back();
    
            } catch (\Throwable $e) {
                
                dd($e);
    
            }

        }else{

            try {
            
                Order::where('id', $request->order_id)->update([
                    'status_dp'  => $request->input('status'),
                ]);
    
                Alert::success('Success', 'Status update successfully');
                return redirect()->back();
    
            } catch (\Throwable $e) {
                
                dd($e);
    
            }

        }

    }
    public function status_fp(Request $request){


        if ($request->status == 'approved') {

            try {
            
                Order::where('id', $request->order_id)->update([
                    'status_fp'       => $request->input('status'),
                    'payment_status'  => 'paid',
                ]);
    
                Alert::success('Success', 'Status update successfully');
                return redirect()->back();
    
            } catch (\Throwable $e) {
                
                dd($e);
    
            }

        }else{

            try {
            
                Order::where('id', $request->order_id)->update([
                    'status_fp'  => $request->input('status'),
                ]);
    
                Alert::success('Success', 'Status update successfully');
                return redirect()->back();
    
            } catch (\Throwable $e) {
                
                dd($e);
    
            }

        }

    }

    public function invoice_dp($id){

        $data['orders'] = Order::with('user')->where('id', $id)->get();
        $pdf = PDF::loadView('invoice.invoice_dp',$data,['orientation' => 'portrait']);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('invoice.pdf');
    }

    public function invoice_fp($id){

        $data['orders'] = Order::with('user')->where('id', $id)->get();
        $pdf = PDF::loadView('invoice.invoice_fp',$data,['orientation' => 'portrait']);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('Invoice_Full_Payment.pdf');

    }

}
