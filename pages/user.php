<?php require(__DIR__ . "/../functions/cek-sesi.php"); ?>
<?php require(__DIR__ . "/../functions/pesan.php"); ?>
<?php require(__DIR__ . "/../functions/user/index.php"); ?>
<?php require(__DIR__ . "/../components/index.php"); ?>

<!DOCTYPE html>
<html lang="en">
<?php echo templateHeader("Admin") ?>

<body>
    <?php require(__DIR__ . '/../components/sidebar.php'); ?>
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