<?php

if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'transaksibaru.php';
				break;
			case 'edit':
				include 'edittransaksi.php';
				break;
			case 'hapus':
				include 'hapustransaksi.php';
				break;
			case 'cetak':
				include 'cetaknota.php';
				break;
		}
	} else {

		echo'

			<div class="container">
				<h3 style="margin-bottom: -20px;">Daftar Transaksi</h3>
					<a href="./admin.php?hlm=transaksi&aksi=baru" class="btn btn-info btn-s pull-right" style="background: mediumorchid">Tambah Data</a>
				<br/><hr/>

				<table class="table table-bordered" style="background: #efe8f1">
				 <thead>
				   <tr class="info">
					 <th width="5%">No</th>
					 <th width="10%">No. Nota</th>
					 <th width="20%">Nama Pelanggan</th>
					 <th width="10%">Total Bayar</th>
					 <th width="10%">Tanggal</th>
					 <th width="20%">Aksi</th>
				   </tr>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($con, "SELECT * FROM transaksi");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['nomor_nota'].'</td>
					 <td>'.$row['nama'].'</td>
					 <td>RP. '.number_format($row['total']).'</td>
					 <td>'.date("d M Y", strtotime($row['tanggal'])).'</td>
					 <td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus data ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>

					<a href="?hlm=cetak&id_transaksi='.$row['id_transaksi'].'" class="btn btn-info btn-s" target="_blank" style="background: #ccb0a3">Cetak Nota</a>

					 <a href="?hlm=transaksi&aksi=edit&id_transaksi='.$row['id_transaksi'].'" class="btn btn-warning btn-s" style="background: lightpink;">Edit</a>

					 <a href="?hlm=transaksi&aksi=hapus&submit=yes&id_transaksi='.$row['id_transaksi'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s" style="background: #deda8b">Hapus</a>

					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=transaksi&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
		</div>';
	}
}
?>