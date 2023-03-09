<?php

namespace App\Http\Controllers\Travelar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Gallery;
use Auth;
class DashboardController extends Controller
{

    function __construct()
    {
            $this->middleware('permission:travelar-dashboard', ['only' => ['index']]);
    }
    
    public function index()
    {
        $data["addresses"] = Auth::user()->user_address()->get();
        return view("travelar.dashboard",$data);  
    }

    public function change_password()
    {
        return view('travelar.change_password');
    }

    public function shopper_approved(){
        $data = Order::with('Orderdetail')->get();
        return view("travelar.request",compact('data'));
    }

    public function shopper_view($id){
       
        $detail = Orderdetail::with('Order')->where('id',$id)->first();
        return view("travelar.order_detail",compact('detail'));
    }

    public function approved(Request $request){
        try{
            $orderDetail = Orderdetail::where('id',$request->order_id)->first();
            $orderDetail->status = 1;
            $orderDetail->save();
            return redirect()->back()->with(["success" => true , "message" => "Approved Successfuly..." ]);
           }
           catch(\Exception $exception)
           { 
            return redirect()->back()->with(["success" => false , "message" => $exception->getMessage()]);
           }
    }

    public function parment_cards()
    {
        return view("travelar.profile.edit_cards");
    }

    public function travelar_document()
    {
        $gallery = Gallery::get();
        return view("travelar.document",compact('gallery'));
    }
}
