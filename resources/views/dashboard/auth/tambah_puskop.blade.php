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
                                <li class="breadcrumb-item active" aria-current="page">Tambah PUSKOP</li>
                            </ol>
                        </nav>
                    </div>
                    
                        <p></p>
                        <p></p>

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-8 p-3">
                                    <form class="row g-3 needs-validation" novalidate>
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
                                            <textarea name="alamat" id="alamat" class="form-control" style="height: 120px" onkeyup="getVals(this, 'alamat');"></textarea>
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
                                          <button class="btn btn-primary" type="submit">Submit form</button>
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
@endsection