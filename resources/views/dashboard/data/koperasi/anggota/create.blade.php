@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Data</a></li>
    <li class="breadcrumb-item"><a href="#">Koperasi</a></li>
    <li class="breadcrumb-item"><a href="#">Anggota</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8 p-3">
                <form class="row g-3 needs-validation" novalidate enctype="multipart/for-data">
                    <input type="hidden" name="koperasi_name" id="koperasi_name" />
                    <div class="col-md-6 position-relative">
                        <div class="form-group">
                            <label for="no_anggota">No Anggota</label>
                            <input type="text" name="no_anggota" id="no_anggota" class="form-control"
                                placeholder="masukan no_anggota" required />
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan Nik"
                            required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                            placeholder="Masukan Nama Lengkap" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="tempat_lahir">Tempat</label>
                        <input type="text" class="form-control w-100" name="tempat_lahir" id="tempat_lahir"
                            placeholder="Masukan Tempat Lahir" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control w-100" name="tanggal_lahir" id="tanggal_lahir"
                            placeholder="Masukan Tanggal Lahir" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <br /><br />
                        <label for="validationTooltip05" class="form-label">Jenis Kelamin</label>
                        <input type="radio" name="jenis_kelamin" value="laki-laki" checked />
                        Laki Laki &nbsp;
                        <input type="radio" name="jenis_kelamin" value="perempuan" />
                        Perempuan
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Provinsi</label>
                        <select id="provinsi" class="form-control" required>
                            <option value="00" hidden selected>Pilih Provinsi</option>
                        </select>
                        <div id="provinsi-error" class="text-danger mt-1 hidden"></div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Kabupaten/Kota</label>
                        <select id="kota" class="form-control" required>
                            <option value="00" hidden selected>Pilih Kabuptaen/Kota</option>
                        </select>
                        <div id="kota-error" class="text-danger mt-1 hidden"></div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Kecamatan</label>
                        <select id="kecamatan" class="form-control" required>
                            <option value="00" hidden selected>Pilih Kecamatan</option>
                        </select>
                        <div id="kecamatan-error" class="text-danger mt-1 hidden"></div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Kelurahan</label>
                        <select id="kelurahan" class="form-control" required>
                            <option value="00" hidden selected>Pilih Kelurahan/Desa</option>
                        </select>
                        <div id="kelurahan-error" class="text-danger mt-1 hidden"></div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Kode Pos</label>
                        <input type="text" name="kode_pos" id="kode_pos" class="form-control"
                            placeholder="Masukan Kode Pos" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Alamat Jika Tidak Sesuai dengan KTP</label>
                        <label for="alamat">Alamat jika tidak sesuai KTP</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat"
                            required>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">No. HP(Whatsapps)</label>
                        <input type="text" name="nomor_hp" id="nomor_hp" class="form-control"
                            placeholder="Masukan No HP" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Masukan Email" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Status Perkawinan</label>
                        <select name="status_pernikahan" id="status_pernikahan" class="form-control">
                            <option value="00" hidden>Pilih Status Perkawinan</option>
                            <option value="belum kawin">Belum Kawin</option>
                            <option value="sudah kawin">Sudah Kawin</option>
                            <option value="cerai mati">Cerai Mati</option>
                            <option value="cerai hidup">Cerai Hidup</option>
                        </select>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Agama</label>
                        <select name="agama" id="agama" class="form-control">
                            <option value="00" hidden>Pilih Agama</option>
                            <option value="islam">Islam</option>
                            <option value="protestan">Protestan</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="buddha">Buddha</option>
                            <option value="konghucu">Konghucu</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                            placeholder="Masukan Pekerjaan" required />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="kewarganegaraan">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control"
                            placeholder="Masukan Kewarganegaraan" required />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Foto KTP</label>
                        <img src="/assets/images/ktp.JPG" alt="selfie" width="150" height="150"
                                class="d-block mx-auto mb-3" style="border-radius: 10%" />
                        <input type="file" name="ktp" id="ktp" class="form-control px-4"
                            style="height: auto !important; padding-top: 15px !important; padding-bottom: 15px !important;"
                            onchange="convertBase64ktp()" accept="image/jpeg, image/jpg, image/png" />
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="validationTooltip04" class="form-label">Foto Pribadi</label>
                        <div class="">
                            <img src="/assets/images/selfie.JPG" alt="selfie" width="150" height="150"
                                class="d-block mx-auto mb-3" style="border-radius: 10%" />
                            <input type="file" name="selfie" id="selfie" class="form-control form-control px-4"
                                onchange="convertBase64selfie()"
                                style=" height: auto !important; padding-top: 15px !important; padding-bottom: 15px !important;"
                                accept="image/jpeg, image/png, image/jpg" />
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="button" name="process" id="button-submit" class="btn btn-primary"
                            onclick="saveData()">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        window.addEventListener("load", () => {
            getProvince();
        });
    </script>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/function.js') }}"></script>
    <script>
        let baseStringSelfie;
        let baseStringKtp;
        let type1;
        let type2;
        let slug_url;
        let roles;

        window.addEventListener("load", () => {
            const url = new URL(window.location.href);
            const path = url.pathname.split("/");
            roles = "primkop";
            slug_url = "KSUPegangsaan";
            getProvince();
        });

        function convertBase64selfie() {
            var fl = document.getElementById("selfie").files[0];
            type1 = fl.type.split("/")[1];
            var reader = new FileReader();
            reader.onloadend = function() {
                baseStringSelfie = reader.result;
            };
            reader.readAsDataURL(fl);
        }

        function convertBase64ktp() {
            var flt = document.getElementById("ktp").files[0];
            type2 = flt.type.split("/")[1];
            var reader = new FileReader();
            reader.onloadend = function() {
                baseStringKtp = reader.result;
            };
            reader.readAsDataURL(flt);
        }

        function saveData() {
            var no_anggota = document.getElementById("no_anggota").value;
            var nik = document.getElementById("nik").value;
            var nama_lengkap = document.getElementById("nama_lengkap").value;
            var tempat_lahir = document.getElementById("tempat_lahir").value;
            var tanggal_lahir = document.getElementById("tanggal_lahir").value;
            var jenis_kelamin = document.querySelector('input[name="jenis_kelamin"]:checked').value;
            var kelurahan = document.getElementById("kelurahan").value;
            var kecamatan = document.getElementById("kecamatan").value;
            var kota = document.getElementById("kota").value;
            var provinsi = document.getElementById("provinsi").value;
            var kode_pos = document.getElementById("kode_pos").value;
            var agama = document.getElementById("agama").value;
            var status_pernikahan = document.getElementById("status_pernikahan").value;
            var pekerjaan = document.getElementById("pekerjaan").value;
            var kewarganegaraan = document.getElementById("kewarganegaraan").value;
            var alamat = document.getElementById("alamat").value;
            var nomor_hp = document.getElementById("nomor_hp").value;
            var email = document.getElementById("email").value;
            var koperasi_name = document.getElementById("koperasi_name").value;
            var image_selfie = baseStringSelfie;
            var image_ktp = baseStringKtp;
            const username = createUsername(nama_lengkap);
            if (image_selfie == '' || image_ktp == '' || provinsi == '00' || nik == '' || kota == '00' || kecamatan == '00' || kelurahan == '00' || agama == '00' ||
                status_pernikahan == '00' || email == '') {
                swal({
                    title: "Perhatian!",
                    text: 'Pastikan data terisi dengan benar',
                    icon: "info",
                    buttons: true,
                })
                return false;
            }
            swal({
                title: "Please wait",
                text: "Submitting data...",
                // icon: "/assets/images/loading.gif",
                button: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                className: "swal-loading",
            });
            var jsondata = {
                slug_url,
                no_anggota,
                nik: nik,
                username,
                nama_lengkap: nama_lengkap,
                tempat_lahir: tempat_lahir,
                tanggal_lahir: tanggal_lahir,
                jenis_kelamin: jenis_kelamin,
                kelurahan: kelurahan,
                kecamatan: kecamatan,
                kota: kota,
                provinsi: provinsi,
                kode_pos: kode_pos,
                agama: agama,
                status_pernikahan: status_pernikahan,
                pekerjaan: pekerjaan,
                kewarganegaraan: kewarganegaraan,
                alamat: alamat,
                nomor_hp: nomor_hp,
                email: email,
                selfie: image_selfie?.split(',')[1],
                ktp: image_ktp?.split(',')[1],
                koperasi_name: koperasi_name,
                type1: type1,
                type2: type2,
                id_role: 2,
                id_koperasi: {{ $id_koperasi }},
            };


            // console.log(jsondata)

            fetch("/api/register/anggota/insert-anggota", {
                    headers: {
                        "Access-Control-Allow-Origin": "*",
                        "Content-Type": "application/json",
                    },
                    method: "POST",
                    body: JSON.stringify(jsondata),
                })
                .then((response) => response.json())
                .then((data) => {
                    console.log(data)
                    swal.close();
                    if (data.response_code == "00") {
                        swal({
                            title: "Status Registrasi",
                            text: data?.response_message,
                            icon: "success",
                            buttons: true,
                        }).then((willOut) => {
                            if (willOut) {
                                window.location = "/list_anggota";
                                console.log("success")
                            } else {
                                console.log("error");
                            }
                        });
                    } else {
                        swal({
                            title: "Status Registrasi",
                            text: data?.response_message,
                            icon: "error",
                            buttons: true,
                        }).then((willOut) => {
                            if (willOut) {} else {
                                console.log("error");
                            }
                        });
                    }
                })
                .catch((error) => {
                    swal.close();
                    console.log(error)
                    swal({
                        title: "Status Registrasi",
                        text: error,
                        icon: "info",
                        buttons: true,
                    }).then((willOut) => {
                        if (willOut) {
                            //window.location.href = "/registrasi/rki/" + tingkatan_koperasi;
                        } else {
                            console.log("error");
                        }
                    });
                });
        }
    </script>
@endpush
