<?php
session_start();
session_destroy();
echo "Anda telah sukses keluar sistem ";
echo "<a href=form_login.php><b>LOGIN</b></a></center>";
?>