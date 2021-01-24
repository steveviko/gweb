<?php 
session_start();

include('includes/config.php');
// $_SESSION['id'];
?>
<?php

// if(isset($_Get['action'])){
//        if(!empty($_SESSION['cart'])){
//        foreach($_POST['quantity'] as $key => $val){
//            if($val==0){
//                unset($_SESSION['cart'][$key]);
//            }else{
//                $_SESSION['cart'][$key]['quantity']=$val;
               
//            }
//        }
//        }
//    }




?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title><?php echo $pageTitle; ?>| GreciaJewellery</title>

<link href="./images/favicon.ico" rel="shortcut icon" type="image/x-icon">


<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />


<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>


<!-- Font awesome 5 -->
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
function valid()
{
 if(document.register.password.value!= document.register.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.register.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>
<body>
<header class="section-header">		
<section class="header-main border-bottom">		
	<div class="container">		
		<div class="row align-items-center">
			<div class="col-xl-2 col-lg-3 col-md-12">
				<a href="contact.php" class="brand-wrap">
					<!-- <span class="icon-xs rounded-circle bg-secondary">
						<i class="fa fa-envelope white"></i>
					</span>
							<h6 class="title_all_products">greciajewellery@gmail.com </h6>
								
								  -->
								  <div class="icontext align-items-start ml-4" style="max-width: 300px;">
		<span class="icon icon-xs rounded-circle border border-primary">
			<i class="fa fa-envelope text-secondary"></i>
		</span>
		<div class="text">
			<h6 class="title">Email us:</h6>
			<p class="text-black">greciajewellery@gmail.com </p>
		</div>
	</div> <!-- iconbox // -->
					
				</a> <!-- brand-wrap.// -->
					
			</div>
			<div class="col-xl-6 col-lg-5 col-md-6">
				<form action="#" class="search-header ml-5">
					<div class="input-group w-100">
						<select class="custom-select border-right"  name="category_name">
								<option value="">All type</option><option value="codex">Special</option>
								<option value="comments">Only best</option>
								<option value="content">Latest</option>
						</select>
					    <input type="text" class="form-control" placeholder="Search">
					    
					    <div class="input-group-append">
					      <button class="btn btn-secondary " type="submit">
					        <i class="fa fa-search"></i> Search
					      </button>
					    </div>
				    </div>
				</form> <!-- search-wrap .end// -->
			</div> <!-- col.// -->
			<div class="col-xl-4 col-lg-4 col-md-6">
				<div class="widgets-wrap float-md-right">
					<div class="widget-header mr-2">
						<a href="account.php" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-box"></i>
								
							</div>
							<small class="text text_bold"> Orders </small>
						</a>
					</div>
				
					<div class="widget-header mr-2">
						<a href="track_orders.php" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-store"></i>
							
							</div>
							<small class="text text_bold"> Track Orders </small>
						</a>
					</div>
					<div class="widget-header mr-2">
							<a href="wishlist.php" class="widget-view">
								<div class="icon-area">
									<i class="fa fa-heart "></i>
									<span class="notify">0<?php//echo $num;?></span>
								</div>
								<small class="text text_bold">&nbsp;&nbsp;&nbsp;&nbsp; WishList </small>
							</a>
						</div>
					<div class="widget-header mr-4">
						<a href="shopping_cart.php" class="widget-view">
							<div class="icon-area" >
								<i class="fa fa-shopping-cart"></i>
								<span class="notify" id="cart-item"> </span>
							</div>
							<small class="text text_bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;My Cart</small>
						</a>
					</div>
				</div> <!-- widgets-wrap.// -->
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->


<nav class="navbar navbar-main navbar-expand-lg border-bottom">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>Menu
    </button>

    <div class="collapse navbar-collapse" id="main_nav">
	
						  <ul class="navbar-nav">
					<li class="nav-item">
							<a class="nav-link" href="home.php">
									<div class="icontext mb-3">
											<img class="icon icon-xs rounded-circle" src="./images/avatars/gift.jpg">
											<p class="text text_bold">Home</p>
										</div> <!-- iconbox // -->	
							</a>
		
						</li>	
      
      
     
				<li class="nav-item">
					<a class="nav-link" href="about.php">
							<div class="icontext mb-3">
									<img class="icon icon-xs rounded-circle" src="./images/logo1.jpg">
									<p class="text text_bold">About us</p>
								</div> <!-- iconbox // -->	
					</a>

				</li>
				
					<li class="nav-item">
							<a class="nav-link " href="contact.php">
									<div class="icontext mb-3">
											<img class="icon icon-xs rounded-circle" src="./images/avatars/phone.jpg">
											<p class="text text_bold">contact us</p>
										</div> <!-- iconbox // -->	
							</a>
		
						</li>
						<li class="nav-item">
							<a class="nav-link " href="products.php">
									<div class="icontext mb-3">
											<img class="icon icon-xs rounded-circle" src="./images/avatars/all.jpg">
											<p class="text text_bold">All products</p>
										</div> <!-- iconbox // -->	
							</a>
		
						</li>
						
        
      </ul>
      <ul class="navbar-nav ml-md-auto">
					<li class="nav-item">
							<a class="nav-link" href="#"><span class="text-black "><i class="fa fa-phone "></i></span><span class="text_bold"> call: +256 787967393</span></a>
						</li>
					<li class="nav-item">
							<a class="nav-link" href="#"><span class="text-green "><i class="fab fa-whatsapp text-success"></i></span><span class="text_bold"> +256 701419936</span></a>
						</li>
						<?php if(strlen($_SESSION['login']))
						{   ?>
						<li class="nav-item">
						<a class="nav-link" href="profile.php"><span class="text-primary"><i class="fa fa-user black"></i></span> <span class="text_bold">Hi,<?php echo htmlentities($_SESSION['username']);?></span></a>
					</li>
					
					<li class="nav-item ">
						<a class="nav-link " href="user-logout.php" ><span class="text-primary"><i class="fa  fa-key black"></i></span> <span class="text_bold">Logout</span></a>
					
					</li>

						<?php } ?>
						<?php if(strlen($_SESSION['login'])==0)
    {   ?>
					<li class="nav-item">
						<a class="nav-link" href="user-register.php"><span class="text-primary"><i class="fa fa-user black"></i></span> <span class="text_bold">Register</span></a>
					</li>
					
					<li class="nav-item ">
						<a class="nav-link " href="user-login.php" ><span class="text-primary"><i class="fa  fa-lock black"></i></span> <span class="text_bold">Login</span></a>
					
					</li>

					<?php }?>


					

	   </ul>


					
    </div> <!-- collapse .// fa-2x-->
  </div> <!-- container .// -->
</nav>
</header> <!-- section-header.// -->
