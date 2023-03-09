@extends('layouts.app_Front')

@section('content')
<link rel="stylesheet" href="{{ asset("css/profile_form.css") }}">
<section class="profile p-5">
    <div class="container">
        <div class="row pt-5">
            <!-- profilesidebar -->
            <div class="col-md-3">
                @include('travelar._shared.travelar_menus');
            </div>
            <!-- profilesidebar end -->
            <div class="col-md-9">
                <form action="{{ route('approved') }}" method="post">
                    @csrf
                    <div class="row p-5">
                        <div class="">
                            <h2 class="fs-title">Order Detail: </h2>
                        </div>
                        <input type="hidden" name="order_id" value="{{$detail->id}}" />
                    <div class="row" style="margin: 5px 5px;">
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="exampleInputEmail2">Order #:</label>
                            <span>{{ $detail->Order->id }}</span>   
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="exampleInputEmail2">Card #:</label>
                            <span>{{ $detail->Order->card_id }}</span>   
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="exampleInputEmail2">Country From:</label>
                            <span>{{ $detail->Order->country_from }}</span>   
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="exampleInputEmail2">Country :</label>
                            <span>{{ $detail->Order->country_to }}</span>   
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin: 5px 5px;">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="exampleInputEmail2">Link:</label>
                            <span> {{ $detail->product_link }}</span>   
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="exampleInputEmail2">Description:</label>
                            <span> {{ $detail->product_description }}</span>   
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label for="exampleInputEmail2">Quantity:</label>
                            <span> {{ $detail->product_quantity }}</span>   
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                            <label for="exampleInputEmail2">Price:</label>
                            <span> {{ $detail->product_price }}</span>   
                            </div>
                        </div>

                    </div>

                    <div class="row" style="margin: 5px 5px;">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="exampleInputEmail2">Product Weigth:</label>
                            <span> {{ $detail->product_weigth }}</span>   
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="exampleInputEmail2">Product Weigth Type:</label>
                            <span> {{ $detail->product_weigth_type }}</span>   
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="exampleInputEmail2">Status:</label>
                            @if($detail->status == 0)
                            <span class="text-primary">Pending</span>
                            @elseif($detail->status == 1)
                            <span class="text-primary">Accecpted</span>
                            @elseif($detail->status == 2)
                            <span class="text-warning">Completed</span>
                            @elseif($detail->status == 3)
                            <span class="text-warning">Rejected</span>
                            @endif  
                            </div>
                        </div>

                      

                    </div>

                        
                        <div class="col-md-12 ">
                        <button class="btn btn-default btn-lg border-dark mt-5">Accepted</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
