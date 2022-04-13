@extends('layouts.admin.master')

@section('admin-content')
    <style>
        #dashboard-ecommerce {
            display: flex;

        }

        footer {
            position: fixed;
            padding: 10px 10px 0px 10px;
            bottom: 0;
            width: 100%;
            /* Height of the footer*/
            height: 40px;
            background: black;
        }

    </style>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="col-md-3 col-xl-3">
                        <div class="card shadow-none bg-transparent border-primary">
                            <div class="card-body">
                                <h4 class="card-title">Total Deposit</h4>
                                <p class="card-text">$101320
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xl-3">
                        <div class="card shadow-none bg-transparent border-primary">
                            <div class="card-body">
                                <h4 class="card-title">Total Withdraw</h4>
                                <p class="card-text">$101320
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xl-3">
                        <div class="card shadow-none bg-transparent border-primary">
                            <div class="card-body">
                                <h4 class="card-title">Total Users</h4>
                                <p class="card-text">$101320
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xl-3">
                        <div class="card shadow-none bg-transparent border-primary">
                            <div class="card-body">
                                <h4 class="card-title">Total Active Users</h4>
                                <p class="card-text">$101320
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
@endsection
