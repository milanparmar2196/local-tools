<div class="navbar-header gap-4">
        <div class="push">
            <a href="javascript:void(0)" onclick="openNav()"><img src="<?php echo base_url(); ?>/images/icons/menu.svg"></a>
        </div>
        <div class="logo">
            <img src="<?php echo base_url(); ?>/images/logo.svg">
        </div>

        <div class="select-location">
            <div class="input-group">
                <label class="input-group-text" for="inputGroupSelect01">
                    <i class="bi bi-geo-alt"></i>
                </label>
                <select class="form-select" id="inputGroupSelect01">
                  <option selected>All Germany</option>
                </select>
              </div>
        </div>

        <div class="search-filter">
            <div class="search-area">
                <select class="form-select cstm-border-right-radius0">
                    <option value="option1" selected>Search Categories</option>
                </select>
            </div>

            <div class="search-area">
                <input type="search" class="form-control cstm-border-left-radius0">
            </div>            
        </div>

        <ul class="d-flex gap-3 align-items-center top-nav-listing justify-content-end pad-0">
            <li class="hide-m"><i class="bi bi-bell"></i></li>            
            <li class="hide-l"><i class="bi bi-geo-alt"></i></li>
            <li><i class="bi bi-cart"></i></li>
            <li class="hide-l"><i class="bi bi-person-circle"></i></li>
            <li class="login-link"><a href="<?php echo base_url();?>/login">Login</a></li>
            <li><button class="btn btn-post">Post Ad</button></li>
        </ul>        
      </div>

      <div class="hide-d">
        <div class="sub-header gap-3">
            <div class="flx-grow">
                <input type="search" class="search-box-m" placeholder="Search Products">
            </div>
            <div class="flx-grow">
                <button type="submit" class="filter-box-m"></button>
            </div>
          </div>
      </div>