<?php

require(__DIR__ . '/ambil-pemasukan.php');
require(__DIR__ . '../../../vendor/autoload.php');
// require(__DIR__ . '../../../vendor/phpoffice/phpword/bootstrap.php');
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(__DIR__ . '/templatepemasukan.docx');
$semuaPemasukanDenganNamaJemaat = ambilPemasukanDenganNamaJemaat();

$datenow = date('d-F-Y');
$datenowv2 = date('d/m/Y');
$templateProcessor->setValue('datenow', $datenow);
$templateProcessor->setValue('datenowv2', $datenowv2);
$templateProcessor->cloneBlock('block_name', 3, true, true);
// $replacements = array(
//     array('no' => '1', 'tanggal' => '01 mei 2022', 'waktu' => 'tidak ada', 'jemaat' => 'teguh', 'perpuluhan' => '10000', 'syukur' => '10000', 'persembahan' => '10000000', 'jumlah' => '11000000', 'jenis' => 'debit'),
//     array('no' => '2', 'tanggal' => '01 mei 2022', 'waktu' => 'tidak ada', 'jemaat' => 'teguh', 'perpuluhan' => '10000', 'syukur' => '10000', 'persembahan' => '10000000', 'jumlah' => '11000000', 'jenis' => 'cash'),
//     array('no' => '3', 'tanggal' => '01 mei 2022', 'waktu' => 'tidak ada', 'jemaat' => 'teguh', 'perpuluhan' => '10000', 'syukur' => '10000', 'persembahan' => '10000000', 'jumlah' => '11000000', 'jenis' => 'debit'),
// );
// $templateProcessor->cloneBlock('block_name', 0, true, false, $replacements);

$templateProcessor->cloneRow('no', count($semuaPemasukanDenganNamaJemaat));
$noPemasukan = 1;
foreach ($semuaPemasukanDenganNamaJemaat as $row) {
    $templateProcessor->setValue('no#' . $noPemasukan, $noPemasukan);
    $templateProcessor->setValue('tanggal#' . $noPemasukan, date('d F Y', strtotime($row['tanggal'])));
    $templateProcessor->setValue('waktu#' . $noPemasukan, date('H:i:s', strtotime($row['tanggal'])));
    $templateProcessor->setValue('jemaat#' . $noPemasukan, $row['nama']);
    $templateProcessor->setValue('perpuluhan#' . $noPemasukan, $row['perpuluhan']);
    $templateProcessor->setValue('syukur#' . $noPemasukan, $row['syukur']);
    $templateProcessor->setValue('persembahan#' . $noPemasukan, $row['persembahan']);
    $templateProcessor->setValue('jumlah#' . $noPemasukan, $row['jumlah']);
    $templateProcessor->setValue('jenis#' . $noPemasukan++, $row['jenis']);
}
// $values = [
//     ['userId' => 1, 'userName' => 'Batman', 'userAddress' => 'Gotham City'],
//     ['userId' => 2, 'userName' => 'Superman', 'userAddress' => 'Metropolis'],
// ];
// $templateProcessor->save();
$pathToSave = __DIR__ . '/resultpemasukan.docx';
$templateProcessor->saveAs($pathToSave);
header("location:../../pages/laporan.php");
