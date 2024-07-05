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

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-header">
                                <div class="w-info">
                                    <h6 class="value">PUSKOP</h6>
                                </div>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-content">

                                <div class="w-info">
                                    <p class="value">$ 45,141 <span>this week</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                                </div>
                                
                            </div>

                            <div class="w-progress-stats">                                            
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="">
                                    <div class="w-icon">
                                        <p>57%</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>  
                
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-header">
                                <div class="w-info">
                                    <h6 class="value">PUSKOP</h6>
                                </div>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-content">

                                <div class="w-info">
                                    <p class="value">$ 45,141 <span>this week</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                                </div>
                                
                            </div>

                            <div class="w-progress-stats">                                            
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="">
                                    <div class="w-icon">
                                        <p>57%</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>  

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-header">
                                <div class="w-info">
                                    <h6 class="value">PRIMKOP</h6>
                                </div>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-content">

                                <div class="w-info">
                                    <p class="value">$ 45,141 <span>this week</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                                </div>
                                
                            </div>

                            <div class="w-progress-stats">                                            
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="">
                                    <div class="w-icon">
                                        <p>57%</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
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