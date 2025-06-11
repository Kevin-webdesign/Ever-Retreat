    <!-- Bootstrap JS (online link) -->
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="../../../assets/js/script.js"></script>

    <!-- Adding Date Range Picker and momment -->
    <script src="../../../assets/js/moment.min.js"></script>
    <script src="../../../assets/js/daterangepicker.min.js"></script>
    <script src="../../../vendor/sweetalert/sweetalert2.js"></script>

    <!-- VIDEO PLAYER -->
    <script src="../../../vendor/fancybox/jquery.fancybox.min.js"></script>
    <!-- <script src="../../../assets/js/hs.fancybox.js"></script> -->
     
    <!-- <script src="../../../assets/js/select2.min.js"></script>     -->

    <script>
        $(document).ready(function() {
            $('.copy p').on('click', function() {
                window.location.href = '../../Authentication/views/login.php';
            });
            
            // Optional: Add CSS to show it's clickable
            $('.copy p').css({
                'cursor': 'pointer',
                'text-decoration': 'none'
            });
        });
        // Subscription form handling
        $(document).ready(function() {
            $('#subscribe-form').on('submit', function(e) {
                e.preventDefault();
                const email = $('#subscriber_email').val();
                
                // Validate email
                if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Email',
                        text: 'Please enter a valid email address'
                    });
                    return;
                }
                
                // Show loading
                Swal.fire({
                    title: 'Subscribing...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                $.ajax({
                    url: '../../Newsletter/api/newsletterApi.php',
                    type: 'POST',
                    data: { email: email, action: 'subscribe' },
                    dataType: 'json',
                    success: function(response) {
                        Swal.close();
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Subscribed!',
                                text: response.message,
                                timer: 2000
                            });
                            $('#subscriber_email').val('');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Subscription Failed',
                                text: response.message
                            });
                        }
                    },
                    error: function() {
                        Swal.close();
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred. Please try again.'
                        });
                    }
                });
            });
        });
            
    </script>