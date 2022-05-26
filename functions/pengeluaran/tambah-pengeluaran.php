<?php
require(__DIR__ . '/../../config/koneksi.php');

function tambahPengeluaran($jumlah, $keterangan, $id_departemen)
{
    global $koneksi;
    $sql = "insert into pengeluaran (tanggal, jumlah, keterangan, id_departemen) values (CURRENT_TIMESTAMP, '$jumlah', '$keterangan', $id_departemen)";
    return $koneksi->query($sql);
}
