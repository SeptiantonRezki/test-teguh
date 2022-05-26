<?php
require(__DIR__ . '/../../config/koneksi.php');
// create function editCashAdvance where update table value cashAdvance with values is id_cashadvance	id_tahunanggaran	id_anggaran	keterangan	penangungg_jawab	tanggal	status_persetujuan	jumlah	status pengambilan
function editCashAdvance($id_cashadvance, $id_tahunanggaran, $id_anggaran, $keterangan, $penanggung_jawab,  $status_persetujuan, $jumlah, $status_pengambilan)
{

    global $koneksi;
    try {
        $sql = "SELECT * FROM anggaran WHERE id_anggaran = $id_anggaran";
        $sqlGetCashAdvance = "SELECT * FROM cashadvance WHERE id_cashadvance = $id_cashadvance";
        $resultQueryAnggaran = mysqli_query($koneksi, $sql);
        $resultQueryCashAdvance = mysqli_query($koneksi, $sqlGetCashAdvance);
        $resultAnggaran = mysqli_fetch_assoc($resultQueryAnggaran);
        $resultCashAdvance = mysqli_fetch_assoc($resultQueryCashAdvance);
        $sqlCashAdvance = "UPDATE cashadvance SET keterangan = '$keterangan', penanggung_jawab = '$penanggung_jawab', tanggal = CURRENT_TIMESTAMP, status_persetujuan = '$status_persetujuan' WHERE cashadvance.id_cashadvance = $id_cashadvance;";

        $koneksi->begin_transaction();


        // jika status persetujuan diterima dan anggaran masih ada sisanya atau > 0
        if ($resultAnggaran['status_persetujuan'] == "diterima" && $resultAnggaran["sisa"] > 0) {
            //  jika  status pengambilan selesai => masih belum diambil
            var_dump($resultCashAdvance);
            if ($resultCashAdvance["status_pengambilan"] == "belum"&& $status_pengambilan == "selesai") {
                $resultSisaAnggaran = (int)($resultAnggaran['sisa']) - $jumlah;
                if ($resultSisaAnggaran > 0) {
                    $sqlCashAdvance = "UPDATE cashadvance SET keterangan = '$keterangan', penanggung_jawab = '$penanggung_jawab', status_persetujuan = '$status_persetujuan', status_pengambilan = '$status_pengambilan' WHERE id_cashadvance = $id_cashadvance;";
                    $sqlAnggaran = "UPDATE  anggaran SET sisa = $resultSisaAnggaran WHERE id_anggaran = $id_anggaran";
                    $stmtAnggaran = $koneksi->prepare($sqlAnggaran);
                    $stmtAnggaran->execute();
                }
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
