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
<section class="checkout">
    <div class="container">
        <div class="row">
            <div class="checkoutcontent">
                <h3 class="pt-5">Buy For Me Service Request Preview</h3>
                <p>Please note that you may only purchase products from one country at a time. If you would like to
                    shop from another country, a separate order must be created.
                    <br><br>
                    Here is the list of products you added to your buy for me service request.
                </p>
                {{-- <div class="location">
                    <img src="images/saudi.png" alt=""><span class="pl-3">Saudi Arabia</span>
                    <span><i class="bi bi-arrow-right"></i></span>
                    <span><img src="images/az.png" alt=""></span><span>Azerbaijan</span>
                </div> --}}
            </div>
            <div class="row mt-3 pr_details">

                <div class="table-responsive">
                    <table class="table table-default text-center">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Description</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\Cart::getContent() as $item)
                            <tr class="">
                                <td scope="row"><a href="{{$item->name}}">Click Here</a></td>
                                <td scope="row">{{$item->attributes->pro_description}}</td>
                                <td scope="row">{{$item->quantity}}</td>
                                <td scope="row">USD {{$item->price}}</td>
                                <td scope="row">USD {{$item->price * $item->quantity }}</td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
                
                {{-- <div class="col-md-3">
                    <h6>Product</h6>
                    <div class="product_des">
                     <img src="images/wa.jpg" alt="">
                        <span><a href="https://www.ebay.com/itm/266092529246">https://www.ebay.com/itm/266092529246</a></span>
                    </div>
                </div>

                <div class="col-md-3">
                    <h6>Description</h6>
                    <div class="desc_muu">
                        <p>Garmin vívoactive 4S 40mm GPS Running Watch - Rose</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6>Quantity</h6>
                    <p>2</p>
                </div>
                <div class="col-md-2">
                    <h6>Unit Price</h6>
                    <p>2.00 USD</p>
                </div>
                <div class="col-md-2">
                    <h6>Total Price</h6>
                    <p>4.00 USD</p>
                </div> --}}


                
            </div>
            <!-- order summary  -->
            <div class="row pb-5">
                <div class="col-md-12">
                    <div class="order_summ">
                        <h3 class="pt-5">Order Summary - ({{ \Cart::getContent()->count() ?? 0}} product)</h3>
                        <div class="summary_list mt-1">
                            <ul class="list">
                                <li class="d-flex justify-content-between lh-condensed pt-2 pb-2">
                                    <div>
                                        <h6 class="my-0">Products Subtotal</h6>
                                    </div>
                                    <span class="text-muted">{{ \Cart::getSubTotal() }} USD</span>
                                </li>
                                <li class="d-flex justify-content-between lh-condensed pt-2 pb-2">
                                    <div>
                                        <h6 class="my-0">Domestic Shipping</h6>
                                    </div>
                                    <span class="text-muted">0.00 USD</span>
                                </li>
                                <li class="d-flex justify-content-between lh-condensed pt-2 pb-2">
                                    <div>
                                        <h6 class="my-0">Buy For Me Fee</h6>
                                        <small class="text-muted">(Processing Fee 8.00%)</small>
                                    </div>
                                    <span class="text-muted">0.00 USD</span>
                                </li>
                                <li class="d-flex justify-content-between lh-condensed pt-2 pb-2">
                                    <div>
                                        <h6 class="my-0">Bank Fee</h6>
                                        <small class="text-muted">(Processing Fee 4.50%)</small>
                                    </div>
                                    <span class="text-muted"> @php 
                                        $bankfee = config("constants.charges.bank_fee");
                                       $total = \Cart::gettotal();
                                       echo  $total/100 * $bankfee; 
                                        @endphp USD
                                      </span></span>
                                </li>
                                <hr>
                                <li class="d-flex justify-content-between lh-condensed pt-2 pb-2">
                                    <div>
                                        <h6 class="my-0 fw-bold">Total Amount Due Now</h6>
                                    </div>
                                    <span class="text-muted">  @php 
                                        $bankfee = config("constants.charges.bank_fee");
                                       $total = \Cart::gettotal();
                                       echo  $total + $total/100 * $bankfee; 
                                       @endphp  USD
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <p class="international">The international shipping fee to your address will be paid after
                            your items arrive at
                            your host's address, when confirming your order.
                            <br><br>
                            If the product is sold with a currency other than USD, the conversion fee of 5% will be
                            added to the product amount.
                            <br><br>
                            Please note that "Buy For Me and Bank Fee" are <b>non-refundable</b>
                        </p>
                    </div>
                </div>
            </div>
            <!-- ordersummary end -->
            <!-- payment start  -->
            <div class="row pb-5">
                <div class="col-md-7 offset-2">
                    <div class="payment_mu pt-1 pb-5">
                        <!-- 3d payment accordian -->
                        <div class="credit-card" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" fdprocessedid="pnkosh">
                                        <i class="bi bi-plus"></i>
                                        <span class="credit-mu">Add Credit Card </span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <form action="{{ route("checkout.store") }}" method="POST" class="accordion-body">
                                       @csrf
                                       <input type="hidden" name="country_from" value=" {{ $country_from }}" />
                                       <input type="hidden" name="country_to" value=" {{ $country_to }}" />
                                        
                                       <div class="row"> 
                                            <div class="col-md-12 ">
                                                
                                            <h6>Card Number</h6>
                                            <div id="card-element" class="field border mx-2 px-2"></div>
                                            {{-- <input class="cc-number" fdprocessedid="has72b" id="cardnumber" maxlength="19" name="credit_number" pattern="\d*" placeholder="1234 1234 1234" type="tel" /> --}}
                                            </div>
                                        </div>
                                        <div class="row mt-4 mx-1 p-0">
                                            <div class="col-md-12">
                                                <h6>Country</h6>
                                                <select name="country" id="pay_country" fdprocessedid="nnvq5b">
                                                    @foreach(config("constants.countries") as $k => $item)
                                                      <option value="{{$k}}">{{$item}}</option>
                                                    @endforeach
                                                </select>
                                                <p class="pt-4">By providing your card information, you allow Shippn
                                                    to charge your card for future payments in accordance with their
                                                    terms.</p>
                                                <button class="btn pay_btn" fdprocessedid="du8l3g">CONFIRM ORDER</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- 3d payment accordian end -->

                        <!-- credit card payment accordian -->
                        <div class="creditcard">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" fdprocessedid="ppxtnd">
                                        <i class="bi bi-plus"></i>
                                        <span class="credit-mu">Saved Credit Card</span>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body credit_body">
                                       <table>
                                       </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- credit card payment end -->
                    </div>
                </div>
                <!-- payment end  -->
            </div>
        </div>           
        </div>
        
</section>


 <!-- footer -->

<div>
<script>
    var post_url = '{{ route("checkout.store") }}';
     var stripe = Stripe('pk_test_51JIdZVJehHGbCsaCYiCquX3mKuZDrym2d3EU31L8fDxs8886NBrqsg3rYrp8bHIdl7wvARE7vxLuNfhsrY5SFbCw00tHX5coQC');
    var elements = stripe.elements();
    var card = elements.create('card', {
    hidePostalCode: true,
    style: {
        base: {
        iconColor: '#000',
        color: '#000',
        lineHeight: '40px',
        fontWeight: 300,
        fontFamily: 'Helvetica Neue',
        fontSize: '18px',
        '::placeholder': {
            color: '#ff6c36',
        },
        },
    }
    });
    card.mount('#card-element');

    function setOutcome(result) {
    // var successElement = document.querySelector('.success');
    // var errorElement = document.querySelector('.error');
    // successElement.classList.remove('visible');
    // errorElement.classList.remove('visible');
   
    if (result.token) {
        
        let data = 
        {
            "_token": $("input[name='_token']").val(),
            "country_from":  $("input[name='country_from']").val(),
            "country_to":  $("input[name='country_to']").val(),
            "country":  $("select[name='country']").val(),
            "token": result.token
        };
        $.ajax({
            url: post_url,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) 
            {
               if(data.success == true)
               {
                 window.location.href = "/travelar/dashboard"
               }
               else
               {
                alert(data.message);
               }
            }
        });
        // In a real integration, you'd submit the form with the token to your backend server
        //var form = document.querySelector('form');
        //form.querySelector('input[name="token"]').setAttribute('value', result.token.id);
        //form.submit();
        
    } else if (result.error) {
        alert(result.error.message);
        // errorElement.classList.add('visible');
     }
    }

    card.on('change', function(event) {
    setOutcome(event);
    });
    document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();
    var options = {
        country:  document.getElementById('pay_country').value,
    };
    
    stripe.createToken(card, options).then(setOutcome);
    });
</script>
@endsection
