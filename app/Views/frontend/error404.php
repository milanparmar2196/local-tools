<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/public/sass/style.css">
	<link href="<?= base_url(); ?>/public/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/sass/responsive.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/node_modules/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body style="background: #FFC10E;">
	<div class="navbar-header gap-3"  style="background: #FFC10E; box-shadow: none;">
        <div class="push">
            <a href="javascript:void(0)" onclick="openNav()"><img src="<?= base_url(); ?>/public/images/icons/menu.svg"></a>
        </div>
        <div class="logo">
            <a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>/public/images/logo.svg"></a>
        </div>       
      </div>

      <div class="main">

        <!-- Mobile Menu -->
        <!------------------------>

        <div class="main-section">
		
            <div class="clprofilemain ">
				<div class="text-center">
                    <?php 
                        if($not_valid != ''){
                            echo '<h1 style="color:#fff;">'.$not_valid.'</h1>';
                            session()->destroy();
                        }
                    ?>
					<p><img src="<?= base_url(); ?>/public/image/error404.png" class="w-100" style="max-width:400px;"><p>
					<h2 class="whitecolor">Go to Home Page</h2>
					<a href="<?= base_url(); ?>" class="btn blackbg whitecolor" style="padding:5px 70px;">Home Page</a>
				</div>
			</div>





        </div>
      </div>
        <style>
            .main-section{
                width:100%;
            }
            
        </style>
      <script type="text/javascript" src="<?= base_url(); ?>/public/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?= base_url(); ?>/public/js/main.js"></script>
</body>


</html> 