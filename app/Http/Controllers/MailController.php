<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendMailAnggota(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $password = bin2hex(openssl_random_pseudo_bytes(10));
            $data = DB::table('tbl_anggota')->where('id', $id)->update(['approval' => 1, 'password' => $password]);
            if (!$data) {
                throw new \Exception('Data tidak ada!');
            }
            $details = [
                'title' => 'Verifikasi Keanggotaan',
                'content' => 'Selamat! Email Anda berhasil Terverifikasi',
                'info' => 'Berikut akun keanggotaan yang bisa anda gunakan saat login',
                'username' => $request->username,
                'password' => $password
            ];
            Mail::to($request->email)->send(new VerificationMail($details));

            DB::commit();
            // return response()->json(['response_code' => '00', 'response_message' => $details]);
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil verfikasi data!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()]);
        }
    }
    public function sendMailKoperasi(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $password = bin2hex(openssl_random_pseudo_bytes(10));
            $data = DB::table('tbl_koperasi')->where('id', $id)->update(['approval' => 1, 'password' => $password]);
            if (!$data) {
                throw new \Exception('Data tidak ada!');
            }
            $details = [
                'title' => 'Verifikasi Keanggotaan',
                'content' => 'Selamat! Akun Koperasi Anda berhasil Terverifikasi',
                'info' => 'Berikut akun koperasi yang bisa anda gunakan saat login',
                'username' => $request->username,
                'password' => $password
            ];
           Mail::to($request->email)->send(new VerificationMail($details));

            DB::commit();
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil verfikasi data!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()]);
        }
    }
}
