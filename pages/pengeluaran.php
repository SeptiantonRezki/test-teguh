<?php require(__DIR__ . "/../functions/cek-sesi.php"); ?>
<?php require(__DIR__ . "/../functions/pesan.php"); ?>
<?php require(__DIR__ . "/../functions/pengeluaran/index.php"); ?>
<?php require(__DIR__ . "/../components/index.php"); ?>
<?php require(__DIR__ . "/../functions/departemen/index.php"); ?>


<!DOCTYPE html>
<html lang="en">
<?php echo templateHeader("Pengeluaran") ?>

<body>
    <?php require(__DIR__ . '/../components/sidebar.php'); ?>
    <!-- Main Content -->
    <div id="content">
        <?php require(__DIR__ . '/../components/navbar.php'); ?>
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Pengeluaran</h1>
            <hr>
            <button type="button" class="btn btn-success btn-to-toggle-form" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><em class="fa fa-plus"> Pengeluaran</em></button><br>
            <div id="form-tambah-data" class="d-none">
                <div>
                    <hr>
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Pengeluaran</h4>
                            <button type="button" class="close btn-to-toggle-form" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                <div class="form-group">
                                    <label for="select-departemen">Departemen</label>
                                    <input class="form-control" id="select-departemen" name="id_departemen" placeholder="Masukkan Nama Departemen" value="-">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value=0>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">-</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
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
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pengeluaran</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="height: 50%;">
                            <thead>
                                <tr>
                                    <th>No.urut</th>
                                    <th>Nama Departemen</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($semuaPengeluranDenganNamaDepartemenArray as $row) { ?>
                                    <tr>
                                        <td style="vertical-align: middle; text-align: center;"><?php echo $i++;  ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['nama_departemen']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo date('d F Y', strtotime($row['tanggal']));  ?></td>
                                        <td style="vertical-align: middle;"><?php echo date('H:i:s', strtotime($row['tanggal'])); ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['jumlah']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['keterangan']; ?></td>
                                        <td style="vertical-align: middle;">
                                            <!-- Button untuk modal -->
                                            <a href="#" type="button" class="fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['id_pengeluaran']; ?>"></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($semuaPengeluranArray as $row) { ?>
        <div>
            <div id="myModal<?php echo $row['id_pengeluaran']; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- konten modal-->
                    <div class="modal-content" style="z-index: 99;">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Pengeluaran</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- body modal -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Departemen</label>
                                    <input class="form-control" name="id_departemen" placeholder="Masukkan Nama Departemen" value="<?php echo $row['id_departemen']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row['jumlah']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?php echo $row['keterangan']; ?></textarea>
                                </div>
                                <input type="hidden" name="id_pengeluaran" value="<?php echo $row['id_pengeluaran']; ?>" readonly>
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                                <button type="submit" onclick="return confirm('apakah kamu ingin memperbarui data? Y/N')" type="button" class="btn btn-primary">Edit</button>
                                <a onclick="return  confirm('apakah kamu ingin mengahapus data? Y/N')" href="./pengeluaran.php?id_pengeluaran=<?php echo $row["id_pengeluaran"]; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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
    <?php $semuaDepertemenString = json_encode($semuaDepartemenArray); ?>
    <script type="text/javascript">
        <?php echo "var jsSemuaDepartemen ='$semuaDepertemenString';"; ?>

        function renameKey(obj, oldKey, newKey) {
            obj[newKey] = obj[oldKey];
            delete obj[oldKey];
        }
        var dataJsonDepartemen = JSON.parse(jsSemuaDepartemen);
        for (let index = 0; index < dataJsonDepartemen.length; index++) {
            renameKey(dataJsonDepartemen[index], "id_departemen", "value");
            renameKey(dataJsonDepartemen[index], "nama_departemen", "label");
        }
        $(function() {
            var data = dataJsonDepartemen;
            $("#select-departemen").autocomplete({
                source: data
            });
        });
        var formTambahData = document.getElementById("form-tambah-data");
        $(".btn-to-toggle-form").click(function() {
            if (formTambahData.classList.contains("d-none")) {
                formTambahData.classList.remove("d-none");
            } else {
                formTambahData.classList.add("d-none");
            }
        });
    </script>

</body>

</html>