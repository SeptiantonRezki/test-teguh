<?php require(__DIR__ . "/../functions/cek-sesi.php"); ?>
<?php require(__DIR__ . "/../functions/pesan.php"); ?>
<?php require(__DIR__ . "/../functions/cashadvance/index.php"); ?>
<?php require(__DIR__ . "/../functions/anggaran/index.php"); ?>
<?php require(__DIR__ . "/../functions/tahunanggaran/index.php"); ?>
<?php require(__DIR__ . "/../functions/departemen/index.php"); ?>
<?php require(__DIR__ . "/../components/index.php"); ?>


<!DOCTYPE html>
<html lang="en">
<?php echo templateHeader("Cash Advance") ?>

<body>
    <?php require(__DIR__ . '/../components/sidebar.php'); ?>
    <!-- Main Content -->
    <div id="content">
        <?php require(__DIR__ . '/../components/navbar.php'); ?>
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Cash Advance</h1>
            <hr>
            <button type="button" class="btn btn-success btn-to-toggle-form" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><em class="fa fa-plus"> Cash Advance</em></button><br>
            <hr>
            <div id="form-tambah-data" class="d-none">
                <div>
                    <hr>
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Cash Advance</h4>
                            <button type="button" class="close btn-to-toggle-form" data-dismiss="modal">&times;</button>
                        </div>


                        <!-- create form cash advance with new value input id_tahunanggaran, id_anggaran, keterangan, penanggung_jawab, tanggal, status_persetujuan, jumlah, status_pengambilan, id_departemen-->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="select-tahun-anggaran">
                                        <small class="text-muted">Data tidak bisa di hapus jika Status Persetujuan <b>"Disetujui" / "Diterima"</b> dan Status Pengambilan <b>"Sudah Diambil" / "Selesai"</b> </small>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="select-tahun-anggaran">Tahun Anggaran</label>
                                    <input class="form-control" id="select-tahun-anggaran" name="id_tahunanggaran" placeholder="Masukkan Tahun Anggaran">
                                    <small class="form-text text-muted">Hati-hati memasukkan data tahun anggaran, karena tidak akan bisa dirubah lagi</small>
                                </div>
                                <div class="form-group">
                                    <label for="select-anggaran">Anggaran</label>
                                    <input class="form-control" id="select-anggaran" name="id_anggaran" placeholder="Masukkan Nama Anggaran">
                                    <small class="form-text text-muted">Hati-hati memasukkan data anggaran, karena tidak akan bisa dirubah lagi</small>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <!-- textarea keterangan -->
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">-</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="penanggung_jawab">Penanggung Jawab</label>
                                    <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" placeholder="Penanggung Jawab" value="-">
                                </div>
                                <div class="form-group">
                                    <label for="status_persetujuan">Status Persetujuan</label>
                                    <select class="form-control" id="status_persetujuan" name="status_persetujuan">
                                        <option disabled>Pilih Status Persetujuan</option>
                                        <option value="diterima">Disetujui</option>
                                        <option value="ditolak" selected>Ditolak</option>
                                    </select>
                                    <small class="form-text text-muted">Hati-hati memasukkan data Status Persetujuan, karena tidak akan bisa dirubah lagi jika sudah <b>Disetujui</b></small>

                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" value=0>
                                    <small class="form-text text-muted">Hati-hati memasukkan data jumlah, karena tidak akan bisa dirubah lagi</small>
                                </div>
                                <div class="form-group">
                                    <label for="status_pengambilan">Status Pengambilan</label>
                                    <select class="form-control" id="status_pengambilan" name="status_pengambilan">
                                        <option disabled>Pilih Status Pengambilan</option>
                                        <option value="selesai">Sudah Diambil</option>
                                        <option value="belum" selected>Belum Diambil</option>
                                    </select>
                                    <small class="form-text text-muted">Hati-hati memasukkan data Status Pengambilan, karena tidak akan bisa dirubah lagi jika sudah <b>Sudah Diambil</b></small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-to-toggle-form" data-dismiss="modal">Close</button>
                                <button onclick="return confirm('apakah kamu ingin menambahkan data? Y/N')" type="submit" class="btn btn-primary" name="submit">Tambah</button>
                            </div>
                        </form>
                    </div>
                    <hr>
                </div>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Cash Advance</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="height: 50%;">
                            <thead>
                                <tr>
                                    <th>No.urut</th>
                                    <th>Tahun Anggaran</th>
                                    <th>Nama Anggaran</th>
                                    <th>Keterangan</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Status Persetujuan</th>
                                    <th>Jumlah</th>
                                    <th>Status Pengembalian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($semuaCashAdvanceDenganTahunDanNamaAnggaranArray as $row) { ?>
                                    <tr>
                                        <td style="vertical-align: middle; text-align: center;"><?php echo $i++;  ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['tahun_anggaran']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['namaanggaran']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['keterangan']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['penanggung_jawab']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo date('d F Y', strtotime($row['tanggal']));  ?></td>
                                        <td style="vertical-align: middle;"><?php echo date('H:i:s', strtotime($row['tanggal'])); ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['status_persetujuan']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['jumlah']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['status_pengambilan']; ?></td>
                                        <td style="vertical-align: middle;">
                                            <!-- Button untuk modal -->
                                            <a href="#" type="button" class="fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['id_cashadvance']; ?>"></a>
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
    <?php foreach ($semuaCashAdvanceArray as $row) { ?>
        <div>
            <div id="myModal<?php echo $row['id_cashadvance']; ?>" class="modal fade" role="dialog" style="position: absolute;">
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
                                <input type="text" class="form-control" id="id_cashadvance" name="id_cashadvance" value="<?php echo $row['id_cashadvance']; ?>" readonly hidden>
                                <div class="form-group">
                                    <label for="id_tahunanggaran">ID Tahun Anggaran</label>
                                    <input type="text" class="form-control" id="id_tahunanggaran" name="id_tahunanggaran" value="<?php echo $row['id_tahunanggaran']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="id_anggaran">ID Anggaran</label>
                                    <input type="text" class="form-control" id="id_anggaran" name="id_anggaran" value="<?php echo $row['id_anggaran']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <!-- keterangan textarea -->
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?php echo $row['keterangan']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="penanggung_jawab">Penanggung Jawab</label>
                                    <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="<?php echo $row['penanggung_jawab']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="status_persetujuan">Status Persetujuan</label>
                                    <select class="form-control" id="status_persetujuan" name="status_persetujuan" <?php echo $row['status_persetujuan'] == "diterima" ? "readonly" : ""; ?>>
                                        <option value="diterima" <?php echo $row['status_persetujuan'] == "diterima" ? "selected" : ""; ?>>Diterima</option>
                                        <option value="ditolak" <?php echo $row['status_persetujuan'] == "ditolak" ? "selected" : "disabled"; ?>>Ditolak</option>
                                    </select>
                                    <small class="form-text text-muted">Setelah <b>diterima / disetujui</b>, data tidak bisa dirubah!</small>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row['jumlah']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="status_pengambilan">Status Pengembalian</label>
                                    <select class="form-control" id="status_pengambilan" name="status_pengambilan" <?php echo $row['status_pengambilan'] == "selesai" ? "readonly" : ""; ?>>
                                        <option value="belum" <?php echo $row['status_pengambilan'] == "belum" ? "selected" : "disabled"; ?>>Belum</option>
                                        <option value="selesai" <?php echo $row['status_pengambilan'] == "selesai" ? "selected" : ""; ?>>Selesai</option>
                                    </select>
                                    <small class="form-text text-muted">Setelah <b>diterima / disetujui</b>, data tidak bisa dirubah!</small>
                                </div>
                                <!-- footer modal -->
                                <div class="modal-footer">
                                    <button type="submit" onclick="return confirm('apakah kamu ingin memperbarui data? Y/N')" type="button" class="btn btn-primary">Edit</button>

                                    <?php if ($row['status_pengambilan'] != "selesai" && $row['status_persetujuan'] != "diterima") { ?>
                                        <a onclick="return  confirm('apakah kamu ingin mengahapus data? Y/N')" href="./cashadvance.php?id_cashadvance=<?php echo $row["id_cashadvance"]; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
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
    <script type="text/javascript">
        <?php echo "var jsSemuaAnggaran ='$semuaAnggaranString';"; ?>
        <?php echo "var jsSemuaTahunAnggaran ='$semuaTahunAnggaranString';"; ?>

        function renameKey(obj, oldKey, newKey) {
            obj[newKey] = obj[oldKey];
            delete obj[oldKey];
        }
        var dataJsonAnggaran = JSON.parse(jsSemuaAnggaran);
        var dataJsonTahunAnggaran = JSON.parse(jsSemuaTahunAnggaran);
        for (let index = 0; index < dataJsonAnggaran.length; index++) {
            renameKey(dataJsonAnggaran[index], "id_anggaran", "value");
            renameKey(dataJsonAnggaran[index], "namaanggaran", "label");
        }
        for (let index = 0; index < dataJsonTahunAnggaran.length; index++) {
            renameKey(dataJsonTahunAnggaran[index], "id_tahunanggaran", "value");
            renameKey(dataJsonTahunAnggaran[index], "tahun_anggaran", "label");
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