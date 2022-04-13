<div class="modal fade" id="PaymentMethodEditModal2{{ $paymentMethod->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Payment Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">


                    <form action="{{ route('payment-method-update') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $paymentMethod->id }}">
                        <div class="form-group">
                            <label class="form-label" for="basic-default-name">Payment Method Name</label>
                            <input type="text" class="form-control" value="{{ $paymentMethod->name }}" name="name"
                                placeholder="Payment Method name" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-default-name">Account Name</label>
                            <input type="text" class="form-control" value="{{ $paymentMethod->account_name }}"
                                name="account_name" placeholder="Payment Method name" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-default-email">Wallet Id</label>
                            <input type="text" name="wallet_id" value="{{ $paymentMethod->wallet_id }}"
                                class="form-control" placeholder="Enter Wallet Id" />
                        </div>



                        <div class="form-group">
                            <label for="select-country">Status</label>
                            <select class="form-control select2" name="status">
                                <option value="" disabled selected hidden>Select Status
                                </option>

                                <option value="1" {{ $paymentMethod->status == 1 ? 'selected' : '' }}>Active</option>

                                <option value="2" {{ $paymentMethod->status == 2 ? 'selected' : '' }}>Inactive
                                </option>





                            </select>
                        </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="Submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
