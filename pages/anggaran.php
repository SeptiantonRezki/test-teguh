<?php require(__DIR__ . "/../functions/cek-sesi.php"); ?>
<?php require(__DIR__ . "/../functions/pesan.php"); ?>
<?php require(__DIR__ . "/../functions/cashadvance/index.php"); ?>
<?php require(__DIR__ . "/../functions/anggaran/index.php"); ?>
<?php require(__DIR__ . "/../functions/tahunanggaran/index.php"); ?>
<?php require(__DIR__ . "/../functions/departemen/index.php"); ?>
<?php require(__DIR__ . "/../components/index.php"); ?>

<!DOCTYPE html>
<html lang="en">
<?php echo templateHeader("Anggaran") ?>

<body>
    <?php require(__DIR__ . '/../components/sidebar.php'); ?>
    <!-- Main Content -->
    <div id="content">
        <?php require(__DIR__ . '/../components/navbar.php'); ?>
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Anggaran</h1>
            <hr>
            <button type="button" class="btn btn-success btn-to-toggle-form" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><em class="fa fa-plus"> Anggaran</em></button><br>
            <div id="form-tambah-data" class="d-none">
                <div>
                    <hr>
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Pemasukan</h4>
                            <button type="button" class="close btn-to-toggle-form" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- create form Anggaran with new value input id_departemen	id_tahunanggaran	tanggal_mulai	tanggal_selesai	namaanggaran	tempatanggaran	penanggungjawab	jumlah	sisa	status_persetujuan-->
                        <div class="modal-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <label for="select-tahun-anggaran">
                                        <small class="text-muted">Data tidak bisa di hapus jika Status Persetujuan <b>"Sudah Disetujui" / "Diterima"</b></small>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="select-departemen">Departemen</label>
                                    <input class="form-control" id="select-departemen" name="id_departemen" placeholder="Masukkan Nama Departemen">
                                </div>
                                <div class="form-group">
                                    <label for="select-tahun-anggaran">Tahun Anggaran</label>
                                    <input class="form-control" id="select-tahun-anggaran" name="id_tahunanggaran" placeholder="Masukkan Tahun Anggaran">
                                    <small class="form-text text-muted">Hati-hati memasukkan data tahun anggaran, karena tidak akan bisa dirubah lagi</small>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                                </div>
                                <div class="form-group">
                                    <label for="namaanggaran">Nama Anggaran</label>
                                    <input type="text" class="form-control" id="namaanggaran" name="namaanggaran" value="-">
                                </div>
                                <div class="form-group">
                                    <label for="tempatanggaran">Tempat Anggaran</label>
                                    <input type="text" class="form-control" id="tempatanggaran" name="tempatanggaran" value="-">
                                </div>
                                <div class="form-group">
                                    <label for="penanggungjawab">Penanggung Jawab</label>
                                    <input type="text" class="form-control" id="penanggungjawab" name="penanggungjawab" value="-">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value=0>
                                    <small class="form-text text-muted"><b>Hati-hati memasukkan data jumlah, karena tidak akan bisa dirubah lagi</b></small>
                                </div>
                                <div class="form-group">
                                    <label for="status_persetujuan">Status Persetujuan</label>
                                    <select class="form-control" id="status_persetujuan" name="status_persetujuan">
                                        <option value="ditolak">Belum Disetujui</option>
                                        <option value="diterima">Sudah Disetujui</option>
                                    </select>
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
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Anggaran</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="height: 50%;">
                            <thead>
                                <tr>
                                    <th>No.urut</th>
                                    <th>Nama Departemen</th>
                                    <th>Tahun Anggaran</th>
                                    <th>Nama Anggaran</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Tempat Anggaran</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Jumlah</th>
                                    <th>Sisa</th>
                                    <th>Status Persetujuan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($semuaAnggaranDenganNamaDepartemenDanTahunAnggaranArray as $row) { ?>
                                    <tr>
                                        <td style="vertical-align: middle; text-align: center;"><?php echo $i++;  ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['nama_departemen']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['tahun_anggaran']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['namaanggaran']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo date('d F Y', strtotime($row['tanggal_mulai']));  ?></td>
                                        <td style="vertical-align: middle;"><?php echo date('d F Y', strtotime($row['tanggal_selesai']));  ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['tempatanggaran']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['penanggungjawab']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['jumlah']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['sisa']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['status_persetujuan']; ?></td>
                                        <td style="vertical-align: middle;">
                                            <!-- Button untuk modal -->
                                            <a href="#" type="button" class="fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['id_anggaran']; ?>"></a>
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
    <?php foreach ($semuaAnggaranArray as $row) { ?>
        <div>
            <div id="myModal<?php echo $row['id_anggaran']; ?>" class="modal fade" role="dialog" style="position: absolute;">
                <div class="modal-dialog">
                    <!-- konten modal-->
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Cash Advance</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- body modal -->
                        <div class="modal-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <label for="id_departemen">Nama Departemen</label>
                                    <select class="form-control" id="id_departemen" name="id_departemen" readonly>
                                        <?php foreach ($semuaDepartemenArray as $rowDepartemen) { ?>
                                            <option value="<?php echo $rowDepartemen['id_departemen']; ?>" <?php echo $rowDepartemen['id_departemen'] == $row['id_departemen'] ? 'selected' : 'disabled'; ?>><?php echo $rowDepartemen['nama_departemen']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small class="form-text text-muted">Data ini tidak bisa dirubah!</small>
                                </div>
                                <div class="form-group">
                                    <label for="id_tahunanggaran">Tahun Anggaran</label>
                                    <select class="form-control" id="id_tahunanggaran" name="id_tahunanggaran" readonly>
                                        <?php foreach ($semuaTahunAnggaranArray as $rowTahunAnggaran) { ?>
                                            <option value="<?php echo $rowTahunAnggaran['id_tahunanggaran']; ?>" <?php echo $rowTahunAnggaran['id_tahunanggaran'] == $row['id_tahunanggaran'] ? 'selected' : 'disabled'; ?>><?php echo $rowTahunAnggaran['tahun_anggaran']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <small class="form-text text-muted">Data ini tidak bisa dirubah!</small>
                                </div>
                                <div class="form-group">
                                    <label for="namaanggaran">Nama Anggaran</label>
                                    <input type="text" class="form-control" id="namaanggaran" name="namaanggaran" value="<?php echo $row['namaanggaran']; ?>"> </input>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?php echo $row['tanggal_mulai']; ?>"> </input>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="<?php echo $row['tanggal_selesai']; ?>"> </input>
                                </div>
                                <div class="form-group">
                                    <label for="tempatanggaran">Tempat Anggaran</label>
                                    <input type="text" class="form-control" id="tempatanggaran" name="tempatanggaran" value="<?php echo $row['tempatanggaran']; ?>"> </input>
                                </div>
                                <div class="form-group">
                                    <label for="penanggungjawab">Penanggung Jawab</label>
                                    <input type="text" class="form-control" id="penanggungjawab" name="penanggungjawab" value="<?php echo $row['penanggungjawab']; ?>"> </input>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row['jumlah']; ?>" readonly> </input>
                                </div>
                                <div class="form-group">
                                    <label for="sisa">Sisa</label>
                                    <input type="number" class="form-control" id="sisa" name="sisa" value="<?php echo $row['sisa']; ?>" readonly> </input>
                                </div>
                                <div class="form-group">
                                    <label for="status_persetujuan">Status Persetujuan</label>
                                    <select class="form-control" id="status_persetujuan" name="status_persetujuan" <?php echo $row['status_persetujuan'] == "diterima" ? "readonly" : ""; ?>>
                                        <option value="diterima" <?php echo $row['status_persetujuan'] == "diterima" ? "selected" : ""; ?>>Diterima</option>
                                        <option value="ditolak" <?php echo $row['status_persetujuan'] == "ditolak" ? "selected" : "disabled"; ?>>Ditolak</option>
                                    </select>
                                    <small class="form-text text-muted">Setelah <b>diterima / disetujui</b>, data tidak bisa dirubah!</small>
                                </div>
                                <input type="hidden" class="form-control" id="id_anggaran" name="id_anggaran" value="<?php echo $row['id_anggaran']; ?>"> </input>
                                <!-- footer modal -->
                                <div class="modal-footer">
                                    <button type="submit" onclick="return confirm('apakah kamu ingin memperbarui data? Y/N')" type="button" class="btn btn-primary">Edit</button>
                                    <?php if ($row['status_persetujuan'] != "diterima") { ?>
                                        <a onclick="return  confirm('apakah kamu ingin mengahapus data? Y/N')" href="./anggaran.php?id_anggaran=<?php echo $row["id_anggaran"]; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                    <?php } ?>
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
    <?php require(__DIR__ . '/../components/logout-modal.php'); ?>
    <?php require(__DIR__ . '/../components/footer.php'); ?>
    <?php require(__DIR__ . '/../components/script.php'); ?>

    <?php $semuaAnggaranString = json_encode($semuaAnggaranArray); ?>
    <?php $semuaTahunAnggaranString = json_encode($semuaTahunAnggaranArray); ?>
    <?php $semuaDepertemenString = json_encode($semuaDepartemenArray); ?>
    <script type="text/javascript">
        <?php echo "var jsSemuaAnggaran ='$semuaAnggaranString';"; ?>
        <?php echo "var jsSemuaTahunAnggaran ='$semuaTahunAnggaranString';"; ?>
        <?php echo "var jsSemuaDepartemen ='$semuaDepertemenString';"; ?>

        function renameKey(obj, oldKey, newKey) {
            obj[newKey] = obj[oldKey];
            delete obj[oldKey];
        }
        var dataJsonAnggaran = JSON.parse(jsSemuaAnggaran);
        var dataJsonTahunAnggaran = JSON.parse(jsSemuaTahunAnggaran);
        var dataJsonDepartemen = JSON.parse(jsSemuaDepartemen);
        for (let index = 0; index < dataJsonAnggaran.length; index++) {
            renameKey(dataJsonAnggaran[index], "id_anggaran", "value");
            renameKey(dataJsonAnggaran[index], "nama_anggaran", "label");
        }
        for (let index = 0; index < dataJsonTahunAnggaran.length; index++) {
            renameKey(dataJsonTahunAnggaran[index], "id_tahunanggaran", "value");
            renameKey(dataJsonTahunAnggaran[index], "tahun_anggaran", "label");
        }
        for (let index = 0; index < dataJsonDepartemen.length; index++) {
            renameKey(dataJsonDepartemen[index], "id_departemen", "value");
            renameKey(dataJsonDepartemen[index], "nama_departemen", "label");
        }
        $(function() {
            var data = dataJsonTahunAnggaran;
            $("#select-tahun-anggaran").autocomplete({
                source: data
            });
        });
        $(function() {
            var data = dataJsonAnggaran;
            $("#select-anggaran").autocomplete({
                source: data
            });
        });
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