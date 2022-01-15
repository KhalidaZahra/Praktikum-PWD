<?php
include "koneksi.php";
$sql="select * from transaksi order by id_transaksi";
$tampil = mysqli_query($con,$sql);
if (mysqli_num_rows($tampil) > 0) {
$no=1;
$response = array();
$response["data"] = array();
while ($r = mysqli_fetch_array($tampil)) {
$h['id_transaksi'] = $r['id_transaksi'];
$h['nomor_nota'] = $r['nomor_nota'];
$h['jenis'] = $r['jenis'];
$h['nama'] = $r['nama'];
$h['bayar'] = $r['bayar'];
$h['kembali'] = $r['kembali'];
$h['total'] = $r['total'];
$h['tanggal'] = $r['tanggal'];
array_push($response["data"], $h);
}
echo json_encode($response);
}
else {
$response["message"]="tidak ada data";
echo json_encode($response);
}
?>