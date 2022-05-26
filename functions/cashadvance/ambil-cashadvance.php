<?php
require(__DIR__ . '/../../config/koneksi.php');

function ambilSemuaCashAdvance()
{
    global $koneksi;
    $sql = "SELECT * FROM cashadvance";
    $result = mysqli_query($koneksi, $sql);
    $cashadvance = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $cashadvance[] = $row;
    }
    return $cashadvance;
}

function ambilSatuAdvance($id)
{
    global $koneksi;
    $sql = "SELECT * FROM cashadvance WHERE id_cashadvance = $id";
    $result = mysqli_query($koneksi, $sql);
    return mysqli_fetch_assoc($result);
}


function ambilSemuaCashAdvcanceDenganTahundanNamaAnggaran(){
    global $koneksi;
    $sql = "SELECT ca.id_cashadvance, ta.tahun_anggaran, a.namaanggaran, ca.keterangan, ca.penanggung_jawab, ca.tanggal, ca.status_persetujuan, ca.jumlah, ca.status_pengambilan   FROM cashadvance as ca LEFT JOIN tahunanggaran as ta ON ca.id_tahunanggaran = ta.id_tahunanggaran LEFT JOIN anggaran as a ON ca.id_anggaran = a.id_anggaran";
    $result = mysqli_query($koneksi, $sql);
    $cashadvance = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $cashadvance[] = $row;
    }
    return $cashadvance;
}

function menjumlahkanJumlahCashAdvance() {
    global $koneksi;
    $sql = "SELECT SUM(jumlah) as jumlah FROM cashadvance";
    $result = mysqli_query($koneksi, $sql);
    return mysqli_fetch_assoc($result);
}