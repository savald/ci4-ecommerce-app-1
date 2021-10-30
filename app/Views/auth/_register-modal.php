<div class="modal modal-register fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Please Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-register">
        <div class="modal-body">
          <?= csrf_field(); ?>
          <div class="form-floating">
            <input type="text" name="name" class="form-control" id="name" placeholder="Fullname">
            <label for="name">Fullname</label>
            <div class="invalid-feedback"></div>
          </div>
          <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="email">Email address</label>
            <div class="invalid-feedback"></div>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            <label for="password">Password</label>
            <div class="invalid-feedback"></div>
          </div>
          <div class="form-floating">
            <input type="password" name="pass_confirm" class="form-control" id="pass_confirm" placeholder="Password">
            <label for="pass_confirm">Confirm Password</label>
            <div class="invalid-feedback"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>