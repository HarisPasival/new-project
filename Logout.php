<script src="js/jquery-3.5.1.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<?php
session_start();
session_destroy();
echo "<script>
$(document).ready(function(){
    Swal.fire({
        title: 'success',
        text: 'ออกจากระบบเรียบร้อย',
        icon: 'success',
        timer : 1500,
        showConfirmButton: false
    });
});
</script>";
header('refresh:1; url = index.php');
exit(0);
?>