@extends('layouts.app_Front')

@section('content')
<link rel="stylesheet" href="{{ asset("css/profile_form.css") }}">
<section class="profile">
    <div class="container">
        <div class="row pt-5">
            <!-- profilesidebar -->
            <div class="col-md-3">
                @include('travelar._shared.travelar_menus');
            </div>
            <!-- profilesidebar end -->
            <div class="col-md-9">
                <form action="{{ route('setup_profile.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row p-5">
                        <div class="">
                            <h2 class="fs-title">Profile Information: </h2>
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
                            <div class="profile-pic  m-3">
                                @if(!empty(auth::user()->profile_image))
                                <img alt="User Pic" src="{{ auth::user()->profile_image_url."/".auth::user()->profile_image }}"
                                    id="profile-image1" height="200" class="profile_image">
                                @else
                                <img alt="User Pic" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png"
                                    id="profile-image1" height="200" class="profile_image">
                                @endif
                
                                <input id="profile-image-upload" class="hidden" type="file" name="profile_pic" onchange="previewFile()">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">First Name: *</label>
                                <input type="text" id="exampleInputEmail1" class="form-control" name="F_name"
                                    value="{{ Auth::user()->f_name }}" placeholder="First Name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail2">Last Name: *</label>
                                <input type="text" id="exampleInputEmail2" class="form-control" name="l_name"
                                    value="{{ Auth::user()->l_name }}" placeholder="Last Name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email: *</label>
                                <input type="email" id="exampleInputEmail3" disabled class="form-control" name="email"
                                    value="{{ Auth::user()->email }}" placeholder="Email Id" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail4">Phone Number: *</label>
                                <input type="tel" id="exampleInputEmail4" class="form-control" name="phone"
                                    value="{{ Auth::user()->phone }}" placeholder="phone" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail5">Occupation</label>
                                <input type="text" id="exampleInputEmail5" value="{{  auth::user()->occupation }}" class="form-control" name="occupation"
                                    placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail6">Birthday</label>
                                <input type="date" id="exampleInputEmail6" class="form-control" name="dob"
                                placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mt-3" for="">Gender</label><br>
                              <div class="mt-3">
                                <div class="form-check form-check-inline">
                                    <input @if(Auth::user()->gender == "male") checked @endif type="radio" value="male" id="customRadioInline1" name="gender" class="form-check-input">
                                    <label  class="custom-control-label" for="customRadioInline1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input @if(Auth::user()->gender == "female") checked @endif type="radio" value="female" id="customRadioInline2" name="gender" class="form-check-input">
                                    <label class="custom-control-label" for="customRadioInline2">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input  @if(Auth::user()->gender == "other") checked @endif type="radio" value="other" id="customRadioInline3" name="gender" class="form-check-input">
                                    <label class="custom-control-label" for="customRadioInline3">Other</label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <label class="fieldlabels">Newsletter Membership </label>  <br>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" value="Yes" name="customRadioInline1" class="custom-control-input">
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail7">Facebook</label>
                                <input type="url" id="exampleInputEmail7" value="{{  auth::user()->facebook }}"  class="form-control" name="facebook"
                                    placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail8">Tweeter</label>
                                <input type="url" id="exampleInputEmail8" value="{{  auth::user()->tweeter }}"  class="form-control" name="tweeter"
                                placeholder=" " />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail9">Instagram</label>
                                <input type="url" id="exampleInputEmail9" value="{{  auth::user()->insta }}" class="form-control" name="insta"
                                    placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail10">linkdin</label>
                                <input type="url" id="exampleInputEmail10" value="{{  auth::user()->linkdin }}" class="form-control" name="linkdin"
                                placeholder="" />
                            </div>
                        </div>
                        <div class="col-md-12 ">
                        <button class="btn btn-default btn-lg border-dark mt-5">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
