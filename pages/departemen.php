<?php require(__DIR__ . "/../functions/cek-sesi.php"); ?>
<?php require(__DIR__ . "/../functions/pesan.php"); ?>
<?php require(__DIR__ . "/../functions/departemen/index.php"); ?>
<?php require(__DIR__ . "/../components/index.php"); ?>

<!DOCTYPE html>
<html lang="en">
<?php echo templateHeader("Departemen") ?>

<body id="page-top">
    <?php require(__DIR__ . '/../components/sidebar.php'); ?>
    <!-- Main Content -->
    <div id="content">
        <?php require(__DIR__ . '/../components/navbar.php'); ?>
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Departemen</h1>
            <hr>
            <button type="button" class="btn btn-success btn-to-toggle-form" style="margin:5px"><em class="fa fa-plus"> Departemen</em></button><br>
            <div id="form-tambah-data" class="d-none">
                <div>
                    <hr>
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Departemen</h4>
                            <button type="button" class="close btn-to-toggle-form" data-dismiss="modal">&times;</button>
                        </div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="modal-body">
                                <div class="modal-body">
                                    Nama Departemen :
                                    <input type="text" class="form-control" name="nama_departemen">
                                    <hr>
                                    Keterangangan :
                                    <textarea class="form-control" cols="30" rows="10" name="keterangan"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Departemen</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="height: 50%;">
                        <thead>
                            <tr>
                                <th>No.urut</th>
                                <th>Nama Departemen</th>
                                <th>Kode Departemen</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($semuaDepartemenArray as $row) { ?>
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;"><?php echo $i++;  ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['nama_departemen'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['id_departemen'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['keterangan'] ?></td>
                                    <td style="vertical-align: middle;">
                                        <!-- Button untuk modal -->
                                        <a href="#" type="button" class="fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['id_departemen']; ?>"></a>
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
    <?php foreach ($semuaDepartemenArray as $row) { ?>
        <div>
            <div id="myModal<?php echo $row['id_departemen']; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- konten modal-->
                    <div class="modal-content" style="z-index: 99;">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Departemen</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- body modal -->
                        <form action="./departemen.php" method="POST">
                            <div class="modal-body">
                                Nama Departemen :
                                <input type="text" class="form-control" name="nama_departemen" value="<?php echo $row['nama_departemen']; ?>">
                                <hr>                                
                                Kode Departemen :
                                <input type="text" class="form-control"  value="<?php echo $row['id_departemen']; ?>" readonly>
                                <hr>
                                Keterangan :
                                <textarea class="form-control" cols="30" rows="10" name="keterangan"><?php echo $row['keterangan']; ?></textarea>
                                <input type="hidden" name="id_departemen" value="<?php echo $row['id_departemen']; ?>" readonly>
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                                <button type="submit" onclick="return confirm('apakah kamu ingin memperbarui data? Y/N')" type="button" class="btn btn-primary">Edit</button>
                                <a onclick="return  confirm('apakah kamu ingin mengahapus data? Y/N')" href="./departemen.php?id_departemen=<?php echo $row["id_departemen"]; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
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