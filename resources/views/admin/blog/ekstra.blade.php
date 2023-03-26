@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Ekstrakurikuler</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Ekstrakurikuler</li>
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

                        <h4 class="card-title">Ekstrakurikuler Data</h4>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul Ekstrakurikuler</th>
                                    <th>Foto Ekstrakurikuler</th>
                                    <th>Deskripsi Ekstrakurikuler</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach ($ekstras as $ekstra)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $ekstra->judul_blog }}</td>
                                        <td>
                                            <a href="{{ asset($ekstra->gambar_blog) }}" class="image-popup-no-margins"><img src="{{ asset($ekstra->gambar_blog) }}" style="height: 10em" alt="Gambar ekstra"></a>
                                        </td>
                                        <td>{!! Str::of($ekstra->deskripsi_blog)->limit(100) !!}</td>
                                        <td>
                                            <a href="{{ route('admin.blog.edit', $ekstra->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.blog.delete', $ekstra->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
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
