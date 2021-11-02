<?php
// nama host, username mysql, dan password mysql serta nama database
$host = "localhost";
$username = "root";
$password = "";
$databasename = "akademik";

// membuat koneksi dengan menghubungkan variabel nama hostm username dan password mysql, serta nama database
$con = @mysqli_connect($host, $username, $password, $databasename);

// untuk mengecek koneksi
if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}