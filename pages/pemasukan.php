<?php require(__DIR__ . "/../functions/cek-sesi.php"); ?>
<?php require(__DIR__ . "/../functions/pesan.php"); ?>
<?php require(__DIR__ . "/../functions/pemasukan/index.php"); ?>
<?php require(__DIR__ . "/../functions/jemaat/index.php"); ?>
<?php require(__DIR__ . "/../components/index.php"); ?>

<?php // var_dump($semuaPemasukanDenganNamaJemaat);?>

<!DOCTYPE html>
<html lang="en">
<?php echo templateHeader("Pemasukan") ?>


<body id="page-top">
    <?php require(__DIR__ . '/../components/sidebar.php'); ?>
    <!-- Main Content -->
    <div id="content">
        <?php require(__DIR__ . '/../components/navbar.php'); ?>
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Pemasukan</h1>
            <hr>
            <button type="button" class="btn btn-success btn-to-toggle-form" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><em class="fa fa-plus"> Pemasukan</em></button><br>
            <div id="form-pemasukan" class="d-none">
                <div>
                    <hr>
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Pemasukan</h4>
                            <button type="button" class="close btn-to-toggle-form" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- body modal -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama-jemaat">Nama Jemaat</label>
                                    <input class="form-control" id="nama-jemaat" name="id_jemaat" value="-">
                                    <small class="form-text text-muted">Nama Jemaat harus ada</small>

                                </div>

                                <div class="form-group">
                                    <label for="perpuluhan">Perpuluhan</label>
                                    <input type="number" class="form-control" id="perpuluhan" name="perpuluhan" value=0>
                                </div>
                                <div class="form-group">
                                    <label for="syukur">Syukur</label>
                                    <input type="number" class="form-control" id="syukur" name="syukur" value=0>
                                </div>
                                <div class="form-group">
                                    <label for="persembahan">Persembahan</label>
                                    <input type="number" class="form-control" id="persembahan" name="persembahan" value=0>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">Jenis</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis" id="gridRadios1" value="cash" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Cash
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis" id="gridRadios2" value="debit">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Debit
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3">-</textarea>
                                </div>
                                <!-- footer modal -->
                                <div class="modal-footer">
                                    <button type="submit" onclick="return confirm('apakah kamu ingin menambahkan data? Y/N')" type="button" class="btn btn-primary">Tambah</button>
                                </div>
                        </form>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <hr>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pemasukan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="height: 50%;">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle; text-align: center;">No.urut</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Perpuluhan</th>
                                <th>Syukur</th>
                                <th>Persembahan</th>
                                <th>Jumlah</th>
                                <th>Jemaat</th>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($semuaPemasukanDenganNamaJemaat as $row) { ?>
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;"><?php echo $i++;  ?></td>
                                    <td style="vertical-align: middle;"><?php echo date('d F Y', strtotime($row['tanggal'])); ?></td>
                                    <td style="vertical-align: middle;"><?php echo date('H:i:s', strtotime($row['tanggal'])); ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['perpuluhan'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['syukur'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['persembahan'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['jumlah'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['nama'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['jenis'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['keterangan'] ?></td>
                                    <td style="vertical-align: middle;">
                                        <!-- Button untuk modal -->
                                        <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['id_pemasukan']; ?>"></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit Data -->
    <?php foreach ($semuaPemasukanDenganNamaJemaat as $row) { ?>
        <div>
            <div id="myModal<?php echo $row['id_pemasukan']; ?>" class="modal fade" role="dialog" style="position: absolute;">
                <div class="modal-dialog">
                    <!-- konten modal-->
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Pemasukan</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- body modal -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="id_jemaat">Jemaat</label>
                                    <input type="number" class="form-control" readonly id="id_jemaat" name="id_jemaat" value="<?php echo $row['id_jemaat']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="perpuluhan">Perpuluhan</label>
                                    <input type="number" class="form-control" id="perpuluhan" name="perpuluhan" value="<?php echo $row['perpuluhan']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="syukur">Syukur</label>
                                    <input type="number" class="form-control" id="syukur" name="syukur" value="<?php echo $row['syukur']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="persembahan">Persembahan</label>
                                    <input type="number" class="form-control" id="persembahan" name="persembahan" value="<?php echo $row['persembahan']; ?>">
                                </div>
                                <hr>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">Jenis</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis" id="gridRadios1" value="cash" <?php echo $row['jenis'] == "cash" ? "checked" : ""; ?>>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Cash
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis" id="gridRadios2" value="debit" <?php echo $row['jenis'] == "debit" ? "checked" : ""; ?>>
                                                <label class="form-check-label" for="gridRadios2">
                                                    Debit
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="hidden" class="form-control" id="id_pemasukan" name="id_pemasukan" value="<?php echo $row['id_pemasukan']; ?>">
                                <hr>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <!-- create input keterangan multitext -->
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?php echo $row['keterangan']; ?></textarea>
                                </div>
                                <!-- footer modal -->
                                <div class="modal-footer">
                                    <button type="submit" onclick="return confirm('apakah kamu ingin memperbarui data? Y/N')" type="button" class="btn btn-primary">Edit</button>
                                    <a onclick="return  confirm('apakah kamu ingin mengahapus data? Y/N')" href="./pemasukan.php?id_pemasukan=<?php echo $row["id_pemasukan"]; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


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