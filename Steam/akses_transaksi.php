<?php
$url = "http://localhost/Steam/getdatatransaksi.php";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
$result = json_decode($response);
foreach ($result as $r) {
echo "<p>";
echo "ID Transaksi : " . $r->id_transaksi . "<br />";
echo "Nomor Nota : " . $r->nomor_nota . "<br />";
echo "Jenis Kendaraan  : " . $r->jenis . "<br />";
echo "Nama : " . $r->nama . "<br />";
echo "Bayar : " . $r->bayar . "<br />";
echo "Kembali : " . $r->kembali . "<br />";
echo "Total : " . $r->total . "<br />";
echo "Tanggal : " . $r->tanggal . "<br />";
echo "</p>";
}