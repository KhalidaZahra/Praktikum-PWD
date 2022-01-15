<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="style.css">
</head>

<body style="background-image: url(steam.png);">
	<form method="get" action="#" id="myForm" onsubmit="return validasi()" style="background:#f1dff1;">
	<h2 align="center">Login Aplikasi <br>Jasa Cuci Kendaraan</h2>
	<!-- Ussername : 1900018007
		 Password : zahra -->
	<br/>
	<br/>
		<table align="center">
			<tr>
				<td><input type="text" name="username" placeholder="Username"></td>
			</tr>
			<tr>
				<td><input type="password" name="password" placeholder="Password"></td>
			</tr>
			<td><input type="text" name="kodecaptcha" value="" maxlength="5" placeholder="Masukkan kode captcha" /></td>
			<tr align="center">
			<!-- tentukan letak script generate gambar -->
			<td><img src="captcha.php" alt="gambar" /></td>
			</tr>
			<tr align="center">
				<td><input type="submit" value="LOGIN"></td>
			</tr>
		</table>			
	</form>
</body>
<script type="text/javascript">
	function validasi(){
		var username = document.forms["myForm"]["username"].value;
		var password = document.forms["myForm"]["password"].value;
		if(username == "1900018007" && password=="zahra"){
			return true;
		}
		else if (username == "" || password=="") {
			alert("Masukkan username dan password anda");
			return false;
		}
		else{
			alert("Masukkan username = admin dan password = prpl");
			return false;
		}
	}
</script>
</html>

