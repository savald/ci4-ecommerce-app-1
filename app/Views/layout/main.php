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
  <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal@4/minimal.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  <title><?= $title; ?></title>
</head>

<body>

  <!-- <?= $this->include('partials/_navbar') ?> -->

  <!-- <h1>Test toast</h1> -->
  <!-- <button class="btn btn-success" id="myBtn">My Btn</button> -->

  <div class="toast-container position-fixed p-3 start-50 translate-middle" id="toastPlacement" style="top: 15%; z-index: 1080;">
    <div class="toast align-items-center" id="myToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000" style="width: 200px;">
      <div class="toast-body text-center">
        <!-- message -->
      </div>
    </div>
  </div>
  <?= $this->renderSection('content') ?>
  <!-- <? // $this->include('partials/_footer') 
        ?> -->


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
  </script>

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      $("#myBtn").click(function() {
        $("#myToast").toast("show");
      });
    });
  </script>

  <script src="<?= base_url('assets/js/myscript.js'); ?>"></script>

</body>

</html>