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
                                <h1 class="heading">Register</h1>
                                <h4 class="sub-heading">Let’s Sign up first for enter into Square Website. Uh She Up!</h4>
                            </div>
                            <div class="form_wrapper">
                            <?php if(isset($validation)):?>
                                <div class="alert alert-warning">
                                <?= $validation->listErrors() ?>
                                </div>
                                <?php endif; ?>
                                <form class="form-horizontal" action="<?php echo base_url('Home/insert'); ?>" role="form" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 ">
                                            <div class="form-group">
                                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 ">
                                            <div class="form-group">
                                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-4 col-sm-2 ">
                                            <div class="form-group">
                                                <input list="country-phone" type="text" name="country_pre" class="form-control " placeholder="+62">
                                                <datalist id="country-phone">
                                                    <?php 
                                                        foreach ($country as $row){
                                                            echo '<option value="'.$row["phonecode"].'"></option>';
                                                        } 
                                                    ?>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-8 col-sm-4 ">
                                            <div class="form-group">
                                                <input type="number" name="phone" class="form-control" placeholder="Phone Number" min="10">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 ">
                                            <div class="form-group">
                                                <select class="form-select form-control" name="country" ><span class="caret"></span>
                                                    <option value="">Select Country</option>
                                                    <?php 
                                                        foreach($country as $row)
                                                        {
                                                            echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Mail Address">
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-12 col-sm-6 position-relative">
                                            <div class="form-group">
                                                <input name="password" type="password" value="12234556" class="input form-control" id="password" placeholder="Password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                                                <div class="input-group-append position-absolute">
                                                    <span class="input-group-text" onclick="password_show_hide();">
                                                    <i class="fa fa-eye" id="show_eye"></i>
                                                    <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 position-relative">
                                            <input name="confirmpassword" type="password" value="12234556" class="input form-control" id="confirm_password" placeholder="Password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                                                <div class="input-group-append position-absolute">
                                                    <span class="input-group-text" onclick="password_show_hide1();">
                                                    <i class="fa fa-eye" id="show_eyec"></i>
                                                    <i class="fa fa-eye-slash d-none" id="hide_eyec"></i>
                                                    </span>
                                                </div>
                                        </div>
                                    </div>      
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="check-box_inr">
                                                    <div class="user-type active">
                                                        <input name="customer_type"  type="radio" id="user_type_Business" class="r-input" checked value="1" />
                                                        <label class="value"  for="user_type_Business">Business User</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group u-type-c">
                                                <div class="check-box_inr">
                                                    <div class="user-type"> 
                                                        <input name="customer_type"  id="user_type_customer" type="radio"  class="r-input" value="2" >
                                                        <label class="value" for="user_type_customer" value="customer">Customer User</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>                             
                                    
                                    <div class="col d-flex justify-content-start mb-4">
                                        <!-- Checkbox -->
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="form-remember" checked="">
                                          <label class="form-check-label" for="form-remember"> I agree to Local Tools <a href="#" class="link">Cookie</a> and <a href="#" class="link">Privacy Policy</a>. </label>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-12 col-sm-4  d-grid mb-3">
                                            <a class="btn btn-secondary btn-submit" type="button" href="<?php echo base_url(); ?>/login">Login</a>
                                        </div>
                                        <div class="col-12 col-sm-8  d-grid mb-3">
                                            <button class="btn btn-primary btn-submit" type="submit">Get Started</button>
                                        </div>
                                      </div>
                                </form>
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
        <style>
            /* Chrome, Safari, Edge, Opera */
            .login-section input::-webkit-outer-spin-button,
            .login-section input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            /* Firefox */
            .login-section input[type=number] {
            -moz-appearance: textfield;
            }
        </style>

<?php echo $this->render('include/login_footer'); ?>