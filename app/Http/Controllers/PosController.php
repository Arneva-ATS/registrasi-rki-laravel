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
                'items' => 'required|array',
                'data_customer' => 'required|array',
                'grandTotal' => 'required',
                'invoiceNumber' => 'required',
                'tax' => 'required',
                'subTotal' => 'required',
                'items' => 'required',
                'id_koperasi' => 'required',
                'totalQty' => 'required',
                'discount' => 'required'

            ]);
            $orderId = 0;
            if (!$request->id_anggota) {
                $customerId = DB::table('tbl_customer')->insertGetId($request->data_customer);
                if (!$customerId) {
                    throw new \Exception('Gagal Menambah customer!');
                }
                $orderId = DB::table('tbl_order')->insertGetId([
                    'id_customer' => $customerId,
                    'sub_total' => $request->subTotal,
                    'id_koperasi' => $request->id_koperasi,
                    'tax' => $request->tax,
                    'discount' => $request->discount,
                    'total_amount' => $request->grandTotal,
                    'invoice_number' => $request->invoiceNumber,
                    'created_by' => 'admin',
                    'updated_by' => 'admin',
                ]);
                if (!$orderId) {
                    throw new \Exception('Gagal Menambah Order!');
                }
                $items = $request->items;
                foreach ($items as &$item) {
                    $item['id_order'] = $orderId;
                }
                $orderDetail = DB::table('tbl_order_detail')->insert($items);
                if (!$orderDetail) {
                    throw new \Exception('Gagal Checkout');
                }
            } else {
                $orderId = DB::table('tbl_order')->insertGetId([
                    'id_anggota' => $request->id_anggota,
                    'sub_total' => $request->subTotal,
                    'id_koperasi' => $request->id_koperasi,
                    'invoice_number' => $request->invoiceNumber,
                    'tax' => $request->tax,
                    'discount' => $request->discount,
                    'total_amount' => $request->grandTotal,
                    'created_by' => 'admin',
                    'updated_by' => 'admin',
                ]);
                if (!$orderId) {
                    throw new \Exception('Gagal Menambah Order!');
                }
                $items = $request->items;
                foreach ($items as &$item) {
                    $item['id_order'] = $orderId;
                }
                $orderDetail = DB::table('tbl_order_detail')->insert($items);
                if (!$orderDetail) {
                    throw new \Exception('Gagal Checkout');
                }
            }

            DB::commit();
            return response()->json(['response_code' => '00', 'response_message' => 'Berhasil Checkout', 'order_id' => $orderId], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['repsonse_code' => '01', 'response_message' => $th->getMessage()], 500);
        }
    }
    public function destroy($order_id){
        DB::beginTransaction();

        try {

            $cancel_order_detail = DB::table('tbl_order_detail')->where('id_order', $order_id)->delete();

            if (!$cancel_order_detail) {
                throw new \Exception('Galat!');
            }
            $cancel_order = DB::table('tbl_order')->where('id', $order_id)->update(['status'=>'failed']);
            if (!$cancel_order) {
                throw new \Exception('Galat!');
            }
            DB::commit();
            return response()->json([
                'response_code' => '00',
                'response_message' => 'Pembatalan Berhasil!',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'response_code' => '01',
                'response_message' => $th->getMessage(),
            ]);
        }
    }
}
