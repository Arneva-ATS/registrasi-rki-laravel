<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Illuminate\Support\Facades\Session;

class KoperasiController extends Controller
{
    //
    public function insert_koperasi_rki(Request $request, $id_tingkat)
    {

        DB::beginTransaction();

        // Konversi Base64 ke file dan simpan di public path
        try {
            $request->validate([
                'nama_koperasi' => 'required',
                'singkatan_koperasi' => 'required',
                'email' => 'required|email',
                'no_telp' => 'required',
                'no_wa' => 'required',
                'no_fax' => 'required',
                'web' => 'required|url',
                'bidang_koperasi' => 'required',
                'alamat' => 'required',
                'kelurahan' => 'required',
                'kecamatan' => 'required',
                'kota' => 'required',
                'provinsi' => 'required',
                'kode_pos' => 'required',
                'no_akta' => 'required',
                'tanggal_akta' => 'required|date',
                'no_skk' => 'required',
                'tanggal_skk' => 'required|date',
                'no_akta_perubahan' => 'required',
                'masa_berlaku_perubahan' => 'required|date',
                'no_spkk' => 'required',
                'tanggal_spkk' => 'required|date',
                'no_siup' => 'required',
                'masa_berlaku_siup' => 'required|date',
                'no_skdu' => 'required',
                'masa_berlaku_skdu' => 'required|date',
                'no_npwp' => 'required',
                'no_pkp' => 'required',
                'bpjs_kesehatan' => 'required',
                'bpjs_ketenagakerjaan' => 'required',
                'no_sertifikat' => 'required',
            ]);

            // Simpan logo
            $logo_base64 = $request->logo;
            $logo_extension = 'png';
            $logo_name = time() . '_logo.' . $logo_extension;
            $logo_folder = '/koperasi/logo/';
            $logo_path = public_path() . $logo_folder . $logo_name;
            // $logo_path = public_path().'/images' public_path($logo_folder . $logo_name);
            file_put_contents($logo_path, base64_decode($logo_base64));

            // Simpan KTP
            $ktp_base64 = $request->ktp;
            $ktp_extension = 'png';
            $ktp_name = time() . '_ktp.' . $ktp_extension;
            $ktp_folder = '/koperasi/ktp/';
            // $ktp_path = public_path($ktp_folder . $ktp_name);
            $ktp_path = public_path() . $ktp_folder . $ktp_name;
            file_put_contents($ktp_path, base64_decode($ktp_base64));

            // Simpan dokumen PDF
            $dokumen_base64 = $request->dokumen;
            $dokumen_extension = 'pdf';
            $dokumen_name = time() . '_dokumen.' . $dokumen_extension;
            $dokumen_folder = '/koperasi/dokumen/';
            // $dokumen_path = public_path($dokumen_folder . $dokumen_name);
            $dokumen_path = public_path() . $dokumen_folder . $dokumen_name;
            file_put_contents($dokumen_path, base64_decode($dokumen_base64));

            // URL untuk disimpan di database
            $logoUrl = $logo_folder . $logo_name;
            $ktpUrl = $ktp_folder . $ktp_name;
            $dokumenUrl = $dokumen_folder . $dokumen_name;
            $koperasiData = [
                'nama_koperasi' => $request->nama_koperasi,
                'singkatan_koperasi' => $request->singkatan_koperasi,
                'email_koperasi' => $request->email,
                'no_phone' => $request->no_telp,
                'hp_wa' => $request->no_wa,
                'hp_fax' => $request->no_fax,
                'url_website' => $request->web,
                'bidang_koperasi' => $request->bidang_koperasi,
                'alamat' => $request->alamat,
                'id_kelurahan' => $request->kelurahan,
                'id_kecamatan' => $request->kecamatan,
                'id_kota' => $request->kota,
                'id_provinsi' => $request->provinsi,
                'kode_pos' => $request->kode_pos,
                'no_akta_pendirian' => $request->no_akta,
                'tanggal_akta_pendirian' => $request->tanggal_akta,
                'no_sk_kemenkumham' => $request->no_skk,
                'tanggal_sk_kemenkumham' => $request->tanggal_skk,
                'no_akta_perubahan' => $request->no_akta_perubahan,
                'tanggal_akta_perubahan' => $request->masa_berlaku_perubahan,
                'no_spkum' => $request->no_spkk,
                'tanggal_spkum' => $request->tanggal_spkk,
                'no_siup' => $request->no_siup,
                'masa_berlaku_siup' => $request->masa_berlaku_siup,
                'no_sk_domisili' => $request->no_skdu,
                'masa_berlaku_sk_domisili' => $request->masa_berlaku_skdu,
                'no_npwp' => $request->no_npwp,
                'no_pkp' => $request->no_pkp,
                'no_bpjs_kesehatan' => $request->bpjs_kesehatan,
                'no_bpjs_tenaga_kerja' => $request->bpjs_ketenagakerjaan,
                'no_sertifikat_koperasi' => $request->no_sertifikat,
                'image_logo' => $logoUrl,
                'ktp' => $ktpUrl,
                'id_tingkatan_koperasi' => $id_tingkat,
                'doc_url' => $dokumenUrl,
                'slug' => $request->slug,
            ];

            $koperasiId = DB::table('tbl_koperasi')->insertGetId($koperasiData);
            if (!$koperasiId) {
                throw new \Exception('Gagal Tambah Koperasi!');
            }
            $pengurusData = [
                'nik' => $request->no_ktp_pengurus,
                'nama_lengkap' => $request->nama_pengurus,
                'no_anggota' => $request->no_anggota_pengurus,
                'id_role' => $request->jabatan_pengurus,
                'nomor_hp' => $request->no_wa_pengurus,
                'id_koperasi' => (int)$koperasiId,
            ];

            $pengawasData = [
                'nik' => $request->no_ktp_pengawas,
                'nama_lengkap' => $request->nama_pengawas,
                'no_anggota' => $request->no_anggota_pengawas,
                'id_role' => $request->jabatan_pengawas,
                'nomor_hp' => $request->no_wa_pengawas,
                'id_koperasi' => (int)$koperasiId,
            ];

            $pengurus = DB::table('tbl_anggota')->insert($pengurusData);
            $pengawas = DB::table('tbl_anggota')->insert($pengawasData);

            if (!$pengurus || !$pengawas) {
                throw new \Exception('Gagal Tambah Anggota!');
            }
            DB::commit();

            return response()->json([
                'response_code' => "00",
                'response_message' => 'Sukses Simpan Data',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'response_code' => "01",
                'response_message' => $th->getMessage(),
            ], 400);
        }
    }
    public function insert_koperasi(Request $request, $id_koperasi, $id_tingkat)
    {

        DB::beginTransaction();

        // Konversi Base64 ke file dan simpan di public path
        try {
            $request->validate([
                'nama_koperasi' => 'required',
                'singkatan_koperasi' => 'required',
                'email' => 'required|email',
                'no_telp' => 'required',
                'no_wa' => 'required',
                'no_fax' => 'required',
                'web' => 'required|url',
                'bidang_koperasi' => 'required',
                'alamat' => 'required',
                'kelurahan' => 'required',
                'kecamatan' => 'required',
                'kota' => 'required',
                'provinsi' => 'required',
                'kode_pos' => 'required',
                'no_akta' => 'required',
                'tanggal_akta' => 'required|date',
                'no_skk' => 'required',
                'tanggal_skk' => 'required|date',
                'no_akta_perubahan' => 'required',
                'masa_berlaku_perubahan' => 'required|date',
                'no_spkk' => 'required',
                'tanggal_spkk' => 'required|date',
                'no_siup' => 'required',
                'masa_berlaku_siup' => 'required|date',
                'no_skdu' => 'required',
                'masa_berlaku_skdu' => 'required|date',
                'no_npwp' => 'required',
                'no_pkp' => 'required',
                'bpjs_kesehatan' => 'required',
                'bpjs_ketenagakerjaan' => 'required',
                'no_sertifikat' => 'required',
            ]);

            // Simpan logo
            $logo_base64 = $request->logo;
            $logo_extension = 'png';
            $logo_name = time() . '_logo.' . $logo_extension;
            $logo_folder = '/koperasi/logo/';
            $logo_path = public_path() . $logo_folder . $logo_name;
            // $logo_path = public_path().'/images' public_path($logo_folder . $logo_name);
            file_put_contents($logo_path, base64_decode($logo_base64));

            // Simpan KTP
            $ktp_base64 = $request->ktp;
            $ktp_extension = 'png';
            $ktp_name = time() . '_ktp.' . $ktp_extension;
            $ktp_folder = '/koperasi/ktp/';
            // $ktp_path = public_path($ktp_folder . $ktp_name);
            $ktp_path = public_path() . $ktp_folder . $ktp_name;
            file_put_contents($ktp_path, base64_decode($ktp_base64));

            // Simpan dokumen PDF
            $dokumen_base64 = $request->dokumen;
            $dokumen_extension = 'pdf';
            $dokumen_name = time() . '_dokumen.' . $dokumen_extension;
            $dokumen_folder = '/koperasi/dokumen/';
            // $dokumen_path = public_path($dokumen_folder . $dokumen_name);
            $dokumen_path = public_path() . $dokumen_folder . $dokumen_name;
            file_put_contents($dokumen_path, base64_decode($dokumen_base64));

            // URL untuk disimpan di database
            $logoUrl = $logo_folder . $logo_name;
            $ktpUrl = $ktp_folder . $ktp_name;
            $dokumenUrl = $dokumen_folder . $dokumen_name;
            if ($id_koperasi == 1) {
                $koperasiData = [
                    'nama_koperasi' => $request->nama_koperasi,
                    'singkatan_koperasi' => $request->singkatan_koperasi,
                    'email_koperasi' => $request->email,
                    'no_phone' => $request->no_telp,
                    'hp_wa' => $request->no_wa,
                    'hp_fax' => $request->no_fax,
                    'url_website' => $request->web,
                    'bidang_koperasi' => $request->bidang_koperasi,
                    'alamat' => $request->alamat,
                    'id_kelurahan' => $request->kelurahan,
                    'id_kecamatan' => $request->kecamatan,
                    'id_kota' => $request->kota,
                    'id_provinsi' => $request->provinsi,
                    'kode_pos' => $request->kode_pos,
                    'no_akta_pendirian' => $request->no_akta,
                    'tanggal_akta_pendirian' => $request->tanggal_akta,
                    'no_sk_kemenkumham' => $request->no_skk,
                    'tanggal_sk_kemenkumham' => $request->tanggal_skk,
                    'no_akta_perubahan' => $request->no_akta_perubahan,
                    'tanggal_akta_perubahan' => $request->masa_berlaku_perubahan,
                    'no_spkum' => $request->no_spkk,
                    'tanggal_spkum' => $request->tanggal_spkk,
                    'no_siup' => $request->no_siup,
                    'masa_berlaku_siup' => $request->masa_berlaku_siup,
                    'no_sk_domisili' => $request->no_skdu,
                    'masa_berlaku_sk_domisili' => $request->masa_berlaku_skdu,
                    'no_npwp' => $request->no_npwp,
                    'no_pkp' => $request->no_pkp,
                    'no_bpjs_kesehatan' => $request->bpjs_kesehatan,
                    'no_bpjs_tenaga_kerja' => $request->bpjs_ketenagakerjaan,
                    'no_sertifikat_koperasi' => $request->no_sertifikat,
                    'image_logo' => $logoUrl,
                    'ktp' => $ktpUrl,
                    'id_inkop' => $id_koperasi,
                    'id_tingkatan_koperasi' => $id_tingkat,
                    'doc_url' => $dokumenUrl,
                    'slug' => $request->slug,
                ];
            } else if ($id_koperasi == 2) {
                $koperasiData = [
                    'nama_koperasi' => $request->nama_koperasi,
                    'singkatan_koperasi' => $request->singkatan_koperasi,
                    'email_koperasi' => $request->email,
                    'no_phone' => $request->no_telp,
                    'hp_wa' => $request->no_wa,
                    'hp_fax' => $request->no_fax,
                    'url_website' => $request->web,
                    'bidang_koperasi' => $request->bidang_koperasi,
                    'alamat' => $request->alamat,
                    'id_kelurahan' => $request->kelurahan,
                    'id_kecamatan' => $request->kecamatan,
                    'id_kota' => $request->kota,
                    'id_provinsi' => $request->provinsi,
                    'kode_pos' => $request->kode_pos,
                    'no_akta_pendirian' => $request->no_akta,
                    'tanggal_akta_pendirian' => $request->tanggal_akta,
                    'no_sk_kemenkumham' => $request->no_skk,
                    'tanggal_sk_kemenkumham' => $request->tanggal_skk,
                    'no_akta_perubahan' => $request->no_akta_perubahan,
                    'tanggal_akta_perubahan' => $request->masa_berlaku_perubahan,
                    'no_spkum' => $request->no_spkk,
                    'tanggal_spkum' => $request->tanggal_spkk,
                    'no_siup' => $request->no_siup,
                    'masa_berlaku_siup' => $request->masa_berlaku_siup,
                    'no_sk_domisili' => $request->no_skdu,
                    'masa_berlaku_sk_domisili' => $request->masa_berlaku_skdu,
                    'no_npwp' => $request->no_npwp,
                    'no_pkp' => $request->no_pkp,
                    'no_bpjs_kesehatan' => $request->bpjs_kesehatan,
                    'no_bpjs_tenaga_kerja' => $request->bpjs_ketenagakerjaan,
                    'no_sertifikat_koperasi' => $request->no_sertifikat,
                    'image_logo' => $logoUrl,
                    'ktp' => $ktpUrl,
                    'id_puskop' => $id_koperasi,
                    'id_tingkatan_koperasi' => $id_tingkat,
                    'doc_url' => $dokumenUrl,
                    'slug' => $request->slug,
                ];
            }

            $koperasiId = DB::table('tbl_koperasi')->insertGetId($koperasiData);
            if (!$koperasiId) {
                throw new \Exception('Gagal Tambah Koperasi!');
            }
            $pengurusData = [
                'nik' => $request->no_ktp_pengurus,
                'nama_lengkap' => $request->nama_pengurus,
                'no_anggota' => $request->no_anggota_pengurus,
                'id_role' => $request->jabatan_pengurus,
                'nomor_hp' => $request->no_wa_pengurus,
                'id_koperasi' => (int)$koperasiId,
            ];

            $pengawasData = [
                'nik' => $request->no_ktp_pengawas,
                'nama_lengkap' => $request->nama_pengawas,
                'no_anggota' => $request->no_anggota_pengawas,
                'id_role' => $request->jabatan_pengawas,
                'nomor_hp' => $request->no_wa_pengawas,
                'id_koperasi' => (int)$koperasiId,
            ];

            $pengurus = DB::table('tbl_anggota')->insert($pengurusData);
            $pengawas = DB::table('tbl_anggota')->insert($pengawasData);

            if (!$pengurus || !$pengawas) {
                throw new \Exception('Gagal Tambah Anggota!');
            }
            DB::commit();

            return response()->json([
                'response_code' => "00",
                'response_message' => 'Sukses simpan data!',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'response_code' => "01",
                'response_message' => $th->getMessage(),
            ], 400);
        }
    }

    public function primkop(){
        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        return view('dashboard.data.koperasi.primkop.create',compact('id','username','password','tingkatan'));
    }

    public function puskop(){
        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        return view('dashboard.data.koperasi.puskop.create',compact('id','username','password','tingkatan'));
    }

    public function inkop(){
        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        return view('dashboard.data.koperasi.inkop.create',compact('id','username','password','tingkatan'));
    }
}
