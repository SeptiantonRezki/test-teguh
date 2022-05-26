<?php require(__DIR__ . "/../functions/cek-sesi.php"); ?>
<?php require(__DIR__ . "/../functions/pesan.php"); ?>
<?php require(__DIR__ . "/../components/index.php"); ?>
<?php require(__DIR__ . "/../functions/tahunanggaran/index.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php echo templateHeader("Tahun Anggaran") ?>

<body>
    <?php require(__DIR__ . '/../components/sidebar.php'); ?>
    <!-- Main Content -->
    <div id="content">
        <?php require(__DIR__ . '/../components/navbar.php'); ?>
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Tahun Anggaran</h1>
            <hr>
            <button type="button" class="btn btn-success btn-to-toggle-form" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><em class="fa fa-plus"> Tahun Anggaran</em></button><br>
            <hr>
            <div id="form-tambah-data" class="d-none">
                <div>
                    <hr>
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Anggaran</h4>
                            <button type="button" class="close btn-to-toggle-form" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- create form tahun anggaran with value  tahun_anggaran, saldo_anggaran, id_tahunanggaran, keterangan -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="tahun_anggaran">Tahun Anggaran</label>
                                    <input type="text" class="form-control" id="tahun_anggaran" name="tahun_anggaran" placeholder="Tahun Anggaran">
                                    <small class="form-text text-muted">Hati-hati memasukkan data tahun anggaran, karena tidak akan bisa dirubah lagi</small>
                                </div>
                                <div class="form-group">
                                    <label for="saldo_anggaran">Saldo Anggaran</label>
                                    <input type="text" class="form-control" id="saldo_anggaran" name="saldo_anggaran" placeholder="Saldo Anggaran" value=0>
                                    <small class="form-text text-muted">Hati-hati memasukkan data Saldo anggaran, karena tidak akan bisa dirubah lagi</small>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <!-- textarea keterangan -->
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3">-</textarea>
                                </div>
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                                <button type="submit" onclick="return confirm('apakah kamu ingin menambahkan data? Y/N')" class="btn btn-primary">Tambah</button>
                                <button type="button" class="btn btn-danger btn-to-toggle-form" data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                    <hr>
                </div>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Tahun Anggaran</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="height: 50%;">
                            <thead>
                                <tr>
                                    <th>No.urut</th>
                                    <th>Tahun Anggaran</th>
                                    <th>Saldo Anggaran</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($semuaTahunAnggaranArray as $row) { ?>
                                    <tr>
                                        <td style="vertical-align: middle; text-align: center;"><?php echo $i++;  ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['tahun_anggaran']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['saldo_anggaran']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['keterangan']; ?></td>
                                        <td style="vertical-align: middle;">
                                            <!-- Button untuk modal -->
                                            <a href="#" type="button" class="fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['id_tahunanggaran']; ?>"></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <!-- Modal Edit Data -->
    <?php foreach ($semuaTahunAnggaranArray as $row) { ?>
        <div>
            <div id="myModal<?php echo $row['id_tahunanggaran']; ?>" class="modal fade" role="dialog" style="position: absolute;">
                <div class="modal-dialog">
                    <!-- konten modal-->
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Tahun Anggaran</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- body modal -->
                        <div class="modal-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <label for="tahun_anggaran">Tahun Anggaran</label>
                                    <input type="text" class="form-control" id="tahun_anggaran" name="tahun_anggaran" value="<?php echo $row['tahun_anggaran']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="saldo_anggaran">Saldo Anggaran</label>
                                    <input type="text" class="form-control" id="saldo_anggaran" name="saldo_anggaran" value="<?php echo $row['saldo_anggaran']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tambah_anggaran">Tambah Anggaran</label>
                                    <input type="text" class="form-control" id="tambah_anggaran" name="tambah_anggaran" value=0>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <!-- textarea keterangan -->
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?php echo $row['keterangan']; ?></textarea>
                                </div>
                                <input type="hidden" class="form-control" id="id_tahunanggaran" name="id_tahunanggaran" value="<?php echo $row['id_tahunanggaran']; ?>">

                                
                                <!-- footer modal -->
                                <div class="modal-footer">
                                    <button type="submit" onclick="return confirm('apakah kamu ingin memperbarui data? Y/N')" type="button" class="btn btn-primary">Edit</button>
                                    <a onclick="return  confirm('Apakah Anda ingin mengahapus data? Y/N \n--------------------- \nJika ada data Anggaran dan Cash Advance terkait, Data Tahun Anggaran Tidak Bisa Dihapus!')" href="./tahunanggaran.php?id_tahunanggaran=<?php echo $row["id_tahunanggaran"]; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
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
    <script type="text/javascript">
        var formTambahData = document.getElementById("form-tambah-data");
        $(".btn-to-toggle-form").click(function() {
            if (formTambahData.classList.contains("d-none")) {
                formTambahData.classList.remove("d-none");
            } else {
                formTambahData.classList.add("d-none");
            }
        });
        $("#tahun_anggaran").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true //to close picker once year is selected
        });
    </script>

</body>

</html>