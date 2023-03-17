
      <footer>
        <div class="container-fluid">

            <div class="footer-grid">

                <div class="footer-logo">
                    <figure>
                        <img src="<?php echo base_url(); ?>/public/images/logo.svg">
                    </figure>
                    <p>©2021 - All rights reserved </p>
                    <div class="d-flex gap-3 center-m">
                        <a href="#" class="instagram">
                            <i class="bi bi-instagram"></i>
                        </a>

                        <a href="#" class="twitter">
                            <i class="bi bi-twitter"></i>
                        </a>

                        <a href="#" class="facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                    </div>
                </div>
                
                <div class="categories">
                    <h5>Categories</h5>
                    <ul class="footer-links">
                        <li><a href="#">Garden tools</a></li>
                        <li><a href="#">KFZ tools</a></li>
                        <li><a href="#">Machines</a></li>
                        <li><a href="#">Forestic tools</a></li>
                        <li><a href="#">Agriculture Machinery</a></li>
                    </ul>
                </div>
                
                <div class="legal">
                    <h5>Legal</h5>
                    <ul class="footer-links">
                        <li><a href="#">Terms of Services</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Return Policy</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Data Protection</a></li>
                    </ul>
                </div>
                
                <div class="company">
                    <h5>Company</h5>
                    <ul class="footer-links">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Vision</a></li>
                    </ul>
                </div>

            </div>

        </div>
      </footer>
      
      <script type="text/javascript" src="<?php echo base_url(); ?>/public/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>/public/js/main.js"></script>
      <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
      <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> -->
      <script src="<?php echo base_url(); ?>/public/js/jquery-2.2.0.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>/public/js/slick.js" type="text/javascript"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>/public/js/moment.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>/public/js/daterangepicker.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
	<script>

		function ValidateLatitude() {
            $("#lblLat").hide();
            var regexLat = new RegExp('^(\\+|-)?(?:90(?:(?:\\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\\.[0-9]{1,6})?))$');
            if (!regexLat.test($("#txtLat").val())) {
                $("#lblLat").html("Invalid Latitude").show();
            }
        }
 
        function ValidateLongitude() {
            $("#lblLong").hide();
            var regexLong = new RegExp('^(\\+|-)?(?:180(?:(?:\\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\\.[0-9]{1,6})?))$');
            if (!regexLong.test($("#txtLong").val())) {
                $("#lblLong").html("Invalid Longitude").show();
            }
        }

		$(document).ready(function(){
			
			$("#submit_coordinates").click(function(){
				if (!$('#latitude').val()) {
					alert('Please add latitude!');
				}
				else{
					if (!$('#longitude').val()) {
						alert('Please add longitude!');
					}
					else{
						var html = '<iframe width="100%" height="400" src="https://maps.google.com/maps?q=51.165691,10.451526&output=embed"></iframe>';
						var long = $('#longitude').val();
						var lat = $('#latitude').val();
						//html += '<p> <b>$'+data[count].amount+'</b></p>';
						var url = 'https://maps.google.com/maps?q='+lat+','+long+'&output=embed';
						html = '<iframe width="100%" height="400" src="'+url+'"></iframe>'
						$('#g_mapp').html(html);
						// alert(url);
						}
				}
				
			});
			
		});
	</script>
	<script> 
		$(document).ready(function() {

			$('#top-plans').on('change', function() {
				var tpads = document.getElementById('top-plans');
				// var savebtn = document.getElementById('submit_pay')
				if(tpads.value == '' ){
					$('#submit_pay').prop("disabled", true);
				}else{
					$('#submit_pay').prop("disabled", false);
					$("#submit_pay").removeClass('blur');
				}
			});

			$('#highLight').on('change', function() {
				var highads = document.getElementById('highLight');
				var savebtn = document.getElementById('submit_pay')
				if(highads.value == ''){
					savebtn.disabled = true;
				}else{
					$('#submit_pay').prop("disabled", false);
					$("#submit_pay").removeClass('blur');
				}
			});

			$('#pushup_plan').on('change', function() {
				var pushads = document.getElementById('pushup_plan');
				var savebtn = document.getElementById('submit_pay')
				if(pushads.value == '' ){
					savebtn.disabled = true;
				}else{
					$('#submit_pay').prop("disabled", false);
					$("#submit_pay").removeClass('blur');
				}
			});
			
			/*$('.ads_plans').on('change', function() {
				var tpads = document.getElementById('top-plans');
				var highads = document.getElementById('highLight');
				var pushads = document.getElementById('pushup_plan');
				var savebtn = document.getElementById('submit_pay')
				if(tpads.value == '' || highads.value == '' || pushads.value == '' ){
					savebtn.disabled = true;
				}else{
					$('#submit_pay').prop("disabled", false);
					$("#submit_pay").removeClass('blur');
				}
			});*/

			

		});
	</script>

	<script>
       $(document).ready(function() {
			$("#postcreate").validate({
				rules: {
					ad_type: {
						required: true
					},
					title: {
						required: true,
						minlength: 5,
					},
					description: {
						required: true,
						minlength: 5,
					},
					stocks: {
						required: true,
						minlength: 1,
					},
					currency: {
						required: true,
					},
					duration: {
						required: true,
					},
					amount: {
						required: true,
					},
					vendor_name: {
						required: true,
					},
					phone_number: {
						required: true,
						minlength: 10,
						maxlength:13,
					},
					category_id: {
						required: true,
					},
					brand_id: {
						required: true,
					},
					address_line_1: {
						required: true,
					},
					country: {
						required: true,
					},
					state: {
						required: true,
					},
					postcode: {
						required: true,
					},
					deposite_duration: {
						required: true,
					},
					deposite_amount: {
						required: true,
					},
					product_desc: {
						required: true,
						minlength:10,
					},
					product_about: {
						required: true,
					},

					cancellation_policy: {
						required: true,
					},
					latitude:{
						required: true,
					},
					longitude:{
						required: true,
					},
					listing_address1: {
						required: true,
					},
					listing_address2: {
						required: true,
					},
					country_list: {
						required: true,
					},
					state_list: {
						required: true,
					},
					postcode_list: {
						required: true,
					},
				},
				messages: {
					ad_type: {
						required: "Please Select Add type",
					},
					title: {
						required: "Please Post Title",
						minlength: "Title length should be 5 characters long.",
					},
					description: {
						required: "Please Select Product description",
					},
					stocks: {
						required: "Please Add Stock",
						minlength: "Minmum Value is 0.",
					},
					currency: {
						required: "Please Select Currency",
					},
					duration: {
						required: "Please Select duration",
					},
					amount: {
						required: "Please Add Renteal Amount",
					},
					vendor_name: {
						required: "Please Add Vendor Name",
					},
					phone_number: {
						required: "Please Add Vendor Phone number",
						minlength:'Minimum 10 ditit Required',
						maxlength: 'Minimum 13 ditit Required',
					},
					category_id: {
						required: "Please Select Product Category",
					},
					brand_id: {
						required: "Please Select Brand Name",
					},
					address_line_1: {
						required: "Please Add Vender Address",
					},
					country: {
						required: "Please Select vendor country",
					},
					state: {
						required: "Please Select State",
					},
					postcode: {
						required: "Please Add Vendor Postcode",
					},
					deposite_duration: {
						required: "Please Select Deposite Duration",
					},
					deposite_amount: {
						required: "Please Add Minmum deposite amount",
					},
					product_desc: {
						required: "Please Add Product description",
					},
					product_about: {
						required: "Please Add About Product",
					},
					cancellation_policy: {
						required: "Please Add Canclelltion Policy",
					},
					listing_address1: {
						required: "Please Address in Listing Area",
					},
					listing_address2: {
						required: "Please Add Address in listing Area",
					},
					country_list: {
						required: "Please Select Country in listing Area",
					},
					state_list: {
						required: "Please Select State in Listing Area",
					},
					postcode_list: {
						required: "Please Add Postcode in List Area",
					},
					
				}
			})

			$('#submit-btn').click(function() {
			
				if($("#postcreate").valid())
				{
					var form = $("#postcreate").closest("form");
					var formData = new FormData(form[0]);
					$.ajax({
						url: "<?= base_url(); ?>/seller/add_posts",
						type: "POST",
						//data: $('#postcreate').serialize(),
						data:  formData,
					   contentType: false,
							 cache: false,
					   processData:false,
						//dataType: "json",
						success: function(response) {
							$('#submit-btn').html('Submit');
							$('.response-message').html(response?.message);
							response?.status === 'success' && $('.response-message').addClass('text-success') || $('.response-message').addClass('text-danger');
							$('.response-message').show();
							$('.response-message').removeClass('d-none');

							document.getElementById("postcreate").reset();
							setTimeout(function() {
								$('.response-message').hide();
							}, 5000);
                	}
					});
				}else{
					alert('Please Fill all Fields.');
				}
			
			});
		});
    </script>
      <script>
        $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
              });
      </script>
      <script>
    $( document ).ready(function() {
        $('#load_more_products').click( function() {
            $.ajax({
                url:"<?= base_url(); ?>/HomepageController/loadmore",
				type: "POST",
                data:{
                offset :$('#offset').val(),
                limit :$('#limit').val()
                },
				contentType: false,
				cache: false,
				processData:false,
                success :function(data){
                    $('#load-more').prepend(data.view)
                    $('#offset').val(data.offset)
                    $('#limit').val(data.limit)
                }
            })
        });
    });
    
</script>
      <script>
        $(function() {
          $('input[name="daterange"]').daterangepicker({
            opens: 'left'
          }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
          });
        });
      </script>
</body>


</html> 