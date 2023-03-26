@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Blog</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Blog</li>
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

                <h4 class="card-title">Edit Blog </h4>

                <form method="post" action="{{ route('admin.blog.update', $blog->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="kategori_blog" class="col-sm-2 col-form-label">Kategori Blog</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default Select Example" name="kategori_blog" id="kategori_blog">
                                    <option value="kegiatan" {{ 'kegiatan' == $blog->kategori_blog ? 'selected' : '' }}>KEGIATAN SEKOLAH</option>
                                    <option value="prestasi" {{ 'prestasi' == $blog->kategori_blog ? 'selected' : '' }}>PRESTASI</option>
                                    <option value="ekstra" {{ 'ekstra' == $blog->kategori_blog ? 'selected' : '' }}>EKSTRAKURIKULER</option>
                            </select>
                            @error('kategori_blog') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="judul_blog" class="col-sm-2 col-form-label">Judul Blog</label>
                        <div class="col-sm-10">
                            <input name="judul_blog" class="form-control" type="text" value="{{ $blog->judul_blog }}" id="judul_blog">
                            @error('judul_blog')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="deskripsi_blog" class="col-sm-2 col-form-label">Deskripsi Blog</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi_blog" id="elm1" cols="30" rows="10">{{ $blog->deskripsi_blog }}</textarea>
                            @error('deskripsi_blog')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="gambar_blog" class="col-sm-2 col-form-label">Gambar Blog </label>
                        <div class="col-sm-10">
                            <input name="gambar_blog" class="form-control" type="file"  id="image">
                                @error('gambar_blog') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                        <div class="col-sm-10">
                            <img id="showImage" class="img-fluid img-thumbnail" src="{{ asset($blog->gambar_blog) }}" alt="Image Show">
                        </div>
                    </div>
                    <!-- end row -->


                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Blog Data">
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
