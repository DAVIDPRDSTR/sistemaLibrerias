<?php
include '../Controlador/GlobalFuntion.php';
?>

<script src="<?php echo $baseUrl ?>breria/Template/js/jquery-1.12.0.min.js"></script>
<script src="<?php echo $baseUrl ?>breria/Template/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });

    var baseUrl = "<?=$baseUrl?>";

    function changePassword() {
        $(location).attr('href', baseUrl + '/views/cambio_clave.php');
    }
</script>


</body>
</html>