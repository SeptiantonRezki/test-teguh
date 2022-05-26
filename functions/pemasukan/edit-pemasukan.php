<?php
require(__DIR__ . '/../../config/koneksi.php');
// create function editPemasukan where query mysql update table pemasukan values  values is id_jemaat, tanggal, perpuluhan, syukur, persembahan, jumlah, keterangan, jenis
function editPemasukan($id_pemasukan, $id_jemaat,  $perpuluhan, $syukur, $persembahan, $jumlah, $keterangan, $jenis)
{
    global $koneksi;
    $sql = "update pemasukan set id_jemaat = '$id_jemaat', tanggal = CURRENT_TIMESTAMP, perpuluhan = $perpuluhan, syukur = $syukur, persembahan = $persembahan, jumlah = $jumlah, keterangan = '$keterangan', jenis = '$jenis' where id_pemasukan = $id_pemasukan";
    return $koneksi->query($sql);
}
