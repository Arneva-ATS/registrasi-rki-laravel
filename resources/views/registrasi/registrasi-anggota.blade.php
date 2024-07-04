@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        <div class="col-xl-6 col-lg-6 d-flex align-items-center">
            <div class="main_title_1">
                <h3>REGISTRASI ANGGOTA</h3>
                <h2 class="text-white my-5">{{ $nama_koperasi }}</h2>
                <p>
                    Jadilah bagian dari perubahan! Bergabunglah dengan koperasi
                    kami dan nikmati manfaatnya! Sebagai anggota, Anda akan
                    mendapatkan akses ke berbagai layanan dan dukungan yang
                    dirancang untuk meningkatkan kesejahteraan Anda. Mari kita
                    bersama-sama membangun komunitas yang lebih kuat dan ekonomi
                    yang lebih adil.
                </p>
                <p><em>- Rumah Kesejahteraan Indonesia</em></p>
            </div>
        </div>

        <div class="col-xl-5 col-lg-5">
            <div id="wizard_container">
                <div id="top-wizard">
                    <div id="progressbar"></div>
                </div>

                <form id="wrapped" enctype="multipart/form-data">
                    <input id="website" name="website" type="text" value="" />
                    <!-- Leave for security protection, read docs for details -->
                    <div id="middle-wizard">
                        <div class="step">
                            <h3 class="main_question">
                                <strong>1 of 4</strong>Data Pribadi
                            </h3>

                            <div class="row">
                                <input type="hidden" name="koperasi_name" id="koperasi_name" />
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="no_anggota">No Anggota</label>
                                        <input type="text" name="no_anggota" id="no_anggota" class="form-control" placeholder="masukan no_anggota" required />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan Nik" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukan Nama Lengkap" required />
                            </div>

                            <div class="row">
                                <div class="col-6 pe-2">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat</label>
                                        <input type="text" class="form-control w-100" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan Tempat Lahir" required />
                                    </div>
                                </div>
                                <div class="col-6 ps-2">
                                    <div class="form-group">
                                        <input type="date" class="form-control w-100" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukan Tanggal Lahir" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label for="">Jenis Kelamin</label>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-start align-items-center gap-2">
                                            <input type="radio" name="jenis_kelamin" class="form-check" value="laki-laki" checked />
                                            Laki Laki
                                        </div>

                                        <div class="d-flex justify-content-start align-items-center gap-2">
                                            <input type="radio" name="jenis_kelamin" class="form-check" value="perempuan" checked />
                                            Perempuan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /step 1-->

                        <div class="step">
                            <h3 class="main_question mb-4">
                                <strong>2 of 4</strong>Data Pribadi
                            </h3>

                            <div class="row">
                                <div class="col-6 pe-2">
                                    <div class="form-group">
                                        <label for="rt_rw">RT / RW</label>
                                        <input type="text" name="rt_rw" id="rt_rw" class="form-control" placeholder="Masukan Rt & Rw" required />
                                    </div>
                                </div>
                                <div class="col-6 ps-2">
                                    <div class="form-group">
                                        <label for="kelurahan">Kelurahan / Desa</label>
                                        <input type="text" name="kelurahan" id="kelurahan" class="form-control" placeholder="Masukan Keluarahan" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 pe-2">
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="Masukan Kecamatan" required />
                                    </div>
                                </div>
                                <div class="col-6 ps-2">
                                    <div class="form-group">
                                        <label for="kota">Kab/Kota</label>
                                        <input type="text" name="kota" id="kota" class="form-control" placeholder="Masukan Kota" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 pe-2">
                                    <div class="form-group">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" name="provinsi" id="provinsi" class="form-control" placeholder="Masukan Provinsi" required />
                                    </div>
                                </div>

                                <div class="col-6 ps-2">
                                    <div class="form-group">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="text" name="kode_pos" id="kode_pos" class="form-control" placeholder="Masukan Kode Pos" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kewarganegaraan">Kewarganegaraan</label>
                                <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" placeholder="Masukan Kewarganegaraan" required />
                            </div>
                        </div>
                        <!-- /step 2-->

                        <div class="step">
                            <h3 class="main_question">
                                <strong>3 of 4</strong>Data Pribadi
                            </h3>

                            <div class="row">
                                <div class="col-6 pe-2">
                                    <div class="form-group">
                                        <label for="nomor_hp">No. HP (WhatsApp)</label>
                                        <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" placeholder="Masukan No HP" required />
                                    </div>
                                </div>

                                <div class="col-6 ps-2">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 pe-2">
                                    <div class="form-group">
                                        <label for="status_pernikahan">Status Perkawinan</label>
                                        <input type="text" name="status_pernikahan" id="status_pernikahan" class="form-control" placeholder="Masukan Status Perkawinan" required />
                                    </div>
                                </div>

                                <div class="col-6 ps-2">
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <input type="text" name="agama" id="agama" class="form-control" placeholder="Masukan Agama" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Masukan Pekerjaan" required />
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat jika tidak sesuai KTP</label>
                                <textarea name="alamat" id="alamat" class="form-control" style="height: 8rem" placeholder="Masukan Alamat"></textarea>
                            </div>
                        </div>
                        <!-- /step 3-->

                        <div class="submit step">
                            <h3 class="main_question">
                                <strong>4 of 4</strong>Data Pribadi
                            </h3>

                            <div class="form-group">
                                <label for="ktp">Foto KTP</label>
                                <input type="file" name="ktp" id="ktp" class="form-control px-4" style="height: auto !important; padding-top: 15px !important; padding-bottom: 15px !important;" onchange="convertBase64ktp()" accept="image/jpeg, image/jpg, image/png" required />
                            </div>

                            <div class="form-group">
                                <label for="alamat">foto pribadi</label>
                                <div class="">
                                    <img src="/assets/images/selfie.JPG" alt="selfie" width="150" height="150" class="d-block mx-auto mb-3" style="border-radius: 10%" />
                                    <input type="file" name="selfie" id="selfie" class="form-control form-control px-4" onchange="convertBase64selfie()" style=" height: auto !important; padding-top: 15px !important; padding-bottom: 15px !important;" accept="image/jpeg, image/png, image/jpg" required />
                                </div>
                            </div>
                        </div>
                        <!-- /step 4-->
                    </div>

                    <div id="bottom-wizard">
                        <button type="button" name="backward" class="backward">
                            Kembali
                        </button>
                        <button type="button" name="forward" class="forward">
                            Selanjutnya
                        </button>
                        <button type="button" name="process" id="button-submit" class="submit" onclick="saveData()">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
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
        roles = path[2];
        slug_url = path[3];
        console.log(path);
    });

    function convertBase64selfie() {
        var fl = document.getElementById("selfie").files[0];
        type1 = fl.type.split("/")[1];
        var reader = new FileReader();
        reader.onloadend = function () {
        baseStringSelfie = reader.result;
        };
        reader.readAsDataURL(fl);
    }

    function convertBase64ktp() {
        var flt = document.getElementById("ktp").files[0];
        type2 = flt.type.split("/")[1];
        var reader = new FileReader();
        reader.onloadend = function () {
        baseStringKtp = reader.result;
        };
        reader.readAsDataURL(flt);
    }

    async function saveData() {
        var no_anggota = document.getElementById("no_anggota").value;
        var nik = document.getElementById("nik").value;
        var nama_lengkap = document.getElementById("nama_lengkap").value;
        var tempat_lahir = document.getElementById("tempat_lahir").value;
        var tanggal_lahir = document.getElementById("tanggal_lahir").value;
        var jenis_kelamin = document.querySelector('input[name="jenis_kelamin"]:checked').value;
        var rt_rw = document.getElementById("rt_rw").value;
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
        var validselfie = document.getElementById("selfie").files[0];
        var validktp = document.getElementById("ktp").files[0];
        document.getElementById("button-submit").disabled = true;
        if (no_anggota == "" || validselfie == "" || validktp == "") {

        alert("Pastikan Data Terisi Semua !");
            return false;
        }

        var jsondata = {
            slug_url,
            no_anggota,
            nik: nik,
            nama_lengkap: nama_lengkap,
            tempat_lahir: tempat_lahir,
            tanggal_lahir: tanggal_lahir,
            jenis_kelamin: jenis_kelamin,
            rt_rw: rt_rw,
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
            selfie: image_selfie,
            ktp: image_ktp,
            koperasi_name: koperasi_name,
            type1: type1,
            type2: type2,
            roles,
        };

        await fetch("/register/insert-anggota", {
            headers: {
                "Access-Control-Allow-Origin": "*",
                "Content-Type": "application/json",
            },
            method: "POST",
            body: JSON.stringify(jsondata),
        })
        .then((response) => response.json())
        .then((data) => {
            const { message } = data;
            if (message == "success") {
            document.getElementById("button-submit").disabled = false;
            swal({
                title: "Status Registrasi",
                text: "Input Data " + data?.message + "",
                icon: "success",
                buttons: true,
            }).then((willOut) => {
                if (willOut) {
                window.location.href = "/registrasi/anggota/" + slug_url;
                } else {
                console.log("error");
                }
            });
            } else {
            swal({
                title: "Status Registrasi",
                text: "Input Data " + data?.message + "",
                icon: "error",
                buttons: true,
            }).then((willOut) => {
                if (willOut) {
                //window.location.href = "/registrasi/anggota/" + slug_url;
                } else {
                console.log("error");
                }
            });
            }
        })
        .catch((error) => {
            document.getElementById("button-submit").disabled = false;
            swal({
            title: "Status Registrasi",
            text: error?.message,
            icon: "info",
            buttons: true,
            }).then((willOut) => {
            if (willOut) {
                window.location.href = "/registrasi/anggota/" + slug_url;
            } else {
                console.log("error");
            }
            });
        });
    }
</script>
@endpush
