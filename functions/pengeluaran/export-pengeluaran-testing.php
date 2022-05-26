    <?php header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data-Pengeluaran.xls");
	require(__DIR__ . '/ambil-pengeluaran.php');
	$semuaPengeluranDenganNamaDepartemenArray = ambilSemuaPengeluaranDenganNamaDepartemen();
	$i = 1;
	?>
    <h3>Tanggal : <?php echo date('d F Y') ?></h3>
    <h3>Data Pengeluaran</h3>
    <table border="1" cellpadding="5">
    	<tr>
    		<th style="vertical-align: middle; text-align: center;">No.urut</th>
    		<th>Nama Departemen</th>
    		<th>Tanggal</th>
    		<th>Waktu</th>
    		<th>Jumlah</th>
    		<th>Keterangan</th>
    	</tr>
    	<?php foreach ($semuaPengeluranDenganNamaDepartemenArray as $row) {
		?>
    		<tr>
    			<td style="vertical-align: middle; text-align: center;"><?php echo $i++;  ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['nama_departemen']; ?></td>
    			<td style="vertical-align: middle;"><?php echo date('d F Y', strtotime($row['tanggal']));  ?></td>
    			<td style="vertical-align: middle;"><?php echo date('H:i:s', strtotime($row['tanggal'])); ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['jumlah']; ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['keterangan']; ?></td>
    		</tr>
    	<?php	}  ?>
    </table>