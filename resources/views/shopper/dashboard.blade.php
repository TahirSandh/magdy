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
                <div class="pr_information">
                    <h3 class="basic">Basic info
                        <span class="edit"><a href="{{ route("shopper-profile-edit") }}">Edit Profile<i class="bi bi-pencil-fill"></i></a></span>
                    </h3>
                    <hr>
                    <!-- innerrow -->
                    <div class="row">
                        <div class="col-md-6 pr-input pt-3">
                            <h4>Name</h4>
                            <h5 class="pt-1 pb-4">{{ Auth::user()->name }}</h5>
                            <h4>Email</h4>
                            <h5 class="pt-1 pb-4">{{ Auth::user()->email }}</h5>
                            <h4>Occupation</h4>
                            <h5 class="pt-1 pb-4">{{ Auth::user()->occupation }}</h5>
                            <h4>Gender</h4>
                            <h5 class="pt-1 pb-4">{{ Auth::user()->gender }}</h5>
                            {{-- <h4>Languages</h4>
                            <h5 class="pt-1 pb-4"></h5> --}}
                           

                        </div>
                        <div class="col  -md-6 pr-input pt-3">
                            {{-- <h4>Last Name</h4>
                            <h5 class="pt-1 pb-4">Mustafa</h5> --}}
                            <h4>Phone Number</h4>
                            <h5 class="pt-1 pb-4">+{{auth::user()->phone }}</h5>
                            <h4>Birthday</h4>
                            <h5 class="pt-1 pb-4">{{auth::user()->dob }}</h5>
                            <h4>Social Accounts</h4>
                            <h5 class="pt-1 pb-4">
                                <a href="{{ Auth::user()->facebook }}"><i class="bi bi-facebook"></i> </a> 
                                <a href="{{ Auth::user()->linkdin }}"><i class="bi bi-linkedin"></i></a>
                                <a href="{{ Auth::user()->insta }}"><i class="bi bi-instagram"></i></a>
                                <a href="{{ Auth::user()->tweeter }}"><i class="bi bi-twitter"></i></a>
                            </h5>
                            {{-- <h4>Newsletter Membership</h4>
                            <h5 class="pt-1 pb-4">No</h5> --}}
                            {{-- <h4>Your Interests</h4>
                            <h5 class="pt-1 pb-4"></h5> --}}
                        </div>
                    </div>
                    <!-- innerrow end -->
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
