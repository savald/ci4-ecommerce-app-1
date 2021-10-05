<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <main class="form-registration">
        <h1 class="h3 mb-3 fw-normal row justify-content-center">Register</h1>
        <?php $validation =  \Config\Services::validation(); ?>
        <form action="/register" method="post">
          <?= csrf_field() ?>

          <div class="form-floating">
            <input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" placeholder="Name" value="<?= old('name') ?>">
            <label for="name">Name</label>
            <div id="validationServer03Feedback" class="invalid-feedback">
              <?= $validation->getError('name'); ?>
            </div>
          </div>
          <div class="form-floating">
            <input type="email" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id=" email" placeholder="Email" value="<?= old('email') ?>">
            <label for="email">Email</label>
            <div id="validationServer03Feedback" class="invalid-feedback">
              <?= $validation->getError('email'); ?>
            </div>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id=" password" placeholder="Password" autocomplete="off">
            <label for="password">Password</label>
            <div id="validationServer03Feedback" class="invalid-feedback">
              <?= $validation->getError('password'); ?>
            </div>
          </div>
          <div class="form-floating">
            <input type="password" name="pass_confirm" class="form-control <?= ($validation->hasError('pass_confirm')) ? 'is-invalid' : ''; ?>" id=" pass_confirm" placeholder="Password Confirmation" autocomplete="off">
            <label for="pass_confirm">Confirmation Password</label>
            <div id="validationServer03Feedback" class="invalid-feedback">
              <?= $validation->getError('pass_confirm'); ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary w-100">Register</button>
          </div>
        </form>
        <small class="text-center d-block mt-3">Already registered? <a href="/login">Login!</a></small>
      </main>
    </div>
  </div>
</div>
<?= $this->endSection() ?>