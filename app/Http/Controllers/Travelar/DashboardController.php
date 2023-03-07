<?php

namespace App\Http\Controllers\Travelar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
class DashboardController extends Controller
{

        function __construct()
        {
             $this->middleware('permission:travelar-dashboard', ['only' => ['index']]);
        }
    //
    public function index()
    {
        $data["addresses"] = Auth::user()->user_address()->get();
       return view("travelar.dashboard",$data);  
    }

    public function change_password()
    {
       return view('travelar.change_password');
    }

    public function order_request(){
        $data = Order::with('Orderdetail')->get();
        return view("travelar.request",compact('data'));
    }
}
