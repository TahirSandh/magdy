<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ShopFromController extends Controller
{
    //
    public function index(request $request)
    {
        $data["users"]  = User::role('Travelar')->get();
        return view("shopper.shopfrom.index",$data);
    }
}
