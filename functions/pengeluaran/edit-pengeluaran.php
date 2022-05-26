<?php
require(__DIR__ . '/../../config/koneksi.php');

function editPengeluran($id, $jumlah, $keterangan, $id_departemen)
{
    global $koneksi;
    $sql = "update pengeluaran set tanggal=CURRENT_TIMESTAMP, jumlah=$jumlah, keterangan='$keterangan', id_departemen = $id_departemen where id_pengeluaran=$id";
    return $koneksi->query($sql);
}
