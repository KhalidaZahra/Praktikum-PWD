<!DOCTYPE html>
<html>
<head>
	<title>Validasi Data</title>
</head>
<body bgcolor="bisque">
	<center><h1>Validasi Data Mahasiswa</h1></center>
	Selamat datang <?php echo
	$_POST["nama"];?><br>
	NIM anda : <?php echo $_POST["NIM"]; ?><br>
	Tanggal lahir anda :  <?php echo $_POST["tl"]; ?><br>
	Alamat anda : <?php echo $_POST["alamat"]; ?><br>
	Nomor telepon anda : <?php echo $_POST["telp"]; ?><br>
	Jenis kelamin anda : <?php echo $_POST["jk"]; ?><br>
	Agama anda : <?php echo $_POST["agama"]; ?><br>
	Fakultas anda  : <?php echo $_POST["fakultas"]; ?><br>
	Jurusan anda :  <?php echo $_POST["jurusan"]; ?><br>
	File upload anda : <?php echo $_POST["foto"]; ?><br>
</body>
</html>