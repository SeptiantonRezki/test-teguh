<?php
require(__DIR__ . '/../../config/koneksi.php');

function hapusDepartemen($id)
{
    global $koneksi;
    $sql = "delete from departemen where id_departemen='$id'";
    return $koneksi->query($sql);
}
