<?php
require(__DIR__ . '/../../config/koneksi.php');
// create function mysql add pemasukan where values is id_jemaat, tanggal, perpuluhan, syukur, persembahan, jumlah, keterangan, jenis
function tambahPemasukan($id_jemaat, $perpuluhan, $syukur, $persembahan, $jumlah, $keterangan, $jenis)
{
    global $koneksi;
    $sql = "insert into pemasukan (id_jemaat, tanggal, perpuluhan, syukur, persembahan, jumlah, keterangan, jenis) values ('$id_jemaat', CURRENT_TIMESTAMP, $perpuluhan, $syukur, $persembahan, $jumlah, '$keterangan', '$jenis')";
    return $koneksi->query($sql);
}
