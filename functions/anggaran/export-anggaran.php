    <?php
	require(__DIR__ . '/ambil-anggaran.php');
	require(__DIR__ . '../../../vendor/autoload.php');
	// require(__DIR__ . '../../../vendor/phpoffice/phpword/bootstrap.php');
	$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(__DIR__ . '/templateanggaran.docx');
	$semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray = ambilSemuaAnggaranDenganNamaDepartemenDanTahunAnggaran();

	$datenow = date('d-F-Y');
	$datenowv2 = date('d/m/Y');
	$templateProcessor->setValue('datenow', $datenow);
	$templateProcessor->setValue('datenowv2', $datenowv2);
	$templateProcessor->setValue('Subtotal', menjumlahkanJumlahAnggaran()['jumlah']);

	// $templateProcessor->cloneBlock('block_name', 3, true, true);
	// $replacements = array(
	//     array('no' => '1', 'tanggal' => '01 mei 2022', 'waktu' => 'tidak ada', 'jemaat' => 'teguh', 'perpuluhan' => '10000', 'syukur' => '10000', 'persembahan' => '10000000', 'jumlah' => '11000000', 'jenis' => 'debit'),
	//     array('no' => '2', 'tanggal' => '01 mei 2022', 'waktu' => 'tidak ada', 'jemaat' => 'teguh', 'perpuluhan' => '10000', 'syukur' => '10000', 'persembahan' => '10000000', 'jumlah' => '11000000', 'jenis' => 'cash'),
	//     array('no' => '3', 'tanggal' => '01 mei 2022', 'waktu' => 'tidak ada', 'jemaat' => 'teguh', 'perpuluhan' => '10000', 'syukur' => '10000', 'persembahan' => '10000000', 'jumlah' => '11000000', 'jenis' => 'debit'),
	// );
	// $templateProcessor->cloneBlock('block_name', 0, true, false, $replacements);

	$templateProcessor->cloneRow('no', count($semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray));
	$noAnggaran = 1;
	foreach ($semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray as $row) {
		$templateProcessor->setValue('no#' . $noAnggaran, $noAnggaran);
		$templateProcessor->setValue('departemen#' . $noAnggaran, $row['nama_departemen']);
		$templateProcessor->setValue('namaanggaran#' . $noAnggaran, $row['namaanggaran']);
		$templateProcessor->setValue('namapj#' . $noAnggaran, $row['penanggungjawab']);
		$templateProcessor->setValue('janggaran#' . $noAnggaran, $row['jumlah']);
		$templateProcessor->setValue('sangaggaran#' . $noAnggaran, $row['sisa']);
		$templateProcessor->setValue('status#' . $noAnggaran++, $row['status_persetujuan']);
	}

	// <?= menjumlahkanJumlahPemasukan()[0]['jumlah'] 
	// $values = [
	//     ['userId' => 1, 'userName' => 'Batman', 'userAddress' => 'Gotham City'],
	//     ['userId' => 2, 'userName' => 'Superman', 'userAddress' => 'Metropolis'],
	// ];
	// $templateProcessor->save();
	$pathToSave = __DIR__ . '/LaporanAnggaran.docx';
	$templateProcessor->saveAs($pathToSave);
	header("location:../../pages/laporan.php");
