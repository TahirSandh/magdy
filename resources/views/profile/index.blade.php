
@extends('layouts.app_front')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<link rel="stylesheet" href="{{ asset("css/profile_form.css") }}">
<style>
    .project-tab {
    padding: 10%;
    margin-top: -8%;
}
.project-tab #tabs{
    background: #007b5e;
    color: #eee;
}
.project-tab #tabs h6.section-title{
    color: #eee;
}
.project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #0062cc;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 3px solid !important;
    font-size: 16px;
    font-weight: bold;
}
.project-tab .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #0062cc;
    font-size: 16px;
    font-weight: 600;
}
.project-tab .nav-link:hover {
    border: none;
}
.project-tab thead{
    background: #f3f3f3;
    color: #333;
}
.project-tab a{
    text-decoration: none;
    color: #333;
    font-weight: 600;
}
</style>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <section id="tabs" class="project-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav>
                                <div class="nav nav-tabs nav-fill profile-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Besic Information</a>
                                    <a class="nav-item nav-link  nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Address</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Document</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <form action="{{ route('setup_profile.store') }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="">
                                                <h2 class="fs-title mt-5">Profile Information: </h2>
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
                                                    <label for="exampleInputEmail1">First Name: *</label>
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
                                
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                  <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                                     @if(Session::has("success"))
                                     @if(Session::get("success") == true)
                                        <div class="alert alert-success" role="alert">
                                            <strong>{{Session::get("message")}}</strong>
                                        </div>
                                     @else
                                      <div class="alert alert-success" role="alert">
                                         <strong>{{Session::get("message")}}</strong>
                                     </div>
                                     @endif
                                     @endif
                                     <img src="{{ asset("images/address-icon.png") }}" class="address-icon w-50 mt-5" />
                                     @if(count($addresses) == 0) <h3>You don't have any previously saved addresses, you can add a new address here.</h3> @endif
                                     <button class="btn btn-lg btn-warning text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Address</button>
                                     <table class="table mt-5">
                                            <thead>
                                                <tr>
                                                    <th colspan="3">Address Detail</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                            @foreach ($addresses as $item)
                                                <tr >
                                                    <th>
                                                        <div class="d-flex justify-content-between w-100">
                                                            <div>
                                                                <p>
                                                                    {{ $item->address_1 }}<br>
                                                                    {{ $item->address_2 }}<br>
                                                                    {{ $item->country }}<br>
                                                                    {{ $item->city }}<br>
                                                                    {{ $item->state }}<br>
                                                                    {{ $item->postal }}<br>
                                                                </p>
                                                            </div>
                                                            <div class="actions-buttons">
                                                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id}}"  class="btn btn-primary btn-md text-white">Edit</a> <br>
                                                                    <a href="{{ route('delete_address',["id" => $item->id]) }}" class="btn btn-danger btn-md text-white">Delete</a>
                                                            </div>  
                                                        </div>
                                                    </th>
                                                </tr>
                                             <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabe{{ $item->id }}" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Add New Address</h5>
                                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="g-3" action="{{ route("edit_address") }}" method="post" novalidate>
                                                                  @csrf
                                                                <div class="row">
                                                                    <input type="hidden" name="id" value="{{ $item->id }}"/>
                                                                  <div class="col-md-6">
                                                                    <label for="validationCustom01" class="form-label">Address Line 1</label>
                                                                    <input type="text" name="address_1" value="{{ $item->address_1 }}" class="form-control" id="validationCustom01"  required>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                    <label for="validationCustom02" class="form-label">Address Line 2</label>
                                                                    <input type="text" name="address_2" value="{{ $item->address_2 }}" class="form-control" id="validationCustom02" required>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                    <label for="validationCustom04" class="form-label">Country</label>
                                                                    <select class="form-select">
                                                                        @foreach(config("constants.countries") as $k => $item)
                                                                           <option value="{{$k}}">{{$item}}</option>
                                                                     @endforeach
                                                                    </select>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                    <label for="validationCustom03" class="form-label">City</label>
                                                                    <input type="text" name="city" value="{{ $item->city ?? "" }}" class="form-control" id="validationCustom03" required>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                    <label for="validationCustom05" class="form-label">State</label>
                                                                    <input type="text" name="state" value="{{ $item->state ?? ""}}" class="form-control" id="validationCustom05" required>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                    <label for="validationCustom05" class="form-label">Post Code</label>
                                                                    <input type="text" name="postal"  value="{{ $item->postal ?? 00 }}" class="form-control" id="validationCustom05" required>
                                                                  </div>
                                                                  <div class="col-12">
                                                                    <div class="form-check">
                                                                      <input class="form-check-input" @if($item->d_address ?? 0 == 1) checked @endif type="checkbox" value=1 name="d_address" id="invalidCheck" required>
                                                                      <label class="form-check-label" for="invalidCheck">
                                                                        Default address
                                                                      </label>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-12">
                                                                    <button type="submit" class="btn btn-primary mt-5" type="submit">Add Address</button>
                                                                  </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                   
                                          
                                            @endforeach
                                        </tbody>
                                     </table>
                                </div>
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
                                                <select class="form-select">
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

                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="mt-5">
                                     <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" 
                                                class="dropzone" id="dropzone">
                                             @csrf
                                    </form>   
                                </div>
                                </div>


                              
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>   
   
<script>
    
    Dropzone.options.dropzone =
         {
        maxFiles: 5, 
            maxFilesize: 4,
            //~ renameFile: function(file) {
                //~ var dt = new Date();
                //~ var time = dt.getTime();
               //~ return time+"-"+file.name;    // to rename file name but i didn't use it. i renamed file with php in controller.
            //~ },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            init:function() {
                // Get images
                
                var myDropzone = this;
                $.ajax({
                    url: '{{ route("get_documents") }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        debugger
                    //console.log(data);
                    $.each(data, function (key, value) {
                        var file = {name: value.name, size: value.size};
                        myDropzone.options.addedfile.call(myDropzone, file);
                        myDropzone.options.thumbnail.call(myDropzone, file, value.path);
                        myDropzone.emit("complete", file);
                    });
                    }
                });
            },
            removedfile: function(file) 
            {
                if (this.options.dictRemoveFile) {
                  return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {
                    if(file.previewElement.id != ""){
                        var name = file.previewElement.id;
                    }else{
                        var name = file.name;
                    }
                    //console.log(name);
                    $.ajax({
                        headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                        type: 'POST',
                        url: delete_url,
                        data: {filename: name},
                        success: function (data){
                            alert(data.success +" File has been successfully removed!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                        var fileRef;
                        return (fileRef = file.previewElement) != null ? 
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                   });
                }		
            },
       
            success: function(file, response) 
            {
                file.previewElement.id = response.success;
                //console.log(file); 
                // set new images names in dropzone’s preview box.
                var olddatadzname = file.previewElement.querySelector("[data-dz-name]");   
                file.previewElement.querySelector("img").alt = response.success;
                olddatadzname.innerHTML = response.success;
            },
            error: function(file, response)
            {
               if($.type(response) === "string")
                    var message = response; //dropzone sends it's own error messages in string
                else
                    var message = response.message;
                file.previewElement.classList.add("dz-error");
                _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                _results = [];
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i];
                    _results.push(node.textContent = message);
                }
                return _results;
            }
            
  };
  </script> 
@endsection


</html>