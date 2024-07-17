<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    //
    public function insert_pos(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'items' => 'required',
                'data_customer' => 'required',
                'grandTotal' => 'required',
                'tax' => 'required',
                'subTotal' => 'required',
                'items' => 'required',
                'id_koperasi' => 'required',
                'discount' => 'required'

            ]);
            $data = $request->all();
            return response()->json(['response_code'=>'00', 'response_message'=>$data], 200);
        } catch (\Throwable $th) {
            return response()->json(['repsonse_code' => '01', 'response_message' => $th->getMessage()], 500);
        }
    }
}
