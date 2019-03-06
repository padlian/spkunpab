<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_GET['id'];
 
// menginput data ke database
$query = "DELETE FROM data_alternatif where id = $id";
echo $query;

if (mysqli_query($koneksi,$query)) {
	header("location:index.php");
}
else{
	echo "terjadi kesalahan<br/>";
	echo $query;
}

 
// mengalihkan halaman kembali ke index.php
 
?>