<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $id_transaksi = $_REQUEST['id_transaksi'];

    $sql = mysqli_query($con, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'");
    if($sql == true){
        header("Location: ./admin.php?hlm=transaksi");
        die();
    }
    }
}
?>