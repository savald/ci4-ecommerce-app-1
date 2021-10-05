<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= base_url('assets/css/mystyle.css'); ?>">

  <title>E-Commerce</title>
</head>

<body>
  <?= $this->include('partials/navbar') ?>

  <!-- <div class="toast align-items-center text-white bg-primary border-0 position-fixed top-25 start-50 translate-middle-x" style="z-index: 11;" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        Hello, world! This is a toast message.
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div> -->

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show position-fixed top-25 start-50 translate-middle-x" style="z-index: 20;" role="alert"><?= session()->getFlashdata('success'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <?= $this->include('partials/modal') ?>

  <?= $this->renderSection('content') ?>

  <?= $this->include('partials/footer') ?>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
  </script>
  <script>
    const baseURL = "<?= base_url() ?>";
  </script>
  <script src="<?= base_url('assets/js/myscript.js'); ?>"></script>

  <script>
    // window.onload = (event) => {
    var option = {
      animation: true,
      delay: 2000
    };

    function Toasty() {
      var toast = document.querySelector('.toast');
      console.log(toast);
      var toastElement = new bootstrap.Toast(toast, option);

      toastElement.show();
    }


    // }
  </script>
</body>

</html>