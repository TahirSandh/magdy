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
                        <h2>ADD CARD</h2>
                         <table class="table">
                            <thead>
                              <tr>
                                 <th>S.#</th>
                                 <th>Type</th>
                                 <th>Card</th>
                                 <th>Expiry</th>
                                 <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach(auth::user()->Credit_Card()->get() as $key => $card)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $card->pm_type }}</td>
                                    <td>{{ $card->pm_last_four }}</td>
                                    <td>{{ $card->expire_month }}/{{ $card->expire_year }}</td>
                                    <td><a class="btn btn-danger" href="{{ route("delete_card",["id" => $card->id]) }}">delete</a></td>
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
