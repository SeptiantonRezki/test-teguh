<?php
require(__DIR__ . '/../../config/koneksi.php');
function editAnggaran($id_anggaran, $id_departemen, $id_tahunanggaran, $tanggal_mulai, $tanggal_selesai, $nama_anggaran, $tempat_anggaran, $penanggung_jawab, $jumlah, $sisa, $status)
{
    global $koneksi;
    try {
        $sqlTahunAnggaran = "select * from tahunanggaran where id_tahunanggaran = $id_tahunanggaran";
        $resultTahunAnggaran = mysqli_query($koneksi, $sqlTahunAnggaran);
        $resultTahunAnggaran = mysqli_fetch_assoc($resultTahunAnggaran);
        $koneksi->begin_transaction();
        $resultSisaTahunAnggaran = $resultTahunAnggaran['saldo_anggaran'] - $jumlah;
        $sqlUpdateAnggaran = "UPDATE anggaran SET tanggal_mulai = '$tanggal_mulai', tanggal_selesai = '$tanggal_selesai', namaanggaran = '$nama_anggaran', tempatanggaran = '$tempat_anggaran', penanggungjawab = '$penanggung_jawab', status_persetujuan = '$status' WHERE id_anggaran = $id_anggaran;";
        if ($status == "diterima" && $resultSisaTahunAnggaran > 0) {
            $sqlUpdateTahunAnggaran = "UPDATE tahunanggaran SET saldo_anggaran = $resultSisaTahunAnggaran WHERE tahunanggaran.id_tahunanggaran = $id_tahunanggaran;";
            $stmtTahunAnggaran = $koneksi->prepare($sqlUpdateTahunAnggaran);
            $stmtTahunAnggaran->execute();
        }
        $stmtCashAdvance = $koneksi->prepare($sqlUpdateAnggaran);
        $stmtCashAdvance->execute();
        return $koneksi->commit();
    } catch (mysqli_sql_exception $exception) {
        $koneksi->rollback();
        return false;
    }
}
