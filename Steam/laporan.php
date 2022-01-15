<?php
if( empty( $_SESSION['id_user'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

      if(isset($_REQUEST['submit'])){

	     $submit = $_REQUEST['submit'];
         $date1 = $_REQUEST['date1'];
         $date2 = $_REQUEST['date2'];

		 $sql = mysqli_query($con, "SELECT * FROM transaksi WHERE tanggal BETWEEN '$date1' AND '$date2'");
		 if(mysqli_num_rows($sql) > 0){
			 $no = 0;

		 echo '<h2>Rekap Laporan Penghasilan <small>'.$date1.' sampai '.$date2.'</small></h2><hr>

		 <div class="col-sm-1">
		  <a href="?hlm=laporan" id="tombol" class="btn btn-info pull-left" style="background: #d1b8b8"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Kembali</a><br/><br/><br/>

		   <button id="tombol" onclick="window.print()" class="btn btn-warning" style="background: pink;"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>

		   </div>

		  <div class="col-sm-11">
		  <table class="table table-bordered">
		  <thead>
			<tr class="info">
			  <th width="5%">No</th>
			  <th width="10%">Nomor Nota</th>
			  <th width="20%">Nama Pelanggan</th>
			  <th width="10%">Total Bayar</th>
			  <th width="10%">Tanggal</th>
			</tr>
		  </thead>
		  <tbody style="background: lightgoldenrodyellow;">';

		  while($row = mysqli_fetch_array($sql)){
			 $no++;
		 echo '

			<tr>
			  <td>'.$no.'</td>
			  <td>'.$row['nomor_nota'].'</td>
			  <td>'.$row['nama'].'</td>
			  <td>RP. '.number_format($row['total']).'</td>
			  <td>'.date("d M Y", strtotime($row['tanggal'])).'</td>';
		 }
	 }
	 echo '
		 </tbody>
	 </table>

		<div class="col-sm-6">
		<table class="table table-bordered">';
		echo '<tr class="info"><th><h4>Jumlah Pelanggan</h4></th><th><h4>Jumlah Pendapatan</h4></th></tr>';

		 $sql = mysqli_query($con, "SELECT count(nama), sum(total) FROM transaksi WHERE tanggal BETWEEN '$date1' AND '$date2'");

		list($nama, $total) = mysqli_fetch_array($sql);{
		echo '<tr><td><span class="pull-right"><h4><b>'.$nama.' Orang</b></h4></span></td><td><span class="pull-right"><h4><b>RP. '.number_format($total).'</b></h4></span></td></tr>';

		 }
		 echo '
			   </table>
		   </div>
		   </div>
		   </div>
		 </div>';

	 } else {
		echo '<h2>Rekap Laporan Penghasilan</h2><hr>';

?>
	<div class="well well-sm noprint" style="background: antiquewhite;">
	<form class="form-inline" role="form" method="post" action="">
	  <div class="form-group">
	    <label class="sr-only" for="date1">Dari</label>
	    <input type="date" class="form-control" id="date1" name="date1" required>
	  </div>
	  <div class="form-group">
	    <label class="sr-only" for="date2">Sampai</label>
	    <input type="date" class="form-control" id="date2" name="date2" required>
	  </div>
	  <button type="submit" name="submit" class="btn btn-warning btn-s" style="background:salmon">Rekap</button>
	</form>
	</div>
<?php

      echo '<div class="col-sm-20"><table class="table table-bordered" style="background: #fadb7261;">';
      echo '<tr class="info">
      <th><h4>Jumlah Pelanggan</h4></th>
      <th><h4>Jumlah Pendapatan</h4></th></tr>';

	  $tanggal =  date('Y-m-d');

	  $sql = mysqli_query($con, "SELECT count(nama), sum(total) FROM transaksi WHERE tanggal='$tanggal'");

      list($nama, $total) = mysqli_fetch_array($sql);{
         echo '<tr><td><span class="pull-right"><h4><b>'.$nama.' Orang</b></h4></span></td><td><span class="pull-right"><h4><b>RP. '.number_format($total).'</b></h4></span></td></tr>';

      }
      echo '
	  		</table>
	  	</div>
		<div class="col-sm-1">
		  	<button id="tombol" onclick="window.print()" class="btn btn-warning pull-right" style ="background: lightcoral;"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>
		 </div>
	  	</div>
	  </div>';
   }
   }
?>
