<?php require(__DIR__ . "/../functions/cek-sesi.php"); ?>
<?php require(__DIR__ . "/../functions/pesan.php"); ?>
<?php require(__DIR__ . "/../functions/pemasukan/index.php"); ?>
<?php require(__DIR__ . "/../functions/pengeluaran/index.php"); ?>
<?php require(__DIR__ . "/../functions/jemaat/index.php"); ?>
<?php require(__DIR__ . "/../functions/cashadvance/index.php"); ?>
<?php require(__DIR__ . "/../components/index.php"); ?>
<?php 
	$totalPemasukan = menjumlahkanJumlahPemasukan()[0]['jumlah'];
	$totalPengeluaran = menjumlahkanJumlahPengeluaran()[0]['jumlah'];
	$totalSemua = (int)($totalPemasukan) -  (int)($totalPengeluaran);
?>
<!DOCTYPE html>
<html lang="en">
<?php echo templateHeader("Pemasukan") ?>


<body id="page-top">
    <?php require(__DIR__ . '/../components/sidebar.php'); ?>
    <!-- Main Content -->
    <!-- Begin Page Content -->
    <?php require(__DIR__ . '/../components/navbar.php'); ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="../functions/export-keseluruhan.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><em class="fas fa-download fa-sm text-white-50"></em> Download Laporan</a>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan (Hari Ini)</div>
                                <br>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?= number_format($jumlahPemasukanHariIni, 2, ',', '.'); ?></div>
                            </div>
                            <div class="col-auto">
                                <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    <div class="ml-2">
                        &nbsp Semua : Rp. <?php echo number_format($jumlahSemuaPemasukan, 2, ',', '.'); ?>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran (Hari Ini)</div>
                                <br>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?= number_format($jumlahPengeluaranHariIni, 2, ',', '.'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    <div class="ml-2">
                        &nbsp Semua : Rp. <?php echo number_format($jumlahSemuaPengeluaran, 2, ',', '.'); ?>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sisa Uang</div>
                                <br>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp.<?= number_format($totalSemua, 2, ',', '.'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>

                    </div>
                    <div class="col">
                        <!-- <div class="progress progress-sm mr-2"> -->
                            <?php

                            ?>

                            <!-- <div class="progress-bar bg-" role="progressbar" style="width: 100%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"><span> % </span></div> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jemaat</div>
                                <br>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahSemuaJemaat['jumlah']; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- End of Main Content -->
    <?php require(__DIR__ . '/../components/logout-modal.php'); ?>
    <?php require(__DIR__ . '/../components/footer.php'); ?>
    <?php require(__DIR__ . '/../components/script.php'); ?>
</body>

</html>