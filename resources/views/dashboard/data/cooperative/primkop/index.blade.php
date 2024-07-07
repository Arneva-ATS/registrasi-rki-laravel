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
                        <td>
                            @if ($data->approval)
                            <button class="btn btn-warning"> Detail</button>
                            <a href="/list_anggota_primkop/{{$data->id}}" class="btn btn-info"> Anggota</a>
                            @else
                            <button class="btn btn-warning"> Detail </button>
                            <a href="/list_anggota_primkop/{{$data->id}}"" class="btn btn-info"> Anggota</a>
                            <button onclick="approveBtn({{$data->id}}, '{{$data->email_koperasi}}')" class="btn btn-danger"> Approve </button>
                            @endif
                        </td>                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function approveBtn(id, email){
        let data = {email};
        swal({
            title: "Approve",
            text: 'Apakah data sudah benar?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willOut) => {
            if (willOut) {
                fetch(`/api/send-mail/koperasi/${id}`, {
                    headers: {
                        'Access-Control-Allow-Origin': '*',
                        'Content-Type': 'application/json'
                    },
                    method: "POST",
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.response_code == '00') {
                        swal("Berhasil Approve!", {
                            icon: "success",
                        });
                        window.location.href= '/list_inkop'
                    } else {
                        swal("Gagal Approve!", {
                            icon: "info",
                        });
                    }
                }).catch(err => {
                    console.log(err);
                    swal("Gagal Approve!", {
                         icon: "info",
                    });
                });
                       
            } else {
                         
            }
        }).catch(err=>{
            swal("Gagal approve data!\nCoba lagi", {
                icon: "error",
                });  
        });
    }
</script>
@endsection
