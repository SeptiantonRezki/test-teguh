<?php
require(__DIR__ . '/../../config/koneksi.php');

function tambahAnggaran($id_departemen, $id_tahunanggaran, $tanggal_mulai, $tanggal_selesai, $nama_anggaran, $tempat_anggaran, $penanggung_jawab, $jumlah, $status)
{
    global $koneksi;
    // return mysqli_query($koneksi, $sql);
    try {
        $sqlTahunAnggaran = "select * from tahunanggaran where id_tahunanggaran = $id_tahunanggaran";
        $resultTahunAnggaran = mysqli_query($koneksi, $sqlTahunAnggaran);
        $resultTahunAnggaran = mysqli_fetch_assoc($resultTahunAnggaran);
        $koneksi->begin_transaction();
        $resultSisaTahunAnggaran = $resultTahunAnggaran['saldo_anggaran'] - $jumlah;
        $sqlTambahAnggaran = "INSERT INTO anggaran(id_departemen, id_tahunanggaran, tanggal_mulai, tanggal_selesai, namaanggaran, tempatanggaran, penanggungjawab, jumlah, sisa, status_persetujuan) VALUES ('$id_departemen','$id_tahunanggaran','$tanggal_mulai', '$tanggal_selesai', '$nama_anggaran', '$tempat_anggaran', '$penanggung_jawab', '$jumlah', '$jumlah', '$status');";
        if ($status == "diterima" && $resultSisaTahunAnggaran > 0) {
            $sqlUpdateTahunAnggaran = "UPDATE tahunanggaran SET saldo_anggaran = $resultSisaTahunAnggaran WHERE tahunanggaran.id_tahunanggaran = $id_tahunanggaran;";
            $stmtTahunAnggaran = $koneksi->prepare($sqlUpdateTahunAnggaran);
            $stmtTahunAnggaran->execute();
        }
        $stmtCashAdvance = $koneksi->prepare($sqlTambahAnggaran);
        $stmtCashAdvance->execute();
        return $koneksi->commit();
    } catch (mysqli_sql_exception $exception) {
        $koneksi->rollback();
        return false;
    }
}
