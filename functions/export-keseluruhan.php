    <?php
	require(__DIR__ . '/pemasukan/ambil-pemasukan.php');
	require(__DIR__ . '/pengeluaran/ambil-pengeluaran.php');
	require(__DIR__ . '/cashadvance/ambil-cashadvance.php');
	require(__DIR__ . '/anggaran/ambil-anggaran.php');
	require(__DIR__ . '../../vendor/autoload.php');
	$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(__DIR__ . '/templatekeseluruhan.docx');
	$semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray = ambilSemuaAnggaranDenganNamaDepartemenDanTahunAnggaran();
	$semuaPemasukanDenganNamaJemaat = ambilPemasukanDenganNamaJemaat();
	$semuaPengeluranDenganNamaDepartemenArray = ambilSemuaPengeluaranDenganNamaDepartemen();
	$semuaCashAdvanceDenganTahunDanNamaAnggaranArray = ambilSemuaCashAdvcanceDenganTahundanNamaAnggaran();
	$totalPemasukan = menjumlahkanJumlahPemasukan()[0]['jumlah'];
	$totalPengeluaran = menjumlahkanJumlahPengeluaran()[0]['jumlah'];
	$totalAkhir = menjumlahkanJumlahPemasukan()[0]['jumlah'] - menjumlahkanJumlahPengeluaran()[0]['jumlah'];

	$datenow = date('d-F-Y');
	$datenowv2 = date('d/m/Y');
	$templateProcessor->setValue('datenow', $datenow);
	$templateProcessor->setValue('datenowv2', $datenowv2);
	$templateProcessor->setValue('totalPemasukan', $totalPemasukan);
	$templateProcessor->setValue('totalPengeluran', $totalPengeluaran);
	$templateProcessor->setValue('totalAkhir', $totalAkhir);

	$templateProcessor->cloneRow('noAngg', count($semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray));
	$noAnggaran = 1;
	foreach ($semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray as $row) {
		$templateProcessor->setValue('noAngg#' . $noAnggaran, $noAnggaran);
		$templateProcessor->setValue('departemenAngg#' . $noAnggaran, $row['nama_departemen']);
		$templateProcessor->setValue('namaanggaranAngg#' . $noAnggaran, $row['namaanggaran']);
		$templateProcessor->setValue('namapjAngg#' . $noAnggaran, $row['penanggungjawab']);
		$templateProcessor->setValue('janggaranAngg#' . $noAnggaran, $row['jumlah']);
		$templateProcessor->setValue('sangaggaranAngg#' . $noAnggaran, $row['sisa']);
		$templateProcessor->setValue('statusAngg#' . $noAnggaran++, $row['status_persetujuan']);
	}

	$templateProcessor->cloneRow('noPem', count($semuaPemasukanDenganNamaJemaat));
	$noPemasukan = 1;
	foreach ($semuaPemasukanDenganNamaJemaat as $row) {
		$templateProcessor->setValue('noPem#' . $noPemasukan, $noPemasukan);
		$templateProcessor->setValue('tanggalPem#' . $noPemasukan, date('d F Y', strtotime($row['tanggal'])));
		$templateProcessor->setValue('waktuPem#' . $noPemasukan, date('H:i:s', strtotime($row['tanggal'])));
		$templateProcessor->setValue('jemaatPem#' . $noPemasukan, $row['nama']);
		$templateProcessor->setValue('perpuluhanPem#' . $noPemasukan, $row['perpuluhan']);
		$templateProcessor->setValue('syukurPem#' . $noPemasukan, $row['syukur']);
		$templateProcessor->setValue('persembahanPem#' . $noPemasukan, $row['persembahan']);
		$templateProcessor->setValue('jumlahPem#' . $noPemasukan, $row['jumlah']);
		$templateProcessor->setValue('jenisPem#' . $noPemasukan++, $row['jenis']);
	}
	$templateProcessor->cloneRow('noPeng', count($semuaPengeluranDenganNamaDepartemenArray));
	$noPengeluaran = 1;
	foreach ($semuaPengeluranDenganNamaDepartemenArray as $row) {
		$templateProcessor->setValue('noPeng#' . $noPengeluaran, $noPengeluaran);
		$templateProcessor->setValue('tanggalPeng#' . $noPengeluaran, date('d F Y', strtotime($row['tanggal'])));
		$templateProcessor->setValue('departemenPeng#' . $noPengeluaran,  $row['nama_departemen']);
		$templateProcessor->setValue('keteranganPeng#' . $noPengeluaran, $row['keterangan']);
		$templateProcessor->setValue('jumlahPeng#' . $noPengeluaran++, (string)($row['jumlah']));
	}

	$templateProcessor->cloneRow('noCash', count($semuaCashAdvanceDenganTahunDanNamaAnggaranArray));
	$noCash = 1;
	foreach ($semuaCashAdvanceDenganTahunDanNamaAnggaranArray as $row) {
		$templateProcessor->setValue('noCash#' . $noCash, $noCash);
		$templateProcessor->setValue('tanggalCash#' . $noCash, date('d F Y', strtotime($row['tanggal'])));
		$templateProcessor->setValue('namaanggaranCash#' . $noCash, $row['namaanggaran']);
		$templateProcessor->setValue('namapjCash#' . $noCash, $row['penanggung_jawab']);
		$templateProcessor->setValue('jCash#' . $noCash, $row['jumlah']);
		$templateProcessor->setValue('statusPerCash#' . $noCash, $row['status_persetujuan']);
		$templateProcessor->setValue('statusPengCash#' . $noCash++, $row['status_pengambilan']);
	}

	$pathToSave = __DIR__ . '/LaporanKeseluruhan.docx';
	$templateProcessor->saveAs($pathToSave);
	header("location:../pages/laporan.php");
