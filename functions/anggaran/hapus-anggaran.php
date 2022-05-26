<?php
require(__DIR__ . '/../../config/koneksi.php');
function hapusAnggaran($id_anggaran)
{
    global $koneksi;
    $sql = "DELETE FROM anggaran WHERE id_anggaran = '$id_anggaran'";
    return mysqli_query($koneksi, $sql);
}