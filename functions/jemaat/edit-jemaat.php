<?php
require(__DIR__ . '/../../config/koneksi.php');
// create function editJemaat where query mysql is update data to table jemaat   values is  nama, alamat, jemaat, kontak
function editJemaat($id_jemaat, $nama, $alamat, $jemaat, $kontak)
{
    global $koneksi;
    $sql = "update jemaat set nama = '$nama', alamat = '$alamat', jemaat = '$jemaat', kontak = '$kontak' where id_jemaat = $id_jemaat";
    return $koneksi->query($sql);
}
