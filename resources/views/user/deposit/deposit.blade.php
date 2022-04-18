@extends('layouts.user.master')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card border-top-warning border-bottom-warning">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-currency-exchange text-primary"></i> My Deposits
                                    {{-- <a href="#" type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                        data-bs-target="#addDeposit" style="float: right">New Deposit
                </a> --}}
                                    <a href="#" class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#addDeposit">New Deposit</i></a>
                                    @include('user.deposit.addDeposit')
                                </h5>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Account Type</th>
                                            <th scope="col">Currency</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                3x Factor
                                            </td>
                                            <td>
                                                <img src="https://tokyosecurities.com/img/btc.svg"
                                                    class="img-fluid rounded-circle" width="30px" alt="">
                                                <span>BTC</span>
                                                <small class="text-md font-weight-bolder">300000 <span
                                                        class="text-muted">USD</span></small>
                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                Cancelled
                                                <br>
                                                <small>CPGC6T2SZZO7WTIGUUL5WAGZWF
                                                </small>
                                            </td>
                                            <td title="2022-03-28 05:31:04">Mar 28, 2022 - 05:31</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
