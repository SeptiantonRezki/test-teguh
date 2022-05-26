<?php
require(__DIR__ . '/../../config/koneksi.php');

function hapusTahunAnggaran($id_tahunanggaran)
{
    global $koneksi;
    try {
        $sql = "delete from tahunanggaran where id_tahunanggaran = $id_tahunanggaran";
        return $koneksi->query($sql);
    } catch (\Throwable $th) {
        return false;
    }
}
