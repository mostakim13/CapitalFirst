<div class="modal fade" id="paymentmethodModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Payment Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">

                    <form id="jquery-val-form" action="{{ route('payment-method-store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="basic-default-name">Payment Method Name</label>
                            <input type="text" class="form-control" id="basic-default-name" name="name"
                                placeholder="Enter Method Name" required />

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-default-name">Account Name</label>
                            <input type="text" class="form-control" id="basic-default-name" name="account_name"
                                placeholder="Enter Method Name" required />

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-default-email">Wallet Id</label>
                            <input type="text" id="basic-default-email" name="wallet_id" class="form-control"
                                placeholder="Enter Wallet Id" required />
                        </div>

                        <div class="form-group">
                            <label for="select-country">Status</label>
                            <select class="form-control select2" name="status" required>
                                <option value="" disabled selected hidden>Select Status
                                </option>
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>

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
