<?php require(__DIR__ . "/../functions/pesan.php"); ?>
<?php require(__DIR__ . "/../functions/proses-login.php"); ?>
<?php require(__DIR__ . "/../components/index.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php echo templateHeader("Login") ?>

<body style="background: linear-gradient(90deg, #FC466B 0%, #3F5EFB 100%);">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-6 col-md-4">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <!-- Nested Row within Card Body -->
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
            </div>
            <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="form-group">
                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email...">
              </div>
              <div class="form-group">
                <input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password..">
              </div>
              <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Masuk">
            </form>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require(__DIR__ . '/../components/footer.php'); ?>
  <?php require(__DIR__ . '/../components/script.php'); ?>
</body>
</html>