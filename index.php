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
			$link_hapus = "hapus_aksi.php?id=".$id;
			?>
			<tr>
				<td><?= $row['nama'] ?></td>
				<td><?= $row['pendidikan'] ?></td>
				<td><?= $row['pengalaman'] ?></td>
				<td><?= $row['keahlian'] ?></td>
				<td><?= $row['umur'] ?></td>
				<td><a href="<?= $link_hapus ?>">Hapus</a></td>
			</tr>
			<?php
		}
	?>
</table>
<br/>
Xij/Max Xij
	<?php
		// ambil max pendidikan
		$query_pendidikan = "SELECT MAX(pendidikan) AS pendidikan FROM data_alternatif";
		$data_pendidikan = $koneksi->query($query_pendidikan);
		$max_pendidikan = $data_pendidikan->fetch_array();
		$max_pendidikan = $max_pendidikan[0]; 

		// ambil max pengalaman
		$query_pengalaman = "SELECT MAX(pengalaman) AS pengalaman FROM data_alternatif";
		$data_pengalaman = $koneksi->query($query_pengalaman);
		$max_pengalaman = $data_pengalaman->fetch_array();
		$max_pengalaman = $max_pengalaman[0]; 

		// ambil max keahlian
		$query_keahlian = "SELECT MAX(keahlian) AS keahlian FROM data_alternatif";
		$data_keahlian = $koneksi->query($query_keahlian);
		$max_keahlian = $data_keahlian->fetch_array();
		$max_keahlian = $max_keahlian[0];  

		// ambil max umur
		$query_umur = "SELECT MAX(umur) AS umur FROM data_alternatif";
		$data_umur = $koneksi->query($query_umur);
		$max_umur = $data_umur->fetch_array();
		$max_umur = $max_umur[0]; 

	?>
	<table>
		<tr>
			<td>Max Pendidikan</td>
			<td>:</td>
			<td><?= $max_pendidikan ?></td>
		</tr>
		<tr>
			<td>Max Pengalaman</td>
			<td>:</td>
			<td><?= $max_pengalaman ?></td>
		</tr>
		<tr>
			<td>Max Keahlian</td>
			<td>:</td>
			<td><?= $max_keahlian ?></td>
		</tr>
		<tr>
			<td>Max Umur</td>
			<td>:</td>
			<td><?= $max_umur ?></td>
		</tr>
	</table>

	<table border="1">
		<tr>
			<th>Nama</th>
			<th>Pendidikan</th>
			<th>Pengalaman</th>
			<th>Keahlian</th>
			<th>Umur</th>
		</tr>
	<?php
		$result2 = $koneksi->query($query);
		while($data = $result2->fetch_array())
		{
			$nama = $data['nama'];
			$pendidikan = $data['pendidikan'];
			$pengalaman = $data['pengalaman'];
			$keahlian = $data['keahlian'];
			$umur = $data['umur'];

			$pendidikan_hasil = $pendidikan/$max_pendidikan;
			$pengalaman_hasil = $pengalaman/$max_pengalaman;
			$keahlian_hasil = $keahlian/$max_keahlian;
			$umur_hasil = $umur/$max_umur;

			$pendidikan_string = $pendidikan." / ".$max_pendidikan." = ".$pendidikan_hasil;
			$pengalaman_string = $pengalaman." / ".$max_pengalaman." = ".$pengalaman_hasil;
			$keahlian_string = $keahlian." / ".$max_keahlian." = ".$keahlian_hasil;
			$umur_string = $umur." / ".$max_umur." = ".$umur_hasil;

			?>
			<tr>
				<td><?= $nama ?></td>
				<td><?= $pendidikan_string ?></td>
				<td><?= $pengalaman_string ?></td>
				<td><?= $keahlian_string ?></td>
				<td><?= $umur_string ?></td>
			</tr>
			<?php
		}
	?>
	</table>

	<br>
	Hasil Akhir
	<table border="1">
		<tr>
			<th>Nama</th>
			<th>Total</th>
		</tr>
	<?php
		$tertinggi = 0;
		$result2 = $koneksi->query($query);
		while($data = $result2->fetch_array())
		{
			$nama = $data['nama'];
			$pendidikan = $data['pendidikan'];
			$pengalaman = $data['pengalaman'];
			$keahlian = $data['keahlian'];
			$umur = $data['umur'];

			$pendidikan_hasil = $pendidikan/$max_pendidikan;
			$pengalaman_hasil = $pengalaman/$max_pengalaman;
			$keahlian_hasil = $keahlian/$max_keahlian;
			$umur_hasil = $umur/$max_umur;

			$total = $pendidikan_hasil+$pengalaman_hasil+$keahlian_hasil+$umur_hasil;

			if($total > $tertinggi){
				$tertinggi = $total;
				$hasil['nama'] = $nama;
				$hasil['total'] = $total;
			}

			?>
			<tr>
				<td><?= $nama ?></td>
				<td><?= $total ?></td>
			</tr>
			<?php
		}
	?>
	</table>
	Kesimpulan = nilai tertinggi diperoleh <?= $hasil['nama'] ?> dengan nilai <?= $hasil['total'] ?>
</body>
</html>