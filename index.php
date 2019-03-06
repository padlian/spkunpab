<?php
	include_once("koneksi.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>sistem pengambilan keputusan</title>
</head>
<body>
<h1></h1>
<?php
	
	$query = "SELECT * FROM data_alternatif";
	$result = $koneksi->query($query);

	// foreach($rows as $row)
	// {
	// 	echo $row['CountryCode'];
	// }
?>
<a href="tambah.php">Tambah</a>
<table border="1">
	<tr>
		<th>Nama</th>
		<th>Pendidikan</th>
		<th>Pengalaman</th>
		<th>Keahlian</th>
		<th>Umur</th>
		<th>Aksi</th>
	</tr>
	<?php
		while($row = $result->fetch_array())
		{
			$id = $row['id'];
			?>
			<tr>
				<td><?= $row['nama'] ?></td>
				<td><?= $row['pendidikan'] ?></td>
				<td><?= $row['pengalaman'] ?></td>
				<td><?= $row['keahlian'] ?></td>
				<td><?= $row['umur'] ?></td>
				<td><a href="hapus.php?id=">Hapus</a></td>
			</tr>
			<?php
		}
	?>
</table>
</body>
</html>