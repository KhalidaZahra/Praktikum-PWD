<?php
session_start();
if( empty( $_SESSION['id_user'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Jasa Cuci Kendaraan</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/jquery-ui.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>


	<style type="text/css">
	body {
	  min-height: 200px;
	  padding-top: 70px;
	  background-color: thistle;
	}
   @media print {
	   .container {
		   margin-top: -30px;
	   }
	   #tombol,
      .noprint {
         display: none;
      }
   }
	</style>
  </head>
  <body>

    <?php include "menu.php"; ?>

    <div class="container">

	<?php
	if( isset($_REQUEST['hlm'] )){

		$hlm = $_REQUEST['hlm'];

		switch( $hlm ){
			case 'transaksi':
				include "transaksi.php";
				break;
			case 'laporan':
				include "laporan.php";
				break;
			case 'user':
				include "user.php";
				break;
			case 'biaya':
				include "Databiaya.php";
				break;
			case 'cetak':
				include "cetaknota.php";
				break;
		}
	} else {
	?>
 
      <div class="jumbotron">
      	<p class="bg-dark text-white"><h2>Selamat Datang di Aplikasi Jasa Cuci Kendaraan</h2></p>
      </div>

	<?php
	}
	?>

    </div> 
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
  </body>
</html>
<?php
}
?>