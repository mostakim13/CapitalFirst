@extends('layouts.admin.master')
@section('admin-content')
    <style>
        footer {
            position: fixed;
            padding: 10px 10px 0px 10px;
            bottom: 0;
            width: 100%;
            /* Height of the footer*/
            height: 40px;
            background: black;
        }

        .btn1 {
            margin-bottom: 5px;
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

                    <div>
                        <a href="#" data-toggle="modal" data-target="#paymentmethodModal"
                            class="btn btn-primary btn-sm btn1"><i class="fa fa-plus"></i> Add Payment Method</a>
                    </div>
                    @include(
                        'admin.paymentMethod.modals.addPaymentMethod'
                    )
                    <div class="row" id="table-head">

                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive">

                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Account Name</th>
                                                <th>Wallet Id</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($paymentMethods as $paymentMethod)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $paymentMethod->name }}</td>
                                                    <td>{{ $paymentMethod->account_name }}</td>
                                                    <td>{{ $paymentMethod->wallet_id }}</td>
                                                    <td>
                                                        @if ($paymentMethod->status == 1)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </td>
                                                    <td>

                                                        <a href="#" data-toggle="modal"
                                                            data-target="#PaymentMethodEditModal2{{ $paymentMethod->id }}"
                                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                                                        </a>
                                                        @include(
                                                            'admin.paymentMethod.modals.editPaymentMethod'
                                                        )
                                                        <a href="payment-method/destroy/{{ $paymentMethod->id }}"
                                                            class="btn btn-danger btn-sm "><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
@endsection
