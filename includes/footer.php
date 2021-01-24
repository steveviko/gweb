
<!-- =============== SECTION SERVICES =============== -->
<section  class="padding-bottom">

<header class="section-heading heading-line">
	<h4 class="title-section text-uppercase">Our services</h4>
</header>

<div class="row">
	<div class="col-md-3 col-sm-6">
		<article class="card card-post">
		  <img src="images/posts/sell.jpg" class="card-img-top">
		  <div class="card-body ">
		    <h6 class="title">Sell Jewellery</h6>
		    <p class="small text-uppercase text-muted text_bold badge badge-secondary">We sell jewellery of All kinds </p>
		  </div>
		</article> <!-- card.// -->
	</div> <!-- col.// -->
	<div class="col-md-3 col-sm-6">
		<article class="card card-post">
		  <img src="images/posts/delivery.jpg" class="card-img-top">
		  <div class="card-body">
		    <h6 class="title">Delivery</h6>
		    <p class="small text-uppercase text-muted badge badge-secondary ">We Make unlimited delivery within kampala</p>
		  </div>
		</article> <!-- card.// -->
	</div> <!-- col.// -->
	<div class="col-md-3 col-sm-6">
		<article class="card card-post">
		  <img src="images/posts/consult.jpg" class="card-img-top">
		  <div class="card-body">
		    <h6 class="title">Consultation solution</h6>
		    <p class="small text-uppercase text-muted badge badge-secondary">Consultations on Jewellery</p>
		  </div>
		</article> <!-- card.// -->
	</div> <!-- col.// -->
	<div class="col-md-3 col-sm-6">
		<article class="card card-post">
		  <img src="images/posts/4.jpg" class="card-img-top">
		  <div class="card-body">
		    <h6 class="title">Make imports through Reservation</h6>
		    <p class="small text-uppercase text-muted badge badge-secondary">Reserve And Import Jewellery </p>
		  </div>
		</article> <!-- card.// -->
	</div> <!-- col.// -->
</div> <!-- row.// -->

</section>
<!-- =============== SECTION SERVICES .//END =============== -->

<!-- =============== SECTION REGION =============== -->
<section  class="padding-bottom">

<header class="section-heading heading-line">
	<h4 class="title-section text-uppercase">Advertise With us</h4>
</header>

<ul class="row mt-4">
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/CN.png"> <span>China</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/DE.png"> <span>Germany</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/AU.png"> <span>Australia</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/RU.png"> <span>Russia</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/IN.png"> <span>India</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/GB.png"> <span>England</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/TR.png"> <span>Turkey</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/UZ.png"> <span>Uzbekistan</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <i class="mr-3 fa fa-ellipsis-h"></i> <span>More regions</span> </a></li>
</ul>
</section>
<!-- =============== SECTION REGION .//END =============== -->


</div>  
<!-- container end.// -->

<!-- ========================= SECTION SUBSCRIBE  ========================= -->
<section class="section-subscribe padding-y-lg">
<div class="container">

<p class="pb-2 text-center text-white">Delivering the latest on trending  products and  news straight to your inbox</p>

<div class="row justify-content-md-center">
	<div class="col-lg-5 col-md-6">
<form class="form-row" action="action.php" method="post">
		<div class="col-md-8 col-7">
		<input type="hidden" name="title" value="<?php echo $pageTile;?>" >
		<input class="form-control border-0" name="email" placeholder="Your Email" type="email" required>
		</div> <!-- col.// -->
		<div class="col-md-4 col-5">
		<button type="submit" name="submitEmail" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscribe </button>
		</div> <!-- col.// -->
</form>
<small class="form-text text-white-50">We’ll never share your email address with a third-party. </small>
	</div> <!-- col-md-6.// -->
</div>
	

</div>
</section>
<!-- ========================= SECTION SUBSCRIBE END// ========================= -->


<!-- ========================= FOOTER ========================= -->
<footer class="section-footer bg-secondary">
	<div class="container">
		
		<section class="footer-top padding-y-lg text-white">
			<div class="row">
				<aside class="col-md col-6">
					<h6 class="title">Top Category </h6>
					<?php $sql=mysqli_query($bd,"select id,categoryName  from category ORDER BY id DESC LIMIT 0,2");
				while($row=mysqli_fetch_array($sql))
				{
					//threecategory 
					$cid = $row['id'];
                    ?>

					 <?php }?>
					<ul class="list-unstyled">
					<?php $sql=mysqli_query($bd,"select id,subcategory  from subcategory where categoryid='$cid'");

while($row=mysqli_fetch_array($sql))
{
	?>
						<li> <a href="sub_category.php?scid=<?php echo $row['id'];?>"><?php echo $row['subcategory'];?></a></li>
						<?php }?>
						<!-- <li> <a href="#">Necklace</a></li>
						<li> <a href="#">Gold</a></li>
						<li> <a href="#">Diamond</a></li> -->
					</ul>
				</aside>
				<aside class="col-md col-6">
					<h6 class="title">GreciaJewellery</h6>
					<ul class="list-unstyled">
						<li> <a href="about.php">About us</a></li>
						<li> <a href="#">Policy </a></li>					
						<li> <a href="#">Terms and Conditions</a></li>
						
					</ul>
				</aside>
				<aside class="col-md col-6">
					<h6 class="title">Help</h6>
					<ul class="list-unstyled">
						<li> <a href="contact.php">Contact us</a></li>						
						<li> <a href="wishlist.php">My WishList</a></li>
						<li> <a href="#">Delivery info</a></li>
					
					</ul>
				</aside>
				<aside class="col-md col-6">
					<h6 class="title">Account</h6>
					<ul class="list-unstyled">
						<li> <a href="user-login.php"> User Login </a></li>
						<li> <a href="user-register.php"> User register </a></li>
						<li> <a href="account.php"> Account Setting </a></li>
						
					</ul>
				</aside>
				<aside class="col-md">
					<h6 class="title">Social</h6>
					<ul class="list-unstyled">
						<li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
						<li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
						<li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
						<li><a href="#"> <i class="fab fa-whatsapp"></i> whatsapp </a></li>
					</ul>
				</aside>
			</div> <!-- row.// -->
		</section>	<!-- footer-top.// -->

		<section class="footer-bottom text-center">
		<?php 
		
		$currentYear = date( 'Y ', time () );?>
				<p class="text-white">Privacy Policy - Terms of Use - User Information Legal Enquiry Guide</p>
				<p class="text-muted"> &copy <?php echo $currentYear; ?> GreciaJewellery , All Rights Reserved </p>
				<br>
		</section>
	
		<div class="banner-footer"  >
				
			<div id="demo" class="carousel slide" data-ride="carousel">
			
				<div class="carousel-inner">     
						<div class="carousel-item active">
							<h3><i class="fa fa-lock"></i> We have One Year Warranty on All Our Jewellery Products</h3>       
						</div>       
						<div class="carousel-item">
							<h3><i class="fa fa-truck"></i> We do Fast And Free Delivery on All Orders Made Within Kampala</h3>      
						</div>        
						<div class="carousel-item">
							<h3>Need help making an order call us <i class="fa fa-phone"></i>  +256 787967393 OR whatsapp us on <span class="text-green"> <i class="fab fa-whatsapp"></i></span> +256 701419936</h3>       
					</div>
					<div class="carousel-item">
							<h3>Please make Inspection on an Item/Jewllery before payment of Money <i class="fa fa-money-bill-alt "></i></h3>      
						</div> 
				</div>
				
			</div>

			</div>
	</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->
<!-- jQuery -->
<script src="./js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>

<!-- custom javascript -->
<script src="./js/script.js" type="text/javascript"></script>

<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<!-- Popper JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->

<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->


<script src="gen_validation.js" type="text/javascript"></script>
<script type="text/javascript">
function valid()
{
 if(document.register.pw.value!= document.register.pw2.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.register.confirmpassword.focus();
return false;
}
return true;
}
</script>



	

	<script src="./js/jquery.flexslider.js"></script>
	<!-- imagezoom -->
	<script src="js/jqzoom.pack.1.0.1.js" type="text/javascript"></script>
    <script src="js/imagezoom.js"></script>
	<script src="Admin/scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->
	<script>
	$(document).ready(function(){
		$(".addItemBtn").click(function(e){
			e.preventDefault();
		var $form  = $(this).closest(".form_submit");
		var pid    = $form.find(".pid").val();
		var pname  = $form.find(".pname").val();
		var pimage = $form.find(".pimage").val();
		var pprice = $form.find(".pprice").val();
		var pcode = $form.find(".pcode").val();

		$.ajax({
			url:   'action.php',
			method:'post',
			data:  {pid:pid,pname:pname,pimage:pimage,pprice:pprice,pcode:pcode},
			success:function(response){
				$('#message').html(response);
				load_cart_item_number();

			}

		});
			
			
			});

			$(".itemQty").on('change', function(){
			var $el = $(this).closest("tr");
			var pid = $el.find(".pid").val();
			var pprice= $el.find(".pprice").val();
			var pqty= $el.find(".itemQty").val();
			//console.log(pqty);
			location.reload(true);
			$.ajax({
			url:"action.php",
			method:"post",
			data:{pid:pid,pprice:pprice,pqty:pqty},
			success:function(response){
			
				console.log(response);
			}
			});

		});

		

			load_cart_item_number();
			function load_cart_item_number(){
				$.ajax({
					url:'action.php',
					method:'get',
					data:{cartItem:"cart_item"},
					success:function(response){
						$("#cart-item").html(response);

					}

				})
			}


			$("#placeOrder").submit(function(e){
			e.preventDefault();
		
		
			$.ajax({
			url:"action.php",
			method:"post",
			data:$('form').serialize() +"&action=order",
			success:function(response){
				$("#order").html(response);
				
			}
			});
		});
	});


	

	</script>
</body>
</html>