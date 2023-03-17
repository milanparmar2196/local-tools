<?php echo $this->render('include/header'); ?>

<div class="text-center bg-yellow d-flex align-items-center h-100vh">
    <main class="form-signin w-100 m-auto">
      <form action="<?= base_url('/password_reset') ?>" method="post">
        <img class="mb-2" src="<?= base_url(); ?>/public/images/icons/login-logo.svg" alt="" width="100">
        <h2 class="mb-3 fw-bold">Forgot Password</h2>
    
        <div class="form-container">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@youremail.com" name="email">
          <label for="floatingInput">Email ID</label>
        </div> 
        <button class="w-100 btn btn-primary" type="submit">Forgot Password</button>
      </div>
      </form>
    </main>
  </div>
  </body>
  </html>