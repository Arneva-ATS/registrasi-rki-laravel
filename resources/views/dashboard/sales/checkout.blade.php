@php
    use Carbon\Carbon;
    $orderDate = Carbon::parse($order->order_date);
    $dueDate = Carbon::parse($order->order_date)->addDays(7);
@endphp
@extends('dashboard.layouts.app')

@section('content')
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="doc-container">

                <div class="row">

                    <div class="col-xl-9">

                        <div class="invoice-container" style="background-color: white; padding: 20px; border-radius: 8px;">
                            <div class="invoice-inbox">

                                <div id="ct" class="">

                                    <div class="invoice-00001">
                                        <div class="content-section">

                                            <div class="inv--head-section inv--detail-section">

                                                <div class="row">

                                                    <div class="col-sm-6 col-12 mr-auto">
                                                        <div class="d-flex">
                                                            <img class="company-logo mx-3" src="/assets/img/rki_icon.png"
                                                                style="width:8em;background-color: #233668" alt="company">
                                                            <h3 class="in-heading align-self-center">
                                                                {{ $koperasi->nama_koperasi }}</h3>
                                                        </div>
                                                        <p class="inv-street-addr mt-3">{{ $koperasi->alamat }}</p>
                                                        <p class="inv-email-address">{{ $koperasi->email_koperasi }}</p>
                                                        <p class="inv-email-address">{{ $koperasi->no_phone }}</p>
                                                    </div>

                                                    <div class="col-sm-6 text-sm-end">
                                                        <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4"><span
                                                                class="inv-title">Invoice : </span> <span
                                                                class="inv-number">#{{ $order->invoice_number }}</span></p>
                                                        <p class="inv-created-date mt-sm-5 mt-3"><span
                                                                class="inv-title">Invoice Date : </span> <span
                                                                class="inv-date">{{ $orderDate->translatedFormat('d F Y') }}</span>
                                                        </p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span>
                                                            <span
                                                                class="inv-date">{{ $dueDate->translatedFormat('d F Y') }}</span>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="inv--detail-section inv--customer-detail-section">

                                                <div class="row">

                                                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>

                                                    <div
                                                        class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-end mt-sm-0 mt-5">
                                                        <h6 class=" inv-title">Invoice From</h6>
                                                    </div>

                                                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                        <p class="inv-customer-name">
                                                            {{ $order->nama_lengkap ? $order->nama_lengkap : $order->nama_customer }}
                                                        </p>
                                                        <p class="inv-street-addr">
                                                            {{ $order->alamat ? $order->alamat : '-' }}</p>
                                                        <p class="inv-email-address">
                                                            {{ $order->email ? $order->email : '-' }}</p>
                                                        <p class="inv-email-address">
                                                            {{ $order->nomor_hp ? $order->nomor_hp : $order->no_telp }}</p>
                                                    </div>

                                                    <div
                                                        class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">
                                                        <p class="inv-customer-name">{{ $koperasi->nama_koperasi }}</p>
                                                        <p class="inv-street-addr">{{ $koperasi->alamat }}</p>
                                                        <p class="inv-email-address">{{ $koperasi->email_koperasi }}</p>
                                                        <p class="inv-email-address">{{ $koperasi->no_phone }}</p>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="inv--product-table-section">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="">
                                                            <tr>
                                                                <th scope="col">S.No</th>
                                                                <th scope="col">Nama Produk</th>
                                                                <th class="text-end" scope="col">Harga</th>
                                                                <th class="text-end" scope="col">Qty</th>
                                                                <th class="text-end" scope="col">Total Harga</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($order_detail as $item)
                                                                <tr>
                                                                    <td>{{ $item->id_produk }}</td>
                                                                    <td>{{ $item->nama_produk }}</td>
                                                                    <td class="text-end">Rp. {{ $item->price }}</td>
                                                                    <td class="text-end">{{ $item->quantity }}</td>
                                                                    <td class="text-end">Rp. {{ $item->total }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="inv--total-amounts">

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="text-sm-end">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total :</p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">Rp. {{ $order->sub_total }}</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax 10% :</p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">Rp. {{ $order->tax }}</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount 5% :</p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">Rp. {{ $order->discount }}</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title mt-3">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount mt-3">
                                                                    <h4 class="">Rp. {{ $order->total_amount }}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="inv--note">

                                                <div class="row mt-4">
                                                    <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                        <p>Note: Thank you for doing Business with us.</p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>

                    </div>

                    <div class="col-xl-3">

                        <div class="invoice-actions-btn"
                            style="background-color: white; padding: 20px; border-radius: 8px;">

                            <div class="invoice-action-btn">

                                <div class="row g-3">
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <label for="">Metode Pembayaran</label>
                                        <select style="width:21.5em;height:2.5em;" name="metode_pembayaran"
                                            id="metode_pembayaran" class="form-stock">
                                            <option style="font-size: 1em;" value="1">Cash</option>
                                            <option style="font-size: 1em;" value="2">Xendit</option>
                                            <option style="font-size: 1em;" value="3">Debit BCA</option>
                                            <option style="font-size: 1em;" value="4">Kredit BCA</option>
                                            <option style="font-size: 1em;" value="5">QRIS</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <label for="">Harga Bayar</label>
                                        <input type="text" style="width:21.5em;height:2.5em;" class="form-stock"
                                            placeholder="Rp. ....">
                                    </div>
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <label for="">Kembalian</label>
                                        <input type="text" style="width:21.5em;height:2.5em;" class="form-stock"
                                            placeholder="Rp. ...." disabled>
                                    </div>
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <button style="width:21.5em;" class="btn btn-dark btn-edit">Bayar</button>
                                    </div>
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <button style="width:21.5em;" class="btn btn-danger"
                                            onclick="cancelTransaction()">Batal</button>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <script>
        const metodePembayaran = document.getElementById('metode_pembayaran');
        const hargaBayar = document.getElementById('harga_bayar');
        const kembalian = document.getElementById('kembalian');
        const grandTotal = {{ $order->total_amount }};

        metodePembayaran.addEventListener('change', (event) => {
            if (metodePembayaran.value === '1') { // Cash
                hargaBayar.disabled = false;
            } else {
                hargaBayar.disabled = true;
                hargaBayar.value = '';
                kembalian.value = '';
            }
        });

        hargaBayar.addEventListener('change', (event) => {
            const bayar = parseFloat(hargaBayar.value);
            if (!isNaN(bayar)) {
                const kembali = bayar - grandTotal;
                kembalian.value = `Rp. ${kembali.toFixed(2)}`;
            } else {
                kembalian.value = '';
            }
        });

        function cancelTransaction() {
            swal({
                    title: "Pembatalan!",
                    text: "Apakah anda yakin ingin membatalkan transaksi ini?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        fetch("/api/pos/cancel/" + {{ $order->id_order }}, {
                                headers: {
                                    "Access-Control-Allow-Origin": "*",
                                    "Content-Type": "application/json",
                                },
                                method: "DELETE",
                            })
                            .then((response) => response.json())
                            .then((data) => {
                                console.log(data)
                                if (data.response_code == "00") {
                                    swal({
                                        title: "Status",
                                        text: data?.response_message,
                                        icon: "success",
                                        buttons: true,
                                    }).then((willOut) => {
                                        if (willOut) {
                                            window.location = "/pos";
                                            console.log("success")
                                        } else {
                                            console.log("error");
                                        }
                                    });
                                } else {
                                    swal({
                                        title: "Status",
                                        text: data?.response_message,
                                        icon: "error",
                                        buttons: true,
                                    })
                                }
                            })
                            .catch((error) => {
                                console.log(error)
                                swal({
                                    title: "Status",
                                    text: error,
                                    icon: "info",
                                    buttons: true,
                                })
                            });
                    } else {
                        swal("fiiuuhh!");
                    }
                });
        }
    </script>
@endsection
