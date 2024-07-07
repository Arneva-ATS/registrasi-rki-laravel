@extends('dashboard.auth.template')

@section('content')

<div class="main-container" id="container">

<div class="overlay"></div>
<div class="search-overlay"></div>

@include('dashboard.auth.nav_side')
<!--  END SIDEBAR  -->

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <div class="row layout-top-spacing">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Data</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah INKOP</li>
                            </ol>
                        </nav>
                    </div>
                    
                        <p></p>
                        <p></p>

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-8 p-3">
                                    <form class="row g-3 needs-validation" novalidate entype="multipart/form-data">
                                        <div class="col-md-6 position-relative">
                                            <div class="form-group">
                                            <label for="nama_koperasi" class="form-label">Nama Koperasi</label>
                                                <input type="text" name="nama_koperasi" id="nama_koperasi" class="form-control"
                                                    placeholder="Masukan Nama Koperasi" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label for="singkatan_koperasi" class="form-label">Nama Singkat Koperasi</label>
                                            <input type="text" name="singkatan_koperasi" id="singkatan_koperasi"
                                                class="form-control" placeholder="Masukan Singkatan Koperasi" />
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label for="email" class="form-label">Email Koperasi</label>
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="Masukan Nama Lengkap" />
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label for="no_telp" class="form-label">No Telp</label>
                                            <input type="text" class="form-control w-100" name="no_telp" id="no_telp"
                                                placeholder="no_telp" />
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label for="no_wa" class="form-label">No WA</label>
                                            <input type="text" class="form-control w-100" name="no_wa" id="no_wa"
                                                placeholder="no_wa" />
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label for="no_fax" class="form-label">No Fax</label>
                                                <input type="text" class="form-control w-100" name="no_fax" id="no_fax"
                                                    placeholder="no_fax" />
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label for="web" class="form-label">Website (Opsional)</label>
                                                <input type="text" class="form-control w-100" name="web" id="web"
                                                    placeholder="web" />
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label for="bidang_koperasi" class="form-label">Bidang Koperasi</label>
                                                <input type="text" name="bidang_koperasi" id="bidang_koperasi" class="form-control"
                                                    placeholder="Masukan Bidang Koperasi" />
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                                            <textarea name="alamat" id="alamat" class="form-control" style="height: 120px"></textarea>
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Provinsi</label>
                                            <select id="provinsi" class="form-control"
                                                required>
                                                <option value="00" hidden selected>Pilih Provinsi</option>
                                            </select>
                                            <div id="provinsi-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                        <div class="col-md-6 position-relative">
                                                <label for="validationTooltip04" class="form-label">Kabupaten/Kota</label>
                                                    <select id="kota" class="form-control"
                                                        required>
                                                        <option value="00" hidden selected>Pilih Kabuptaen/Kota</option>
                                                    </select>
                                            <div id="kota-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                        <div class="col-md-6 position-relative">
                                                <label for="validationTooltip04" class="form-label">Kecamatan</label>
                                                <select id="kecamatan" class="form-control">
                                                        <option value="00" hidden selected>Pilih Kecamatan</option>
                                                    </select>
                                                    <div id="kecamatan-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                        <div class="col-md-6 position-relative">
                                          <label for="validationTooltip04" class="form-label">Kelurahan/Desa</label>
                                                    <select id="kelurahan" class="form-control">
                                                        <option value="00" hidden selected>Pilih Kelurahan/Desa</option>
                                                    </select>
                                                    <div id="kelurahan-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Kode Pos</label>
                                                <input type="text" name="kode_pos" id="kode_pos" class="form-control"
                                                placeholder="Masukan kode_pos" />
                                        </div>
                                       

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Nama Pengurus</label>
                                                    <input type="text" name="nama_pengurus" id="nama_pengurus" class="form-control"
                                                    placeholder="Masukan nama_pengurus" />
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">No Pengurus KTP</label>
                                                <input type="text" name="no_ktp_pengurus" id="no_ktp_pengurus"
                                                class="form-control" placeholder="Masukan no_ktp_pengurus" />
                                        </div>
                                        <div class="col-md-6 position-relative">
                                          <label for="validationTooltip04" class="form-label">No Anggota</label>
                                                <input type="text" name="no_anggota_pengurus" id="no_anggota_pengurus"
                                                class="form-control" placeholder="Masukan no_anggota" />
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Jabatan Pengurus</label>
                                                <input type="text" name="jabatan_pengurus" id="jabatan_pengurus" value="1"
                                                class="form-control" placeholder="Masukan Jabatan" hidden />
                                        </div> 

                                        <div class="col-md-6 position-relative">
                                            <label for="kewarganegaraan">No WA</label>
                                            <input type="text" name="no_wa_pengurus" id="no_wa_pengurus" class="form-control"
                                            placeholder="Masukan no_wa_pengurus" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Nama Pengawas</label>
                                                <input type="text" name="nama_pengawas" id="nama_pengawas" class="form-control"
                                                placeholder="Masukan Nama Pengawas" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">No KTP Pengawas</label>
                                                <input type="text" name="no_ktp_pengawas" id="no_ktp_pengawas"
                                                    class="form-control" placeholder="Masukan no_ktp_pengawas" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">No Anggota Pengawas</label>
                                                <input type="text" name="no_anggota_pengawas" id="no_anggota_pengawas"
                                                class="form-control" placeholder="Masukan Nomor Anggota" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Jabatan Pengawas</label>
                                                <input type="text" name="jabatan_pengawas" id="jabatan_pengawas" value="3"
                                                    class="form-control" placeholder="Masukan Jabatan" hidden />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Jabatan Pengawas</label>
                                                <input type="text" name="no_wa_pengawas" id="no_wa_pengawas" class="form-control"
                                                placeholder="Masukan Nomor WA" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">No Akta</label>
                                            <input type="text" class="form-control" name="no_akta"
                                                id="no_akta" placeholder="Masukan Nomor" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Tanggal Akta</label>
                                                <input type="date" class="form-control w-100" name="tanggal_akta"
                                                    id="tanggal_akta" placeholder="Masukan Tanggal Akta" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">No SKK</label>
                                                <input type="text" class="form-control w-100" name="no_skk"
                                                id="no_skk" placeholder="Masukan Nomor" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Tanggal SKK</label>
                                                <input type="date" class="form-control w-100" name="tanggal_skk"
                                                    id="tanggal_skk" placeholder="Masukan Tanggal SK" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Nomor Surat Pengesahan</label>
                                                <input type="text" class="form-control w-100" name="no_spkk"
                                                    id="no_spkk" placeholder="Masukan Nomor" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Tanggal Surat Pengesahan</label>
                                                <input type="date" class="form-control w-100" name="tanggal_spkk"
                                                    id="tanggal_spkk" placeholder="Masukan Tanggal Surat Pengesahan" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">No Akta Perubahan</label>
                                                <input type="text" class="form-control w-100" name="no_akta_perubahan"
                                                id="no_akta_perubahan" placeholder="Masukan Nomor" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Masa Berlaku Perubahan</label>
                                                <input type="date" class="form-control w-100"
                                                    name="masa_berlaku_perubahan" id="masa_berlaku_perubahan"
                                                    placeholder="Masukan Masa Berlaku" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Nomor SIUP/NIB</label>
                                                <input type="text" class="form-control w-100" name="no_siup"
                                                    id="no_siup" placeholder="Masukan Nomor" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Masa Berlaku SIUP</label>
                                                <input type="date" class="form-control w-100" name="masa_berlaku_siup"
                                                id="masa_berlaku_siup" placeholder="Masukan Masa Berlaku" />
                                        </div>

                                        
                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">No SKDU</label>
                                                <input type="text" class="form-control w-100" name="no_skdu"
                                                id="no_skdu" placeholder="Masukan Nomor" />
                                        </div>

                                        
                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Masa Berlaku SKDU</label>
                                                    <input type="date" class="form-control w-100" name="masa_berlaku_skdu"
                                                    id="masa_berlaku_skdu" placeholder="Masukan Masa Berlaku" />
                                        </div>

                                        
                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Nomor NPWP</label>
                                                <input type="text" class="form-control w-100" name="no_npwp"
                                                id="no_npwp" placeholder="Masukan Nomor NPWP" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Nomor PKP</label>
                                                <input type="text" class="form-control w-100" name="no_pkp"
                                                    id="no_pkp" placeholder="Masukan Nomor PKP" />
                                        </div>
                                       
                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">No BPJS Kesehatan</label>
                                                <input type="text" class="form-control w-100" name="bpjs_kesehatan"
                                                id="bpjs_kesehatan" placeholder="Masukan Nomor" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">No BPJS Ketenagakerjaan</label>
                                                <input type="text" class="form-control w-100" name="bpjs_ketenagakerjaan"
                                                id="bpjs_ketenagakerjaan" placeholder="Masukan Nomor" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">No. Sertifikat Koperasi</label>
                                                <input type="text" name="no_sertifikat" id="no_sertifikat" class="form-control w-100"
                                                placeholder="Masukan Nomor" />
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Upload Foto KTP<span
                                            style="color: red;">*</span></label>
                                                <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" />
                                                <img id="preview-profil" height="100" width="100" class="mt-1"
                                                    src="/assets/images/default.jpg" alt="Preview Image">
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Upload Logo<span style="color: red;">*</span></label>
                                                <input type="file" class="form-control" id="foto_logo"
                                                    name="foto_logo" />
                                                <img id="preview-logo" height="100" width="100" class="mt-1"
                                                    src="/assets/images/default.jpg" alt="Preview Image">
                                        </div>

                                        <div class="col-md-6 position-relative">
                                            <label for="validationTooltip04" class="form-label">Upload Dokumen<span style="color: red;">*</span></label>
                                            <input type="file" class="form-control" id="dokumen" name="dokumen" />
                                                <p><span style="color: red;">*)</span> Satukan semua dokumen dalam bentuk ZIP </p>
                                                <p><span style="color: red;">*)</span> Dokumen yang diupload yakni Akta pendirian, SK
                                                    Kemenkumham, Surat Pengesahan Koperasi, Akta Perubahan, SIUP/NIB, Surat Keterangan
                                                    Domisili
                                                    Usaha, BPJS Kesehatan dan Ketenagakerjaan </p>
                                        </div>

                                        <div class="col-12">
                                        <button type="button" onclick="saveData()" name="process" class="btn btn-primary">
                                            Submit
                                        </button>
                                        </div>
                                    </form>
                            </div>
                        </div>
    
                    </div>
            </div>

    </div>
    <!--  BEGIN FOOTER  -->
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
        </div>
    </div>
    <!--  END FOOTER  -->
</div>
<!--  END CONTENT AREA  -->

</div>
<script>
window.addEventListener("load", () => {
getProvince();
});
</script>
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/function.js') }}"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>

<script>
        let baseStringKtp;
        let baseStringLogo;
        let baseStringDokumen;
        let type1;
        let type2;
        let type3;
        let tingkatan_koperasi;
        let koperasi;
        let id_koperasi;
        const ktpInput = document.getElementById('foto_ktp');
        const logoInput = document.getElementById('foto_logo');
        const dokumenInput = document.getElementById('dokumen');
        const previewProfil = document.getElementById('preview-profil');
        const previewLogo = document.getElementById('preview-logo');

        window.addEventListener("load", () => {
            getProvince();
            tingkatan_koperasi = "inkop"
            id_koperasi = 1;
        });

        ktpInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewProfil.src = e.target.result;
                    baseStringKtp = e.target.result;
                    type1 = file.type.split('/')[1];
                }
                reader.readAsDataURL(file);
            }
        });

        logoInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewLogo.src = e.target.result;
                    baseStringLogo = e.target.result;
                    type2 = file.type.split('/')[1];
                }
                reader.readAsDataURL(file);
            }
        });

        dokumenInput.addEventListener('change', () => {
            const file = dokumenInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    baseStringDokumen = e.target.result;
                    type3 = file.type.split('/')[1];
                }
                reader.readAsDataURL(file);
            }
        });

        async function saveData() {
            const nama_koperasi = document.getElementById("nama_koperasi").value;
            const singkatan_koperasi = document.getElementById("singkatan_koperasi").value;
            const email = document.getElementById("email").value;
            const no_telp = document.getElementById("no_telp").value;
            const no_wa = document.getElementById("no_wa").value;
            const no_fax = document.getElementById("no_fax").value;
            const web = document.getElementById("web").value;
            const bidang_koperasi = document.getElementById("bidang_koperasi").value;
            const alamat = document.getElementById("alamat").value;
            const kelurahan = document.getElementById("kelurahan").value;
            const kecamatan = document.getElementById("kecamatan").value;
            const kota = document.getElementById("kota").value;
            const provinsi = document.getElementById("provinsi").value;
            const kode_pos = document.getElementById("kode_pos").value;
            const no_ktp_pengurus = document.getElementById("no_ktp_pengurus").value;
            const nama_pengurus = document.getElementById("nama_pengurus").value;
            const no_anggota_pengurus = document.getElementById("no_anggota_pengurus").value;
            const jabatan_pengurus = document.getElementById("jabatan_pengurus").value;
            const no_wa_pengurus = document.getElementById("no_wa_pengurus").value;
            const no_ktp_pengawas = document.getElementById("no_ktp_pengawas").value;
            const nama_pengawas = document.getElementById("nama_pengawas").value;
            const no_anggota_pengawas = document.getElementById("no_anggota_pengawas").value;
            const jabatan_pengawas = document.getElementById("jabatan_pengawas").value;
            const no_wa_pengawas = document.getElementById("no_wa_pengawas").value;
            const no_akta = document.getElementById("no_akta").value;
            const tanggal_akta = document.getElementById("tanggal_akta").value;
            const no_skk = document.getElementById("no_skk").value;
            const tanggal_skk = document.getElementById("tanggal_skk").value;
            const no_spkk = document.getElementById("no_spkk").value;
            const tanggal_spkk = document.getElementById("tanggal_spkk").value;
            const no_akta_perubahan = document.getElementById("no_akta_perubahan").value;
            const masa_berlaku_perubahan = document.getElementById("masa_berlaku_perubahan").value;
            const no_siup = document.getElementById("no_siup").value;
            const masa_berlaku_siup = document.getElementById("masa_berlaku_siup").value;
            const no_skdu = document.getElementById("no_skdu").value;
            const masa_berlaku_skdu = document.getElementById("masa_berlaku_skdu").value;
            const no_npwp = document.getElementById("no_npwp").value;
            const no_pkp = document.getElementById("no_pkp").value;
            const bpjs_kesehatan = document.getElementById("bpjs_kesehatan").value;
            const bpjs_ketenagakerjaan = document.getElementById("bpjs_ketenagakerjaan").value;
            const no_sertifikat = document.getElementById("no_sertifikat").value;
            const image_ktp = baseStringKtp;
            const image_logo = baseStringLogo;
            const doc_dokumen = baseStringDokumen;
            const slug = createSlug(nama_koperasi);
            const validKtp = ktpInput.files[0];
            const validLogo = logoInput.files[0];
            const validDokumen = dokumenInput.files[0];

            if (!validKtp || !validLogo || !validDokumen ||  provinsi == '00' || kota == '00' || kecamatan =='00' || kelurahan == '00') {
                alert("Pastikan Data Terisi Semua!");
                return false;
            }
            // Show loading dialog
            swal({
                title: "Please wait",
                text: "Submitting data...",
                icon: "/assets/images/loading.gif",
                button: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                className: "swal-loading",
            });
            const jsondata = {
                singkatan_koperasi,
                nama_koperasi,
                slug,
                email,
                no_telp,
                no_wa,
                no_fax,
                web,
                bidang_koperasi,
                alamat,
                kelurahan,
                kecamatan,
                kota,
                provinsi,
                kode_pos,
                no_ktp_pengurus,
                nama_pengurus,
                no_anggota_pengurus,
                jabatan_pengurus,
                no_wa_pengurus,
                no_ktp_pengawas,
                nama_pengawas,
                no_anggota_pengawas,
                jabatan_pengawas,
                no_wa_pengawas,
                no_akta,
                tanggal_akta,
                no_skk,
                tanggal_skk,
                no_spkk,
                tanggal_spkk,
                no_akta_perubahan,
                masa_berlaku_perubahan,
                no_siup,
                masa_berlaku_siup,
                no_skdu,
                masa_berlaku_skdu,
                no_npwp,
                no_pkp,
                bpjs_kesehatan,
                bpjs_ketenagakerjaan,
                no_sertifikat,
                ktp: image_ktp,
                logo: image_logo,
                dokumen: doc_dokumen,
                type1,
                type2,
                type3
            };


            await fetch(`/api/register/rki/insert-koperasi/${id_koperasi}`, {
                    headers: {
                        'Access-Control-Allow-Origin': '*',
                        'Content-Type': 'application/json'
                    },
                    method: "POST",
                    body: JSON.stringify(jsondata)
                })
                .then(response => response.json())
                .then(data => {
                    swal.close();
                    console.log(data)
                    if (data.response_code == '00') {
                        swal({
                            title: "Status Registrasi",
                            text: data?.response_message,
                            icon: "success",
                            buttons: true,
                        }).then((willOut) => {
                            if (willOut) {
                                // window.location.href = "/koperasi/rki/" + tingkatan_koperasi;
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
                }).catch(err => {
                    console.log(err);
                    swal.close();
                    swal({
                        title: "Status Registrasi",
                        text: err,
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
@endsection