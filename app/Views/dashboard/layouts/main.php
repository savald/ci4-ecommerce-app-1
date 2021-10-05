<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="assets/css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/mystyle.css">
  <link rel="stylesheet" type="text/css" href="assets/css/trix.css">
  <script type="text/javascript" src="assets/js/trix.js"></script>
  <style>
    trix-toolbar [data-trix-button-group="file-tools"],
    trix-toolbar [data-trix-button-group="history-tools"] {
      display: none;
    }
  </style>

  <title>Dashboard Template · Bootstrap v5.1</title>

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
          <h1 class="mt-4"><?= session()->get('name'); ?></h1>
          <hr>
          <?= $this->renderSection('content') ?>
        </div>
      </main>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="assets/js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/js/demo/chart-area-demo.js"></script>
  <script src="assets/js/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="assets/js/datatables-simple-demo.js"></script>
  <script>
    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault()
    })
  </script>
</body>

</html>