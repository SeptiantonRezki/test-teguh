    <?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data-Pemasukan.xls");

	require(__DIR__ . '/ambil-pemasukan.php');
	$semuaPemasukanDenganNamaJemaat = ambilPemasukanDenganNamaJemaat();
	$i = 1;
	?>
    <h3>Tanggal : <?php echo date('d F Y') ?></h3>
    <h3>Data Pemasukan</h3>
    <table border="1" cellpadding="5">
    	<tr>
    		<th style="vertical-align: middle; text-align: center;">No.urut</th>
    		<th>Tanggal</th>
    		<th>Waktu</th>
    		<th>Perpuluhan</th>
    		<th>Syukur</th>
    		<th>Persembahan</th>
    		<th>Jumlah</th>
    		<th>Jemaat</th>
    		<th>Jenis</th>
    		<th>Keterangan</th>
    	</tr>
    	<?php foreach ($semuaPemasukanDenganNamaJemaat as $row) {
		?>
    		<tr>
    			<td style="vertical-align: middle; text-align: center;"><?php echo $i++;  ?></td>
    			<td style="vertical-align: middle;"><?php echo date('d F Y', strtotime($row['tanggal'])); ?></td>
    			<td style="vertical-align: middle;"><?php echo date('H:i:s', strtotime($row['tanggal'])); ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['perpuluhan'] ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['syukur'] ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['persembahan'] ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['jumlah'] ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['nama'] ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['jenis'] ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['keterangan'] ?></td>
    		</tr>
    	<?php	}  ?>
    </table>