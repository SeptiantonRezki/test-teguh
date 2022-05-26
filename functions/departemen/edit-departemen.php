<?php
require(__DIR__ . '/../../config/koneksi.php');

function editDepartemen($id, $nama, $keterangan)
{
    global $koneksi;
    $sql = "update departemen set nama_departemen='$nama', keterangan = '$keterangan' where id_departemen='$id'";
    return $koneksi->query($sql);
}
