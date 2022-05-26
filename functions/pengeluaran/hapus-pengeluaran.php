<?php
require(__DIR__ . '/../../config/koneksi.php');

function hapusPengeluaran($id)
{
    // return true / false
    global $koneksi;
    $query = "DELETE FROM pengeluaran WHERE id_pengeluaran = $id";
    return mysqli_query($koneksi, $query);
}
