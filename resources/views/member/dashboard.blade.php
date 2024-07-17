@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Anggota</li>
@endsection

@section('content')
    <br>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8 p-3">
                <form class="row g-3 needs-validation" novalidate enctype="multipart/for-data">
                    <input type="hidden" name="koperasi_name" id="koperasi_name" />
                    <div class="col-md-6 position-relative">
                        <div class="form-group">
                            <label for="no_anggota">No Anggota</label>
                            <input type="text" name="no_anggota" id="no_anggota" class="form-control"
                                placeholder="masukan no_anggota" value="{{$profile->no_anggota}}" required />
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan Nik" value="{{$profile->nik}}"
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
                        <label for="validationTooltip05" class="form-label">Jenis Kelamin</label>
                        <input type="radio" name="jenis_kelamin" class="form-check" value="laki-laki" checked />
                        Laki Laki &nbsp;
                        <input type="radio" name="jenis_kelamin" class="form-check" value="perempuan" />
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
                        <textarea name="alamat" id="alamat" class="form-control" style="height: 8rem" placeholder="Masukan Alamat"
                            required></textarea>
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
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/function.js') }}"></script>
@endpush