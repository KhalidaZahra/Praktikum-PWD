<?php
include "koneksi.php";
header('Content-Type: text/xml');
$query = "SELECT * FROM transaksi";
$hasil = mysqli_query($con,$query);
$jumField = mysqli_num_fields($hasil);
echo "<?xml version='1.0'?>";
echo "<data>";
while ($data = mysqli_fetch_array($hasil))
{
echo "<transaksi>";
echo"<id_transaksi>",$data['id_transaksi'],"</id_transaksi>";
echo"<nama>",$data['nama'],"</nama>";
echo"<bayar>",$data['bayar'],"</bayar>";
echo"<kembali>",$data['kembali'],"</kembali>";
echo"<total>",$data['total'],"</total>";
echo"<tanggal>",$data['tanggal'],"</tanggal>";
echo "</transaksi>";
}
echo "</data>";
?>