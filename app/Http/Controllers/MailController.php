<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendMail(Request $request, $id)
    {
        try {
            $password = bin2hex(openssl_random_pseudo_bytes(10));
            $data = DB::table('tbl_anggota')->where('id', $id)->update(['approval' => 1, 'password' => $password]);
            if (!$data) {
                throw new \Exception('Data tidak ada!');
            }
            $details = [
                'title' => 'Verfikasi Keanggotaan',
                'content' => 'Selamat! Email Anda berhasil Terverifikasi',
                'info' => 'Berikut akun keanggotaan yang bisa anda gunakan saat login',
                'email' => $request->email,
                'password' => $password
            ];
            Mail::to('aditbest5@gmail.com')->send(new VerificationMail($details));
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil verfikasi data!']);
        } catch (\Throwable $th) {
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()]);
        }
    }
}
