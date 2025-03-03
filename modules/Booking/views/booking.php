<?php
require_once '../../../helpers/JWTHandler.php'; // Include your JWT handler

// Start the session or read the cookie
if (!isset($_COOKIE['jwtToken'])) {
    // If the cookie is not set, redirect the user to the login page
    // echo "<h2>If the cookie is not set, redirect the user to the login page</h2>";
    header('Location: ../../Authentication/views/login.php');
    exit;
}

// Retrieve the token from the cookie
$jwtToken = $_COOKIE['jwtToken'];

// Initialize JWT handler
$jwtHandler = new JWTHandler();

// Validate the token
$decodedToken = $jwtHandler->validateToken($jwtToken);

if ($decodedToken === false) {
    // If the token is invalid, redirect to login page
    header('Location: ../../Authentication/views/login.php');
    exit;
}

// if ($decodedToken->role != 1) {
//     echo "<h2>Access Denied</h2>";
//     exit;
// }

// If the token is valid, proceed to display the dashboard
// echo "<h2>Welcome to the Dashboard, {$decodedToken->username}</h2>";
?>



<!DOCTYPE html>
<html lang="en">

<?php include('../../../includes/admin_header.php'); ?>

<body>

    <!-- ======= Header ======= -->
    <?php include('../../../includes/admin_navbar.php'); ?>
    <!-- ======= END Header ======= -->


    <!-- ======= SIDE MENU (MODULES) ======= -->
    <?php include('../../../includes/admin_sidebar.php'); ?>
    <!-- ======= SIDE MENU (MODULES) ======= -->



    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Orders</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Order</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#register-milk-collection">make orders of Milk</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <?php 
                                        include("../static/milkOrdersViewTable.php");
                                    ?>



                                    <?php 
                                        include("../static/milkOrdersEdit.php");
                                    ?>
                                    <?php 
                                        include("../static/milkOrderDelete.php");
                                    ?>
                                </div>
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <!-- Edit information division -->

                                </div>

                                <div class="tab-pane fade pt-3" id="register-milk-collection">

                                    <!-- Register Collected Milk Form -->
                                    <form id="milkOrderForm">

                                        <div class="row mb-3" style="display:none;">
                                            <label for="collectedby" class="col-md-3 col-lg-2 col-form-label">Collected
                                                by</label>
                                            <div class="col-md-4 col-lg-3">
                                                <input name="collectedby" type="text" class="form-control"
                                                    value="<?=$decodedToken->userid?>" id="collectedby">
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="package20L" class="col-md-3 col-lg-2 col-form-label">Enter number of 20L PACKAGE you want
                                                </label>
                                            <div class="col-md-4 col-lg-3">
                                                <input name="package20L" type="number" class="form-control"
                                                    id="package20L">
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_20L" type="" class="form-control"
                                                    id="price_20L" disabled>
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_20L_Total" type="number" placeholder="=" class="form-control"
                                                    id="price_20L_Total" disabled>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="package5L" class="col-md-3 col-lg-2 col-form-label">Enter number of 5L PACKAGE you want
                                                </label>
                                            <div class="col-md-4 col-lg-3">
                                                <input name="package5L" type="number" class="form-control"
                                                    id="package5L">
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_5L" type="" class="form-control"
                                                    id="price_5L" disabled>
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_5L_Total" type="number" placeholder="=" class="form-control"
                                                    id="price_5L_Total" disabled>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="package3L" class="col-md-3 col-lg-2 col-form-label">Enter number of 3L PACKAGE you want
                                                </label>
                                            <div class="col-md-4 col-lg-3">
                                                <input name="package3L" type="number" class="form-control"
                                                    id="package3L">
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_3L" type="" class="form-control"
                                                    id="price_3L" disabled>
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_3L_Total" type="number" placeholder="=" class="form-control"
                                                    id="price_3L_Total" disabled>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="package2L" class="col-md-3 col-lg-2 col-form-label">Enter number of 2L PACKAGE you want
                                                </label>
                                            <div class="col-md-4 col-lg-3">
                                                <input name="package2L" type="number" class="form-control"
                                                    id="package2L">
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_2L" type="" class="form-control"
                                                    id="price_2L" disabled>
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_2L_Total" type="number" placeholder="=" class="form-control"
                                                    id="price_2L_Total" disabled>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="package1L" class="col-md-3 col-lg-2 col-form-label">Enter number of 1L PACKAGE you want
                                                </label>
                                            <div class="col-md-4 col-lg-3">
                                                <input name="package1L" type="number" class="form-control"
                                                    id="package1L">
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_1L" type="" class="form-control"
                                                    id="price_1L" disabled>
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_1L_Total" type="number" placeholder="=" class="form-control"
                                                    id="price_1L_Total" disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="payment_method"
                                                class="col-md-3 col-lg-2 col-form-label">Payment Method</label>
                                            <div class="col-md-4 col-lg-3">
                                                <select name="payment_method" id="payment_method" class="form-control">
                                        
                                                    <option value="MTN_MOMO">Choose Payment Method</option>
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
                                                    id="big_Total" disabled>
                                            </div>
                                        </div>

                                        <div class="row mb-3" style="margin-top:40px;">
                                            <div class="col-md-12 col-lg-10">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Recording your order of 
                                                        Milk</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form><!-- End Register Collected Milk Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->

    <!-- Include Dashboard Scripts -->
    <?php include('../../../includes/admin_scripts.php'); ?>


    <script>
    $(document).ready(function() {
        var collector = $('#collectedby').val();
        fetchPrice();
        fetchOrderTable(collector);
        

        $('#milkOrderForm').on('submit', function(e) {
            e.preventDefault();

            // Check if there's any error before submitting

            let formData = {
                package20L: $('#package20L').val(),
                package5L: $('#package5L').val(),
                package3L: $('#package3L').val(),
                package2L: $('#package2L').val(),
                package1L: $('#package1L').val(),
                payment_method: $('#payment_method').val(),
                collectedby: $('#collectedby').val()
                
            };
            // console.log('package20L:' + formData.package20L +
            //     ', package5L:' + formData.package5L + ', package3L:' + formData.package3L + ', package2L:' + formData.package2L
            //     + ', package1L:' + formData.package1L);

            $.ajax({
                type: 'POST',
                url: '../api/milkOrdersApi.php?action=order',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Use SweetAlert for success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Registered!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href =
                                'orders.php'; // Redirect after success
                        });
                    } else {
                        // Use SweetAlert for error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Something went wrong. Please try again. ' + status +
                            ' ' + error
                    });
                }
            });


        });
    });
    
    function fetchPrice() {
        fetch('../../PriceSetting/api/priceSettingApi.php?action=fetchPrice') // Call the API
            .then(response => response.json())
            .then(data => {
                if (Array.isArray(data)) {
                    // console.log("Fetched Price:",data);
                    const priceData = data[0];
                    const price_20L = priceData.price_20L;
                    const price_5L = priceData.price_5L;
                    const price_3L = priceData.price_3L;
                    const price_2L = priceData.price_2L;
                    const price_1L = priceData.price_1L;
                    document.getElementById('price_20L').value = price_20L;
                    $('#price_5L').val(price_5L);
                    $('#price_3L').val(price_3L);
                    $('#price_2L').val(price_2L);
                    $('#price_1L').val(price_1L);
                    $('#price_20L_edit').val(price_20L);
                    $('#price_5L_edit').val(price_5L);
                    $('#price_3L_edit').val(price_3L);
                    $('#price_2L_edit').val(price_2L);
                    $('#price_1L_edit').val(price_1L);
                }
            })
            .catch(error => console.error('Error fetching price:', error));
    }


    $(document).ready(function () {
            $('#package20L').on('input', function () {
                let input_price = parseFloat($(this).val()) || 0; // Get value and convert to number
                let price_20L = parseFloat($('#price_20L').val()) || 0; // Get value and convert to number
                let total = input_price * price_20L; // Add 400
                $('#price_20L_Total').val(total); // Set the result
                calculateTotal();
            });
            $('#package5L').on('input', function () {
                let input_price = parseFloat($(this).val()) || 0; // Get value and convert to number
                let price_5L = parseFloat($('#price_5L').val()) || 0; // Get value and convert to number
                let total = input_price * price_5L; // Add 400
                $('#price_5L_Total').val(total); // Set the result
                calculateTotal();
            });
            $('#package3L').on('input', function () {
                let input_price = parseFloat($(this).val()) || 0; // Get value and convert to number
                let price_3L = parseFloat($('#price_3L').val()) || 0; // Get value and convert to number
                let total = input_price * price_3L; // Add 400
                $('#price_3L_Total').val(total); // Set the result
                calculateTotal();
            });
            $('#package2L').on('input', function () {
                let input_price = parseFloat($(this).val()) || 0; // Get value and convert to number
                let price_2L = parseFloat($('#price_2L').val()) || 0; // Get value and convert to number
                let total = input_price * price_2L; // Add 400
                $('#price_2L_Total').val(total); // Set the result
                calculateTotal();
            });
            $('#package1L').on('input', function () {
                let input_price = parseFloat($(this).val()) || 0; // Get value and convert to number
                let price_1L = parseFloat($('#price_1L').val()) || 0; // Get value and convert to number
                let total = input_price * price_1L; // Add 400
                $('#price_1L_Total').val(total); // Set the result
                calculateTotal();
            });
            // BIG TOTAL TASKS
    });
    function calculateTotal(){
        let t20  = parseFloat($('#price_20L_Total').val()) || 0;
        let t5  = parseFloat($('#price_5L_Total').val()) || 0;
        let t3  = parseFloat($('#price_3L_Total').val()) || 0;
        let t2  = parseFloat($('#price_2L_Total').val()) || 0;
        let t1  = parseFloat($('#price_1L_Total').val()) || 0;
        let big_total = t5 + t20 + t3 + t2 + t1;
        console.log("tot is "+ big_total);
        $('#big_Total').val(big_total);
    }

    // fetch Datatable 
    

    
    function fetchOrderTable(userID) {
        // console.log('Customer ID: ' + userID);

        fetch('../api/milkOrdersApi.php?action=fetchOrderData')
            .then(response => response.json())
            .then(data => {
                //console.log("Fetched Data:", data); // Debugging
                const milkOrdersViewTable = document.querySelector('#milkOrdersViewTable tbody');
                milkOrdersViewTable.innerHTML = ''; // Clear existing data

                if (!data || data.length === 0 || !userID) {
                    milkOrdersViewTable.innerHTML = '<tr><td colspan="10">No data available</td></tr>';
                    return;
                }

                data.forEach(milkOrdersView => {
                    if(milkOrdersView.userid == userID){
                        const collectionRow = document.createElement('tr');
                    var tprice =    (parseFloat(milkOrdersView.package20L * 14000) || 0) +
                                    (parseFloat(milkOrdersView.package5L * 4000) || 0) +
                                    (parseFloat(milkOrdersView.package3L * 3000) || 0) +
                                    (parseFloat(milkOrdersView.package2L * 2200) || 0) +
                                    (parseFloat(milkOrdersView.package1L * 1200) || 0);

                    collectionRow.innerHTML = `
                    <td>${milkOrdersView.customer_username || 'N/A'}</td>
                    <td>${milkOrdersView.package20L || '0'}</td>
                    <td>${milkOrdersView.package5L || '0'}</td>
                    <td>${milkOrdersView.package3L || '0'}</td>
                    <td>${milkOrdersView.package2L || '0'}</td>
                    <td>${milkOrdersView.package1L || '0'}</td>
                    <td>${milkOrdersView.payment_method || milkOrdersView.payment_method}</td>
                    <td>${milkOrdersView.order_status || '0'}</td>
                    <td>${milkOrdersView.date || '0'}</td>
                    <td>${tprice}</td>
                    <td>
                        <div class="pt-2">
                            <a href="#" class="btn btn-warning btn-sm update-milk-button" data-bs-toggle="modal" 
                               data-bs-target="#editMilkData" 
                               data-order_id="${milkOrdersView.orderid}" 
                               
                               data-package20L="${milkOrdersView.package20L}" 
                               data-package5L="${milkOrdersView.package5L}" 
                               data-package3L="${milkOrdersView.package3L}" 
                               data-package2L="${milkOrdersView.package2L}" 
                               data-package1L="${milkOrdersView.package1L}"
                               data-payment_method="${milkOrdersView.payment_method}"
                               
                               title="Edit"><i class="bi bi-vector-pen"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm delete-order-button" data-bs-toggle="modal" 
                               data-bs-target="#deleteOrderData" 
                               data-id="${milkOrdersView.orderid}"
                               title="Delete"><i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </td>
                `;

                    milkOrdersViewTable.appendChild(collectionRow);
                    }
                });

                // Attach event listeners to all Edit buttons
                document.querySelectorAll('.update-milk-button').forEach(button => {
                    button.addEventListener('click', function() {
                        let orderid = this.getAttribute('data-order_id');
                        
                        let package20L = this.getAttribute('data-package20L');
                        let package5L = this.getAttribute('data-package5L');
                        let package3L = this.getAttribute('data-package3L');
                        let package2L = this.getAttribute('data-package2L');
                        let package1L = this.getAttribute('data-package1L');
                        let payment_method= this.getAttribute('data-payment_method');

                        // Populate modal fields
                        document.getElementById('user_id_delete').value = orderid;
                        console.log("order id "+ orderid);
                        document.getElementById('package20L_edit').value = package20L;
                        document.getElementById('package5L_edit').value = package5L;
                        document.getElementById('package3L_edit').value = package3L;
                        document.getElementById('package2L_edit').value = package2L;
                        
                        document.getElementById('package1L_edit').value = package1L;
                        document.getElementById('payment_method_edit').value = payment_method;
                        document.getElementById('orderid_edit').value = orderid;

                        // Store collectid for update
                        document.getElementById('milkEditForm').setAttribute('data-orderid',
                            orderid);
                            
                    });
                });
            })
            .catch(error => console.error('Error fetching data:', error));



        }

        $('#milkEditForm').on('submit', function(e) {
            e.preventDefault();

            // Check if there's any error before submitting

            let formData = {
                package20L: $('#package20L_edit').val(),
                package5L: $('#package5L_edit').val(),
                package3L: $('#package3L_edit').val(),
                package2L: $('#package2L_edit').val(),
                package1L: $('#package1L_edit').val(),
                payment_method: $('#payment_method_edit').val(),
                orderid: $('#orderid_edit').val()
                
            };
            // console.log('package20L:' + formData.package20L +
            //     ', package5L:' + formData.package5L + ', package3L:' + formData.package3L + ', package2L:' + formData.package2L
            //     + ', package1L:' + formData.package1L + ', orderid:' + formData.orderid + ', payment_method:' + formData.payment_method);

            $.ajax({
                type: 'POST',
                url: '../api/milkOrdersApi.php?action=updateMilkorders',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Use SweetAlert for success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Order Updated Successfully!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href =
                                'orders.php'; // Redirect after success
                        });
                    } else {
                        // Use SweetAlert for error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Something went wrong. Please try again. ' + status +
                            ' ' + error
                    });
                }
            });


        });
   

    // check if Delete button clicked
    $(document).on('click', '.delete-order-button', function () {
        //let orderId = $(this).data('data-id'); // Get order ID from button
        let orderId = this.getAttribute('data-id'); // Get order ID from button
        console.log("order id ", orderId);

        // Set the value in the modal input field
        $('#orderId_delete').val(orderId);

        // Store the order ID for deletion confirmation
        $('#orderDeleteForm').attr('data-orderid', orderId);
    });

    // handle delete action after confirm delete modal displayed and click
    $(document).on('submit', '#orderDeleteForm', function (event) {
        event.preventDefault(); // Prevent default form submission

        let orderId = $('#orderId_delete').val(); // Retrieve stored order ID
        let user_id_delete = $('#user_id_delete').val(); // Retrieve USER ID
        if (!orderId) {
            alert('Order ID is missing!');
            return;
        }

        // Send AJAX request to delete the order
        let formData = {
                orderId: orderId                
            };
        $.ajax({
            url: '../api/milkOrdersApi.php?action=deleteOrder',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // alert('Order deleted successfully.');
                    $('#deleteOrderData').modal('hide'); // Close the modal
                    fetchOrderTable(user_id_delete); // Refresh the table after deletion
                    Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href =
                                'orders.php'; // Redirect after success
                        });
                } else {
                        // Use SweetAlert for error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message
                        });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error deleting order:', error);
            }
        });
    });


  

    </script>
    <script src="../static/ordersEdit.js"></script>


</body>

</html>