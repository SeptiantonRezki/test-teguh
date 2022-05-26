<?php
require(__DIR__ . '/../../config/koneksi.php');
// create function tambah tahun anggaran with value 	tahun_anggaran, saldo_anggaran,  keterangan,
function tambahTahunAnggaran($tahun_anggaran, $saldo_anggaran, $keterangan)
{
    global $koneksi;
    $sql = "insert into tahunanggaran (tahun_anggaran, saldo_anggaran, keterangan) values ('$tahun_anggaran', '$saldo_anggaran', '$keterangan')";
    return $koneksi->query($sql);
}

function tambahTahunAnggaranTransactionExample($tahun_anggaran, $saldo_anggaran, $keterangan)
{
    global $koneksi;
    $koneksi->begin_transaction();
    try {
        $sqlKeterangan = "insert into tahunanggaran (tahun_anggaran, saldo_anggaran, keterangan) values ('$tahun_anggaran', '$saldo_anggaran', '$keterangan')";
        $sqlPengeluaran = "insert into pengeluaran (tanggal, jumlah, keterangan, id_departemen) values (CURRENT_TIMESTAMP, '$saldo_anggaran',  'Anggaran Tahun 2022 $tahun_anggaran', NULL)";
        $koneksi->query($sqlKeterangan);
        $koneksi->query($sqlPengeluaran);        
        $koneksi->commit();
    } catch (mysqli_sql_exception $exception) {
        $koneksi->rollback();
        throw $exception;
    }
}
