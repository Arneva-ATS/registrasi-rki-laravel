<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class AnggotaController extends Controller
{
    //
    public function insert_anggota(Request $request)
    {
        try {
            $request->validate([
                'no_anggota' => 'required',
                'nik' => 'required',
                'nama_lengkap' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required',
                'kelurahan' => 'required',
                'kecamatan' => 'required',
                'kota' => 'required',
                'provinsi' => 'required',
                'kode_pos' => 'required',
                'agama' => 'required',
                'status_pernikahan' => 'required',
                'pekerjaan' => 'required',
                'kewarganegaraan' => 'required',
                'alamat' => 'required',
                'nomor_hp' => 'required',
                'email' => 'required|email',
                'slug_url' => 'required',
                'id_role' => 'required',
                'id_koperasi' => 'required'
            ]);

            // Convert Base64 to Image
            // Simpan foto selfie
            $selfie_base64 = $request->selfie;
            $selfie_extension = 'png';
            $selfie_name = time() . 'anggota.' . $selfie_extension;
            $selfie_folder = '/anggota/selfie/';
            $selfie_path = public_path() . $selfie_folder . $selfie_name;
            // $logo_path = public_path().'/images' public_path($logo_folder . $logo_name);
            file_put_contents($selfie_path, base64_decode($selfie_base64));

            // Simpan foto selfie
            $ktp_base64 = $request->ktp;
            $ktp_extension = 'png';
            $ktp_name = time() . 'anggota.' . $ktp_extension;
            $ktp_folder = '/anggota/ktp/';
            $ktp_path = public_path() . $ktp_folder . $ktp_name;
            // $logo_path = public_path().'/images' public_path($logo_folder . $logo_name);
            file_put_contents($ktp_path, base64_decode($ktp_base64));

            // simpan url
            $selfieUrl = $selfie_folder . $selfie_name;
            $ktpUrl = $ktp_folder . $ktp_name;
            $anggotaData = [
                'no_anggota' => $request->no_anggota,
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_kelurahan' => $request->kelurahan,
                'id_kecamatan' => $request->kecamatan,
                'id_kota' => $request->kota,
                'id_provinsi' => $request->provinsi,
                'kode_pos' => $request->kode_pos,
                'agama' => $request->agama,
                'status_pernikahan' => $request->status_pernikahan,
                'pekerjaan' => $request->pekerjaan,
                'kewarganegaraan' => $request->kewarganegaraan,
                'alamat' => $request->alamat,
                'nomor_hp' => $request->nomor_hp,
                'email' => $request->email,
                'selfie' => $selfieUrl,
                'ktp' => $ktpUrl,
                'id_koperasi' => $request->id_koperasi,
                'id_role' => $request->id_role
            ];
            // Insert into tbl_anggota
            $insert_anggota = DB::table('tbl_anggota')->insertGetId($anggotaData);
            if (!$insert_anggota) {
                throw new \Exception('Gagal Tambah Anggota!');
            }
            return response()->json([
                'response_code' => "00",
                'response_message' => 'Sukses simpan data!',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'response_code' => "01",
                'response_message' => $th->getMessage(),
            ], 400);
        }
    }

    public function create(){
        $id = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $tingkatan = Session::get('tingkatan');
        $id_inkop = Session::get('id_inkop');
        $id_puskop = Session::get('id_puskop');
        $id_primkop = Session::get('id_primkop');
        $nama_koperasi = "";
        $id_koperasi = $id ;
        return view('dashboard.auth.tambah_anggota',compact('id','username','password','tingkatan','id_koperasi','nama_koperasi'));
    }
}

