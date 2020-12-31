@extends('Admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Profile</h1>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Profile</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  @if(Auth::user()->user_type == 'advertiser')
                  	<form method="POST" action="{{ url('/dashboard/updateProfile') }}" enctype="multipart/form-data" id="regform"  class="needs-validation" novalidate>
                           {{ csrf_field() }}
                              <div class="form-row">
                                  <div class="form-group col-md-6">
                                      <label for="password-signup">First Name</label>
                                      <input type="text" class="form-control" id="password-signup" name="f_name" placeholder="First Name" value="{{$user->f_name}}" required="true">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="password-confirm">Last Name</label>
                                      <input type="text" name="l_name" class="form-control" id="password-confirm" placeholder="Last Name" required="true" value="{{$user->l_name}}">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="password-confirm">Email</label>
                                      <input type="text" name="email" class="form-control" id="password-confirm" placeholder="Email" readonly="true" value="{{$user->email}}">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="password-confirm">Phone</label>
                                      <input type="text" name="phone" class="form-control" id="password-confirm" placeholder="phone" required="true" value="{{$user->advertiser->phone}}">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                              <button type="submit" class="btn btn-primary w-100">Update Profile</button>
                    </form>
                  @endif
                  @if(Auth::user()->user_type == 'designer')
                    <form method="POST" action="{{ url('/dashboard/updateProfile') }}" enctype="multipart/form-data" id="regform"  class="needs-validation" novalidate>
                           {{ csrf_field() }}
                              <div class="form-row">
                                  <div class="form-group col-md-6">
                                      <label for="password-signup">First Name</label>
                                      <input type="text" class="form-control" id="password-signup" name="f_name" placeholder="First Name" value="{{$user->f_name}}" required="true">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="password-confirm">Last Name</label>
                                      <input type="text" name="l_name" class="form-control" id="password-confirm" placeholder="Last Name" required="true" value="{{$user->l_name}}">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="password-confirm">Email</label>
                                      <input type="text" name="email" class="form-control" id="password-confirm" placeholder="Email" readonly="true" value="{{$user->email}}">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="password-confirm">Phone</label>
                                      <input type="text" name="phone" class="form-control" id="password-confirm" placeholder="phone" required="true" value="{{$user->designer->c_phone}}">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="name-signup">Company Name</label>
                                    <input type="text" class="form-control" id="company-info-login" name="c_name" placeholder="Company Info" required="true" value="{{$user->designer->c_name}}">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="comp_url">Company URL</label>
                                    <input type="text" name="c_url" class="form-control" id="comp_url" placeholder="Company URL" required="true"  value="{{$user->designer->comp_url}}">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please enter url.</div>
                                </div>
                                  <div class="form-group col-md-6">
                                    <label for="comp_logo">Company Logo</label>
                                    <input type="file" name="comp_logo" class="form-control" id="comp_logo" onchange="loadPreview(this);">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please choose company logo.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <img id="preview_img" src="{{url('../'.$user->designer->comp_logo)}}" class="" width="200" height="150"/>
                                </div>
                              <button type="submit" class="btn btn-primary w-100">Update Profile</button>
                    </form>
                  @endif
                  @if(Auth::user()->user_type == 'printing')
                    <form method="POST" action="{{ url('/dashboard/updateProfile') }}" enctype="multipart/form-data" id="regform"  class="needs-validation" novalidate>
                           {{ csrf_field() }}
                              <div class="form-row">
                                  <div class="form-group col-md-6">
                                      <label for="password-signup">First Name</label>
                                      <input type="text" class="form-control" id="password-signup" name="f_name" placeholder="First Name" value="{{$user->f_name}}" required="true">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="password-confirm">Last Name</label>
                                      <input type="text" name="l_name" class="form-control" id="password-confirm" placeholder="Last Name" required="true" value="{{$user->l_name}}">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="password-confirm">Email</label>
                                      <input type="text" name="email" class="form-control" id="password-confirm" placeholder="Email" readonly="true" value="{{$user->email}}">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="password-confirm">Phone</label>
                                      <input type="text" name="phone" class="form-control" id="password-confirm" placeholder="phone" required="true" value="{{$user->printer->c_phone}}">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="name-signup">Company Name</label>
                                    <input type="text" class="form-control" id="company-info-login" name="c_name" placeholder="Company Info" required="true" value="{{$user->printer->c_name}}">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="area-serve">Location (briefly describe the area you serve)</label>
                                    <input id="autocomplete"
                                           placeholder="Address"
                                           onFocus="geolocate()"
                                           type="text"
                                           name="locationField"
                                           class="form-control"
                                           value="{{ $user->printer->locationField}}"
                                           required>
                                           <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <!-- //Hidden fields where the lattitude and longitude is saved -->
                                <input type="hidden" name="address_latitude" id="address_latitude" value="0" />
                                <input type="hidden" name="address_longitude" id="address_longitude" value="0" />

                                <!-- //Fields that get autocompleted -->
                                <div class="form-row" id="address">
                                  <div class="form-group col-md-2" hidden="true">
                                    <label class="label text-sm">Street Number</label>
                                    <input type="text"  class="field form-control" id="street_number" name="street_number" disabled="true"> 
                                  </div>
                                  <div class="form-group col-md-4" hidden="true">
                                     <label class="label text-sm">Street Name</label>
                                     <input type="text"  class="field form-control" id="route" name="route" disabled="true" placeholder="123 Main Street" >       
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label class="label text-sm">City</label>
                                      <input type="text" class="field form-control" id="locality" readonly="true" name="locality" value="{{ $user->printer->locality}}" placeholder="City" required="true">
                                      <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>    
                                  <div class="form-group col-md-6 col-sm-12">
                                      <label class="label text-sm">Province</label>
                                      <input type="text" class="field form-control" id="administrative_area_level_1" readonly="true" name="administrative_area_level_1" value="{{ $user->printer->administrative_area_level_1}}" placeholder="Province" required="true">
                                      <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6" hidden="true">
                                      <label class="label text-sm">Zip code</label>
                                      <input type="text" class="field form-control" id="postal_code" disabled="true" name="postal_code" placeholder="Zip" >
                                  </div>
                              <button type="submit" class="btn btn-primary w-100">Update Profile</button>
                    </form>
                  @endif
                  @if(Auth::user()->user_type == 'fleet')
                    <form method="POST" action="{{ url('/dashboard/updateProfile') }}" enctype="multipart/form-data" id="regform"  class="needs-validation" novalidate>
                           {{ csrf_field() }}
                              <div class="form-row">
                                  <div class="form-group col-md-6">
                                      <label for="password-signup">First Name</label>
                                      <input type="text" class="form-control" id="password-signup" name="f_name" placeholder="First Name" value="{{$user->f_name}}" required="true">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="password-confirm">Last Name</label>
                                      <input type="text" name="l_name" class="form-control" id="password-confirm" placeholder="Last Name" required="true" value="{{$user->l_name}}">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="password-confirm">Email</label>
                                      <input type="text" name="email" class="form-control" id="password-confirm" placeholder="Email" readonly="true" value="{{$user->email}}">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label for="password-confirm">Phone</label>
                                      <input type="text" name="phone" class="form-control" id="password-confirm" placeholder="phone" required="true" value="{{$user->fleet->c_phone}}">
                                      <div class="valid-feedback">Valid.</div>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="name-signup">Company Name</label>
                                    <input type="text" class="form-control" id="company-info-login" name="c_name" placeholder="Company Info" required="true" value="{{$user->fleet->c_name}}">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="area-serve">Location (briefly describe the area you serve)</label>
                                    <input id="autocomplete"
                                           placeholder="Address"
                                           onFocus="geolocate()"
                                           type="text"
                                           name="locationField"
                                           class="form-control"
                                           value="{{ $user->fleet->locationField}}"
                                           required>
                                           <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <!-- //Hidden fields where the lattitude and longitude is saved -->
                                <input type="hidden" name="address_latitude" id="address_latitude" value="0" />
                                <input type="hidden" name="address_longitude" id="address_longitude" value="0" />

                                <!-- //Fields that get autocompleted -->
                                <div class="form-row" id="address">
                                  <div class="form-group col-md-2" hidden="true">
                                    <label class="label text-sm">Street Number</label>
                                    <input type="text"  class="field form-control" id="street_number" name="street_number" disabled="true"> 
                                  </div>
                                  <div class="form-group col-md-4" hidden="true">
                                     <label class="label text-sm">Street Name</label>
                                     <input type="text"  class="field form-control" id="route" name="route" disabled="true" placeholder="123 Main Street" >       
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label class="label text-sm">City</label>
                                      <input type="text" class="field form-control" id="locality" readonly="true" name="locality" value="{{ $user->fleet->locality}}" placeholder="City" required="true">
                                      <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>    
                                  <div class="form-group col-md-6 col-sm-12">
                                      <label class="label text-sm">Province</label>
                                      <input type="text" class="field form-control" id="administrative_area_level_1" readonly="true" name="administrative_area_level_1" value="{{ $user->fleet->administrative_area_level_1}}" placeholder="Province" required="true">
                                      <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6" hidden="true">
                                      <label class="label text-sm">Zip code</label>
                                      <input type="text" class="field form-control" id="postal_code" disabled="true" name="postal_code" placeholder="Zip" >
                                  </div>
                              <button type="submit" class="btn btn-primary w-100">Update Profile</button>
                    </form>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
        @endsection

         @push('scripts')
<script type="text/javascript">
 function loadPreview(input, id) {
    document.getElementById("preview_img").style.display = 'grid';

    id = id || '#preview_img';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
        };
 
        reader.readAsDataURL(input.files[0]);
    }
 }
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endpush