<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){
		
		$nomor_nota = $_REQUEST['nomor_nota'];
		$jenis = $_REQUEST['jenis'];
		$nama = $_REQUEST['nama'];
		$bayar = $_REQUEST['bayar'];
		$kembali = $_REQUEST['kembali'];
		$total = $_REQUEST['total'];
		$id_user = $_SESSION['id_user'];

		$sql = mysqli_query($con, "INSERT INTO transaksi(nomor_nota, jenis, nama, bayar, kembali, total, tanggal, id_user) VALUES('$nomor_nota', '$jenis', '$nama', '$bayar', '$kembali', '$total', NOW(), '$id_user')");

		if($sql == true){
			header('Location: ./admin.php?hlm=transaksi');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Data Transaksi</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="nomor_nota" class="col-sm-2 control-label" style="text-align: left;">No. Nota</label>
		<div class="col-sm-3">

		<?php

			$sql = mysqli_query($con, "SELECT nomor_nota FROM transaksi");
				echo '<input type="text" class="form-control" id="nomor_nota" value="';

			$nomor_nota = "C001";
			if(mysqli_num_rows($sql) == 0){
				echo $nomor_nota;
			}

			$result = mysqli_num_rows($sql);
			$counter = 0;
			while(list($nomor_nota) = mysqli_fetch_array($sql)){
				if (++$counter == $result) {
					$nomor_nota++;
					echo $nomor_nota;
				}
			}
				echo '"name="nomor_nota" placeholder="No. Nota" readonly>';

		?>

		</div>
	</div>
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label" style="text-align: left;">Jenis Kendaraan</label>
		<div class="col-sm-3">
			<select name="jenis" class="form-control" id="jenis" required>
				<option value="" disable>--- Pilih Jenis Kendaraan ---</option>
			<?php

				$q = mysqli_query($con, "SELECT * FROM biaya");
				while($data = mysqli_fetch_array($q)){
					echo '<option value="'.$data['biaya'].'">'.$data['jenis'].'</option>';
				}

			?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="biaya" class="col-sm-2 control-label" style="text-align: left;">Biaya</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="biaya" name="biaya" value="" required readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="bayar" class="col-sm-2 control-label" style="text-align: left;">Bayar</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="bayar" name="bayar" placeholder="Isi dengan angka" required>
		</div>
	</div>
	<div class="form-group">
		<label for="kembali" class="col-sm-2 control-label" style="text-align: left;">Kembalian</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="kembali" name="kembali" placeholder="Kembalian" required readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="total" class="col-sm-2 control-label" style="text-align: left;">Total Bayar</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="total" name="total" placeholder="Total Bayar" required readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label" style="text-align: left;">Nama Pelanggan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pelanggan" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-warning" style="background: #bbb581;">Simpan</button>
			<a href="./admin.php?hlm=transaksi" class="btn btn-danger" style="background: darksalmon;">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>
<script>

  $(document).ready(function(){

    $("#jenis").change(function(){
      var biaya = $(this).val();
      $("#biaya").val(biaya);
    });

    $("#bayar").keyup(function(){
        var biaya = $("#biaya").val();
        var bayar = $("#bayar").val();
        $("#kembali").val(bayar - biaya);
        $("#total").val(biaya);
    });

  });
</script>