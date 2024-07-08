@extends('registrasi.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-6 col-lg-6 d-flex align-items-center">
                <div class="main_title_1">
                    <h3 class="fs-4">{{ $nama_koperasi }}</h3>
                    <h3>REGISTRASI <span id="koperasi"></span></h3>
                    <p id="message_tingkatan"></p>
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
                                    <strong>1 of 12</strong>Data Koperasi
                                </h3>
                                <div class="form-group">
                                    <label for="nama_koperasi">Nama Koperasi</label>
                                    <input type="text" name="nama_koperasi" id="nama_koperasi" class="form-control"
                                        placeholder="Masukan Nama Koperasi" required />
                                </div>

                                <div class="form-group">
                                    <label for="singkatan_koperasi">Nama Singkat Koperasi</label>
                                    <input type="text" name="singkatan_koperasi" id="singkatan_koperasi"
                                        class="form-control" placeholder="Masukan Singkatan Koperasi" required />
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Koperasi</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Masukan Nama Lengkap" required />
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="no_telp">No Telp</label>
                                            <input type="text" class="form-control w-100" name="no_telp" id="no_telp"
                                                placeholder="no_telp" required />
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="no_wa">No WA</label>
                                            <input type="text" class="form-control w-100" name="no_wa" id="no_wa"
                                                placeholder="no_wa" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="no_fax">No Fax (Opsional)</label>
                                            <input type="text" class="form-control w-100" name="no_fax" id="no_fax"
                                                placeholder="no_fax" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="web">Website (Opsional)</label>
                                            <input type="text" class="form-control w-100" name="web" id="web"
                                                placeholder="web" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="bidang_koperasi">Bidang Koperasi</label>
                                    <input type="text" name="bidang_koperasi" id="bidang_koperasi" class="form-control"
                                        placeholder="Masukan Bidang Koperasi" required />
                                </div>
                            </div>
                            <!-- /step 1-->

                            <div class="step">
                                <h3 class="main_question mb-4">
                                    <strong>2 of 12</strong>Alamat Koperasi
                                </h3>

                                <div class="form-group">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <textarea name="alamat" id="alamat" class="form-control" style="height: 120px" onkeyup="getVals(this, 'alamat');" required></textarea>
                                </div>

                                <!-- /review_block-->
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="provinsi">Provinsi</label> --}}
                                            <p class="mb-1">Provinsi</p>
                                            <select id="provinsi" class="form-control"
                                                required>
                                                <option value="00" hidden selected>Pilih Provinsi</option>
                                            </select>
                                            <div id="provinsi-error" class="text-danger mt-1 hidden"></div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="kabupaten">Kabupaten/Kota</label> --}}
                                            <p class="mb-1">Kabupaten/Kota</p>
                                            <select id="kota" class="form-control"
                                                        required>
                                                        <option value="00" hidden selected>Pilih Kabuptaen/Kota</option>
                                            </select>
                                            <div id="kota-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="kecamatan">Kecamatan</label> --}}
                                            <p class="mb-1">Kecamatan</p>
                                            <select id="kecamatan" class="form-control">
                                                <option value="00" hidden selected>Pilih Kecamatan</option>
                                            </select>
                                            <div id="kecamatan-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            {{-- <label for="kelurahan">Kelurahan/Desa</label> --}}
                                            <p class="mb-1">Kelurahan/Desa</p>
                                            <select id="kelurahan" class="form-control">
                                                <option value="00" hidden selected>Pilih Kelurahan/Desa</option>
                                            </select>
                                            <div id="kelurahan-error" class="text-danger mt-1 hidden"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" name="kode_pos" id="kode_pos" class="form-control"
                                        placeholder="Masukan kode_pos" required />
                                </div>
                            </div>
                            <!-- /step 2-->

                            <div class="step">
                                <h3 class="main_question">
                                    <strong>3 of 12</strong>Ketua Koperasi
                                </h3>

                                <div class="form-group">
                                    <label for="nama_pengurus">Nama Ketua</label>
                                    <input type="text" name="nama_pengurus" id="nama_pengurus" class="form-control"
                                        placeholder="Masukan nama_pengurus" required />
                                </div>

                                <div class="form-group">
                                    <label for="no_ktp_pengurus">No KTP Ketua</label>
                                    <input type="text" name="no_ktp_pengurus" id="no_ktp_pengurus"
                                        class="form-control" placeholder="Masukan no_ktp_pengurus" required />
                                </div>

                                <div class="form-group">
                                    <label for="no_anggota_pengurus">No Anggota Ketua</label>
                                    <input type="text" name="no_anggota_pengurus" id="no_anggota_pengurus"
                                        class="form-control" placeholder="Masukan no_anggota" />
                                </div>

                                {{-- <div class="form-group">
                                    <label for="jabatan_pengurus" hidden>Jabatan Pengurus</label>
                                    <input type="text" name="jabatan_pengurus" id="jabatan_pengurus" value="1"
                                        class="form-control" placeholder="Masukan Jabatan" hidden/>
                                </div> --}}

                                <div class="form-group">
                                    <label for="no_wa_pengurus">No Wa Ketua</label>
                                    <input type="text" name="no_wa_pengurus" id="no_wa_pengurus" class="form-control"
                                        placeholder="Masukan no_wa_pengurus" required/>
                                </div>
                            </div>
                            <!-- /step 3-->

                            <div class="step">
                                <h3 class="main_question">
                                    <strong>4 of 12</strong>Pengawas Koperasi
                                </h3>

                                <div class="form-group">
                                    <label for="nama_pengawas">Nama Pengawas</label>
                                    <input type="text" name="nama_pengawas" id="nama_pengawas" class="form-control"
                                        placeholder="Masukan Nama Pengawas" required/>
                                </div>

                                <div class="form-group">
                                    <label for="no_ktp_pengawas">No KTP Pengawas</label>
                                    <input type="text" name="no_ktp_pengawas" id="no_ktp_pengawas"
                                        class="form-control" placeholder="Masukan no_ktp_pengawas" required/>
                                </div>

                                <div class="form-group">
                                    <label for="no_anggota_pengawas">No Anggota Pengawas</label>
                                    <input type="text" name="no_anggota_pengawas" id="no_anggota_pengawas"
                                        class="form-control" placeholder="Masukan Nomor Anggota" required/>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="jabatan_pengawas" hidden>Jabatan Pengawas</label>
                                    <input type="text" name="jabatan_pengawas" id="jabatan_pengawas" value="3"
                                        class="form-control" placeholder="Masukan Jabatan" hidden/>
                                </div> --}}

                                <div class="form-group">
                                    <label for="no_wa_pengawas">No Wa Pengawas</label>
                                    <input type="text" name="no_wa_pengawas" id="no_wa_pengawas" class="form-control"
                                        placeholder="Masukan Nomor WA" required />
                                </div>
                            </div>
                            <!-- /step 4-->

                            <div class="step">
                                <h3 class="main_question">
                                    <strong>5 of 12</strong>Akta Pendirian
                                </h3>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="no_akta">Nomor Akta Pendirian</label>
                                            <input type="text" class="form-control w-100" name="no_akta"
                                                id="no_akta" placeholder="Masukan Nomor" required />
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control w-100" name="tanggal_akta"
                                                id="tanggal_akta" placeholder="Masukan Tanggal Akta" required />
                                        </div>
                                    </div>
                                </div>

                                <!-- /row -->
                                <!-- <div class="form-group terms">
                                        <label class="container_check"
                                        >Please accept our
                                        <a
                                            href="#"
                                            data-bs-toggle="modal"
                                            data-bs-target="#terms-txt"
                                            style="color: #fff; text-decoration: underline"
                                            >Terms and conditions</a
                                        >
                                        <input
                                            type="checkbox"
                                            name="terms"
                                            value="Yes"
                                            class="required" />
                                        <span class="checkmark"></span>
                                        </label>
                                    </div> -->
                            </div>
                            <!-- /step 5-->

                            <div class="step">
                                <h3 class="main_question">
                                    <strong>6 of 12</strong>SK. Kemenkumham
                                </h3>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="no_skk">Nomor SK Kemenkumham</label>
                                            <input type="text" class="form-control w-100" name="no_skk"
                                                id="no_skk" placeholder="Masukan Nomor" required />
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control w-100" name="tanggal_skk"
                                                id="tanggal_skk" placeholder="Masukan Tanggal SK" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step 6-->

                            <div class="step">
                                <h3 class="main_question">
                                    <strong>7 of 12</strong> Surat Pengesahan Koperasi dari Kemenkop & UKM
                                </h3>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="no_spkk">Nomor Surat Pengesahan</label>
                                            <input type="text" class="form-control w-100" name="no_spkk"
                                                id="no_spkk" placeholder="Masukan Nomor" required />
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control w-100" name="tanggal_spkk"
                                                id="tanggal_spkk" placeholder="Masukan Tanggal Surat Pengesahan" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step 7-->

                            <div class="step">
                                <h3 class="main_question">
                                    <strong>8 of 12</strong> Akta Perubahan
                                </h3>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="no_akta_perubahan">Nomor Akta</label>
                                            <input type="text" class="form-control w-100" name="no_akta_perubahan"
                                                id="no_akta_perubahan" placeholder="Masukan Nomor" required />
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control w-100"
                                                name="masa_berlaku_perubahan" id="masa_berlaku_perubahan"
                                                placeholder="Masukan Masa Berlaku" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /step 8-->
                            <div class="step">
                                <h3 class="main_question">
                                    <strong>9 of 12</strong>SIUP/NIB
                                </h3>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="no_siup">Nomor SIUP/NIB</label>
                                            <input type="text" class="form-control w-100" name="no_siup"
                                                id="no_siup" placeholder="Masukan Nomor" required />
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control w-100" name="masa_berlaku_siup"
                                                id="masa_berlaku_siup" placeholder="Masukan Masa Berlaku" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step 9-->

                            <div class="step">
                                <h3 class="main_question">
                                    <strong>10 of 12</strong>Surat Keterangan Domisili Usaha
                                </h3>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="no_skdu">Nomor SKDU</label>
                                            <input type="text" class="form-control w-100" name="no_skdu"
                                                id="no_skdu" placeholder="Masukan Nomor" required />
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control w-100" name="masa_berlaku_skdu"
                                                id="masa_berlaku_skdu" placeholder="Masukan Masa Berlaku" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="no_npwp">Nomor NPWP</label>
                                            <input type="text" class="form-control w-100" name="no_npwp"
                                                id="no_npwp" placeholder="Masukan Nomor NPWP" required />
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="no_pkp">Nomor PKP</label>
                                            <input type="text" class="form-control w-100" name="no_pkp"
                                                id="no_pkp" placeholder="Masukan Nomor PKP" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step 10-->

                            <div class="step">
                                <h3 class="main_question">
                                    <strong>11 of 12</strong>No Sertifikat Koperasi
                                </h3>

                                <div class="form-group">
                                    <label for="no_sertifikat">No. Sertifikat Koperasi</label>
                                    <input type="text" name="no_sertifikat" id="no_sertifikat"
                                        placeholder="Masukan Nomor Sertifikat" required />
                                </div>
                            </div>
                            <!-- /step 11-->

                            <div class="submit step">
                                <h3 class="main_question">
                                    <strong>12 of 12</strong>Dokumentasi
                                </h3>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="foto_ktp">Upload Foto KTP<span
                                                    style="color: red;">*</span></label>
                                            <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" required />
                                            <img id="preview-profil" height="100" width="100" class="mt-1"
                                                src="/assets/images/default.jpg" alt="Preview Image">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="foto_profil">Upload Logo<span style="color: red;">*</span></label>
                                            <input type="file" class="form-control" id="foto_logo"
                                                name="foto_logo" required />
                                            <img id="preview-logo" height="100" width="100" class="mt-1"
                                                src="/assets/images/default.jpg" alt="Preview Image">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="foto_profil">Upload Dokumen<span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" id="dokumen" name="dokumen" required />
                                    <p><span style="color: red;">*)</span> Satukan semua dokumen dalam bentuk ZIP </p>
                                    <p><span style="color: red;">*)</span> Dokumen yang diupload yakni Akta pendirian, SK
                                        Kemenkumham, Surat Pengesahan Koperasi, Akta Perubahan, SIUP/NIB, Surat Keterangan
                                        Domisili
                                        Usaha, BPJS Kesehatan dan Ketenagakerjaan </p>
                                </div>
                            </div>
                        </div>
                        <div id="bottom-wizard">
                            <button type="button" name="backward" class="backward">
                                Prev
                            </button>
                            <button type="button" name="forward" class="forward">
                                Next
                            </button>
                            <button type="button" onclick="saveData()" name="process" class="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="{{ asset('assets/js/function.js') }}"></script>
    <script>
        let baseStringKtp;
        let baseStringLogo;
        let baseStringDokumen;
        let type1;
        let type2;
        let type3;
        let tingkatan_koperasi;
        let tingkatan_atas;
        let koperasi;
        let slug_url;
        const ktpInput = document.getElementById('foto_ktp');
        const logoInput = document.getElementById('foto_logo');
        const dokumenInput = document.getElementById('dokumen');
        const previewProfil = document.getElementById('preview-profil');
        const previewLogo = document.getElementById('preview-logo');

        window.addEventListener("load", () => {
            getProvince();
            const url = new URL(window.location.href);
            const path = url.pathname.split('/');
            document.getElementById("koperasi").innerText = '{{ $tingkat_bawah }}'
            tingkatan_koperasi = '{{ $tingkat_bawah }}';
            tingkatan_atas = '{{ $tingkat_atas }}'
            slug_url = path[3];
            if (tingkatan_koperasi == 'inkop') {
                document.getElementById("message_tingkatan").innerText =
                    "Bersama Induk Koperasi, kita wujudkan ekonomi mandiri yang kokoh dan berkelanjutan! Kami berkomitmen untuk mengoordinasikan dan mengawasi koperasi di seluruh jaringan kami, memastikan setiap anggota mendapatkan manfaat maksimal dan berkontribusi pada pertumbuhan ekonomi bersama. Bergabunglah dengan kami untuk masa depan yang lebih stabil dan makmur.";
            } else if (tingkatan_koperasi == 'puskop') {
                document.getElementById("message_tingkatan").innerText =
                    "Menghubungkan dan memperkuat jaringan koperasi demi kesejahteraan bersama! Kami adalah jembatan antara Induk Koperasi dan Koperasi Primer, bekerja untuk menyelaraskan tujuan dan menyediakan dukungan yang dibutuhkan. Bersama, kita dapat mencapai kesejahteraan kolektif melalui kolaborasi yang solid dan berkesinambungan.";
            } else if (tingkatan_koperasi == 'primkop') {
                document.getElementById("message_tingkatan").innerText =
                    "Solusi ekonomi berbasis kebersamaan, untuk masa depan yang lebih cerah! Kami berdiri untuk melayani kebutuhan anggota kami, menyediakan solusi ekonomi yang efektif dan berbasis komunitas. Dengan menjadi anggota, Anda tidak hanya memperoleh manfaat langsung tetapi juga berkontribusi pada pembangunan ekonomi yang inklusif dan berkelanjutan.";
            } else {
                document.getElementById("message_tingkatan").innerText =
                    "Jadilah bagian dari perubahan! Bergabunglah dengan koperasi kami dan nikmati manfaatnya! Sebagai anggota, Anda akan mendapatkan akses ke berbagai layanan dan dukungan yang dirancang untuk meningkatkan kesejahteraan Anda. Mari kita bersama-sama membangun komunitas yang lebih kuat dan ekonomi yang lebih adil.";
            }
            id_tingkat = {{ $id_tingkat }}
            id_koperasi = {{ $id_koperasi }};
            console.log(id_tingkat)
        });

        ktpInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewProfil.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
            convertBase64ktp();
        });

        logoInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewLogo.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
            convertBase64logo();
        });

        dokumenInput.addEventListener('change', () => {
            convertBase64dokumen();
        });

        function convertBase64dokumen() {
            const file = dokumenInput.files[0];
            type3 = file.type.split('/')[1];
            const reader = new FileReader();
            reader.onloadend = () => {
                baseStringDokumen = reader.result;
            };
            reader.readAsDataURL(file);
        }

        function convertBase64ktp() {
            const file = ktpInput.files[0];
            type1 = file.type.split('/')[1];
            const reader = new FileReader();
            reader.onloadend = () => {
                baseStringKtp = reader.result;
            };
            reader.readAsDataURL(file);
        }

        function convertBase64logo() {
            const file = logoInput.files[0];
            type2 = file.type.split('/')[1];
            const reader = new FileReader();
            reader.onloadend = () => {
                baseStringLogo = reader.result;
            };
            reader.readAsDataURL(file);
        }

        function saveData() {
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
            const jabatan_pengurus = 1
            const no_wa_pengurus = document.getElementById("no_wa_pengurus").value;
            const no_ktp_pengawas = document.getElementById("no_ktp_pengawas").value;
            const nama_pengawas = document.getElementById("nama_pengawas").value;
            const no_anggota_pengawas = document.getElementById("no_anggota_pengawas").value;
            const jabatan_pengawas = 3
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
            const no_sertifikat = document.getElementById("no_sertifikat").value;
            const image_ktp = baseStringKtp;
            const image_logo = baseStringLogo;
            const doc_dokumen = baseStringDokumen;
            const slug = createSlug(singkatan_koperasi);
            const validKtp = ktpInput.files[0];
            const validLogo = logoInput.files[0];
            const validDokumen = dokumenInput.files[0];
            const username = createUsername(singkatan_koperasi)
            if (!validKtp || !validLogo || !validDokumen) {
                alert("Pastikan Data Terisi Semua!");
                return false;
            }

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
                username,
                no_sertifikat,
                ktp: image_ktp,
                logo: image_logo,
                dokumen: doc_dokumen,
                type1,
                type2,
                type3
            };
            swal({
                title: "Please wait",
                text: "Submitting data...",
                // icon: "/assets/images/loading.gif",
                button: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                className: "swal-loading",
            });
            fetch(`/api/register/koperasi/insert-koperasi/${id_koperasi}/${id_tingkat}`, {
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
                    if (data.response_code == '00') {
                        swal({
                            title: "Status Registrasi",
                            text: data?.response_message,
                            icon: "success",
                            buttons: true,
                        }).then((willOut) => {
                            if (willOut) {
                                window.location.href = "/koperasi/"+ tingkatan_atas + '/'+ slug_url;
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
                    swal.close();
                    swal({
                        title: "Status Registrasi",
                        text: err,
                        icon: "info",
                        buttons: true,
                    }).then((willOut) => {
                        if (willOut) {
                            window.location.href = "/koperasi/"+ tingkatan_koperasi + '/'+ slug_url;
                        } else {
                            console.log("error");
                        }
                    });
                });
        }
    </script>
@endpush
