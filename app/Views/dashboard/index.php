<?= $this->extend('dashboard/layouts/main') ?>
<?= $this->section('content') ?>

<form action="/user/update_user" method="post">
  <?php $validation = \Config\Services::validation() ?>
  <?= csrf_field(); ?>
  <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control form-control-sm <?= $validation->hasError('name') ? 'is-invalid' : ''; ?>" id="name" placeholder="Your name" value="<?= old('name') ? old('name') : $user['name']; ?>">
        <div class="invalid-feedback"><?= $validation->getError('name'); ?></div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control form-control-sm <?= $validation->hasError('email') ? 'is-invalid' : ''; ?>" id="email" placeholder="contact@example.com" value="<?= old('email') ? old('email') : $user['email']; ?>">
        <div class="invalid-feedback"><?= $validation->getError('email'); ?></div>
      </div>
      <div class="mb-3">
        <div class="row">
          <div class="col-md-6">
            <label for="password" class="form-label">New Password</label>
            <input type="password" name="password" class="form-control form-control-sm <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" id="password">
            <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
          </div>
          <div class="col-md-6">
            <label for="pass_confirm" class="form-label">New Password Confirmation</label>
            <input type="password" name="pass_confirm" class="form-control form-control-sm <?= $validation->hasError('pass_confirm') ? 'is-invalid' : ''; ?>" id="pass_confirm">
            <div class="invalid-feedback"><?= $validation->getError('pass_confirm'); ?></div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Store Name</label>
        <input type="text" name="store_name" class="form-control form-control-sm" id="name" placeholder="Your store name" value="<?= $user['store_name'] ?? null; ?>">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control form-control-sm" name="address" id="address" rows="3"><?= old('address') ? old('address') : $user['address'] ?? 'Your address...' ?></textarea>
      </div>

    </div>
    <div class="col-md-2">
      <div class="mb-3 ">
        <label class="form-label">Profile Image</label>
        <img src="assets/images/fashion.jpg" class="card-img-top border mx-auto d-block" alt="...">
        <div class="mt-3">
          <input class="form-control form-control-sm  mx-auto" type="file" id="formFile">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <button type="submit" class="btn btn-primary btn-sm shadow w-auto">Save Changes</button>
      </div>
    </div>
  </div>
</form>

<?= $this->endSection() ?>