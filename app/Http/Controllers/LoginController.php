<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dologin(Request $request)
    {
     
        $username = $request->username;
        $password = bcrypt($request->password);
        $koperasi = DB::table('tbl_koperasi')->where('username', $username)->orWhere('password',$password)->first();
        if(!empty($koperasi->id) || !empty($koperasi->username) || !empty($koperasi->password)) {

            Session::put('id_koperasi', $koperasi->id);
            Session::put('username', $koperasi->username);
            Session::put('password', $koperasi->password);

            return redirect('/dashboard');

        } else {
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
}
