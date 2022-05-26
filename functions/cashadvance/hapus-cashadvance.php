<?php
require(__DIR__ . '/../../config/koneksi.php');

function hapusCashAdvance($id_cashadvance)
{
    global $koneksi;
    $sql = "DELETE FROM cashadvance WHERE id_cashadvance = '$id_cashadvance'";
    return mysqli_query($koneksi, $sql);
}