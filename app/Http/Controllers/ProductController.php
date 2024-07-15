<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function get_product($id){
        try{
            $products = DB::table('tbl_products')->where('id_koperasi', $id)->get();
            if(!$products){
                throw new \Exception('Gagal Mendapatkan Produk');
            }
            return response()->json(['response_code'=>'00', 'response_message'=>$products],200);
        }catch(\Throwable $th){
            return response()->json(['response_code'=>'00', 'response_message'=>$th->getMessage()],200);
        }
    }

    public function insert(Request $request, $id){
        try{
            $request->validate([
                'nama_produk'=>'required',
                'harga'=>'required',
                'stok'=>'required',
                'kategori'=>'required',
                'uom' => 'required',
            ]);

            // Simpan foto selfie
            $product_base64 = $request->image_produk;
            $product_extension = $request->type;
            $product_name = time() . '_produk.' . $product_extension;
            $product_folder = "/produk/image/";
            $product_path =  public_path()  . $product_folder . $product_name;
            file_put_contents($product_path, base64_decode($product_base64));
            $products = DB::table('tbl_produk')->where('id_koperasi', $id)->insert([
                'nama_produk'=>$request->nama_produk,
                'harga'=>$request->harga,
                'stok'=>$request->stok,
                'uom'=>$request->uom,
                'image_produk'=>$product_path,
                'id_koperasi'=>$id,
            ]);
            if(!$products){
                throw new \Exception('Gagal Tambah!');
            }
            return response()->json(['response_code'=>'00', 'response_message'=>'Berhasil Tambah Produk!'],200);
        }catch(\Throwable $th){
            return response()->json(['response_code'=>'00', 'response_message'=>$th->getMessage()],200);
        }
    }
}
