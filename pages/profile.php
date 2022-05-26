<?php require(__DIR__ . "/../functions/cek-sesi.php"); ?>
<?php require(__DIR__ . "/../functions/pesan.php"); ?>
<?php require(__DIR__ . "/../components/index.php"); ?>
<?php require(__DIR__ . "/../functions/user/index.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php echo templateHeader("Profile") ?>

<body>
    <?php require(__DIR__ . '/../components/sidebar.php'); ?>
    <!-- Main Content -->
    <div id="content">
        <?php require(__DIR__ . '/../components/navbar.php'); ?>
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0" style="height: 50%;">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th style="vertical-align: middle;  text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td><?= $_SESSION['nama'] ?></td>
                                <td><?= $_SESSION['email'] ?></td>
                                <td style="vertical-align: middle;  text-align: center;">
                                    <!-- Button untuk modal -->
                                    <a href="#" type="button" class="fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal1">Edit Profile Tanpa Password</a>
                                    ||
                                    <a href="#" type="button" class="fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal2">Edit Profile Dan Password</a>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <div id="myModal1" class="modal fade" role="dialog" style="position: absolute;">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Profile</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $_SESSION['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['email'] ?>">
                        </div>

                        <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $_SESSION['id'] ?>">

                        <!-- footer modal -->
                        <div class="modal-footer">
                            <button type="submit" onclick="return confirm('apakah kamu ingin memperbarui data? Y/N')" type="button" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal2" class="modal fade" role="dialog" style="position: absolute;">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Profile</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $_SESSION['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password_sebelumnya">Password Sebelumnya</label>
                            <input type="password" class="form-control" id="password_sebelumnya" name="password_sebelumnya">
                        </div>
                        <div class="form-group">
                            <label for="password_sekarang">Password Sekarang / Diganti</label>
                            <input type="password" class="form-control" id="password_sekarang" name="password_sekarang">
                        </div>
                        <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $_SESSION['id'] ?>">

                        <!-- footer modal -->
                        <div class="modal-footer">
                            <button type="submit" onclick="return confirm('apakah kamu ingin memperbarui data? Y/N')" type="button" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
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