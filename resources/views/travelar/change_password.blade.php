@extends('layouts.app_front')

@section('content')
<link rel="stylesheet" href="{{ asset("css/profile_form.css") }}">
<section class="profile pb-5 mb-5">
    <div class="container">
        <div class="row pt-5">
            <!-- profilesidebar -->
            <div class="col-md-3">
                @include('travelar._shared.travelar_menus');
            </div>
            <!-- profilesidebar end -->
            <div class="col-md-9">
                <form action="{{route('store_change_password')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row p-5">
                        <div class="">
                            <h2 class="fs-title">Change Password: </h2>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Old Password: *</label>
                                <input type="password" id="exampleInputEmail1" class="form-control" name="oldpassword"
                                     placeholder="Old Password" />
                                </div>
                        </div>


                        <div class="col-md-12">
                        <div class="form-group">
	                        <label>New Password</label>
	                        <code>*</code>
	                        <input name="newpassword" id="password" minlength="8" type="password" class="form-control" required>
	                    </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <code>*</code>
                                <input name="password_confirmation" data-rule-equalTo="#password" type="password" class="form-control" required>
                            </div>
                        </div>
                       
                        <div class="col-md-12 ">
                        <button type="submit" class="btn btn-default btn-lg border-dark mt-5">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
