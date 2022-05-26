<?php
require(__DIR__ . '/../../config/koneksi.php');

function ambilPengeluaran($id)
{
    global $koneksi;
    $sql = "select * from pengeluaran where id_pengeluaran='$id'";
    $pengeluaran = [];

    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($pengeluaran, $row);
    }
    return $pengeluaran;
}

function ambilSemuaPengeluaran()
{
    global $koneksi;
    $allPengeluaran = [];
    $sql = "select * from pengeluaran";
    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($allPengeluaran, $row);
    }
    return $allPengeluaran;
}
function ambilSemuaPengeluaranDenganNamaDepartemen()
{
    global $koneksi;
    $allPengeluaran = [];
    $sql = "select p.id_pengeluaran, p.id_departemen, p.keterangan, p.tanggal, p.jumlah, d.nama_departemen from pengeluaran AS p LEFT JOIN departemen AS d ON p.id_departemen = d.id_departemen";
    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($allPengeluaran, $row);
    }
    return $allPengeluaran;
}

function ambilSemuaPengeluaranHariIniHanyaJumlah()
{
    global $koneksi;
    $allPengeluaran = [];
    $sql = "SELECT jumlah FROM pengeluaran WHERE DATE(`tanggal`) = CURDATE()";
    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($allPengeluaran, $row);
    }
    return $allPengeluaran;
}

function menjumlahkanJumlahPengeluaran()
{
    global $koneksi;
    $allPengeluaran = [];
    $sql = "SELECT SUM(jumlah) as jumlah FROM pengeluaran";
    $result = $koneksi->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($allPengeluaran, $row);
    }
    return $allPengeluaran;
}
