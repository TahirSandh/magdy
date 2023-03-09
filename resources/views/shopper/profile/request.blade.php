@extends('layouts.app_front')

@section('content')

<section class="profile p-5">
    <div class="container">
        <div class="row pt-5">
            <!-- profilesidebar -->
            <div class="col-md-3">
                @include('shopper._shared.shopper_menus');
            </div>
            <!-- profilesidebar end -->
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Order Listing</h2>
                         <table class="table">
                            <thead>
                              <tr>
                                 <th>S.#</th>
                                 <th>Product Link</th>
                                 <th>Product Description</th>
                                 <th>Quantity</th>
                                 <th>Price</th>
                                 <th>total</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $card)
                               <tr>
                               <td colSpan="2"><b>Order-{{$card->id}}<b></td> 
                               <td colspan="5" class="text-end"><a class="btn btn-danger" href="{{ route("delete_card",["id" => $card->id]) }}">delete</a></td>
                               <td>
                                @foreach($card->Orderdetail as $index => $deatail)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ isset($deatail) ?  $deatail->product_link : ''}}</td>
                                    <td>{{ isset($deatail) ?  $deatail->product_description : ''}}</td>
                                    <td>{{ isset($deatail) ?  $deatail->product_quantity : ''}}</td>
                                    <td>{{ isset($deatail) ?  $deatail->product_price : ''}}</td>
                                    <td>{{ isset($deatail) ?  ($deatail->product_quantity * $deatail->product_price) : ''}}</td>
                                 </tr>
                                @endforeach
                              </td>
                           </tr>
                            @endforeach
                           </tbody>
                        </table>
                    </div>
                    <div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
