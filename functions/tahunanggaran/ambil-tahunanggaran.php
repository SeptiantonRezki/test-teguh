<?php
require(__DIR__ . '/../../config/koneksi.php');

function ambilSemuaTahunAnggaran()
{
    global $koneksi;
    $sql = "select * from tahunanggaran";
    $tahunanggaran = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($tahunanggaran, $row);
    }
    return $tahunanggaran;
}

function ambilTahunAnggaran($id_tahunanggaran)
{
    global $koneksi;
    $sql = "select * from tahunanggaran where id_tahunanggaran = $id_tahunanggaran";
    $tahunanggaran = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($tahunanggaran, $row);
    }
    return $tahunanggaran;
}