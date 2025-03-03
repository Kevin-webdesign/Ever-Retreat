<div class="modal fade" id="editMilkData" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Ordering Milk  Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Profile Edit Form -->
                <form id="milkEditForm" >

                    <div class="row mb-3" style="display:flex;">
                        <label for="collectedby" class="col-md-3 col-lg-2 col-form-label">Orderid</label>
                        <div class="col-md-4 col-lg-3">
                            <input name="orderid" type="text" class="form-control"
                                 id="orderid_edit">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="package20L" class="col-md-3 col-lg-2 col-form-label">Enter number of 20L PACKAGE you want
                            </label>
                        <div class="col-md-4 col-lg-3">
                            <input name="package20L" type="number" class="form-control"
                                id="package20L_edit">
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <input name="price_20L" type="" class="form-control"
                                id="price_20L_edit" disabled>
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <input name="price_20L_Total" type="number" placeholder="=" class="form-control"
                                id="price_20L_Total_edit" disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="package5L" class="col-md-3 col-lg-2 col-form-label">Enter number of 5L PACKAGE you want
                            </label>
                        <div class="col-md-4 col-lg-3">
                            <input name="package5L" type="number" class="form-control"
                                id="package5L_edit">
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <input name="price_5L" type="" class="form-control"
                                id="price_5L_edit" disabled>
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <input name="price_5L_Total" type="number" placeholder="=" class="form-control"
                                id="price_5L_Total_edit" disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="package3L" class="col-md-3 col-lg-2 col-form-label">Enter number of 3L PACKAGE you want
                            </label>
                        <div class="col-md-4 col-lg-3">
                            <input name="package3L" type="number" class="form-control"
                                id="package3L_edit">
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <input name="price_3L" type="" class="form-control"
                                id="price_3L_edit" disabled>
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <input name="price_3L_Total" type="number" placeholder="=" class="form-control"
                                id="price_3L_Total_edit" disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="package2L" class="col-md-3 col-lg-2 col-form-label">Enter number of 2L PACKAGE you want
                            </label>
                        <div class="col-md-4 col-lg-3">
                            <input name="package2L" type="number" class="form-control"
                                id="package2L_edit">
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <input name="price_2L" type="" class="form-control"
                                id="price_2L_edit" disabled>
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <input name="price_2L_Total" type="number" placeholder="=" class="form-control"
                                id="price_2L_Total_edit" disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="package1L" class="col-md-3 col-lg-2 col-form-label">Enter number of 1L PACKAGE you want
                            </label>
                        <div class="col-md-4 col-lg-3">
                            <input name="package1L" type="number" class="form-control"
                                id="package1L_edit">
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <input name="price_1L" type="" class="form-control"
                                id="price_1L_edit" disabled>
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <input name="price_1L_Total" type="number" placeholder="=" class="form-control"
                                id="price_1L_Total_edit" disabled>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="payment_method"
                            class="col-md-3 col-lg-2 col-form-label">Payment Method</label>
                        <div class="col-md-4 col-lg-3">
                            <select name="payment_method" id="payment_method_edit" class="form-control">
                    
                                <option value="">Choose Payment Method</option>
                                <option value="MTN_MOMO">MTN MOMO</option>
                                <option value="AIRTEL_MONEY">AIRTEL MONEY</option>
                                <option value="CASH">CASH</option>                                        
                    
                            </select>
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <label for="total" class="col-form-label" style="float:right">Final Total</label>
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <input name="big_Total" type="number" placeholder="-" class="form-control"
                                id="big_Total_edit" disabled>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-success btn-outline"><i class="ri-check-double-fill"></i>
                            Save changes</button> 
                    </div>
                </form><!-- End Edit Form -->
            </div>
        </div>
    </div>
</div><!-- End Large Modal-->