@extends('layouts.app_front')

@section('content')
    

<!--header-->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<section class="orderdetails pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <div class="shopcontent_mu pb-5">
                    <h3 class="pt-5 pb-3">Buy For Me Order Details</h3>
                    <p>Please check your order details before you proceed to check out.
                        <br><br>
                        Please note that you may only purchase products from one country at a time.
                         If you would like to shop from another country, a separate order must be created.
                    </p>
                    @if(\Cart::getcontent())
                    <div class="table-responsive">
                    <table class="table table-striped
                    table-responsive
                    table-hover	
                    table-borderless
                    align-middle">
                      <thead class="table-light">
                            <tr>
                                <th>Product  </th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Actions </th>
                            </tr>
                            </thead>
                                <tbody class="table-group-divider">
                                    @foreach (\Cart::getcontent() as $item)
                                        <tr>
                                            <td><a href="{{ $item->name }}">Click Here</a></td>
                                            <td>{{ $item->price }} USD</td>
                                            <td>{{ $item->price * $item->quantity  }} USD</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{ $item->attributes->pro_description }}</td>
                                            <td>
                                                <a href="{{ route("delete_product", ["id" => $item->id ]) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                
                        <div class="shopform_mu">
                        <form action="{{ route("add_product") }}" method="POST"> 
                          @csrf
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button bg-dark text-white" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <h6 class="text-center add_product"> ADD PRODUCT</h6>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="first_step">
                                                <h6>Product Link</h6>
                                                <small>Please copy the URL of the product you want us to purchase in the
                                                    box below.</small>
                                                <input type="text" name="pro_url" value="{{ $product_link }}" placeholder="https://www.ebay.com/itm/182905307044">
                                            </div>
                                            <div class="first_step">
                                                <h6 class="pt-3">Product Description</h6>
                                                <small>Please add the color, size or any other specification of the
                                                    product. If no description needed, please state "none".</small>
                                                <input type="text" name="pro_description"
                                                    placeholder="Garmin Forerunner 35 Black GPS Sport Watch Wrist B">
                                            </div>
                                            <div class="first_step quantity">
                                                <h6 class="pt-3">Product Price</h6>
                                                <small>Please add the price of the product in local currency as seen on
                                                    the website including additional taxes, if applicable. If the
                                                    product is sold with a currency other than USD, the conversion fee
                                                    of 5% will be added to the product amount.</small>
                                                <br>
                                                <input type="text" name="amount" class="currency" placeholder="0.00">
                                                {{-- <select name="currency" id="currencyselect" form="shopform">
                                                    <option value="USD">USD</option>
                                                    <option value="EUR">EUR</option>
                                                    <option value="AUD">AUD</option>
                                                    <option value="CAD">CAD</option>
                                                    <option value="GBP">GBP</option>
                                                    <option value="SGD">SGD</option>
                                                    <option value="CHF">CHF</option>
                                                    <option value="JPY">JPY</option>
                                                    <option value="CNY">CNY</option>
                                                </select> --}}
                                            </div>
                                            <div class="first_step quantity">
                                                <h6 class="pt-3">Quantity</h6>
                                                <small>Please select the quantity</small>
                                                <br>
                                                <input type="number" name="qty" class="form-control w-25">
                                            </div>
                                            <div class="check_mu">
                                                {{-- <input type="checkbox" class="ml-3" name="" id="">
                                                <span>Do not continue with the “Buy For Me” order for the rest of the
                                                    items if this product is out of stock.</span><br> --}}
                                                <button type="submit " class="btn">Add Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </form>
                            <!-- select country -->
                            <div class="countrysel_mu">
                                <h6 class="pt-4">Select Country</h6>
                                <p>Please select the country you want to purchase from and deliver to</p>
                                <div class="row innershop_row">
                                    <div class="col-md-2">
                                        <h6>Shop from</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="country_from" id="country_from" class="shopselect">
                                            @foreach(config("constants.countries") as $k => $item)
                                               <option value="{{$k}}">{{$item}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <h6 class="text-center">to</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="country_to" id="country_to" class="shopselect">
                                            @foreach(config("constants.countries") as $k => $item)
                                               <option value="{{$k}}">{{$item}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-4 ordersummary_mu">
            <h3 class="pt-5 pb-3">Order Summary</h3>
            <div class="calculated">
            <ul class="list mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed pt-2 pb-2">
                  <div>
                    <h6 class="my-0">Products Subtotal</h6>
                  </div>
                  <span class="text-muted">{{\Cart::getSubTotal();}} USD</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed pt-2 pb-2">
                  <div>
                    <h6 class="my-0">Domestic Shipping</h6>
                  </div>
                  <span class="text-muted">0.00 USD</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed pt-2 pb-2">
                  <div>
                    <h6 class="my-0">BFM Service Fee</h6>
                    <small class="text-muted">(Processing Fee 8.00%)</small>
                  </div>
                  <span class="text-muted">0.00 USD</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed pt-2 pb-2">
                  <div>
                    <h6 class="my-0">Bank Fee</h6>
                    <small class="text-muted">(Processing Fee 4.50%)</small>
                  </div>
                  <span class="text-muted">
                      @php 
                      $bankfee = config("constants.charges.bank_fee");
                     $total = \Cart::gettotal();
                     echo  $total/100 * $bankfee; 
                      @endphp USD
                    </span>
                 </li>
                 <hr>
                 <li class="list-group-item d-flex justify-content-between lh-condensed pt-2 pb-2">
                    <div>
                      <h6 class="my-0">Total</h6>
                    </div>
                    <span class="text-muted">  @php 
                        $bankfee = config("constants.charges.bank_fee");
                       $total = \Cart::gettotal();
                       echo  $total + $total/100 * $bankfee; 
                        @endphp  USD</span>
                  </li>
                  <button class="btn btn-danger mt-3" id="check_out">Proceed to Checkout</button>

                </div>
                <div class="detail_info">
                <h6 class="pt-3 pb-3">Buy For Me Details:</h6>
                <p>After completing the checkout, our team will review your order, and if your order is approved you will receive an email confirmation.<br><br>

                    Once your product(s) are purchased, you will receive an email with the details of your order.
                    <br><br>
                    The international shipping fee from the host to your address will be paid after your product(s) arrive at your host's address when confirming your order.If you would like to estimate the international shipping cost for your order, please click Calculate button below</p>

                    <button class="btn">Calculate</button>
                    <p class="pt-4">If the product(s) are out of stock at time of the purchase, you will be notified.
                            <br><br>
                        Please refer to our Buy For Me Service details page for more information.</p>
                </div>
            </div>
       </div>
    </div>
    
</section>


 <!-- footer -->

<div>
<script>
    $(function(){
        $("#check_out").on("click",function(){
        
            var country_to = $("#country_to").val();
            var country_from = $("#country_from").val();
            if(country_to != "" && country_from != "" )
            {
                window.location.href = "/shopper/checkout/"+ country_from +"/"+country_to;
            }
            else
            {
                alert("Country To or From must be required")
            }
            // else
            // {
            // }
        
        })
    })

</script>
@endsection
