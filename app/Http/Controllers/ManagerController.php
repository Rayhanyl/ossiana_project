<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Inspection;
use App\Models\Order;


class ManagerController extends Controller
{

    public function manager_dashboard(){

        $orders = Order::with('user')->get();
        $order = $orders->count();
        $approved = $orders->where('status','approved')->count();
        $waiting = $orders->where('status','waiting')->count();
        $rejected = $orders->whereIn('status', 'rejected')->count();
        
        return view('manager.index', compact('orders','order','approved','waiting','rejected'));
    }

    public function manager_inspect_page(){

        $orders = Order::with('user')->get();

        return view('manager.inspect_order',compact('orders'));
    }

    public function manager_detail_page($id){

        $orders = Order::where('id', $id)->get();
        $inspection = Inspection::with('order')->where('order_id', $id)->get();

        return view('manager.inspect_order_detail',compact('orders','inspection'));
    }

    public function manager_inspect_action(Request $request){

        $inspection = Inspection::with('order')->where('order_id', $request->order_id)->get();
        $id_order = 0;

        if (!empty($inspection)) {
            foreach ($inspection as $item){
                $id_order = $item->order_id;
                $inspection_id = $item->id; 
            }
        }
                
        if ($request->order_id == $id_order) {

            $file = $request->file('file_inspection');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = public_path().'/assets/inspection';
            $file->move($tujuan_upload,$nama_file);
            
            Inspection::where('id', $inspection_id)->update([
                'order_id'         => $request->order_id,
                'user_id'          => $request->user_id,
                'damage_type'      => $request->damage_type,
                'inspection_costs' => $request->inspection_cost,
                'file_inspection'  => $nama_file,
                'tire_arrival'     => $request->tire_arrival,
                'status'           => 'success',
            ]);

            Alert::success('Success','Berhasil update inspeksi');
            return redirect()->back();

        } else {
            
            try {

                $file = $request->file('file_inspection');
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = public_path().'/assets/inspection';
                $file->move($tujuan_upload,$nama_file);

                Inspection::create([

                    'order_id'         => $request->order_id,
                    'user_id'          => $request->user_id,
                    'damage_type'      => $request->damage_type,
                    'inspection_costs' => $request->inspection_cost,
                    'file_inspection'  => $nama_file,
                    'tire_arrival'     => $request->tire_arrival,
                    'status'           => 'success',

                ]);

                Alert::success('Success','Berhasil inspeksi');
                return redirect()->back();

            } catch (\Throwable $e) {
                dd($e);
            }

        }
        
    }

    public function manager_scheduller_page($id){

        return view('manager.scheduller');

    }

}
