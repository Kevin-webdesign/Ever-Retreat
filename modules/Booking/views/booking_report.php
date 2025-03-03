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
?>



<!DOCTYPE html>
<html lang="en">

<?php include('../../../includes/admin_header.php'); ?>

<body>
    <?php include('../static/milkordersFiltercss.php'); ?>

    <!-- ======= Header ======= -->
    <?php include('../../../includes/admin_navbar.php'); ?>
    <!-- ======= END Header ======= -->


    <!-- ======= SIDE MENU (MODULES) ======= -->
    <?php include('../../../includes/admin_sidebar.php'); ?>
    <!-- ======= SIDE MENU (MODULES) ======= -->



    <main id="main" class="main">

        <div class="pagetitle">
            <h1>ORDERS REPORTS</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">REPORT</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile pettycash-reports">
            <div class="row">
                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Filters Section -->
                            <div class="filters bg-light">
                                <!-- <div class="filter-group" style="margin-right:135px; padding: 5px 0px;">
                                    <div class="filter-control date-input">
                                        <div class="k-d-flex k-justify-content-center" style="flex-wrap: wrap;">
                                            <div class="k-w-300">
                                                <div id="daterangepicker" title="daterangepicker"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="filter-group">
                                    <label class="filter-label">SEARCH AREA</label>
                                    <div class="filter-control">
                                        <div class="search-bar">
                                            <form class="search-form d-flex align-items-center" method="POST" action="#">
                                                <input type="text" name="query" id="search_order" placeholder="Search" title="Enter search keyword">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-group">
                                    <label class="filter-label">FROM</label>
                                    <div class="filter-control">
                                        <input id="start" placeholder="Please select..." />
                                    </div>
                                </div>
                                <div class="filter-group">
                                    <label class="filter-label">TO</label>
                                    <div class="filter-control">
                                        <input id="end" placeholder="Please select..." />
                                    </div>
                                </div>
                                <button class="view-btn btn btn-danger btn-sm" id="exportExcel"> <img class="avatar avatar-4x3" style="height:30px;" src="../../../assets/dashboard_assets/img/google-sheets-icon.svg" alt="Image Description"> Export</button>
                            </div>

                            <!-- Table Section -->
                            <div class="reports-table card-body">

                                <div class="table-responsive table-sm">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th><span class="badge text-dark">More</span></th>
                                                <th><span class="badge text-dark">Ref. N<sup><u>o</u></sup></span></th>
                                                <th><span class="badge text-dark">Order Date</span></th>
                                                <th><span class="badge text-dark">Customer</span></th>
                                                <th><span class="badge text-dark">Packages QTY</span></th>
                                                <th><span class="badge text-dark">Order Amount</span></th>
                                                <th><span class="badge text-dark">Order Status</span></th>
                                                <th><span class="badge text-dark">Amount Payed</span></th>
                                                <th><span class="badge text-dark">Payment Status</span></th>
                                                <th><span class="badge text-dark">Method</span></th>
                                                <th><span class="badge text-dark">Payment Date</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="11" style="text-align:center; font-weight: 600;"> ---- Please Wait ----</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

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
        $(document).ready(function () {
            $("#daterangepicker").kendoDateRangePicker({
                calendarButton: true,
                clearButton: false
            });
            $('#daterangepicker input').addClass('filter-control'); 

            $('#start').mobiscroll().datepicker({
                select: 'range',
                startInput: '#start',
                endInput: '#end'
            });

        });

    </script>
    <script>
        $(document).ready(function () {
            function fetchOrdersReport() {
                $.ajax({
                    url: '../api/milkOrdersApi.php?action=fetchOrderDataReport',
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Populate the table with response.data
                            populateTable(response.data);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            function fetchOrdersAdminReport() {
            fetch('../api/milkOrdersApi.php?action=fetchOrderDataAdminReport') // Call the API
            .then(response => response.json())
            .then(data => {
                if (Array.isArray(data)) {
                    console.log("Fetched orders:", data);
                    populateTable(data);
                }
            })
            .catch(error => console.error('Error fetching Orders:', error));
            }

            function populateTable(data) {
                var tbody = $('.reports-table tbody');
                tbody.empty();
                data.forEach(function (order) {
                    
                    var orderDate = order.date.split(' ')[0]; // Split by space and take the first part
                    var paymentDate = order.payment_date ? order.payment_date.split(' ')[0] : 'N/A'; // Hand
                    
                    // <button type="button" class="btn btn-outline-secondary"><i class="ri-survey-line"></i></button>
                    var row = `<tr>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="btn btn-success print_single_order"><i class="ri-printer-fill"></i></button>
                            </div>
                        </td>
                        <td><span class="badge text-dark">UOD0${order.orderid}</span></td>
                        <td><span class="badge text-dark">${orderDate}</span></td>
                        <td><span class="badge text-dark">${order.firstname} ${order.lastname}</span></td> <!-- Fixed customer name -->
                        <td><span class="badge text-dark">${order.package_details || 'N/A'}</span></td> <!-- Packages formatted -->
                        <td><span class="badge text-dark">${order.total_amount.toLocaleString()}</span></td> <!-- Formatted total amount -->
                        <td><span class="badge text-dark">${order.order_status}</td>
                        <td><span class="badge text-dark">${(order.amount_payed || 0).toLocaleString()}</span></td> <!-- Amount Paid -->
                        <td><span class="badge text-dark">${order.payment_status || 'Waiting'}</span></td>
                        <td><span class="badge text-dark">${order.payment_method}</span></td>
                        <td><span class="badge text-dark">${paymentDate || 'N/A'}</span></td>
                    </tr>`;
                    tbody.append(row);
                });
            }

            // Check user role and fetch data accordingly
            var userRole = <?php echo $decodedToken->role; ?>; // Get role from PHP
            console.log("Role: ",userRole);
            if (userRole == 1) { // MANAGER
                fetchOrdersAdminReport();
            } else if (userRole == 4) { // CUSTOMER
                fetchOrdersReport();
            }

            // Search functionality
            $('#search_order').on('input', function () {
                var searchText = $(this).val().toLowerCase();
                $('.reports-table tbody tr').each(function () {
                    var rowText = $(this).text().toLowerCase();
                    if (rowText.indexOf(searchText) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });

            // Date range filtering
            $('#start, #end').on('change', function () {
                var startDate = $('#start').val(); // Get the start date value
                var endDate = $('#end').val(); // Get the end date value

                // If only one date is selected, set the other to the same date
                if (!startDate && endDate) {
                    startDate = endDate;
                } else if (!endDate && startDate) {
                    endDate = startDate;
                }

                // Convert to Date objects for comparison
                startDate = startDate ? new Date(startDate) : null;
                endDate = endDate ? new Date(endDate) : null;

                $('.reports-table tbody tr').each(function () {
                    var rowDateText = $(this).find('td:eq(2)').text(); // Get the date from the table (3rd column)
                    var rowDate = new Date(rowDateText); // Convert to Date object

                    // Check if the row date falls within the range
                    if ((!startDate || rowDate >= startDate) && (!endDate || rowDate <= endDate)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            
        });

        $(document).ready(function () {
            // Export to Excel functionality
            $('#exportExcel').on('click', function () {
                // Get the table data
                var table = $('.reports-table table')[0];
                var workbook = XLSX.utils.table_to_book(table, { sheet: "Orders Report" });

                // Export the Excel file
                XLSX.writeFile(workbook, 'Orders_Report.xlsx');
            });

            // Print individual row functionality
            $('.reports-table tbody').on('click', '.print_single_order', function () {
                var row = $(this).closest('tr'); // Get the row containing the clicked button
                var printContents = row.html(); // Get the HTML content of the row

                // Create a new window for printing
                var printWindow = window.open('', '', 'height=600,width=800');
                printWindow.document.write('<html><head><title>Print Order</title>');
                printWindow.document.write('<style>table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid #000; padding: 8px; }</style>');
                printWindow.document.write('</head><body>');
                printWindow.document.write('<table>');
                printWindow.document.write(printContents); // Add the row content to the print window
                printWindow.document.write('</table>');
                printWindow.document.write('</body></html>');
                printWindow.document.close();

                // Print the window
                printWindow.print();
            });
        });
    </script>


</body>

</html>