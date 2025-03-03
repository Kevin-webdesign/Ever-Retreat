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
            <h1>Orders Management</h1>
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
                                        data-bs-target="#profile-overview">Orders List</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <?php 
                                        include("../static/milkOrdersViewTableManager.php");
                                    ?>

                                    <?php 
                                        include("../static/milkOrderDelete.php");
                                    ?>

                                    <div class="modal fade" id="comment_modal" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">COMMENT</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center" id="comment_display">
                                                    -No Comment-
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End Vertically centered Modal-->
                                </div>
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <!-- Edit information division -->
                                                                            
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
        var userID = $('#userID').val();
        console.log('Customer ID fest: ' + userID);
        // fetchPrice();
        fetchOrderTable();
        
    });
    
    // fetch Datatable 
    

    
    function fetchOrderTable() {
        console.log('Customer ID noneho:ADMIN ');
        let badge = '';

        fetch('../api/milkOrdersApi.php?action=fetchOrderDataAdmin')
            .then(response => response.json())
            .then(data => {
                console.log("Fetched Data:", data); // Debugging
                const milkOrdersViewTableManager = document.querySelector('#milkOrdersViewTableManager tbody');
                milkOrdersViewTableManager.innerHTML = ''; // Clear existing data

                if (!data || data.length === 0 ) {
                    milkOrdersViewTableManager.innerHTML = '<tr><td colspan="11">No data available</td></tr>';
                    return;
                }

                data.forEach(milkOrdersView => {
                    if(milkOrdersView.orderid){
                        const collectionRow = document.createElement('tr');
                        var tprice =    (parseFloat(milkOrdersView.package20L * 14000) || 0) +
                                        (parseFloat(milkOrdersView.package5L * 4000) || 0) +
                                        (parseFloat(milkOrdersView.package3L * 3000) || 0) +
                                        (parseFloat(milkOrdersView.package2L * 2200) || 0) +
                                        (parseFloat(milkOrdersView.package1L * 1200) || 0);
                        if(milkOrdersView.order_status == 'Pending'){
                            badge = 'bg-primary';
                        }else if(milkOrdersView.order_status == 'Returned'){
                            badge = 'bg-warning';
                        }else if(milkOrdersView.order_status == 'Rejected'){
                            badge = 'bg-danger';
                        }else if(milkOrdersView.order_status == 'Confirmed'){
                            badge = 'bg-success';
                        }else if(milkOrdersView.order_status == 'Completed'){
                            badge = 'bg-light';
                        }

                    collectionRow.innerHTML = `
                    
                    <td>
                        <div class="pt-2">
                            <a href="#" class="btn btn-dark btn-sm manage-order-button" data-bs-toggle="modal" 
                               data-bs-target="#managementOrderStatus" 
                               data-id="${milkOrdersView.orderid}"
                               data-comment="${milkOrdersView.comment}"
                               data-status="${milkOrdersView.order_status}"
                               title="Approval"><i class="bi bi-wrench"></i>
                            </a>
                        </div>
                    </td>
                    <td>${milkOrdersView.customer_username || 'N/A'}</td>
                    <td>${milkOrdersView.package20L || '0'}</td>
                    <td>${milkOrdersView.package5L || '0'}</td>
                    <td>${milkOrdersView.package3L || '0'}</td>
                    <td>${milkOrdersView.package2L || '0'}</td>
                    <td>${milkOrdersView.package1L || '0'}</td>
                    <td>${milkOrdersView.payment_method || milkOrdersView.payment_method}</td>
                    <td class="text-center">
                        <span class="badge ${badge}">${milkOrdersView.order_status || '0'}</span>
                    </td>
                    <td>${milkOrdersView.date || '0'}</td>
                    <td>${tprice}</td>
                    <td>
                        <div class="pt-2">
                            <a href="#" class="btn btn-secondary btn-sm comment-display-button" data-bs-toggle="modal" 
                               data-bs-target="#comment_modal" 
                               data-comment="${milkOrdersView.comment}"
                               title="Comment"><i class="bi bi-info-circle"></i>
                            </a>
                        </div>
                    </td>
                `;

                milkOrdersViewTableManager.appendChild(collectionRow);
                    }
                });

                // Attach event listeners to all Edit buttons
                document.querySelectorAll('.comment-display-button').forEach(button => {
                    button.addEventListener('click', function() {
                        let comment = this.getAttribute('data-comment');

                        // Populate modal fields
                        $('#comment_display').html(comment);

                        // Store collectid for update
                        
                            
                    });
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // check if Delete button clicked
    $(document).on('click', '.manage-order-button', function () {
        let orderId = $(this).data('id'); // Get order ID from button
        let comment = this.getAttribute('data-comment');
        let status = this.getAttribute('data-status');
        console.log("stau",status)

        // Set the value in the modal input field
        $('#orderId_Manager').val(orderId);
        $('#order_status').val(status);
        $('#comment').val(comment);

        // Store the order ID for deletion confirmation
        $('#orderUpdateStatusForm').attr('data-orderid', orderId);
    });

    // handle delete action after confirm delete modal displayed and click
    $(document).on('submit', '#orderUpdateStatusForm', function (event) {
        event.preventDefault(); // Prevent default form submission

        let orderId = $('#orderId_Manager').val(); // Retrieve stored order ID
        let status= $('#order_status').val(); 
        let comment = $('#comment').val();
        console.log("Order is",orderId);
        console.log("Status",status);
        if (!orderId) {
            alert('Order ID is missing!');
            return;
        }

        // Send AJAX request to delete the order
        let formData = {
                orderid: orderId,
                comment:comment,
                status: status                
            };
        $.ajax({
            url: '../api/milkOrdersApi.php?action=changeOrderStatus',
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
                            title: 'Order Update Made!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href =
                                'admin_order_management.php'; // Redirect after success
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