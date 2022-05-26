<?php
require(__DIR__ . '/../../config/koneksi.php');

// create function edit tahun anggaran with value 	tahun_anggaran, saldo_anggaran, id_tahunanggaran, keterangan,
function editTahunAnggaran($tahun_anggaran, $saldo_anggaran, $id_tahunanggaran, $keterangan, $tambah_anggaran)
{
    global $koneksi;
    $result = $tambah_anggaran + $saldo_anggaran;
    var_dump($result);
    $sql = "update tahunanggaran set tahun_anggaran='$tahun_anggaran', saldo_anggaran='$result', keterangan='$keterangan' where id_tahunanggaran='$id_tahunanggaran'";
    return $koneksi->query($sql);

}