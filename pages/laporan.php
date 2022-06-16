<?php require(__DIR__ . "/../functions/cek-sesi.php"); ?>
<?php require(__DIR__ . "/../functions/pesan.php"); ?>
<?php require(__DIR__ . "/../functions/pemasukan/index.php"); ?>
<?php require(__DIR__ . "/../functions/pengeluaran/index.php"); ?>
<?php require(__DIR__ . "/../functions/anggaran/index.php"); ?>
<?php require(__DIR__ . "/../functions/cashadvance/index.php"); ?>
<?php require(__DIR__ . "/../functions/jemaat/index.php"); ?>
<?php require(__DIR__ . "/../components/index.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php echo templateHeader("Laporan") ?>

<body id="page-top">
    <?php require(__DIR__ . '/../components/sidebar.php'); ?>
    <!-- Main Content -->
    <div id="content">
        <?php require(__DIR__ . '/../components/navbar.php'); ?>
        <!-- DataTales Example -->
        <div class="p-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Laporan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0" style="height: 50%;">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle; text-align: center;">No.urut</th>
                                    <th>Nama</th>
                                    <th>Jumlah Total Uang</th>
                                    <th style="vertical-align: middle; text-align: center;">Download Doc</th>
                                    <th style="vertical-align: middle; text-align: center;">Download Excel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;">1</td>
                                    <td style="vertical-align: middle;">Pemasukan</td>

                                    <td style="vertical-align: middle;"><?= menjumlahkanJumlahPemasukan()[0]['jumlah'] ?></td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <a href="../functions/pemasukan/export-pemasukan.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Update Data Laporan Pemasukan</a> ||
                                        <a href="../functions/pemasukan/LaporanPemasukan.docx" download>
                                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><em class="fas fa-download fa-sm text-white-50"></em> Download Laporan Pemasukan</button>
                                        </a>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <a href="../functions/pemasukan/export-pemasukan-excel.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Download Laporan Pemasukan Excel</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;">2</td>
                                    <td style="vertical-align: middle;">Pengeluaran</td>

                                    <td style="vertical-align: middle;"><?= menjumlahkanJumlahPengeluaran()[0]['jumlah'] ?></td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <a href="../functions/pengeluaran/export-pengeluaran.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Update Data Laporan Pengeluaran</a> ||
                                        <a href="../functions/pengeluaran/LaporanPengeluaran.docx" download>
                                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><em class="fas fa-download fa-sm text-white-50"></em> Download Laporan Pengeluaran</button>
                                        </a>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <a href="../functions/pengeluaran/export-pengeluaran-excel.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Downlad Laporan Pengeluaran Excel</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;">3</td>
                                    <td style="vertical-align: middle;">Anggaran</td>

                                    <td style="vertical-align: middle;"><?= menjumlahkanJumlahAnggaran()['jumlah'] ?></td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <a href="../functions/anggaran/export-anggaran.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Update Data Laporan Anggaran</a> ||
                                        <a href="../functions/anggaran/LaporanAnggaran.docx" download>
                                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><em class="fas fa-download fa-sm text-white-50"></em> Download Laporan Anggaran</button>
                                        </a>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <a href="../functions/anggaran/export-anggaran-excel.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Download Laporan Anggaran Excel</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;">4</td>
                                    <td style="vertical-align: middle;">Keseluruhan</td>

                                    <td style="vertical-align: middle;"><?= (int)(menjumlahkanJumlahPemasukan()[0]['jumlah']) - (int)(menjumlahkanJumlahPengeluaran()[0]['jumlah'])
                                                                        ?></td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <a href="../functions/export-keseluruhan.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Update Data Laporan Keseluruhan</a> ||
                                        <a href="../functions/LaporanKeseluruhan.docx" download>
                                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><em class="fas fa-download fa-sm text-white-50"></em> Download Laporan Keseluruhan</button>
                                        </a>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <a href="../functions/export-keseluruhan-excel.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Download Laporan Keseluruhan</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="pl-3 pr-3">
                    <hr>
                    <h6>*) Untuk mendapatkan data laporan terbaru, tekan tombol<b>"Update Data Laporan.."</b> terlebih dahulu, Kemudian tekan baru <b>"Download laporan...."</b> </h6>
                    <hr>
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
    <?php $semuaJemaatString = json_encode($semuaJemaatIddanNama); ?>
    <script type="text/javascript">
        <?php echo "var jsSemuaPemasukan ='$semuaJemaatString';"; ?>

        function renameKey(obj, oldKey, newKey) {
            obj[newKey] = obj[oldKey];
            delete obj[oldKey];
        }
        var dataJsonJemaat = JSON.parse(jsSemuaPemasukan);
        for (let index = 0; index < dataJsonJemaat.length; index++) {
            renameKey(dataJsonJemaat[index], "id_jemaat", "value");
            renameKey(dataJsonJemaat[index], "nama", "label");
        }
        $(function() {
            var data = dataJsonJemaat;
            $("#nama-jemaat").autocomplete({
                source: data
            });
        });
        var formPemasukan = document.getElementById("form-pemasukan");
        $(".btn-to-toggle-form").click(function() {
            if (formPemasukan.classList.contains("d-none")) {
                formPemasukan.classList.remove("d-none");
            } else {
                formPemasukan.classList.add("d-none");
            }
        });
    </script>
</body>

</html>