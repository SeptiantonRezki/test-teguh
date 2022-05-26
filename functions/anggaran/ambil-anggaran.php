<?php
require(__DIR__ . '/../../config/koneksi.php');

function ambilSemuaAnggaran()
{
    global $koneksi;
    $sql = "SELECT * FROM anggaran";
    $result = mysqli_query($koneksi, $sql);
    $anggaran = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $anggaran[] = $row;
    }
    return $anggaran;
}

function ambilSatuAnggaran($id)
{
    global $koneksi;
    $sql = "SELECT * FROM anggaran WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);
    return mysqli_fetch_assoc($result);
}

function ambilSemuaAnggaranDenganNamaDepartemenDanTahunAnggaran()
{
    global $koneksi;
    $sql = "    SELECT a.id_anggaran, d.nama_departemen, ta.tahun_anggaran, a.tanggal_mulai, a.tanggal_selesai, a.namaanggaran, a.tempatanggaran, a.penanggungjawab, a.jumlah, a.sisa, a.status_persetujuan FROM anggaran AS a LEFT JOIN departemen AS d ON a.id_departemen = d.id_departemen LEFT JOIN tahunanggaran AS ta ON a.id_tahunanggaran = ta.id_tahunanggaran";
    $result = mysqli_query($koneksi, $sql);
    $anggaran = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $anggaran[] = $row;
    }
    return $anggaran;
}

function menjumlahkanJumlahAnggaran()
{
    global $koneksi;
    $sql = "SELECT SUM(jumlah) as jumlah FROM anggaran";
    $result = mysqli_query($koneksi, $sql);
    return mysqli_fetch_assoc($result);
}
