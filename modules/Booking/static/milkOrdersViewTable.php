<div class="row mb-3" style="display:flex;">
    <div class="col-md-4 col-lg-3" style="display:none;">
        <input name="userID" type="text" class="form-control" value="<?=$decodedToken->userid?>" id="userID">
    </div>
</div>

<table class="table table-striped table-bordered datatables" id="milkOrdersViewTable">
    <thead class="table-dark">
        <tr>
            <th>CUSTOMER NAME</th>
            <th>QTY (20L)</th>
            <th>QTY (5L)</th>
            <th>QTY (3L)</th>
            <th>QTY (2L)</th>
            <th>QTY (1L)</th>
            <th>TOTAL PRICE</th>
            <th>ORDER STATUS</th>
            <th>DATE</th>
            <th>TOTAL</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>