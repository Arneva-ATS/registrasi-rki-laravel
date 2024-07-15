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
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Gambar Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Units</th>
                            <th>Kategori</th>
                            <th class="no-content">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $data)
                            <tr id="row-{{ $data->id_produk }}">
                                <td>#{{ $data->id_produk }}</td>
                                <td>{{ $data->nama_produk }}</td>
                                <td><img width="50" height="50"
                                        src="{{ 'http://127.0.0.1:8000' . $data->image_produk }}" alt="Gambar produk">
                                </td>
                                <td>{{ $data->harga }}</td>
                                <td>{{ $data->stok }}</td>
                                <td>{{ $data->uom }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#modalEdit" class="btn btn btn-warning"
                                        onclick="editModal({{ $data->id_produk }})">
                                        Edit </button>
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
                                    <select type="text" name="kategori" id="kategori" class="form-control" required />
                                    @foreach ($categories as $data_kategori)
                                        <option value="{{ $data_kategori->id }}">{{ $data_kategori->nama_kategori }}
                                        </option>
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
            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="editModalLabel">Edit Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="g-3 needs-validation" novalidate enctype="multipart/for-data">
                                <div class="form-group">
                                    <label class="text-white" for="edit_nama_produk">Nama Produk</label>
                                    <input type="text" name="edit_nama_produk" id="edit_nama_produk"
                                        class="form-control" placeholder="masukan nama produk" required />
                                </div>
                                <div class="form-group mt-3">
                                    <label class="text-white" for="edit_harga">Harga</label>
                                    <input type="text" name="edit_harga" id="edit_harga" class="form-control"
                                        placeholder="masukan harga" required />
                                </div>
                                <div class="form-group mt-3">
                                    <label class="text-white" for="edit_gambar_produk">Gambar</label>
                                    <input type="file" class="form-control" id="edit_gambar_produk"
                                        name="edit_gambar_produk" required />
                                    <img id="preview-edit-gambar" height="100" width="100" class="mt-1"
                                        src="/assets/images/default.jpg" alt="Preview Image">
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group mt-3">
                                            <label class="text-white" for="edit_stok">Stok</label>
                                            <input type="number" name="edit_stok" id="edit_stok" class="form-control"
                                                placeholder="masukan stok" required />
                                        </div>
                                    </div>
                                    <div class="col-4">

                                        <div class="form-group mt-3">
                                            <label class="text-white" for="edit_uom">Units</label>
                                            <input type="text" name="edit_uom" id="edit_uom" class="form-control"
                                                placeholder="Per Unit" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="text-white" for="edit_kategori">Kategori</label>
                                    <select type="text" name="edit_kategori" id="edit_kategori" class="form-control"
                                        required />
                                    @foreach ($categories as $data_kategori)
                                        <option value="{{ $data_kategori->id }}">{{ $data_kategori->nama_kategori }}
                                        </option>
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
        let baseStringEditProduk;
        let produkImage = document.getElementById("gambar_produk");
        let produkEditImage = document.getElementById("edit_gambar_produk");
        let previewProduk = document.getElementById("preview-gambar")
        let previewEditProduk = document.getElementById("preview-edit-gambar")
        let type;
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
                    type = file.type.split('/')[1];
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
                        fetch(`/api/products/delete-produk/${id}`, {
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

        produkEditImage.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewEditProduk.src = e.target.result;
                    baseStringEditProduk = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        function editModal(id) {
            fetch(`/api/products/detail-products/${id_koperasi}/${id}`, {
                    headers: {
                        "Access-Control-Allow-Origin": "*",
                        "Content-Type": "application/json",
                    },
                    method: "GET",
                })
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);
                    let dataProduct = data.response_message;
                    console.log(dataProduct)
                    if (data.response_code == "00") {
                        document.getElementById('edit_nama_produk').value = dataProduct[0].nama_produk
                        document.getElementById('edit_harga').value = dataProduct[0].harga
                        document.getElementById('edit_stok').value = dataProduct[0].stok
                        document.getElementById('edit_uom').value = dataProduct[0].uom
                        let kategoriSelect = document.getElementById('edit_kategori');
                        let kategoriId = dataProduct[0].id_kategori;

                        for (let i = 0; i < kategoriSelect.options.length; i++) {
                            if (kategoriSelect.options[i].value == kategoriId) {
                                kategoriSelect.options[i].selected = true;
                                break;
                            }
                        }

                    } else {
                        console.error('Failed to update product');
                    }
                }).catch((error) => {
                    console.error('Error:', error);
                });
        }

        function saveData() {
            const nama_produk = document.getElementById("nama_produk").value;
            const harga = document.getElementById("harga").value;
            const stok = document.getElementById("stok").value;
            const uom = document.getElementById("uom").value;
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
                uom,
                kategori,
                type,
                image_produk: image_produk?.split(",")[1]
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

        // function editRow(id) {
        //     const row = document.getElementById(`row-${id}`);
        //     const cells = row.getElementsByTagName('td');
        //     console.log(cells[6].innerText)

        //     if (row.getAttribute('data-editing') === 'true') {

        //         // Save changes
        //         const updatedData = {
        //             id: id,
        //             nama_produk: cells[1].getElementsByTagName('input')[0].value,
        //             image_produk: cells[2].getElementsByTagName('input')[0].value,
        //             harga: cells[3].getElementsByTagName('input')[0].value,
        //             stok: cells[4].getElementsByTagName('input')[0].value,
        //             uom: cells[5].getElementsByTagName('input')[0].value,
        //             nama_kategori: cells[6].getElementsByTagName('select')[0].value,
        //         };
        //         cells[1].innerHTML = updatedData.nama_produk;
        //         cells[2].innerHTML = `<img width="50" height="50" src="${updatedData.image_produk}" alt="Gambar produk">`;
        //         cells[3].innerHTML = updatedData.harga;
        //         cells[4].innerHTML = updatedData.stok;
        //         cells[5].innerHTML = updatedData.uom;
        //         cells[6].innerHTML = updatedData.nama_kategori;
        //         row.setAttribute('data-editing', 'false');
        //         cells[7].getElementsByTagName('button')[0].innerText = 'Edit';
        // Example of sending updatedData to the server (you need to implement the endpoint)
        // fetch(`/api/products/update-product/${id}`, {
        //     headers: {
        //         "Access-Control-Allow-Origin": "*",
        //         "Content-Type": "application/json",
        //     },
        //     method: "POST",
        //     body: JSON.stringify(updatedData),
        // }).then((response) => response.json()).then((data) => {
        //     console.log(data);
        //     if (data.response_code == "00") {
        //         // Update the row with new data
        //         cells[1].innerHTML = updatedData.nama_produk;
        //         cells[2].innerHTML =
        //             `<img width="50" height="50" src="${updatedData.image_produk}" alt="Gambar produk">`;
        //         cells[3].innerHTML = updatedData.harga;
        //         cells[4].innerHTML = updatedData.stok;
        //         cells[5].innerHTML = updatedData.uom;
        //         cells[6].innerHTML = updatedData.nama_kategori;

        //         // Switch back to edit mode
        //         row.setAttribute('data-editing', 'false');
        //         cells[7].getElementsByTagName('button')[0].innerText = 'Edit';
        //     } else {
        //         console.error('Failed to update product');
        //     }
        // }).catch((error) => {
        //     console.error('Error:', error);
        // });
        // } else {
        // Edit mode
        //         cells[1].innerHTML = `<input class="form-stock w-75" type="text" value="${cells[1].innerText}">`;
        //         cells[2].innerHTML =
        //             `<input  class="form-stock" type="file" value="${cells[2].getElementsByTagName('img')[0].src}">`;
        //         cells[3].innerHTML = `<input  class="form-stock" type="text" value="${cells[3].innerText}">`;
        //         cells[4].innerHTML =
        //             `<button class="btn btn-primary">-</button><input class="form-stock" type="text" value="${cells[4].innerText}"><button class="btn btn-primary">+</button>`;
        //         cells[5].innerHTML = `<input  class="form-stock" type="text" value="${cells[5].innerText}">`;
        //         cells[6].innerHTML = `<select>
    //             ${cells[6].innerText}</select>`;

        //         row.setAttribute('data-editing', 'true');
        //         cells[7].getElementsByTagName('button')[0].innerText = 'Save';
        //     }
        // }
    </script>
@endsection