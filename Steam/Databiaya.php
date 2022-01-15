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
				include 'tambahbiaya.php';
				break;
			case 'edit':
				include 'editbiaya.php';
				break;
			case 'hapus':
				include 'hapusbiaya.php';
				break;
		}
	} else {

		echo '

			<div class="container">
			<div class="col-md-8">
				<h3 style="margin-bottom: -20px;">Data Biaya Jasa</h3>
					<a href="./admin.php?hlm=biaya&aksi=baru" class="btn btn-warning btn-s pull-right" style="background: mediumorchid;">Tambah Data</a>
				<br/><hr/>

				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="10%">No</th>
					 <th width="35%">Jenis Kendaraan</th>
					 <th width="35%">Biaya</th>
					 <th width="20%">Aksi</th>
				   </tr>
				 </thead>
				 <tbody style="background: #ffeeef;">';

			//skrip untuk menampilkan data biaya dari database
		 	$sql = mysqli_query($con, "SELECT * FROM biaya");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['jenis'].'</td>
					 <td>'.$row['biaya'].'</td>
					 <td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus data ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>

					 <a href="?hlm=biaya&aksi=edit&id_biaya='.$row['id_biaya'].'" class="btn btn-info btn-s" style="background: lightpink;">Edit</a>
					 <a href="?hlm=biaya&aksi=hapus&submit=yes&id_biaya='.$row['id_biaya'].'" onclick="return konfirmasi()" class="btn btn-primary btn-s" style="background: khaki;">Hapus</a>

					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=biaya&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
}
?>