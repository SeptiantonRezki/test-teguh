<?php require(__DIR__ . "/../functions/cek-sesi.php"); ?>
<?php require(__DIR__ . "/../functions/pesan.php"); ?>
<?php require(__DIR__ . "/../functions/jemaat/index.php"); ?>
<?php require(__DIR__ . "/../components/index.php"); ?>

<!DOCTYPE html>
<html lang="en">
<?php echo templateHeader("Jemaat") ?>


<body>
    <?php require(__DIR__ . '/../components/sidebar.php'); ?>

    <!-- Main Content -->
    <div id="content">
        <?php require(__DIR__ . '/../components/navbar.php'); ?>
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Jemaat</h1>
            <hr>
            <button type="button" class="btn btn-success btn-to-toggle-form" style="margin:5px"><em class="fa fa-plus"> Jemaat</em></button><br>
            <div id="form-tambah-data" class="d-none">
                <div>
                    <hr>
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Jemaat</h4>
                            <button type="button" class="close btn-to-toggle-form" data-dismiss="modal">&times;</button>
                        </div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="jemaat">Jemaat</label>
                                    <input type="text" class="form-control" id="jemaat" name="jemaat">
                                </div>
                                <div class="form-group">
                                    <label for="kontak">Kontak</label>
                                    <input type="text" class="form-control" id="kontak" name="kontak">
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
                <h6 class="m-0 font-weight-bold text-primary">Daftar Jemaat</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.urut</th>
                                <th>Nama</th>
                                <th>Kode Jemaat</th>
                                <th>Alamat</th>
                                <th>Jemaat</th>
                                <th>Kontak</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($semuaJemaatArray as $row) { ?>
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;"><?php echo $i++;  ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['nama'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['id_jemaat'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['alamat'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['jemaat'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['kontak'] ?></td>
                                    <td style="vertical-align: middle;">
                                        <!-- Button untuk modal -->
                                        <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['id_jemaat']; ?>"></a>
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
    <!-- Modal Edit Data -->
    <?php foreach ($semuaJemaatArray as $row) { ?>
        <div>
            <div id="myModal<?php echo $row['id_jemaat']; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- konten modal-->
                    <div class="modal-content" style="z-index: 99;">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Jemaat</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- body modal -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kj">Kode Jemaat</label>
                                    <input type="text" class="form-control" id="nama"  value="<?php echo $row['id_jemaat']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $row['alamat']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="jemaat">Jemaat</label>
                                    <input type="text" class="form-control" id="jemaat" name="jemaat" value="<?php echo $row['jemaat']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kontak">Kontak</label>
                                    <input type="text" class="form-control" id="kontak" name="kontak" value="<?php echo $row['kontak']; ?>">
                                </div>
                                <input type="hidden" name="id_jemaat" readonly value="<?php echo $row['id_jemaat']; ?>">
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                                <button type="submit" onclick="return confirm('apakah kamu ingin memperbarui data? Y/N')" type="button" class="btn btn-primary">Edit</button>
                                <a onclick="return  confirm('apakah kamu ingin mengahapus data? Y/N \n--------------------- \nJika ada data terkait, Data Jemaat Tidak Bisa Dihapus!' )" href="./jemaat.php?id_jemaat=<?php echo $row["id_jemaat"]; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
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
        <em class="fas fa-angle-up"></em>
    </a>
    <!-- End of Main Content -->
    <?php require(__DIR__ . '/../components/logout-modal.php'); ?>
    <?php require(__DIR__ . '/../components/footer.php'); ?>
    <?php require(__DIR__ . '/../components/script.php'); ?>
    <script type="text/javascript">
        var formPemasukan = document.getElementById("form-tambah-data");
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