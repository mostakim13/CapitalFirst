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
                                <h5 class="card-title p-0 pt-4 text-white">Bonus Account</h5>
                                <p class="card-text">Statistics <i class="bi bi-clipboard-data text-danger"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning bg-secondary">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4 text-white">$ 0</h5>
                                <p class="card-text text-white">Direct Bonus <i
                                        class="bi bi-person-lines-fill text-primary"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning bg-success">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4 text-white">$ 0</h5>
                                <p class="card-text text-white">Network Bonus <i class="bi bi-diagram-2 text-primary"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-20">
                        <div class="card border-left-warning bg-danger">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4 text-white">$ 0</h5>
                                <p class="card-text text-white">Pending Bonus <i class="bi bi-unlock-fill text-danger"> Apr
                                        06,
                                        2022 </i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-top-warning  border-bottom-warning"
                    style="margin-left: -10px; margin-right: -10px;">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-diagram-2 text-primary"></i> Bonus History</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">From</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Percentage</th>
                                    <th scope="col">Points</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center text-uppercase text-muted fw-bolder" colspan="8">No Data</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>

                {{-- <div class="row justify-content-center">
                    <div class="col-12">

                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
