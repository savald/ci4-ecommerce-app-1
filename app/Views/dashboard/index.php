<?= $this->extend('dashboard/layouts/main') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-6">
    <form action="" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control form-control-sm" id="name" placeholder="Your name">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control form-control-sm" id="email" placeholder="contact@example.com">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Store Name</label>
        <input type="text" name="name" class="form-control form-control-sm" id="name" placeholder="Your name">
      </div>
      <div class="mb-3">
        <div>
          <label for="name" class="form-label">Gender</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" value="male" name="flexRadioDefault" id="male" checked>
          <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" value="female" name="flexRadioDefault" id="female">
          <label class="form-check-label" for="female">Female</label>
        </div>
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control form-control-sm" name="address" id="address" rows="3"></textarea>
      </div>
    </form>
  </div>
  <div class="col-md-3">
    <div class="mb-3">
      <img src="assets/images/fashion.jpg" class="card-img-top w-75 h-75 border mx-auto d-block" alt="...">
      <div class="mt-3">
        <input class="form-control form-control-sm " type="file" id="formFile">
      </div>
    </div>
    <button type="button" class="btn btn-primary w-100 btn-sm shadow">Update <i class="bi bi-upload"></i></button>
  </div>
</div>

<?= $this->endSection() ?>