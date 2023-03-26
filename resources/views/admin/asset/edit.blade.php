@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Asset</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Asset</li>
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

                <h4 class="card-title">Edit Asset </h4>

                <form method="post" action="{{ route('admin.asset.update', $asset->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="judul_asset" class="col-sm-2 col-form-label">Judul Asset</label>
                        <div class="col-sm-10">
                            <input name="judul_asset" class="form-control" type="text" value="{{ $asset->judul_asset }}" id="judul_asset">
                            @error('judul_asset')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="deskripsi_asset" class="col-sm-2 col-form-label">Deskripsi Asset</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi_asset" class="form-control" cols="30" rows="10">{{ $asset->deskripsi_asset }}</textarea>
                            @error('deskripsi_asset')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="gambar_asset" class="col-sm-2 col-form-label">Gambar Asset</label>
                        <div class="col-sm-10">
                            <input name="gambar_asset" class="form-control" type="file"  id="image">
                                @error('gambar_asset') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                        <div class="col-sm-10">
                            <img id="showImage" class="img-fluid img-thumbnail" src="{{ asset($asset->gambar_asset) }}" alt="Image Show">
                        </div>
                    </div>
                    <!-- end row -->


                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Asset Data">
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
