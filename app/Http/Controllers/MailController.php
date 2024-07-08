<?php

namespace App\Http\Controllers;

use App\Mail\RejectMail;
use App\Mail\VerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendMailApproveAnggota(Request $request, $id)
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
    public function sendMailApproveKoperasi(Request $request, $id)
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

    public function sendMailRejectAnggota(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $deleted = DB::table('tbl_anggota')->where('id', $id)->delete();
            if (!$deleted) {
                throw new \Exception('Gagal hapus data!');
            }
            $details = [
                'title' => 'Keanggotan Ditolak',
                'content' => 'Maaf, keanggotaan anda ditolak',
                'info' => 'Berikut alasan registrasi anda ditolak.',
                'alasan' => $request->alasan
            ];
            Mail::to($request->email)->send(new RejectMail($details));

            DB::commit();
            // return response()->json(['response_code' => '00', 'response_message' => $details]);
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil Reject!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()]);
        }
    }

    public function sendMailRejectKoperasi(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            // Hapus anggota terlebih dahulu
            $deleted_anggota = DB::table('tbl_anggota')->where('id_koperasi', $id)->delete();

            // Jika anggota berhasil dihapus atau tidak ada anggota yang berhubungan dengan koperasi tersebut
            if ($deleted_anggota !== false) {
                // Hapus koperasi
                $deleted_koperasi = DB::table('tbl_koperasi')->where('id', $id)->delete();

                // Jika koperasi berhasil dihapus
                if ($deleted_koperasi) {
                    $details = [
                        'title' => 'Data Koperasi Ditolak',
                        'content' => 'Maaf, koperasi anda ditolak',
                        'info' => 'Berikut alasan registrasi koperasi ditolak.',
                        'alasan' => $request->alasan
                    ];
                    Mail::to($request->email)->send(new RejectMail($details));
                    DB::commit();
                    return response()->json(['response_code' => '00', 'response_message' => 'Berhasil Reject!']);
                } else {
                    // Jika penghapusan koperasi gagal
                    throw new \Exception('Gagal hapus data koperasi!');
                }
            } else {
                // Jika penghapusan anggota gagal
                throw new \Exception('Gagal hapus data anggota!');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['response_code' => '01', 'response_message' => $th->getMessage()]);
        }
    }
}
