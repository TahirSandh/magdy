<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CardVerificationRequest;
use Auth;
use App\Models\Order;
use App\Models\Orderdetail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $stripe =  \Stripe\Stripe::setApiKey('sk_test_51JIdZVJehHGbCsaCtO53jxO0sNp5ENohIDu08KlDU7Xh5AroEdegLfy0bnjOd3rtfsAhJA19TiE2mEspXsFwGjdr00lF3TxhRG');
    }
    public function index($country_from = "",$country_to = "")
    {

        if($country_from == "" && $country_from == "")
        {
            return redirect()->back()->withErrors(["message"]);
        }
        $data["country_from"] = $country_from;
        $data["country_to"] = $country_to;
        // dd($data);
        return view("shopper.checkout.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        //
    //    / $validatedData = $request->validated();

    try{
        $input = $request->all();
        $customer = \Stripe\Customer::create([
            'source' => $input["token"]["id"],
            'email' => Auth::user()->email,
        ]);
        $card = Auth::user()->update([
            "stripe_id" => $customer["id"],
            "pm_type" => $input["token"]["card"]["brand"],
            "pm_last_four" => $input["token"]["card"]["last4"]
        ]);
        $card_history = Auth::user()->Credit_Card()->create([
            "stripe_id" => $customer["id"],
            "expire_year" =>  $input["token"]["card"]["exp_year"],
            "expire_month" =>   $input["token"]["card"]["exp_month"],
            "pm_type" => $input["token"]["card"]["brand"],
            "pm_last_four" => $input["token"]["card"]["last4"],
            "country" => $input["country"],
        ]);
        $order_master = Auth::user()->Orders()->create([
                "card_id" =>  $card_history->id,
                "country_from" =>  $request->country_from,
                "country_to" =>  $request->country_to,
                "status" => 0,
        ]);
        foreach(\Cart::getContent() as $item){
            $create_Array = [
                "order_id" =>  $order_master->id,
                'product_link' => $item->name,
                'product_description' =>  $item->attributes->pro_description,
                'product_quantity' => $item->quantity,
                'product_price' => $item->price,
                "product_weigth" => 0.00,
                "product_weigth_type" => 1,
            ];
            Orderdetail::create($create_Array);
            \Cart::clear();
        }
        return response()->json(["success" => true , "message" => "Order Has been Successfully Complete"], 200);
      } 
      catch(\Exception $ex)
      {
          return response()->json(["success" => false ,"message" => $ex->getmessage()], 500);
      }   
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
    }
}
