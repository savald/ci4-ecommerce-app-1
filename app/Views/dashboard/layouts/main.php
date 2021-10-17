<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="<?= base_url('assets/css/styles.css'); ?>" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/mystyle.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/trix.css'); ?>">
  <script type="text/javascript" src="<?= base_url('assets/js/trix.js'); ?>"></script>
  <style>
    trix-toolbar [data-trix-button-group="file-tools"],
    trix-toolbar [data-trix-button-group="history-tools"] {
      display: none;
    }
  </style>

  <title>My Dashboard</title>

</head>

<body class="sb-nav-fixed">

  <?= $this->include('dashboard/partials/header') ?>
  
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show position-fixed top-25 start-50 translate-middle-x" style="z-index: 20;" role="alert"><?= session()->getFlashdata('success'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <div id="layoutSidenav">
    <?= $this->include('dashboard/partials/sidebar') ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h4 class="mt-3"><?= $title ?></h4>
          <hr>
          <?= $this->renderSection('content') ?>
        </div>
      </main>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/js/scripts.js'); ?>"></script>
  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/js/mydashboardscript.js'); ?>"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/js/demo/chart-area-demo.js"></script>
  <script src="assets/js/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="assets/js/datatables-simple-demo.js"></script> -->
  <script>
    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault()
    })
  </script>
</body>

</html>