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
                        <th>Action</th>
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
                        <td>
                            @if ($data->approval)
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalInkop">Detail </button>
                                <a href="/list_puskop_inkop/{{$data->id}}" class="btn btn-info">Puskop </a>
                            @else
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalInkop">Detail </button>
                                <a href="/list_puskop_inkop/{{$data->id}}" class="btn btn-info">Puskop </a>
                                <button onclick="approveBtn({{$data->id}}, '{{$data->email_koperasi}}')" class="btn btn-danger"> Approve </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
        <!-- Modal -->
        <div class="modal fade" id="modalInkop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Koperasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>Nama Koperasi:</h3>
                        <p></p>
                        <h3>No Wa:</h3>
                        <p></p>
                        <h3>Email:</h3>
                        <p></p>
                        <h3>Bidang Koperasi:</h3>
                        <p></p>
                        <h3>Alamat:</h3>
                        <p></p>
                        <h3>Provinsi:</h3>
                        <p></p>
                        <h3>Kota/Kabupaten:</h3>
                        <p></p>
                        <h3>Kecamatan:</h3>
                        <p></p>
                        <h3>Kelurahan:</h3>
                        <p></p>
                        <h3>No Akta Pendirian:</h3>
                        <p></p>
                        <h3>Tanggal Akta Pendirian:</h3>
                        <p></p>
                        <h3>No SK Kemenkumham:</h3>
                        <p></p>
                        <h3>Tanggal SK Kemenkumham:</h3>
                        <h3>No SPKUM:</h3>
                        <p></p>
                        <h3>Tanggal SPKUM:</h3>
                        <p></p>
                        <h3>No SIUP:</h3>
                        <p></p>
                        <h3>Masa Berlaku SIUP:</h3>
                        <p></p>
                        <h3>No SK Domisli:</h3>
                        <p></p>
                        <h3>Masa Berlaku SK Domisili:</h3>
                        <p></p>
                        <h3>No NPWP:</h3>
                        <p></p>
                        <h3>No PKP:</h3>
                        <p></p>
                        <h3>No Sertifikat Koperasi:</h3>
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
<script>
    // Trigger focus on the input when the modal is shown
    $('#modalInkop').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus');
    });
  </script>
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
