<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Inspection;
use App\Models\Scheduller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


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

                Order::where('id', $request->order_id)->update([
                    'tire_status' => 'scheduller',
                ]);
    

                Alert::success('Success','Berhasil inspeksi');
                return redirect()->back();

            } catch (\Throwable $e) {
                dd($e);
            }

        }
        
    }

    public function manager_scheduller_page($id){

        $inspection = Inspection::with('order')->where('id', $id)->get();
        // dd($inspection);
        return view('manager.scheduller',compact('inspection'));

    }

    public function manager_scheduller_action(Request $request){

        try {
            
            Scheduller::create([

                'order_id'              => $request->order_id,
                'inspection_id'         => $request->inspection_id,
                'total_tire'            => $request->total_tire,
                'initial_inspection'    => $request->initial_inspection,
                'washing'               => $request->washing,
                'hotroom'               => $request->hotroom,
                'flexible_buffing'      => $request->flexible_buffing,
                'tire_washing'          => $request->tire_washing,
                'cementing'             => $request->cementing,
                'building_perfection'   => $request->building_perfection,
                'grooving'              => $request->grooving,
                'curing'                => $request->curing,
                'finishing'             => $request->finishing,
                'final_inspection'      => $request->final_inspection,
                'total_hour'            => $request->total_hour,
                'start_reparation_date' => $request->start_reparation_date,
                'end_reparation_date'   => $request->end_reparation_date,
                'estimasi_due_date'     => $request->estimasi_due_date,

            ]);

            Order::where('id', $request->order_id)->update([
                'tire_status' => 'reparation',
            ]);

            Alert::success('Success','Berhasil melakukan scheduller');
            return redirect()->back();

        } catch (\Throwable $e) {
            dd($e);
        }

    }

    public function manager_production_report_page(){

        $orders = Order::with('user')->get();
        $order = $orders->count();
        $approved = $orders->where('status','approved')->count();
        $waiting = $orders->where('status','waiting')->count();
        $rejected = $orders->whereIn('status', 'rejected')->count();
        
        return view('manager.production_report', compact('orders','order','approved','waiting','rejected'));

    }

    public function manager_production_report_pdf()
    {
        $currentDateTime = Carbon::now();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
    
        $orders = Order::with('user')->get();
    
        $data = [
            'orders' => $orders,
            'formattedDateTime' => $formattedDateTime,
            'order' => $orders->count(),
            'approved' => $orders->where('status', 'approved')->count(),
            'waiting' => $orders->where('status', 'waiting')->count(),
            'rejected' => $orders->whereIn('status', ['rejected'])->count(),
        ];
        

        $pdf = PDF::loadView('manager.productionpdf', $data);
        $pdf->setPaper('A4', 'portrait');
    
        return $pdf->download('production_report.pdf');

        // $currentDateTime = Carbon::now();
        // $formattedDateTime = $currentDateTime->format('F d, Y');
        // $orders = Order::with('user')->get();
        // $data['orders'] = Order::with('user')->get();
        // $order = $orders->count();
        // $approved = $orders->where('status','approved')->count();
        // $waiting = $orders->where('status','waiting')->count();
        // $rejected = $orders->whereIn('status', 'rejected')->count();

        // return view('manager.productionpdf',compact('formattedDateTime','orders','order','approved','waiting','rejected'));
    }

}
