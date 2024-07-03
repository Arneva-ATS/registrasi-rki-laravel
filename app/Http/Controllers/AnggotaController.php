<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    //
    public function insert(Request $request)
    {
        $data = $request->all();
        $slug_url = $data['slug_url'];
        $tingkat_koperasi = $data['tingkat_koperasi'];

        try {
            // Determine koperasi data based on tingkat_koperasi
            if ($tingkat_koperasi == 'inkop') {
                $koperasi_data = DB::table('tbl_koperasi_induk')->where('slug', $slug_url)->first();
            } elseif ($tingkat_koperasi == 'puskop') {
                $koperasi_data = DB::table('tbl_koperasi_pusat')->where('slug', $slug_url)->first();
            } elseif ($tingkat_koperasi == 'primkop') {
                $koperasi_data = DB::table('tbl_koperasi_primer')->where('slug', $slug_url)->first();
            }

            // Convert Base64 to Image
            $selfiePath = 'public/' . $data['roles'] . '/' . time() . '.png';
            $ktpPath = 'public/' . $data['roles'] . '/' . time() . '.png';
            Storage::put($selfiePath, base64_decode($data['selfie']));
            Storage::put($ktpPath, base64_decode($data['ktp']));

            $selfieUrl = Storage::url($selfiePath);
            $ktpUrl = Storage::url($ktpPath);

            // Insert into tbl_anggota
            $anggotaId = DB::table('tbl_anggota')->insertGetId([
                'no_anggota' => $data['no_anggota'],
                'nik' => $data['nik'],
                'nama_lengkap' => $data['nama_lengkap'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'rt_rw' => $data['rt_rw'],
                'kelurahan' => $data['kelurahan'],
                'kecamatan' => $data['kecamatan'],
                'kota' => $data['kota'],
                'provinsi' => $data['provinsi'],
                'kode_pos' => $data['kode_pos'],
                'agama' => $data['agama'],
                'status_pernikahan' => $data['status_pernikahan'],
                'pekerjaan' => $data['pekerjaan'],
                'kewarganegaraan' => $data['kewarganegaraan'],
                'alamat' => $data['alamat'],
                'nomor_hp' => $data['nomor_hp'],
                'email' => $data['email'],
                'selfie' => $selfieUrl,
                'ktp' => $ktpUrl,
            ]);

            // Insert into tbl_user
            $userData = [
                'username' => $data['username'],
                'id_anggota' => $anggotaId,
                'id_role' => 2,
            ];

            if ($tingkat_koperasi == 'inkop') {
                $userData['id_koperasi_induk'] = $koperasi_data->id;
            } elseif ($tingkat_koperasi == 'puskop') {
                $userData['id_koperasi_pusat'] = $koperasi_data->id;
            } elseif ($tingkat_koperasi == 'primkop') {
                $userData['id_koperasi_primer'] = $koperasi_data->id;
            }

            DB::table('tbl_user')->insert($userData);

            return response()->json(['message' => 'success'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
