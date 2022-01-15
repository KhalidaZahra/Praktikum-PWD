<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Form Login</title>
<link rel="stylesheet" href="stylee.css">
</head>
<body style="background-image: url(steam.png);>
<h2 align="center"><b></b></h2>
<!-- Membuat Form Login -->
<form action="hasil-captcha.php" method="post">
<h2 align="center">Login Aplikasi <br>Jasa Cuci Kendaraan</h2>
<table border="0" cellpadding="0" cellspacing="0" align="center">
<tr>
<td><input type="text" name="username" value="" maxlength="20" placeholder="Username"></td>
</tr>
<tr>
<td><input type="password" name="password" value ="" maxlength="15" placeholder="Password"></td>
</tr>
<td><input type="text" name="kodecaptcha" value="" maxlength="5" placeholder="Masukkan kode captcha" /></td>
<tr align="center">
<!-- tentukan letak script generate gambar -->
<td><img src="captcha.php" alt="gambar" /></td>
</tr>
<tr align="center">
<td><input id="submit" type ="submit" value="Login"></td>
</tr>
</table>
</form>
</body>
</html>