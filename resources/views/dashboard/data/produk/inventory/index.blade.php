@extends('dashboard.layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Data</a></li>
    <li class="breadcrumb-item"><a href="#">Produk</a></li>
    <li class="breadcrumb-item active" aria-current="page">Inventory</li>
@endsection

@section('content')
    <div class="row">
        <p class="mt-2 text-white">
            <button data-bs-toggle="modal" data-bs-target="#modalInkop" class="btn btn-primary"> Tambah Produk </button>
        </p>
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Gambar Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th class="no-content">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $data)
                            <tr>
                                <td>#{{ $data->id }}</td>
                                <td>{{ $data->nama_produk }}</td>
                                <td><img width="50" height="50" src="{{ $data->image_produk }}" alt="Gambar produk">
                                </td>
                                <td>{{ $data->harga }}</td>
                                <td>{{ $data->stok }}</td>
                                <td>{{ $data->id_kategori }}</td>
                                <td>
                                    <button class="btn btn-warning"> Edit </button>
                                    <button onclick="deleteBtn({{ $data->id }})" class="btn btn-danger"> Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalInkop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="g-3 needs-validation" novalidate enctype="multipart/for-data">
                                <div class="form-group">
                                    <label class="text-white" for="nama_produk">Nama Produk</label>
                                    <input type="text" name="nama_produk" id="nama_produk" class="form-control"
                                        placeholder="masukan nama produk" required />
                                </div>
                                <div class="form-group mt-3">
                                    <label class="text-white" for="harga">Harga</label>
                                    <input type="text" name="harga" id="harga" class="form-control"
                                        placeholder="masukan harga" required />
                                </div>
                                <div class="form-group mt-3">
                                    <label class="text-white" for="gambar_produk">Gambar</label>
                                    <input type="file" class="form-control" id="gambar_produk" name="gambar_produk"
                                        required />
                                    <img id="preview-gambar" height="100" width="100" class="mt-1"
                                        src="/assets/images/default.jpg" alt="Preview Image">
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group mt-3">
                                            <label class="text-white" for="stok">Stok</label>
                                            <input type="number" name="stok" id="stok" class="form-control"
                                                placeholder="masukan stok" required />
                                        </div>
                                    </div>
                                    <div class="col-4">

                                        <div class="form-group mt-3">
                                            <label class="text-white" for="uom">Units</label>
                                            <input type="text" name="uom" id="uom" class="form-control"
                                            placeholder="Per Unit" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="text-white" for="kategori">Kategori</label>
                                    <select type="text" name="kategori" id="kategori" class="form-control"
                                        placeholder="masukan kategori" required />
                                        @foreach ($categories as $data_kategori)
                                        <option value="{{ $data_kategori->id }}">{{ $data_kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="process" id="button-submit" class="btn btn-primary"
                                onclick="saveData()">
                                Simpan
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let id_koperasi;
        let baseStringProduk;
        let produkImage = document.getElementById("gambar_produk");
        let previewProduk = document.getElementById("preview-gambar")
        window.addEventListener("load", () => {
            const url = new URL(window.location.href);
            const path = url.pathname.split("/");
            id_koperasi = {{ $id }};
        });
        produkImage.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewProduk.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
        function deleteBtn(id) {
            swal({
                    title: "Hapus Data!",
                    text: "Apakah anda yakin ingin menghapus produk ini?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        fetch(`/api/products/delete-kategori/${id}`, {
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
                                            window.location = "/list_produk";
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
                        swal("Cancel!");
                    }
                });

        }

        produkImage.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewProduk.src = e.target.result;
                    baseStringProduk = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
        function saveData() {
            const nama_produk = document.getElementById("nama_produk").value;
            const harga = document.getElementById("harga").value;
            const stok = document.getElementById("stok").value;
            const kategori = document.getElementById("kategori").value;
            const image_produk = baseStringProduk;

            swal({
                title: "Please wait",
                text: "Submitting data...",
                // icon: "/assets/images/loading.gif",
                button: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                className: "swal-loading",
            });
            const jsondata = {
                nama_produk,
                harga,
                stok,
                kategori,
                image_produk
            };

            // console.log(jsondata)

            fetch(`/api/products/insert-product/${id_koperasi}`, {
                    headers: {
                        "Access-Control-Allow-Origin": "*",
                        "Content-Type": "application/json",
                    },
                    method: "POST",
                    body: JSON.stringify(jsondata),
                })
                .then((response) => response.json())
                .then((data) => {
                    console.log(data)
                    swal.close();
                    if (data.response_code == "00") {
                        swal({
                            title: "Status",
                            text: data?.response_message,
                            icon: "success",
                            buttons: true,
                        }).then((willOut) => {
                            if (willOut) {
                                window.location = "/list_produk";
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
                    swal.close();
                    console.log(error)
                    swal({
                        title: "Status",
                        text: error,
                        icon: "info",
                        buttons: true,
                    })
                });
        }
    </script>
@endsection
