@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body container">

                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning bg-primary">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4 text-white">Executive Points</h5>
                                <p class="card-text text-white">Statistics <i class="bi bi-clipboard-data text-danger"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning bg-secondary">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4 text-white">0</h5>
                                <p class="card-text text-white">Left Executive</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning bg-success">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4 text-white">0</h5>
                                <p class="card-text text-white">Right Executive</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning bg-danger">
                            <div class="card-body text-center">
                                <div class="row">
                                    <div class="col-6" style="text-align: left">
                                        <h5 class="card-title p-0 pt-4 text-white">0</h5>
                                        <p class="card-text text-white">Left RP</p>
                                    </div>
                                    <div class="col-6 " style="text-align: right">
                                        <h5 class="card-title p-0 pt-4 text-white">0</h5>
                                        <p class="card-text text-white">Right RP</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-top-warning border-bottom-warning bg-info"
                    style="margin-left: -12px; margin-right: -12px;">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-award"></i> Executive Award Pins</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pin</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Delivered to</th>
                                    <th scope="col">Delivered</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">
                                <tr>
                                    <td colspan="6" class="text-center">NO DATA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card border-top-warning border-bottom-warning" style="margin-left: -12px; margin-right: -12px;">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-award"></i> Executive Awards Pins List</h5>
                        <div class="table-responsive">
                            <table class="table theme-table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Left Points</th>
                                        <th>Right Points</th>
                                        <th>Award Pin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
