@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Data</a></li>
    <li class="breadcrumb-item"><a href="#">Cooperative</a></li>
    <li class="breadcrumb-item active" aria-current="page">Inkop</li>
@endsection

@section('content')
<div class="row">
    <p class="mt-2 text-white">
        <a href="/tambah_inkop" class="btn btn-primary"> Tambah Inkop </a> ||  [ https://registrasi.rkicoop.id/koperasi/{tingkat}/{name} ]
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_inkop as $data)
                    <tr>
                        <td>#{{$data->id}}</td>
                        <td>{{$data->nama_koperasi}}</td>
                        <td>{{$data->hp_wa}}</td>
                        <td>{{$data->email_koperasi}}</td>
                        <td>{{$data->bidang_koperasi}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
