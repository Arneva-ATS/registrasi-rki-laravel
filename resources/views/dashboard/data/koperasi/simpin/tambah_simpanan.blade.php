@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Pinjaman</li>
@endsection

@section('content')
    <br>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">    
            <div class="widget-content widget-content-area br-8 p-3">
           
                <form class="row g-3 needs-validation" novalidate enctype="multipart/for-data">
                    <div class="col-md-6 position-relative">
                        <label for="simpanan_pokok">Simpanan Pokok</label>
                        <input type="number" name="simpanan_pokok" id="simpanan_pokok" class="form-control" placeholder="Masukan Simpanan Pokok" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="simpanan_wajib">Simpanan Wajib</label>
                        <input type="number" name="simpanan_wajib" id="simpanan_wajib" class="form-control" placeholder="Masukan Simpanan Wajib" required />
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="simpanan_sukarela">Simpanan Sukarela</label>
                        <input type="number" name="simpanan_sukarela" id="simpanan_sukarela" class="form-control" placeholder="Masukan Simpanan Sukarela" required /> 
                    </div>
                   
                    <div class="col-md-6 position-relative">
                        <label for="tanggal_simpanan">Tanggal Simpanan</label>
                        <input type="date" name="tanggal_simpanan" id="tanggal_simpanan" class="form-control" placeholder="Masukan Tanggal Simpanan" required /> 
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="no_anggota">No Anggota</label>
                        <input type="text" name="no_anggota" id="no_anggota" class="form-control" placeholder="No Anggota" required /> 
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="no_anggota">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder=" Masukan Keterangan" required /> 
                    </div>

                    <div class="col-12">
                        <button type="button" name="process" id="button-submit" class="btn btn-primary">
                            Simpan Data
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
