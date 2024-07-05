@extends('dashboard.auth.template')

@section('content')

<div class="main-container" id="container">

<div class="overlay"></div>
<div class="search-overlay"></div>

@include('dashboard.auth.nav_side')
<!--  END SIDEBAR  -->

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <div class="row layout-top-spacing">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Datatables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Basic</li>
                            </ol>
                        </nav>
                    </div>

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-8">
                                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Koperasi</th>
                                            <th>No Wa</th>
                                            <th>Email</th>
                                            <th>Bidang Usaha</th>
                                            <th class="no-content">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($puskop as $data)
                                        <tr>
                                            <td>#{{$data->id}}</td>
                                            <td>{{$data->nama_koperasi}}</td>
                                            <td>{{$data->hp_wa}}</td>
                                            <td>{{$data->email_koperasi}}</td>
                                            <td>{{$data->bidang_koperasi}}</td>
                                            <td> <button class="btn btn-warning"> View Puskop </button> </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                    </div>
            </div>

    </div>
    <!--  BEGIN FOOTER  -->
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
        </div>
    </div>
    <!--  END FOOTER  -->
</div>
<!--  END CONTENT AREA  -->

</div>

@endsection