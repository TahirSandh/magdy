@extends('layouts.app_front')

@section('content')

<section class="profile p-5">
    <div class="container">
        <div class="row pt-5">
            <!-- profilesidebar -->
            <div class="col-md-3">
                @include('travelar._shared.travelar_menus');
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
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $card)
                           
                              @foreach($card->Orderdetail as $index => $deatail)
                              @if($deatail->status == 0)
                              <tr class="order">
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ isset($deatail) ?  $deatail->product_link : ''}}</td>
                                <td>{{ isset($deatail) ?  $deatail->product_description : ''}}</td>
                                    <td>{{ isset($deatail) ?  $deatail->product_quantity : ''}}</td>
                                    <td>{{ isset($deatail) ?  $deatail->product_price : ''}}</td>
                                    <td>{{ isset($deatail) ?  ($deatail->product_quantity * $deatail->product_price) : ''}}</td>
                                    @if($deatail->status == 0)
                                    <td class="text-primary">Pending</td>
                                    @elseif($deatail->status == 1)
                                    <td class="text-success">Accecpted</td>
                                    @elseif($deatail->status == 2)
                                    <td class="text-warning">Completed</td>
                                    @elseif($deatail->status == 3)
                                    <td class="text-primary">Rejected</td>
                                    @endif
                                    <td><a class="btn btn-primary" href="{{ route("shopper-view",["id" => $deatail->id]) }}">View</a></td>
                            
                                 </tr>
                                 @endif
                                @endforeach
                            
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


<!--Start  Modal -->
<div class="modal fade  " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" action="{{ route("add_address") }}" method="post" novalidate>
              @csrf
              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Address Line 1</label>
                <input type="text" name="address_1" class="form-control" id="validationCustom01"  required>
              </div>
              <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Address Line 2</label>
                <input type="text" name="address_2" class="form-control" id="validationCustom02" required>
              </div>
              <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Country</label>
                <select class="form-select" name="country">
                 @foreach(config("constants.countries") as $k => $item)
                    <option value="{{$k}}">{{$item}}</option>
                 @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="validationCustom03" class="form-label">City</label>
                <input type="text" name="city" class="form-control" id="validationCustom03" required>
              </div>
              <div class="col-md-6">
                <label for="validationCustom05" class="form-label">State</label>
                <input type="text" name="state" class="form-control" id="validationCustom05" required>
              </div>
              <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Post Code</label>
                <input type="text" name="postal" class="form-control" id="validationCustom05" required>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value=1 name="d_address" id="invalidCheck" required>
                  <label class="form-check-label" for="invalidCheck">
                    Default address
                  </label>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary" type="submit">Submit form</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- End Modal -->

</section>
@endsection
