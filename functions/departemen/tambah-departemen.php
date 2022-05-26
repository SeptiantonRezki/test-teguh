<?php
require(__DIR__ . '/../../config/koneksi.php');

function tambahDepartemen($nama, $keterangan)
{
    global $koneksi;
    $sql = "insert into departemen (nama_departemen, keterangan) values ('$nama', '$keterangan')";
    return $koneksi->query($sql);
}
