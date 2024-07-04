<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KoperasiController extends Controller
{
    //
    public function insert(Request $request, $tingkat)
    {
        $data = $request->all();
        $tingkat_koperasi = $tingkat;

        // Convert Base64 to Image
        $logoPath = 'public/koperasi/' . time() . '.png';
        $ktpPath = 'public/koperasi/' . time() . '.png';
        Storage::put($logoPath, base64_decode($data['logo']));
        Storage::put($ktpPath, base64_decode($data['ktp']));

        $logoUrl = Storage::url($logoPath);
        $ktpUrl = Storage::url($ktpPath);

        $pdfPath = 'public/koperasi/' . time() . '.pdf';
        Storage::put($pdfPath, base64_decode($data['dokumen']));
        $pdfUrl = Storage::url($pdfPath);

        try {
            $koperasiData = [
                'nama_koperasi' => $data['nama_koperasi'],
                'singkatan_koperasi' => $data['singkatan_koperasi'],
                'email_koperasi' => $data['email'],
                'no_phone' => $data['no_telp'],
                'hp_wa' => $data['no_wa'],
                'hp_fax' => $data['no_fax'],
                'url_website' => $data['web'],
                'bidang_koperasi' => $data['bidang_koperasi'],
                'alamat' => $data['alamat'],
                'kelurahan' => $data['kelurahan'],
                'kecamatan' => $data['kecamatan'],
                'kota' => $data['kabupaten'],
                'provinsi' => $data['provinsi'],
                'kode_pos' => $data['kode_pos'],
                'no_akta_pendirian' => $data['no_akta'],
                'tanggal_akta_pendirian' => $data['tanggal_akta'],
                'no_sk_kemenkumham' => $data['no_skk'],
                'tanggal_sk_kemenkumham' => $data['tanggal_skk'],
                'no_akta_perubahan' => $data['no_akta_perubahan'],
                'tanggal_akta_perubahan' => $data['masa_berlaku_perubahan'],
                'no_spkum' => $data['no_spkk'],
                'tanggal_spkum' => $data['tanggal_spkk'],
                'no_siup' => $data['no_siup'],
                'masa_berlaku_siup' => $data['masa_berlaku_siup'],
                'no_sk_domisili' => $data['no_skdu'],
                'masa_berlaku_sk_domisili' => $data['masa_berlaku_skdu'],
                'no_npwp' => $data['no_npwp'],
                'no_pkp' => $data['no_pkp'],
                'no_bpjs_kesehatan' => $data['bpjs_kesehatan'],
                'no_bpjs_tenaga_kerja' => $data['bpjs_ketenagakerjaan'],
                'no_sertifikat_koperasi' => $data['no_sertifikat'],
                'image_logo' => $logoUrl,
                'ktp' => $ktpUrl,
                'doc_url' => $pdfUrl,
                'slug' => $data['slug'],
            ];

            if ($tingkat_koperasi == 'inkop') {
                $koperasiId = DB::table('tbl_koperasi_induk')->insertGetId($koperasiData);
            } elseif ($tingkat_koperasi == 'puskop') {
                $koperasiId = DB::table('tbl_koperasi_pusat')->insertGetId($koperasiData);
            } elseif ($tingkat_koperasi == 'primkop') {
                $koperasiId = DB::table('tbl_koperasi_primer')->insertGetId($koperasiData);
            }

            $pengurusData = [
                'nik' => $data['no_ktp_pengurus'],
                'nama_lengkap' => $data['nama_pengurus'],
                'no_anggota' => $data['no_anggota_pengurus'],
                'roles' => $data['jabatan_pengurus'],
                'nomor_hp' => $data['no_wa_pengurus'],
                'id_koperasi' => $koperasiId,
            ];

            $pengawasData = [
                'nik' => $data['no_ktp_pengawas'],
                'nama_lengkap' => $data['nama_pengawas'],
                'no_anggota' => $data['no_anggota_pengawas'],
                'roles' => $data['jabatan_pengawas'],
                'nomor_hp' => $data['no_wa_pengawas'],
                'id_koperasi' => $koperasiId,
            ];

            DB::table('tbl_anggota')->insert($pengurusData);
            DB::table('tbl_anggota')->insert($pengawasData);

            return response()->json(['message' => 'success'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
