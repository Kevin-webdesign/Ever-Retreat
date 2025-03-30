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
            <h1>Price Settings</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Price Settings</li>
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

                                <!-- <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li> -->

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#register-milk-collection">Price Setting Edit</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade profile-overview" id="profile-overview">

                                </div>
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <!-- Edit information division -->

                                </div>

                                <div class="tab-pane fade show active pt-3" id="register-milk-collection">

                                    <!-- Register Collected Milk Form -->
                                    <form id="pricesettingForm">



                                        <div class="row mb-3">
                                            <label for="newcollectprice" class="col-md-3 col-lg-3 col-form-label">Purchase Price
                                            </label>
                                            <div class="col-md-4 col-lg-3">
                                                <input name="newcollectprice" type="number" class="form-control"
                                                    id="newcollectprice">
                                            </div>
                                            <label for="newcollectprice"
                                                class="col-md-3 col-lg-2 col-form-label">Current price
                                            </label>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="purchaseprice" type="" class="form-control"
                                                    id="purchaseprice" disabled>
                                            </div>

                                        </div>


                                        <div class="row mb-3">
                                            <label for="newprice20L" class="col-md-3 col-lg-3 col-form-label">
                                                Price of 20L Package
                                            </label>
                                            <div class="col-md-4 col-lg-3">
                                                <input name="newprice20L" type="number" class="form-control"
                                                    id="newprice20L">
                                            </div>
                                            <label for="newcollectprice"
                                                class="col-md-3 col-lg-2 col-form-label">Current price
                                            </label>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_20L" type="" class="form-control" id="price_20L"
                                                    disabled>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label for="newprice5L" class="col-md-3 col-lg-3 col-form-label">
                                                Price of 5L Package
                                            </label>
                                            <div class="col-md-4 col-lg-3">
                                                <input name=newpricee5L" type="number" class="form-control"
                                                    id="newprice5L">
                                            </div>
                                            <label for="newcollectprice"
                                                class="col-md-3 col-lg-2 col-form-label">Current price
                                            </label>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_5L" type="" class="form-control" id="price_5L"
                                                    disabled>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label for="newprice3L" class="col-md-3 col-lg-3 col-form-label">
                                                Price of 3L Package
                                            </label>
                                            <div class="col-md-4 col-lg-3">
                                                <input name="newprice3L" type="number" class="form-control"
                                                    id="newprice3L">
                                            </div>
                                            <label for="newcollectprice"
                                                class="col-md-3 col-lg-2 col-form-label">Current price
                                            </label>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_3L" type="" class="form-control" id="price_3L"
                                                    disabled>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label for="newprice2L" class="col-md-3 col-lg-3 col-form-label">
                                                Price of 2L Package
                                            </label>
                                            <div class="col-md-4 col-lg-3">
                                                <input name="newprice2L" type="number" class="form-control"
                                                    id="newprice2L">
                                            </div>
                                            <label for="newcollectprice"
                                                class="col-md-3 col-lg-2 col-form-label">Current price
                                            </label>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_2L" type="" class="form-control" id="price_2L"
                                                    disabled>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label for="newprice1L" class="col-md-3 col-lg-3 col-form-label">
                                                Price of 1L Package
                                            </label>
                                            <div class="col-md-4 col-lg-3">
                                                <input name="newprice1L" type="number" class="form-control"
                                                    id="newprice1L">
                                            </div>
                                            <label for="newcollectprice"
                                                class="col-md-3 col-lg-2 col-form-label">Current price
                                            </label>
                                            <div class="col-md-3 col-lg-2">
                                                <input name="price_1L" type="" class="form-control" id="price_1L"
                                                    disabled>
                                            </div>

                                        </div>



                                        <div class="row mb-3" style="margin-top:40px;">
                                            <div class="col-md-12 col-lg-10">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary"><i class="bi bi-check2-circle"></i> Save Changes</button>
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

        fetchPrice();

    });

    $('#pricesettingForm').on('submit', function(e) {
        e.preventDefault();

        // Check if there's any error before submitting

        let formData = {

            purchaseprice: $('#newcollectprice').val(),
            price_20L: $('#newprice20L').val(),
            price_5L: $('#newprice5L').val(),
            price_3L: $('#newprice3L').val(),
            price_2L: $('#newprice2L').val(),
            price_1L: $('#newprice1L').val()

        };
        // console.log('package20L:' + formData.price_20L +
        //     ', price_5L:' + formData.price_5L + ', price_3L:' + formData.price_3L + ', price_2L:' + formData.price_2L
        //     + ', price_1L:' + formData.price_1L + ', purchaseprice:' + formData.purchaseprice);

        $.ajax({
            type: 'POST',
            url: '../api/priceSettingApi.php?action=order',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Use SweetAlert for success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Price Updated Successfully!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href =
                            'prices.php'; // Redirect after success
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

    function fetchPrice() {
        fetch('../api/priceSettingApi.php?action=fetchPrice') // Call the API
            .then(response => response.json())
            .then(data => {
                if (Array.isArray(data)) {
                    // console.log("Fetched Price:", data);
                    const priceData = data[0];
                    const purchaseprice = priceData.purchaseprice;
                    const price_20L = priceData.price_20L;
                    const price_5L = priceData.price_5L;
                    const price_3L = priceData.price_3L;
                    const price_2L = priceData.price_2L;
                    const price_1L = priceData.price_1L;

                    $('#purchaseprice').val(purchaseprice);
                    $('#price_20L').val(price_20L);
                    $('#price_5L').val(price_5L);
                    $('#price_3L').val(price_3L);
                    $('#price_2L').val(price_2L);
                    $('#price_1L').val(price_1L);
                    $('#newcollectprice').val(purchaseprice);
                    $('#newprice20L').val(price_20L);
                    $('#newprice5L').val(price_5L);
                    $('#newprice3L').val(price_3L);
                    $('#newprice2L').val(price_2L);
                    $('#newprice1L').val(price_1L);


                }
            })
            .catch(error => console.error('Error fetching price:', error));
    }



    
    </script>


</body>

</html>