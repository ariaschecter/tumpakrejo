@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Tambah Pengajar</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.pengajar.index') }}">Pengajar</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">

                <h4 class="card-title">Tambah Pengajar </h4>

                <form method="post" action="{{ route('admin.pengajar.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="nama_pengajar" class="col-sm-2 col-form-label">Nama Pengajar</label>
                        <div class="col-sm-10">
                            <input name="nama_pengajar" class="form-control" type="text" value="{{ old('nama_pengajar') }}" id="nama_pengajar">
                            @error('nama_pengajar')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="jabatan_pengajar" class="col-sm-2 col-form-label">Jabatan Pengajar</label>
                        <div class="col-sm-10">
                            <input name="jabatan_pengajar" class="form-control" type="text" value="{{ old('jabatan_pengajar') }}" id="jabatan_pengajar">
                            @error('jabatan_pengajar')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="motivasi_pengajar" class="col-sm-2 col-form-label">Motivasi Pengajar</label>
                        <div class="col-sm-10">
                            <input name="motivasi_pengajar" class="form-control" type="text" value="{{ old('motivasi_pengajar') }}" id="motivasi_pengajar">
                            @error('motivasi_pengajar')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="bio_pengajar" class="col-sm-2 col-form-label">Bio Pengajar</label>
                        <div class="col-sm-10">
                            <textarea name="bio_pengajar" class="form-control" cols="30" rows="10">{{ old('bio_pengajar') }}</textarea>
                            @error('bio_pengajar')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="gambar_pengajar" class="col-sm-2 col-form-label">Gambar Pengajar <span class="text-danger">420 x 440</span> </label>
                        <div class="col-sm-10">
                            <input name="gambar_pengajar" class="form-control" type="file"  id="image">
                                @error('gambar_pengajar') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                        <div class="col-sm-10">
                            <img id="showImage" class="img-fluid img-thumbnail" src="{{ asset('backend/assets/images/no-image.jpg') }}" alt="Image Show">
                        </div>
                    </div>
                    <!-- end row -->


                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Pengajar Data">
                  </form>

              </div>
          </div>

  </div>
</div>

<script>
  $(document).ready(function() {
    $('#image').change(function(e) {
      const reader = new FileReader();
      reader.onload = function(e) {
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    })
  })
</script>

@endsection
