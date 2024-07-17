@extends('dashboard.layouts.app')

@section('content')
    <div class="row layout-top-spacing">
        <div class="w-50 mb-5" id="scan-form">
            <input id="barcode-input" type="text" name="txt" placeholder="Scan Barcode" class="form-control" autofocus>
        </div>

        <div class="simple-pill col-lg-8">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active btn btn-light" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true" style="width:10em; height: 3em;">Produk</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn btn-light" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false" style="width:10em; height: 3em;">Pulsa</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn btn-light" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false" style="width:10em; height: 3em;">PDAM</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn btn-light" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled"
                        aria-selected="false" style="width:10em; height: 3em;">PLN</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn btn-light" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled"
                        aria-selected="false" style="width:10em; height: 3em;">Tagihan</button>
                </li>
            </ul>
            {{-- <div class="mx-2 row g-2">
                <div class="col-lg-2 col-6">
                    <button onclick="produkFisik()" class="btn btn-info" style="width:8em; height: 5em;">Produk</button>
                </div>
                <div class="col-lg-2 col-6">
                    <button class="btn btn-info" style="width:8em; height: 5em;">Pulsa</button>
                </div>
                <div class="col-lg-2 col-6">
                    <button class="btn btn-info" style="width:8em; height: 5em;">PDAM</button>
                </div>
                <div class="col-lg-2 col-6">
                    <button class="btn btn-info" style="width:8em; height: 5em;">PLN</button>
                </div>
                <div class="col-lg-2 col-6">
                    <button class="btn btn-info" style="width:8em; height: 5em;">Tagihan</button>
                </div>
                <div class="col-lg-2 col-6">
                    <button class="btn btn-info" style="width:8em; height: 5em;">Pulsa</button>
                </div>
            </div> --}}
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="row layout-spacing mt-4">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
                                <input id="search-input" type="text" name="txt" placeholder="Search"
                                    class="form-control" required="" onkeyup="searchBtn(this.value)">
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4 ms-auto">
                                <select class="form-select form-select" aria-label="Default select example"
                                    onchange="filterCategoryBtn(this.value)">
                                    <option value="00" selected="">All Category</option>
                                    @foreach ($categories as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">Sort By</option>
                                    <option value="1">Recent</option>
                                    <option value="2">Most Upvoted</option>
                                    <option value="3">Popular</option>
                                </select>
                            </div>
                        </div>
                        <div class="row container-product">


                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <div class="row layout-spacing mt-4">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
                                <input id="t-text" type="text" name="txt" placeholder="Search"
                                    class="form-control" required="">
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4 ms-auto">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">All Category</option>
                                    <option value="3">Wordpress</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Themeforest</option>
                                    <option value="3">Travel</option>
                                </select>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">Sort By</option>
                                    <option value="1">Recent</option>
                                    <option value="2">Most Upvoted</option>
                                    <option value="3">Popular</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-2.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">14 Tips to improve your photography</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/list-blog-style-3.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">29 Most Beautiful Places in the World</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-4.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">7 Effective ways to instantly look more faishonable
                                        </h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/masonry-blog-style-4.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">How to plan a trip in 7 easy steps</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    <div class="row layout-spacing mt-4">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
                                <input id="search-input" type="text" name="txt" placeholder="Search"
                                    class="form-control" required="" onkeyup="searchBtn(this.value)">
                            </div>
                            <div
                                class="col-xl-3
                                    col-lg-3 col-md-3 col-sm-3 mb-4 ms-auto">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">All Category</option>
                                    <option value="3">Wordpress</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Themeforest</option>
                                    <option value="3">Travel</option>
                                </select>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">Sort By</option>
                                    <option value="1">Recent</option>
                                    <option value="2">Most Upvoted</option>
                                    <option value="3">Popular</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-2.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">14 Tips to improve your photography</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-1.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">The ideal work from home office setup</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-3.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">Top haunted houses in Great Britain</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/list-blog-style-3.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">29 Most Beautiful Places in the World</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-4.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">7 Effective ways to instantly look more faishonable
                                        </h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                    tabindex="0">
                    <div class="row layout-spacing mt-4">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
                                <input id="t-text" type="text" name="txt" placeholder="Search"
                                    class="form-control" required="">
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4 ms-auto">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">All Category</option>
                                    <option value="3">Wordpress</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Themeforest</option>
                                    <option value="3">Travel</option>
                                </select>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-4">
                                <select class="form-select form-select" aria-label="Default select example">
                                    <option selected="">Sort By</option>
                                    <option value="1">Recent</option>
                                    <option value="2">Most Upvoted</option>
                                    <option value="3">Popular</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/grid-blog-style-3.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">Top haunted houses in Great Britain</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/masonry-blog-style-3.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">9 Reasons why sugar is bad for your health</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                                    <img src="../src/assets/img/masonry-blog-style-4.jpeg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body px-0 pb-0">
                                        <h5 class="card-title mb-3">How to plan a trip in 7 easy steps</h5>
                                        <div class="media mt-4 mb-0 pt-1">
                                            <button class="btn btn-primary" type="button">Beli</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-lg-4">
            <div class="invoice-container" style="background-color: white; padding: 20px; border-radius: 8px;">
                <div class="invoice-inbox">
                    <div id="ct" class="">
                        <div class="invoice-00001">
                            <div class="content-section">
                                <div class="inv--head-section inv--detail-section">
                                    <div class="row">
                                        <div class="col-sm-6 col-12 mr-auto">
                                            <div class="d-flex">
                                                <img class="company-logo" src="../src/assets/img/cork-logo.png"
                                                    alt="company">
                                                <h3 class="in-heading align-self-center">{{ $username }}</h3>
                                            </div>
                                            <p class="inv-street-addr mt-3">XYZ Delta Street</p>
                                            <p class="inv-email-address">info@company.com</p>
                                            <p class="inv-email-address">(120) 456 789</p>
                                        </div>
                                        <div class="col-sm-6 text-sm-end">
                                            <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4">
                                                <span class="inv-title">Invoice : </span>
                                                <span class="inv-number">#0001</span>
                                            </p>
                                            <p class="inv-created-date mt-sm-5 mt-3">
                                                <span class="inv-title">Invoice Date : </span>
                                                <span class="inv-date">20 Mar 2022</span>
                                            </p>
                                            <p class="inv-due-date">
                                                <span class="inv-title">Due Date : </span>
                                                <span class="inv-date">26 Mar 2022</span>
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
                                            <h6 class="inv-title">Invoice From</h6>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                            <p class="inv-customer-name">Jesse Cory</p>
                                            <p class="inv-street-addr">405 Mulberry Rd., NC, 28649</p>
                                            <p class="inv-email-address">jcory@company.com</p>
                                            <p class="inv-email-address">(128) 666 070</p>
                                        </div>
                                        <div
                                            class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">
                                            <p class="inv-customer-name">Oscar Garner</p>
                                            <p class="inv-street-addr">2161 Ferrell Street, MN, 56545 </p>
                                            <p class="inv-email-address">info@mail.com</p>
                                            <p class="inv-email-address">(218) 356 9954</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="inv--product-table-section">
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.No</th>
                                                    <th scope="col">Items</th>
                                                    <th class="text-end" scope="col">Qty</th>
                                                    <th class="text-end" scope="col">Price</th>
                                                    <th class="text-end" scope="col">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody id="invoice-table">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="inv--total-amounts">
                                    <div class="row mt-4">
                                        <div class="col-sm-5 col-12 order-sm-0 order-1"></div>
                                        <div class="col-sm-7 col-12 order-sm-1 order-0">
                                            <div class="text-sm-end">
                                                <div class="row">
                                                    <div class="col-sm-8 col-7">
                                                        <p class="">Sub Total :</p>
                                                    </div>
                                                    <div class="col-sm-4 col-5">
                                                        <p class="">$3155</p>
                                                    </div>
                                                    <div class="col-sm-8 col-7">
                                                        <p class="">Tax 10% :</p>
                                                    </div>
                                                    <div class="col-sm-4 col-5">
                                                        <p class="">$315</p>
                                                    </div>
                                                    <div class="col-sm-8 col-7">
                                                        <p class="discount-rate">Shipping :</p>
                                                    </div>
                                                    <div class="col-sm-4 col-5">
                                                        <p class="">$10</p>
                                                    </div>
                                                    <div class="col-sm-8 col-7">
                                                        <p class="discount-rate">Discount 5% :</p>
                                                    </div>
                                                    <div class="col-sm-4 col-5">
                                                        <p class="">$150</p>
                                                    </div>
                                                    <div class="col-sm-8 col-7 grand-total-title mt-3">
                                                        <h4 class="">Grand Total : </h4>
                                                    </div>
                                                    <div class="col-sm-4 col-5 grand-total-amount mt-3">
                                                        <h4 class="">$3480</h4>
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

    </div>

    <script>
        let listProduk = @json($products);
        let id_koperasi;
        let invoiceItems = [];

        window.addEventListener("load", () => {
            const url = new URL(window.location.href);
            const path = url.pathname.split("/");
            id_koperasi = {{ $id }};
            displayProducts(listProduk); // Display all products on load

        });

        function searchBtn(value) {
            const filteredProducts = listProduk.filter(product => product.nama_produk.toLowerCase().includes(value
                .toLowerCase()));
            displayProducts(filteredProducts);
        }

        function filterCategoryBtn(value) {
            if (value === "00") {
                displayProducts(listProduk); // Display all products if "All Category" is selected
            } else {
                const filteredProducts = listProduk.filter(product => product.id_kategori == value);
                displayProducts(filteredProducts);
            }
        }

        document.getElementById('barcode-input').addEventListener('input', function(event) {
            const barcodeValue = event.target.value;
            searchByBarcode(barcodeValue);
            event.target.value = ''; // Clear the input field for the next scan
        });

        function searchByBarcode(value) {
            const product = listProduk.find(product => product.barcode === value);
            if (product) {
                addToInvoice(product);
            } else {
                alert('Produk tidak ditemukan');
            }
        }

        function addToInvoice(product) {
            const existingItem = invoiceItems.find(item => item.id === product.id);
            if (existingItem) {
                existingItem.qty += 1;
                existingItem.amount += product.harga;
            } else {
                invoiceItems.push({
                    id: product.id,
                    name: product.nama_produk,
                    qty: 1,
                    price: product.harga,
                    amount: product.harga
                });
            }
            displayInvoice();
        }

        function displayInvoice() {
            let invoiceTableBody = document.querySelector('#invoice-table');
            invoiceTableBody.innerHTML = '';
            let subTotal = 0;
            invoiceItems.forEach((item, index) => {
                subTotal += item.amount;
                let row = `
            <tr>
                <td>${index + 1}</td>
                <td>${item.name}</td>
                <td class="text-end">${item.qty}</td>
                <td class="text-end">${item.price}</td>
                <td class="text-end">${item.amount}</td>
            </tr>`;
                invoiceTableBody.insertAdjacentHTML('beforeend', row);
            });

            let tax = subTotal * 0.10;
            let discount = subTotal * 0.05;
            let shipping = 10;
            let grandTotal = subTotal + tax + shipping - discount;

            document.getElementById('sub-total').textContent = `$${subTotal.toFixed(2)}`;
            document.getElementById('tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('discount').textContent = `$${discount.toFixed(2)}`;
            document.getElementById('grand-total').textContent = `$${grandTotal.toFixed(2)}`;
        }


        function displayProducts(products) {
            let container = document.querySelector('.container-product');
            container.innerHTML = '';
            console.log(products);
            products.forEach(product => {
                let productCard = `
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card p-3">
                        <img width="100px" height="100px" src="${product.image_produk}" class="card-img-top" alt="${product.nama_produk}">
                        <div class="card-body px-0 pb-0">
                            <h5 class="card-title mb-3">${product.nama_produk}</h5>
                            <p>Rp. ${product.harga}</p>
                            <div class="media mt-4 mb-0 pt-1">
                                <button class="btn btn-primary" type="button"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="Shopping-Cart-Add--Streamline-Ultimate"><desc>Shopping Cart Add Streamline Icon: https://streamlinehq.com</desc><path d="M4.5 20.968a1.875 1.875 0 1 0 3.75 0 1.875 1.875 0 1 0 -3.75 0Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M12 20.968a1.875 1.875 0 1 0 3.75 0 1.875 1.875 0 1 0 -3.75 0Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="m0.75 7.093 2.329 7.887a1.5 1.5 0 0 0 1.45 1.113h10.818A1.5 1.5 0 0 0 16.8 14.98l3.238 -12.154a2.249 2.249 0 0 1 2.174 -1.67h1.038" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="m9.75 6.343 0 6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="m6.75 9.343 6 0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg><span class="ml-2">Beli</span></button>
                            </div>
                        </div>
                    </div>
                </div>`;
                container.insertAdjacentHTML('beforeend', productCard);
            });
        }
    </script>
@endsection
