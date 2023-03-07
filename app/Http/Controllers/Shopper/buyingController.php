<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class buyingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        //
        $data["product_link"] = $request->product_link;
        $data["cart"] =  $items = \Cart::getContent();
        return view("buying.index",$data);
    }

    public function add_product(request $requests)
    {
        // echo "<pre>";
        $requests->validate([
            'pro_url' => ['required', 'url', 'max:500'],
            'pro_description' => ['required', 'string', 'max:300'],
            'amount' => ['required', 'digits_between:1,99999999999999'],
            'qty' => ['required', 'digits_between:1,10']
        ]);
       
        $response = \Cart::add([
            'id' => rand(1,100000000),
            'name' => $requests->pro_url,
            'price' => $requests->amount,
            'quantity' => $requests->qty,
            'attributes' => 
                [
                'pro_description' => $requests->pro_description,
                'country_from' => $requests->country_from,
                'country_to' => $requests->country_to
                ],
        ]);
       return redirect()->back()->with(["success" => true , "message" => "product add to cart successfull"]);
    }

    public function delete_product($id)
    {
        \Cart::remove($id);
        return redirect()->back()->with(["success" => true , "message" => "item removed from cart..."]);
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
    public function store(Request $request)
    {
        //
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
