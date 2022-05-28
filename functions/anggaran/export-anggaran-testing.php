    <?php header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data-Anggaran.xls");
	require(__DIR__ . '/ambil-anggaran.php');
	$semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray = ambilSemuaAnggaranDenganNamaDepartemenDanTahunAnggaran();

	$i = 1;
	?>
    <h3>Data Anggaran</h3>
    <table border="1" cellpadding="5">
    	<tr>
    		<th style="vertical-align: middle; text-align: center;">No.urut</th>
    		<th>No.urut</th>
    		<th>Nama Departemen</th>
    		<th>Tahun Anggaran</th>
    		<th>Nama Anggaran</th>
    		<th>Tanggal Mulai</th>
    		<th>Tanggal Selesai</th>
    		<th>Tempat Anggaran</th>
    		<th>Penanggung Jawab</th>
    		<th>Jumlah</th>
    		<th>Sisa</th>
    		<th>Status Persetujuan</th>
    	</tr>
    	<?php foreach ($semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray as $row) {
		?>
    		<tr>
    			<td style="vertical-align: middle; text-align: center;"><?php echo $i++;  ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['nama_departemen']; ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['tahun_anggaran']; ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['namaanggaran']; ?></td>
    			<td style="vertical-align: middle;"><?php echo date('d F Y', strtotime($row['tanggal_mulai']));  ?></td>
    			<td style="vertical-align: middle;"><?php echo date('d F Y', strtotime($row['tanggal_selesai']));  ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['tempatanggaran']; ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['penanggungjawab']; ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['jumlah']; ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['sisa']; ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['status_persetujuan']; ?></td>
    		</tr>
    	<?php	}  ?>
    </table>