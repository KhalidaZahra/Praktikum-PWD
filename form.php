<style type="text/css">
	body {
	width: 100wh;
	height: 90vh;
	color: black;
	background: linear-gradient(-45deg, #7CFC00, #00FF00, #EE7752, #E73C7E, #23A6D5, #23D5AB, #FFFF00);
	background-size: 400% 400%;
	-webkit-animation: Gradient 15s ease infinite;
	-moz-animation: Gradient 15s ease infinite;
	animation: Gradient 15s ease infinite;
}
 
@-webkit-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}
 
@-moz-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}
 
@keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}
	#form {

        width: 500px;
        padding: 10px;
        border: 1px solid;
        background: transparent;
        margin: 0 auto;
        text-align: center;
		}
</style>

</body>
</html>

<?php

	if(isset($_POST['submit'])){
		$fp = fopen("data_mhs.txt", "a+");
		$nama = $_POST['nama'];
		$nim = $_POST['nim'];
		$tl = $_POST['tl'];
		$alamat = $_POST['alamat'];
		$nop = $_POST['nop'];
		$email = $_POST['email'];
		$jk = $_POST['jk'];
		$goldar = $_POST['goldar'];
		$agama = $_POST['agama'];
		$fakultas = $_POST['fakultas'];
		$jurusan = $_POST['jurusan'];
		$nama_ortu = $_POST['nama_ortu'];
		$ttl_ortu = $_POST['ttl_ortu'];
		$alamat_ortu = $_POST['alamat_ortu'];
		$pekerjaan_ortu = $_POST['pekerjaan_ortu'];
		$nohp_ortu = $_POST['nohp_ortu'];



		if (empty($nama) || empty($nim) || empty($tl) ||empty($alamat) || empty($nop) || empty($email) || empty($jk) || empty($goldar) || empty($agama) || empty($fakultas) || empty($jurusan) || empty($nama_ortu) || empty($ttl_ortu) || empty($alamat_ortu) || empty($pekerjaan_ortu) || empty($nohp_ortu)) {
			echo "<div id='form'>Data Tidak Boleh Kosong<br>";
			echo "<a style='color:black;border-radius:2px;font-weight:bold;' href='form.html'>Klik Disini untuk mengulang</a></div>";
		}else {
			fputs($fp, "$nama|$nim|$tl|$alamat|$nop|$email|$jk|$goldar|$agama|$fakultas|$jurusan|$nama_ortu|$ttl_ortu|$alamat_ortu|$pekerjaan_ortu|$nohp_ortu\n");
			fclose($fp);
			echo "<div id='form'>Pendaftaran Berhasil<br>";
			echo "<a style='color:black;border-radius:2px;font-weight:bold;' href='tabel.php'>Klik Disini Untuk Melihat Data</a></div>";
		}
}
