<!-- Main Sidebar Container -->
<?php 
$session = session();
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=base_url()?>/public/assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle "
           style="opacity: .8">
      <span class="brand-text font-weight-light">Local Tools </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>/public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $session->get('first_name').' '.$session->get('last_name'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('/admin'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/admin/users'); ?>" class="nav-link">
            <i class="nav-icon fas fa-thin fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/admin/category'); ?>" class="nav-link">
              <i class="nav-icon fas fa-clone"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/admin/post_ads'); ?>" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Post Ads
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/admin/comments'); ?>" class="nav-link">
              <i class="nav-icon fa fa-regular fa-comments"></i>
              <p>
                Comments
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/admin/brands'); ?>" class="nav-link">
            <i class="nav-icon fa fa-book"></i>
              <p>
              Brands
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/admin/feedback'); ?>" class="nav-link">
              <i class="nav-icon fa fa-regular fa-comment"></i>
              <p>
              Feedbacks
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/admin/orders'); ?>" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
              Orders
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/admin/payments'); ?>" class="nav-link">
              <i class="nav-icon fa fa-regular fa-credit-card"></i>
              <p>
              Payments
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/admin/tax'); ?>" class="nav-link">
              <i class="nav-icon fa fa-solid fa-dollar-sign"></i>
              <p>
              Taxes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/admin/subscription'); ?>" class="nav-link">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
              Subscriptions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/admin/configurationss'); ?>" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
              Configurationss
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/admin/logout'); ?>" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
              Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>