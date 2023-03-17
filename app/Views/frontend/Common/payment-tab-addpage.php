
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
	<a class="nav-link <?php if($tab=="payment"){?>active <?php }?>" href="<?= base_url().'/payments'?>" id="home-tab" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><img src="<?= base_url();?>/public/image/listing-b.png" class="dimg"><img src="<?= base_url();?>/public/image/listing.png" class="himg"> Get Paid</a>
  </li>
  <li class="nav-item" role="presentation">
	<a class="nav-link <?php if($tab=="billing"){?>active <?php }?>" href="<?= base_url().'/payments'?>" id="profile-tab" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" tabindex="-1"><img src="<?= base_url();?>/public/image/biling.png" class="dimg"><img src="<?= base_url();?>/public/image/biling-w.png" class="himg"> Billing & Payments</a>
  </li>
</ul>