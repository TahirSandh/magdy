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


<section class="host">
        <div class="container">
            <div class="row">
                <!-- sidebar -->
                <div class="col-md-3">
                    <div class="host_sidebar">
                        <h3 class="pt-5 pb-3">Our hosts in Canada</h3>
                        <!-- select country -->
                        <div class="host_con">
                            <h4>Change Country</h4>
                            <select name="" id="">
                                <option value="Australia">Australia </option>
                                <option value="Azerbaijan">Azerbaijan </option>
                                <option value="Brazil">Brazil</option>
                                <option value="Canada">Canada</option>
                                <option value="China">China</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Egypt">Egypt</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Italy">Italy</option>

                            </select>
                        </div>
                        <!-- select country end -->


                        {{-- <!-- filters start -->
                        <div class="filter">
                            <h4>Filters</h4>
                            <div class="additionalservice">
                                <h5>Additional Services</h5>
                                <input type="checkbox" name="" id="">
                                <label for="">Consolidation</label>
                                <br>
                                <input type="checkbox" name="" id="">
                                <label for="">Item Photos</label>
                                <br>
                                <input type="checkbox" name="" id="">
                                <label for="">Repacking</label>
                                <br>
                                <input type="checkbox" name="" id="">
                                <label for="">Storage</label>
                            </div>
                            <div class="additionalservice mt-3">
                                <h5>Host Languages</h5>
                                <input type="checkbox" name="" id="">
                                <label for="">English</label>
                                <br>
                                <input type="checkbox" name="" id="">
                                <label for="">Turkish</label>
                                <br>
                                <input type="checkbox" name="" id="">
                                <label for="">French</label>
                            </div>
                            <ul class="list pt-3">
                                <li class="d-flex justify-content-between lh-condensed pt-2 pb-2">
                                    <div>
                                        <h6 class="my-0">Host Rate:</h6>
                                    </div>
                                    <span class="text-white">0.5/5</span>
                                </li>
                            </ul>
                            <input type="range">
                        </div> --}}
                        <!-- filters end -->
                    </div>
                </div>
                <!-- sidebar end -->

                <!-- maincontent start -->
                <div class="col-md-9">
                    <div class="reviews">
                        <h6>There are 3 hosts based on current filters</h6>
                        <!-- host boxes -->
                        <div class="hostboxes pt-5">
                            <div class="row">
                             
                              @foreach($users as $usr)
                                <div class="col-md-4 host_img">
                                    <img src="images/host1.jpg" alt="">
                                    <h6 class="text-center"></h6>
                                    <div class="host1_box">

                                        <h5>{{ $usr->name }}</h5>
                                        <p>British Columbia</p>
                                        <img class="star" src="{{ asset("front/images/star.png") }}" alt="">
                                        {{-- <h4>NEW HOST</h4> --}}
                                        <p>Give A Chance</p>
                                        <button class="btn hostbtn">GET THIS ADDRESS</button>
                                    </div>
                                </div>
                                @endforeach
                                {{-- <div class="col-md-4">
                                    <img class="host2_img" src="images/host2.jpg" alt="">
                                    <h6 class="text-center onour"></h6>
                                    <div class="host2">
                                        <h5>Onur</h5>
                                        <p>British Columbia</p>
                                        <img class="rev" src="images/star.png" alt="">
                                        <span class="fs-6 p-0">5 . 65 reviews</span>
                                        <hr>
                                        <i class="bi bi-box"></i><span>504
                                            Handled Packages</span>
                                        <br>
                                        <i class="bi bi-chat-square-heart"></i><span>5Provides Additional
                                            Services</span>
                                        <button class="btn host2_btn">GET THIS ADDRESS</button>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img class="host2_img" src="images/host3.jpg" alt="">
                                    <h6 class="text-center onour"></h6>
                                    <div class="host2">
                                        <h5>Ryan</h5>
                                        <p>British Columbia</p>
                                        <img class="rev" src="{{ asset("images/star.png") }}" alt="">
                                        <span class="fs-6 p-0">4 . 101 reviews</span>
                                        <hr>
                                        <i class="bi bi-box"></i><span>581
                                            Handled Packages</span>
                                        <br>
                                        <i class="bi bi-chat-square-heart"></i><span>5Provides Additional
                                            Services</span>
                                        <button class="btn host2_btn">GET THIS ADDRESS</button>

                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <!-- host boxes end -->
                    </div>
                </div>
            </div>
        </div>
    </section>





<script>
    $(function(){
       
    })

</script>
@endsection
