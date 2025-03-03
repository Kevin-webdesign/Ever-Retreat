<div class="modal fade" id="deleteOrderData" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Profile Edit Form -->
                <form id="orderDeleteForm" >

                    <div class="row mb-3" style="display:flex;">
                        <label for="orderId" class="col-md-3 col-lg-2 col-form-label">Order ID
                            by</label>
                        <div class="col-md-4 col-lg-3">
                            <input name="orderId" type="text" class="form-control"
                                 id="orderId_delete">
                            <input name="user_id_delete" type="text" class="form-control"
                                value="<?=$decodedToken->userid?>" id="user_id_delete">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-12 col-lg-12">
                            <h6 class="text-danger text-center">Are You Sure You Want To Delete Order!</h6>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-danger btn-outline"><i class="ri-check-double-fill"></i>
                            Confirm Delete</button> 
                    </div>
                </form><!-- End Edit Form -->
            </div>
        </div>
    </div>
</div><!-- End Large Modal-->

<div class="modal fade" id="managementOrderStatus" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ORDER MANAGEMENT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Profile Edit Form -->
                <form id="orderUpdateStatusForm" >

                    <div class="row mb-3" style="display:none;">
                        <label for="orderId" class="col-md-12 col-lg-12 col-form-label">Order ID</label>
                        <div class="col-md-12 col-lg-12">
                            <input name="orderId" type="text" class="form-control" id="orderId_Manager">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="order_status" class="col-md-12 col-lg-12 col-form-label">Please Select Action </label>
                        <div class="col-md-12 col-lg-12">
                            <select class="form-control" name="status" id="order_status">
                                <option value="">Select Status</option>
                                <option value="Confirmed">Confirm Order</option>
                                <option value="Returned">Return Order</option>
                                <option value="Rejected">Reject Order</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="comment" class="col-md-12 col-lg-12 col-form-label">Comment</label>
                        <div class="col-md-12 col-lg-12">
                            <textarea name="comment" id="comment" class="form-control"></textarea>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-success btn-outline"><i class="ri-check-double-fill"></i>
                            Save Changes</button> 
                    </div>
                </form><!-- End Edit Form -->
            </div>
        </div>
    </div>
</div><!-- End Large Modal-->