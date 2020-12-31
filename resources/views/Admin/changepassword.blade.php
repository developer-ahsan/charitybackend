@extends('Admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Password</h1>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Password</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                	<form method="POST" action="{{ url('dashboard/updatePassword') }}" enctype="multipart/form-data" id="regform"  class="needs-validation" novalidate>
                         {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password-signup">Password</label>
                                    <input type="password" class="form-control" id="password-signup" name="password" placeholder="Password" required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input type="password" name="c_password" class="form-control" id="password-confirm" placeholder="Confirm Password" required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            <button type="submit" class="btn btn-primary w-100">Update Password</button>
                        </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
        @endsection

         @push('scripts')
<script type="text/javascript">
 
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