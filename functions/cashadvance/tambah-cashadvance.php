<?php
require(__DIR__ . '/../../config/koneksi.php');

function tambahCashadvance($id_tahunanggaran, $id_anggaran,  $keterangan, $penanggung_jawab,  $status_persetujuan, $jumlah, $status_pengambilan)
{
    global $koneksi;
    try {
        $sql = "SELECT * FROM anggaran WHERE id_anggaran = $id_anggaran";
        $resultQueryAnggaran = mysqli_query($koneksi, $sql);
        $resultAnggaran = mysqli_fetch_assoc($resultQueryAnggaran);
        $koneksi->begin_transaction();
        $sqlCashAdvance = "INSERT INTO cashadvance ( id_tahunanggaran, id_anggaran, keterangan, penanggung_jawab, tanggal, status_persetujuan, jumlah, status_pengambilan) VALUES ( '$id_tahunanggaran', '$id_anggaran', '$keterangan', '$penanggung_jawab', CURRENT_TIMESTAMP, '$status_persetujuan', '$jumlah', '$status_pengambilan')";
        $resultSisaAnggaran = $resultAnggaran['sisa'] - $jumlah;
        if ($resultAnggaran['status_persetujuan'] == "diterima" && $resultAnggaran > 0) {
            if ($status_persetujuan == "diterima" && $status_pengambilan == "selesai") {
                $sqlAnggaran = "UPDATE  anggaran SET sisa = $resultSisaAnggaran WHERE anggaran.id_anggaran = $id_anggaran";
                $stmtAnggaran = $koneksi->prepare($sqlAnggaran);
                $stmtAnggaran->execute();
            }
        }
        $stmtCashAdvance = $koneksi->prepare($sqlCashAdvance);
        $stmtCashAdvance->execute();
        return $koneksi->commit();
    } catch (mysqli_sql_exception $exception) {
        $koneksi->rollback();
        return false;
    }
}
