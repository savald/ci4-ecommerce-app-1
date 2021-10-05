<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-lg-4">
      <main class="form-signin">
        <h1 class="h3 mb-3 fw-normal row justify-content-center">Login</h1>
        <?php $validation =  \Config\Services::validation(); ?>

        <?php if (!empty(session()->getFlashdata('error'))) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error'); ?>
          </div>
        <?php endif; ?>
        <form action="/login" method="post">
          <?= csrf_field() ?>
          <div class="form-floating">
            <input type="email" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="Email" value="<?= old('email'); ?>">
            <label for="floatingInput">Email</label>
            <div class="invalid-feedback">
              <?= $validation->getError('email'); ?>
            </div>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="floatingPassword" placeholder="Password" autocomplete="off">
            <label for="floatingPassword">Password</label>
            <div class="invalid-feedback">
              <?= $validation->getError('password'); ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </div>
        </form>
        <small class="text-center d-block mt-3">Not register yet? <a href="/register">Register Now!</a></small>

      </main>
    </div>
  </div>
</div>
<?= $this->endSection() ?>