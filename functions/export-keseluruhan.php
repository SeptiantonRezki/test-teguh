    <?php header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data-Keseluruhan.xls");
	require(__DIR__ . '/pemasukan/ambil-pemasukan.php');
	require(__DIR__ . '/pengeluaran/ambil-pengeluaran.php');
	require(__DIR__ . '/cashadvance/ambil-cashadvance.php');

	$semuaPemasukanDenganNamaJemaat = ambilPemasukanDenganNamaJemaat();
	$semuaPengeluranDenganNamaDepartemenArray = ambilSemuaPengeluaranDenganNamaDepartemen();
	$semuaCashAdvanceDenganTahunDanNamaAnggaranArray = ambilSemuaCashAdvcanceDenganTahundanNamaAnggaran();

	$totalPemasukan = menjumlahkanJumlahPemasukan()[0]['jumlah'];
	$totalPengeluaran = menjumlahkanJumlahPengeluaran()[0]['jumlah'];
	$totalCashAdvance =  menjumlahkanJumlahCashAdvance()['jumlah'];
	$totalSemua = (int)($totalPemasukan) + (int)($totalCashAdvance) + (int)($totalPengeluaran);
	$i = 1;
	$j = 1;
	$k = 1;

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
    			<td style="vertical-align: middle; text-align: center;"><?php echo $j++;  ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['nama_departemen']; ?></td>
    			<td style="vertical-align: middle;"><?php echo date('d F Y', strtotime($row['tanggal']));  ?></td>
    			<td style="vertical-align: middle;"><?php echo date('H:i:s', strtotime($row['tanggal'])); ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['jumlah']; ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['keterangan']; ?></td>
    		</tr>
    	<?php	}  ?>
    </table>


    <h3>Data Cash Advance</h3>
    <table border="1" cellpadding="5">
    	<tr>
    		<th style="vertical-align: middle; text-align: center;">No.urut</th>
    		<th>Tahun Anggaran</th>
    		<th>Nama Anggaran</th>
    		<th>Keterangan</th>
    		<th>Penanggung Jawab</th>
    		<th>Tanggal</th>
    		<th>Waktu</th>
    		<th>Status Persetujuan</th>
    		<th>Jumlah</th>
    		<th>Status Pengembalian</th>
    	</tr>
    	<?php foreach ($semuaCashAdvanceDenganTahunDanNamaAnggaranArray as $row) {
		?>
    		<tr>
    			<td style="vertical-align: middle; text-align: center;"><?php echo $k++;  ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['tahun_anggaran']; ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['namaanggaran']; ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['keterangan']; ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['penanggung_jawab']; ?></td>
    			<td style="vertical-align: middle;"><?php echo date('d F Y', strtotime($row['tanggal']));  ?></td>
    			<td style="vertical-align: middle;"><?php echo date('H:i:s', strtotime($row['tanggal'])); ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['status_persetujuan']; ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['jumlah']; ?></td>
    			<td style="vertical-align: middle;"><?php echo $row['status_pengambilan']; ?></td>
    		</tr>
    	<?php	}  ?>
    </table>

    <h3></h3>
    <table border="1" cellpadding="5">
    	<tr>
    		<th>Jenis</th>
    		<th>Jumlah</th>
    	</tr>
    	<tr>
    		<td style="vertical-align: middle; text-align: center;">Pemasukan</td>
    		<td style="vertical-align: middle; text-align: center;"><?=$totalPemasukan ?></td>
    	</tr>
    	<tr>
    		<td style="vertical-align: middle; text-align: center;">Pengeluaran</td>
    		<td style="vertical-align: middle; text-align: center;"><?=$totalPengeluaran ?></td>

    	</tr>
    	<tr>
    		<td style="vertical-align: middle; text-align: center;">Cash Advance</td>
    		<td style="vertical-align: middle; text-align: center;"><?=$totalCashAdvance ?></td>

    	</tr>
    	<tr>
    		<td style="vertical-align: middle; text-align: center;">Balance Akhir</td>
    		<td style="vertical-align: middle; text-align: center;"><?=$totalSemua ?></td>
    	</tr>
    </table>