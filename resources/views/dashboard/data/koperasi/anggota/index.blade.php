@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Data</a></li>
    <li class="breadcrumb-item"><a href="#">Koperasi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Anggota</li>
@endsection

@section('content')
    <div class="row">
        <p class="mt-2">
            <a href="/tambah_anggota" class="btn btn-primary"> Tambah Anggota </a>
        </p>
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NO Anggota</th>
                            <th>Nik</th>
                            <th>Nama Anggota</th>
                            <th>No HP</th>
                            <th class="no-content">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($primkop_anggota as $data)
                            <tr>
                                <td>#{{ $data->id }}</td>
                                <td>{{ $data->no_anggota }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama_lengkap }}</td>
                                <td>{{ $data->nomor_hp }}</td>
                                <td>
                                    @if ($data->approval)
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="/edit_anggota" class="btn btn-warning"> Edit Anggota </a>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn" disabled>Verified</button>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="/edit_anggota" class="btn btn-warning"> Edit Anggota </a>
                                            </div>
                                            <div class="col-6">
                                                <button onclick="approveBtn({{ $data->id }}, '{{ $data->email }}', '{{ $data->nama_lengkap }}')"
                                                    class="btn btn-danger"> Approve </button>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
    <script>
        function approveBtn(id, email, nama) {
            let data = {
                email,
                createUsername(nama);
            };
            swal({
                title: "Approve",
                text: 'Apakah data sudah benar?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willOut) => {
                if (willOut) {
                    fetch(`/api/send-mail/anggota/${id}`, {
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
                                window.location.href = '/list_anggota'
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
            }).catch(err => {
                swal("Gagal approve data!\nCoba lagi", {
                    icon: "error",
                });
            });
        }
    </script>
@endpush
