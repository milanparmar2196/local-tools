<?php echo $this->render('include/header'); ?>

<div class="text-center bg-yellow d-flex align-items-center h-100vh">
<main class="form-signin w-100 m-auto ">
        <form action="<?=base_url('/change_password')?>" method="post">
          <img class="mb-2" src="<?=base_url()?>/public/images/icons/login-logo.svg" alt="" width="100">
          <h2 class="mb-3 fw-bold">Reset Password</h2>
      
          <div class="form-container">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="Enter your email" name="email" required>
            <label for="floatingInput t">Email</label>
          </div> 
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" placeholder="Enter OTP send to your email" required>
            <label for="floatingInput t">Reset OTP</label>
          </div> 
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" placeholder="New Password" name="password" required>
            <label for="floatingInput t">New Password</label>
          </div> 
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" placeholder="Confirm Password" name="confirmpassword" required>
            <label for="floatingInput">Confirm Password</label>
          </div> 
          <button class="w-100 btn btn-primary" type="submit">Reset Password</button>
        </div>
        </form>
      </main>
</div>

<?php echo $this->render('include/footer'); ?>