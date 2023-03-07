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
                 <form action="{{route('travelar-document-store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row p-5">
                        <div class="">
                            <h2 class="fs-title">Document Information: </h2>
                            @if(Session::has('success'))
                                @if(Session::get('success') == true)
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                                @elseif(Session::get('success') == false)
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                                @endif
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Document</label>
                                <code>*</code>
                                <input type="file" id="myfile" name="file">
                            </div>
                        </div>
                       
                        <div class="col-md-12 ">
                        <button type="submit" class="btn btn-default btn-lg border-dark mt-5">Save</button>
                        </div>
                    </div>
                </form>
        <!--Start Listing  -->
        <div class="row">
                    <div class="col-md-12">
                        <h2>Document Listing</h2>
                         <table class="table">
                            <thead>
                              <tr>
                              <th>S.#</th>
                                 <th>User #</th>
                                 <th>Document File</th>
                                 <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if(!empty($gallery))  
                              @foreach($gallery as $index => $data)
                              <tr class="order">
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ isset($data) ?  $data->user_id : ''}}</td>
                                    <td>{{ isset($data) ?  $data->filename : ''}}</td>
                                    <td colspan="5" class="text-end">
                                        <a class="btn btn-danger" href="{{ route("delete-gallery",["id" => $data->id]) }}">delete</a>
                                        <a class="btn btn-primary" href="{{ route("download",["file" => $data->filename]) }}"" download="{{$data->filename}}">Downlaod</a>
                                    </td>
                                   
                                </tr>
                                </tr>
                                @endforeach
                                @endif
                        </table>
                    </div>
                    <div>
                     </div>
                </div>
        <!-- End Listing -->


            </div>
        </div>
    </div>
 
</section>
@endsection
