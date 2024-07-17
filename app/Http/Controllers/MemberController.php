<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $id = Session::get('id');
        $id_koperasi = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $no_anggota = Session::get('no_anggota');
        $tingkatan = Session::get('tingkatan');
        
        $profile =  DB::table('tbl_anggota')->where('no_anggota', '=', $no_anggota)->first();
        return view('member.dashboard', compact('id', 'no_anggota', 'profile', 'id_koperasi','username','tingkatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function loginprocess(Request $request)
    {
        $ulogin = DB::table('tbl_anggota')->where('username', $request->username)->where('password', $request->password);
        if($ulogin->count() > 0){
            $data = $ulogin->first();
            Session::put('id', $data->id);
            Session::put('id_koperasi', $data->id_koperasi);
            Session::put('username', $data->username);
            Session::put('password', $data->password);
            Session::put('no_anggota', $data->no_anggota);
            Session::put('tingkatan', 'anggota');
            return redirect('/member/dashboard');
        }     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function loginform()
    {
        return view('member.loginform');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function logout(){
        Session::flush('id');
        Session::flush('id_koperasi');
        Session::flush('username');
        Session::flush('password');
        Session::flush('no_anggota');
        return redirect('/member/login');
    }

    public function simpanan()
    {
        $id = Session::get('id');
        $id_koperasi = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $no_anggota = Session::get('no_anggota');
        $tingkatan = Session::get('tingkatan');
        
        $profile =  DB::table('tbl_anggota')->where('no_anggota', '=', $no_anggota)->first();
        return view('member.simpanan', compact('id', 'no_anggota', 'profile', 'id_koperasi','username','tingkatan'));
    }

    public function pinjaman()
    {
        $id = Session::get('id');
        $id_koperasi = Session::get('id_koperasi');
        $username = Session::get('username');
        $password = Session::get('password');
        $no_anggota = Session::get('no_anggota');
        $tingkatan = Session::get('tingkatan');
        
        $profile =  DB::table('tbl_anggota')->where('no_anggota', '=', $no_anggota)->first();
        return view('member.pinjaman', compact('id', 'no_anggota', 'profile', 'id_koperasi','username','tingkatan'));
    }
}
