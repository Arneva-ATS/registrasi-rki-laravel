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
                <!-- Hidden receipt section for printing -->
                <div id="receipt" style="display: none; width: 80mm; font-size: small;">
                    <div class="header">
                        {{-- <img class="w-25" src="{{ asset('assets/img/logo-fav-icon.png') }}" alt="company"> --}}
                        <h3>{{ $koperasi->nama_koperasi }}</h3>
                        <p>{{ $koperasi->alamat }}</p>
                        <p>{{ $koperasi->email_koperasi }}</p>
                        <p>{{ $koperasi->no_phone }}</p>
                    </div>
                    <hr>
                    <div class="section">
                        <p><strong>Invoice: #{{ $order->invoice_number }}</strong></p>
                        <p>Tanggal: {{ $orderDate->translatedFormat('d F Y') }}</p>
                        <p>Due Date: {{ $dueDate->translatedFormat('d F Y') }}</p>
                    </div>
                    <hr>
                    <div class="section">
                        <p><strong>Invoice To:</strong> {{ $order->nama_lengkap ?? $order->nama_customer }}</p>
                        <p>{{ $order->alamat ?? '-' }}</p>
                        <p>{{ $order->email ?? '-' }}</p>
                        <p>{{ $order->nomor_hp ?? $order->no_telp }}</p>
                    </div>
                    <hr>
                    <div class="section">
                        <p><strong>Items</strong></p>
                        <table>
                            @foreach ($order_detail as $item)
                                <tr>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->quantity }} x Rp. {{ $item->price }}</td>
                                    <td class="text-end">Rp. {{ $item->total }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <hr>
                    <div class="section">
                        <p>Sub Total: Rp. {{ $order->sub_total }}</p>
                        <p>Tax: Rp. {{ $order->tax }}</p>
                        <p>Discount: Rp. {{ $order->discount }}</p>
                        <p><strong>Total: Rp. {{ $order->total_amount }}</strong></p>
                        <p>Harga Bayar: Rp. {{ $order->paid_value ?? '' }}</p>
                        <p>Kembalian: Rp. {{ $order->change_value ?? '' }}</p>
                    </div>
                    <hr>
                    <div class="footer">
                        <p>Thank you for your business!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8">
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
                                                            {{ $order->nama_lengkap ?? $order->nama_customer }}
                                                        </p>
                                                        <p class="inv-street-addr">
                                                            {{ $order->alamat ?? '-' }}</p>
                                                        <p class="inv-email-address">
                                                            {{ $order->email ?? '-' }}</p>
                                                        <p class="inv-email-address">
                                                            {{ $order->nomor_hp ?? $order->no_telp }}</p>
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
                                                                    <p class=" discount-rate">Discount:</p>
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
                    <div class="col-xl-4">

                        <div class="invoice-actions-btn"
                            style="background-color: white; padding: 20px; border-radius: 8px;">

                            <div class="invoice-action-btn">

                                <div class="row g-3">
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <div class="d-flex flex-row justify-content-center">
                                            <label for="">Metode Pembayaran</label>
                                        </div>
                                        <div class="d-flex flex-row justify-content-center">
                                            <select style="width:19em;height:2.5em;" name="metode_pembayaran"
                                                id="metode_pembayaran" class="form-stock">
                                                @foreach ($payment_method as $method)
                                                    <option style="font-size: 1em;" value="{{ $method->id }}">
                                                        {{ $method->payment_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <div class="d-flex flex-row justify-content-center">
                                            <label for="">Harga Bayar</label>
                                        </div>
                                        <div class="d-flex flex-row justify-content-center">
                                            <input type="text" id="harga_bayar" style="width: 19em;height:2.5em;"
                                                class="form-stock" placeholder="Rp. ....">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <div class="d-flex flex-row justify-content-center">
                                            <label for="">Kembalian</label>
                                        </div>
                                        <div class="d-flex flex-row justify-content-center">
                                            <input type="text" id="kembalian" style="width: 19em;height:2.5em;"
                                                class="form-stock" placeholder="Rp. ...." disabled>
                                        </div>
                                    </div>
                                    @if ($order->status == 'pending')
                                        <div class="col-xl-12 col-md-3 col-sm-6 d-flex flex-row justify-content-center">
                                            <button style="width:19em;" class="btn btn-dark btn-edit"
                                                onclick="payBtn()">Bayar</button>
                                        </div>
                                        <div class="col-xl-12 col-md-3 col-sm-6 d-flex flex-row justify-content-center">
                                            <button style="width:19em;" class="btn btn-danger"
                                                onclick="cancelTransaction()">Batal</button>
                                        </div>
                                    @else
                                        <div class="col-xl-12 col-md-3 col-sm-6 d-flex flex-row justify-content-center">
                                            <a style="width:19em;" class="btn btn-dark btn-edit" href="/pos"><-
                                                    Kembali</a>
                                        </div>
                                    @endif
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
    <script>
        const items = @json($order_detail).map(item => ({
            name: item.nama_produk,
            quantity: item.quantity,
            price: item.price,
            category: item.nama_kategori,
            url: "https://yourcompany.com"
        }));
        const order = @Json($order);
        const metodePembayaran = document.getElementById('metode_pembayaran');
        const hargaBayar = document.getElementById('harga_bayar');
        const kembalian = document.getElementById('kembalian');
        const grandTotal = {{ $order->total_amount }};
        let id_koperasi = {{ $id }};
        metodePembayaran.addEventListener('change', (event) => {
            if (metodePembayaran.value === '1') { // Cash
                hargaBayar.disabled = false;
            } else if (metodePembayaran.value === '2') {
                hargaBayar.disabled = true;
                hargaBayar.value = grandTotal;
                kembalian.value = 0
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
                if (kembali < 0) {
                    swal('Uang tidak kurang dari total pembayaran!', 'Mohon sesuaikan uang pembayaran', 'info')
                } else {
                    kembalian.value = kembali;
                }
            } else {
                kembalian.value = '';
            }
        });

        function printReceipt() {
            var originalContent = document.body.innerHTML;
            var printContent = document.getElementById('receipt').innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
            window.location.href = "/pos";
        }

        function payBtn() {
            let bayar = hargaBayar.value;
            let sisa = kembalian.value;
            let jsonData = {}
            if (metodePembayaran.value == '1') {
                if (!bayar) {
                    swal('Perhatian!', 'Harap isi nominal pembayaran', 'info')
                } else {
                    jsonData = {
                        id_payment_method: metodePembayaran.value,
                        amount_value: order.total_amount,
                        change_value: sisa,
                        paid_value: bayar,
                        id_koperasi: id_koperasi,
                        id_order: order.id_order,
                        status: 'completed',
                    }
                    console.log(jsonData);

                    fetch(`/api/pos/payment`, {
                            headers: {
                                "Access-Control-Allow-Origin": "*",
                                "Content-Type": "application/json",
                            },
                            method: "POST",
                            body: JSON.stringify(jsonData),
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            console.log(data)
                            // swal.close();
                            if (data.response_code == "00") {
                                printReceipt(); // Call print function
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
                            // swal.close();
                            console.log(error)
                            swal({
                                title: "Status",
                                text: error,
                                icon: "info",
                                buttons: true,
                            })
                        });
                }
            } else if (metodePembayaran.value == '2') {
                jsonData = {
                    "amount": order.total_amount,
                    "fees": [{
                        "type": "ADMIN",
                        "value": 5000
                    }],
                    "customer": {
                        "given_names": "{{ $order->nama_customer ?? $order->nama_lengkap }}",
                        "surname": "{{ $order->nama_customer ?? $order->nama_lengkap }}",
                        "email": "{{ $order->email }}",
                        "mobile_number": "{{ $order->no_telp ?? $order->nomor_hp }}",
                        "addresses": [{
                            "city": "Jakarta Selatan",
                            "country": "Indonesia",
                            "postal_code": "12345",
                            "state": "Daerah Khusus Ibukota Jakarta",
                            "street_line1": "Jalan Makan",
                            "street_line2": "Kecamatan Kebayoran Baru"
                        }]
                    },
                    "customer_notification_preference": {
                        "invoice_created": [
                            "whatsapp",
                            "email",
                            "viber"
                        ],
                        "invoice_reminder": [
                            "whatsapp",
                            "email",
                            "viber"
                        ],
                        "invoice_paid": [
                            "whatsapp",
                            "email",
                            "viber"
                        ]
                    },
                    "description": "Pembayaran dengan Xendit",
                    "invoice_duration": 86400,
                    "currency": "IDR",
                    "items": items,
                    "metadata": {
                        id_payment_method: metodePembayaran.value,
                        amount_value: order.total_amount,
                        change_value: sisa,
                        paid_value: bayar,
                        id_koperasi: id_koperasi,
                        id_order: order.id_order,
                        status: 'completed',
                    }
                }
                console.log(jsonData);

                fetch(`https://xendit-api.arnevats.com/v1/api/xendit/create-payment`, {
                        headers: {
                            "Access-Control-Allow-Origin": "*",
                            "Content-Type": "application/json",
                        },
                        method: "POST",
                        body: JSON.stringify(jsonData),
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        console.log(data)
                        // swal.close();
                        let url = data.invoiceUrl;
                        window.location.href = url;
                    })
                    .catch((error) => {
                        // swal.close();
                        console.log(error)
                        swal({
                            title: "Status",
                            text: "Kesalahan Server",
                            icon: "info",
                            buttons: true,
                        })
                    });
            }

        }

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
