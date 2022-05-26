<?php
require(__DIR__ . '/../../config/koneksi.php');

function hapusPemasukan($id)
{
    // return true / false
    global $koneksi;
    $query = "DELETE FROM pemasukan WHERE id_pemasukan = $id";
    return mysqli_query($koneksi, $query);
}