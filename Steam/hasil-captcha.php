<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cek Hasil CAPTCHA</title>
</head>
	<body>
	<?php
	$nama = $_POST["username"];
	$pwd = $_POST["password"]; 
	    //memanggil lagi session untuk dimulai 
	    session_start();
	    //mengecek apakah user menginput captcha dengan benar
	    //jika captcha salah, maka akan menjalankan yang pertama
	    if ($_SESSION["code"] != $_POST["kodecaptcha"]) {
		    echo "<script>alert('Login Gagal!');</script>" ;
		} else { // jika captcha benar, maka perintah yang bawah akan dijalankan
			header('Location: admin.php');
		}
	?>
	  </p>
	</body>
</html>