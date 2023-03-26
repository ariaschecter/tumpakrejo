@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Pengajar</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pengajar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <a href="{{ route('admin.pengajar.add') }}" class="btn btn-primary mb-2">Tambah Pengajar</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Pengajar Data</h4>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pengajar</th>
                                    <th>Foto Pengajar</th>
                                    <th>Jabatan Pengajar</th>
                                    <th>Motivasi Pengajar</th>
                                    <th>Bio Pengajar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach ($pengajars as $pengajar)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $pengajar->nama_pengajar }}</td>
                                        <td>
                                            <a href="{{ asset($pengajar->gambar_pengajar) }}" class="image-popup-no-margins"><img src="{{ asset($pengajar->gambar_pengajar) }}" style="height: 10em" alt="Gambar Pengajar"></a>
                                        </td>
                                        <td>{{ $pengajar->jabatan_pengajar }}</td>
                                        <td>{{ $pengajar->motivasi_pengajar }}</td>
                                        <td>{{ Str::of($pengajar->bio_pengajar)->limit(255) }}</td>
                                        <td>
                                            <a href="{{ route('admin.pengajar.edit', $pengajar->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.pengajar.delete', $pengajar->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
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
