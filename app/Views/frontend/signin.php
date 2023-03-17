<?php echo $this->render('include/login_header'); ?>
            <section class="login-section pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-7 col-xl-7 flex">
                            <div class="login_img-wrapper">
                                <img src="<?php echo base_url(); ?>/public/assets/img/login-img.png" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-12 col-sm-5 col-xl-5 flex">
                            <div class="form_headeing_area text-center">
                                <h1 class="heading">Sign In</h1>
                                <h4 class="sub-heading">Just sign in if you have an account in here. Enjoy our Website</h4>
                            </div>
                            <div class="form_wrapper">
                            <?php if(session()->getFlashdata('msg')):?>
                                <div class="alert alert-warning">
                                    <?= session()->getFlashdata('msg') ?>
                                </div>
                            <?php endif;?>
                                <form class="form-horizontal" action="<?php echo base_url(); ?>/Home/loginAuth"role="form" multiple>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="info@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" value="Asd1234#$%%">
                                        </div>
                                    </div>
                                    <div class="col d-flex justify-content-center mb-4">
                                        <!-- Checkbox -->
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="form-remember" checked="">
                                          <label class="form-check-label" for="form-remember"> Remember me </label>
                                        </div>
                                        <div class="col">
                                            <!-- Simple link -->
                                            <a href="<?= base_url('/forgot-password'); ?>" class="float-end link">Forgot password?</a>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                        <div class="form-group d-grid gap-2">
                                            <button class="btn btn-primary btn-submit" type="submit">Login</button>
                                        </div>
                                      </div>
                                </form>
                                <div class="col text-center">
                                    <a href="<?php echo base_url(); ?>/register" class="link link-register">If you don’t have an account? Register here</a>
                                </div>
                                <div class="login-with-socials">
                                    <h3 class="lines-on-sides mt-4 mb-4">&nbsp;Instant Signup&nbsp;</h3>
                                </div>
                                <div class="d-flex justify-content-between mt-1">
                                    <ul class="social-icons-login d-flex justify-content-between w-100">
                                        <li>
                                            <span class="dot google-login btn"><i class="fa fa-google"></i> Continue with Google</span>
                                        </li>
                                         <li>
                                            <span class="dot btn facebook-login "><i class="fa fa-facebook"> Continue with Facebook</i></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </section>
            <?php echo $this->render('include/login_footer'); ?>