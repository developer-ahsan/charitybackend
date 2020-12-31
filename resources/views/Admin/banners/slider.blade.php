@extends('Admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Slider</h1>
            <button data-toggle="modal" data-target="#myModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i>Add Slider</button>
          </div>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Slider</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Images</th>
                      <th>Heading</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Images</th>
                      <th>Heading</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($galleries as $gallery)
                    <tr>
                      <td>
                        <img style="width: 40px" src="{{url('../'.$gallery->image)}}">
                      </td>
                      <td>{{$gallery->description}}</td>
                      <td>
                        @if($gallery->status == '1')
                        <a href="{{url('/dashboard/changeSlider/online/'.$gallery->id)}}" class="btn btn-success">Show</a>
                        @else
                        <a href="{{url('/dashboard/changeSlider/offline/'.$gallery->id)}}" class="btn btn-danger">Hide</a>
                        @endif
                      </td>
                      <td>
                        <a href="{{url('/dashboard/deleteSlider/'.$gallery->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

        <!-- /.container-fluid -->
        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Image</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('/dashboard/addslider') }}" enctype="multipart/form-data" id="regform">
         {{ csrf_field() }}
         <div class="form-group col-md-12">
            <label for="password-signup">Choose Image</label>
            <input type="file" accept=".jpg, .png, .jpeg" class="form-control" id="password-signup" name="file" required="true">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group col-md-12">
            <label for="password-signup">Headline</label>
            <input type="text" name="desc" class="form-control" id="password-signup" >
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback" >Please fill out this field.</div>
        </div>
        <button type="submit" class="btn btn-primary w-80">Upload Image</button>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('admin-assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function () {
    $.noConflict();
    var table = $('#dataTable').DataTable();
});</script>
  <script src="{{asset('admin-assets/js/demo/datatables-demo.js')}}"></script>

@endpush