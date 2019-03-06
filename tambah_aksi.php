<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$pendidikan = $_POST['pendidikan'];
$pengalaman = $_POST['pengalaman'];
$keahlian = $_POST['keahlian'];
$umur = $_POST['umur'];
 
// menginput data ke database
$query = "INSERT INTO data_alternatif(nama, pendidikan, pengalaman, keahlian, umur) VALUES ('$nama','$pendidikan','$pengalaman','$keahlian','$umur')";

if (mysqli_query($koneksi,$query)) {
	header("location:index.php");
}
else{
	echo "terjadi kesalahan<br/<";
	echo $query;
}

 
// mengalihkan halaman kembali ke index.php
 
?>