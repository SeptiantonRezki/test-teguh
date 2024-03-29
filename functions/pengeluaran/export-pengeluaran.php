<?php

require(__DIR__ . '/ambil-pengeluaran.php');
require(__DIR__ . '../../../vendor/autoload.php');
// require(__DIR__ . '../../../vendor/phpoffice/phpword/bootstrap.php');
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(__DIR__ . '/templatepengeluaran.docx');
$semuaPengeluranDenganNamaDepartemenArray = ambilSemuaPengeluaranDenganNamaDepartemen();

$datenow = date('d-F-Y');
$datenowv2 = date('d/m/Y');
$templateProcessor->setValue('datenow', $datenow);
$templateProcessor->setValue('datenowv2', $datenowv2);
$templateProcessor->setValue('subtotal', menjumlahkanJumlahPengeluaran()[0]['jumlah']);

// $templateProcessor->cloneBlock('block_name', 3, true, true);
// $replacements = array(
//     array('no' => '1', 'tanggal' => '01 mei 2022', 'waktu' => 'tidak ada', 'jemaat' => 'teguh', 'perpuluhan' => '10000', 'syukur' => '10000', 'persembahan' => '10000000', 'jumlah' => '11000000', 'jenis' => 'debit'),
//     array('no' => '2', 'tanggal' => '01 mei 2022', 'waktu' => 'tidak ada', 'jemaat' => 'teguh', 'perpuluhan' => '10000', 'syukur' => '10000', 'persembahan' => '10000000', 'jumlah' => '11000000', 'jenis' => 'cash'),
//     array('no' => '3', 'tanggal' => '01 mei 2022', 'waktu' => 'tidak ada', 'jemaat' => 'teguh', 'perpuluhan' => '10000', 'syukur' => '10000', 'persembahan' => '10000000', 'jumlah' => '11000000', 'jenis' => 'debit'),
// );
// $templateProcessor->cloneBlock('block_name', 0, true, false, $replacements);

$templateProcessor->cloneRow('no', count($semuaPengeluranDenganNamaDepartemenArray));
$noPengeluaran = 1;
foreach ($semuaPengeluranDenganNamaDepartemenArray as $row) {
    $templateProcessor->setValue('no#' . $noPengeluaran, $noPengeluaran);
    $templateProcessor->setValue('tanggal#' . $noPengeluaran, date('d F Y', strtotime($row['tanggal'])));
    $templateProcessor->setValue('departemen#' . $noPengeluaran,  $row['nama_departemen']);
    $templateProcessor->setValue('keterangan#' . $noPengeluaran, $row['keterangan']);
    $templateProcessor->setValue('jumlah#' . $noPengeluaran++, (string)($row['jumlah']));
}
// $values = [
//     ['userId' => 1, 'userName' => 'Batman', 'userAddress' => 'Gotham City'],
//     ['userId' => 2, 'userName' => 'Superman', 'userAddress' => 'Metropolis'],
// ];
// $templateProcessor->save();
$pathToSave = __DIR__ . '/LaporanPengeluaran.docx';
$templateProcessor->saveAs($pathToSave);
header("location:../../pages/laporan.php");
