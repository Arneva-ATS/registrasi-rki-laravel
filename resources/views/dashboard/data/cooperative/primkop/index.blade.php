@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Data</a></li>
    <li class="breadcrumb-item"><a href="#">Cooperative</a></li>
    <li class="breadcrumb-item active" aria-current="page">Primkop</li>
@endsection

@section('content')
<div class="row">
    <p class="mt-2 text-white">
        <a href="/tambah_primkop" class="btn btn-primary"> Tambah Primkop </a> ||  [ https://registrasi.rkicoop.id/koperasi/{tingkat}/{name} ]
    </p>
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-8">
            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Koperasi</th>
                        <th>No Wa</th>
                        <th>Email</th>
                        <th>Bidang Usaha</th>
                        <th class="no-content">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($primkop as $data)
                    <tr>
                        <td>#{{$data->id}}</td>
                        <td>{{$data->nama_koperasi}}</td>
                        <td>{{$data->hp_wa}}</td>
                        <td>{{$data->email_koperasi}}</td>
                        <td>{{$data->bidang_koperasi}}</td>
                        <td> <button class="btn btn-warning"> View Primkop </button> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
