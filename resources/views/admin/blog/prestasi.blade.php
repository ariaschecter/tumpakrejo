@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Prestasi</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Prestasi</li>
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

                        <h4 class="card-title">Prestasi Data</h4>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul Prestasi</th>
                                    <th>Foto Prestasi</th>
                                    <th>Deskripsi Prestasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach ($prestasis as $prestasi)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $prestasi->judul_blog }}</td>
                                        <td>
                                            <a href="{{ asset($prestasi->gambar_blog) }}" class="image-popup-no-margins"><img src="{{ asset($prestasi->gambar_blog) }}" style="height: 10em" alt="Gambar prestasi"></a>
                                        </td>
                                        <td>{!! Str::of($prestasi->deskripsi_blog)->limit(100) !!}</td>
                                        <td>
                                            <a href="{{ route('admin.blog.edit', $prestasi->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.blog.delete', $prestasi->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>
@endsection
