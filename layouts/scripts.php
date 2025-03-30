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

    <script>
        $(document).ready(function() {
            $('.copy p').on('click', function() {
                window.location.href = '../../Authentication/views/login.php';
            });
            
            // Optional: Add CSS to show it's clickable
            $('.copy p').css({
                'cursor': 'pointer',
                'text-decoration': 'underline'
            });
        });
    </script>