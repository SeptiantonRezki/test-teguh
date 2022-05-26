<?php
require(__DIR__ . '/../../config/koneksi.php');

function hapusJemaat($id)
{
    // return true / false
    global $koneksi;
    $query = "DELETE FROM jemaat WHERE id_jemaat = $id";
    return mysqli_query($koneksi, $query);
}