<?php
require(__DIR__ . '/../../config/koneksi.php');

// create function tambahJemaat where query mysql is add data to table jemaat   values is  nama, alamat, jemaat, kontak
function tambahJemaat($nama, $alamat, $jemaat, $kontak)
{
    global $koneksi;
    $sql = "insert into jemaat (nama, alamat, jemaat, kontak) values ('$nama', '$alamat', '$jemaat', '$kontak')";
    return $koneksi->query($sql);
}
