<?php 
session_start();
error_reporting(0);
include('includes/config.php');
$pageTitle ="Cart";
function getIp() {
	$ip = $_SERVER['REMOTE_ADDR'];
  
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
  
	return $ip;
  }
  $ipAdd = getIp();
if(isset($_POST['submits'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);

			}else{
				$items=array();
   				$_SESSION['cart']=$items; 
				$_SESSION['cart'][$key]['quantity']=$val;
				$items=$_SESSION['cart'];
				$numberOfItems=count($items);
				$items[$numberOfItems]=$newItem;
				$itemCount=$numberOfItems + 1;
				
				$sql ="SELECT * FROM `tblinventory` WHERE `PRODUCTID` =$key";
				$res = mysqli_query($bd,$sql);
				
				$row = mysqli_fetch_assoc($res); 
				
					if ($row['REMAINING'] < $_SESSION['cart'][$key]['quantity']) {
						# code...
						echo '<script>alert("Product is out of stock. The remaining item is '.$row['REMAINING'].' and it will be added in the cart.")</script>';
						$_SESSION['cart'][$key]['quantity']=$row['REMAINING'];
						echo '<script>window.location="shopping_cart.php"</script>';
					} 
				
					
			}
			
		}
		
			echo "<script>alert('Your Cart has been Updated');
			document.location='shopping_cart.php';
			</script>";
		}
	}


// Code for Remove a Product from Cart
if(isset($_POST['submit']))
	{
		$r = $_POST['remove'];

		foreach($_POST['remove'] as $key){
			$sql ="DELETE * FROM cart WHERE productCode=$key AND ip_add=$ipAdd";
				$res = mysqli_query($bd,$sql);
				
		}
		
			echo "<script>alert('Your Cart has been  Updated');
			document.location='shopping_cart.php';
			</script>";
			exit();
	
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) 
{
	
if(strlen($_SESSION['login'])==0)
    {   
header('location:user-login.php');
exit();
}
else{

	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$shippingAddress = $_POST['shippingAddress'];
	$billingAddress = $_POST['billingAddress'];
	$value=array_combine($pdd,$quantity);

$sql = "UPDATE `users` SET `shippingAddress`='{$shippingAddress}',`billingAddress`='{$billingAddress}' WHERE `id`=".$_SESSION['id'];
mysqli_query($bd,$sql);

foreach($value as $qty=> $val34){

				mysqli_query($bd,"insert into orders(userId,productId,quantity,orderStatus) values('".$_SESSION['id']."','$qty','$val34','Pending')");

				// $sql ="UPDATE `tblinventory` SET `STOCKOUT`= `STOCKOUT`+'$val34',REMAINING=REMAINING-'$val34' WHERE `PRODUCTID`='$qty'";
				// mysql_query($sql);



				// $sql ="SELECT * FROM `tblinventory` WHERE `PRODUCTID` =$qty";
				// $res = mysql_query($sql);
				// $row = mysql_fetch_assoc($res); 

				// if ($row['REMAINING']<1){
				// 	# code...
				// 	$sql="UPDATE `products` SET `productAvailability`='Out of Stock' WHERE `id`=$qty";
				// 	mysql_query($sql);
				// }

 
				echo "<script>
				document.location='checkout.php';
				</script>";
				exit();

}
}
}


?>
<?php  include("./includes/header.php");  ?> 

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row ">
	<?php  include("./includes/aside_full.php");  ?> 
	<main class="col-md-9">
	<?php
// if(!empty($_SESSION['cart'])){
	?> 
<div class="card mb-1">
<form name="cart" method="post">

<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Unit Price</th>
  <th scope="col" width="120">Sub Total</th>
  <th scope="col" class="text-right" width="140"> Action </th>
</tr>
</thead>

	

<tbody>
<?php
	$total = 0;
	$ip_add = "SELECT * FROM  cart where ip_add='$ipAdd' ";
	$run_result = mysqli_query($bd, $ip_add);
	while($get_id = mysqli_fetch_array($run_result)){
		$product_id = $get_id['productCode'];
		$product_qty = $get_id['qty'];
		$product_price = $get_id['productPrice'];
		$total_price = array($product_price);

		$values =array_sum($total_price);

		$total += $values;

		$get_product = "SELECT * from products where id ='$product_id'";
		$run_product = mysqli_query($bd,$get_product);
		while($products = mysqli_fetch_array($run_product)){

			$prod_id = $products['id'];
			$prod_name = $products['productName'];
			$prod_image = $products['productImage1'];
			$prod_price = $products['productPrice'];	
			// $total_price = array($prod_price);

			// $values =array_sum($total_price);

			// $total += $values

			?>
			<tr>
	<td>
		<figure class="itemside">
			<div class="aside"><img src="admin/productimages/<?php echo $products['productName'];?>/<?php echo $products['productImage1'];?>" class="img-sm"></div>
			<figcaption class="info">
				<a href="product_details.php?pid=<?php echo htmlentities($pd=$products['id']);?>" class="title text-dark"><?php echo $products['productName']; ?></a>
	

				<p class="text-muted small"><div class="rating rateit-small"></div> <br>( <?php //echo htmlentities($num);?> Reviews )</p>
			</figcaption>
		</figure>
	</td>
	<td> 
	<div class="quant-input">
	<input type="hidden" class="pid" value="<?= $products['id'] ?>"/>
	<input type="hidden" class="pprice" value="<?= $products['productPrice'] ?>"/>
		<input type="text" size="4" class="itemQty" value="<?php echo $product_qty; ?>" name="quantity[<?php echo $products['productName']; ?>]">
		
	</div>
	</td>
	<td> 
		<div class="price-wrap mt-2"> 
			<var class="price">Ugx. <?= number_format($product_price ,2); ?></var> 
			
		</div> <!-- price-wrap .// -->
	</td>
	<td> 
		<div class="price-wrap mt-2"> 
			<var class="price">Ugx.<?= number_format($product_price ,2);?> 
          </var> 
			
		</div> <!-- price-wrap .// -->
	</td>
	<td class="romove-item">
	<a href="action.php?remove=<?= $products['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure you want to remove t his Item')"><span><i class="fa fa-trash"></i>&nbsp;<span>Remove</span></a></td>
                 
	
	
</tr>


	<?php } ?>


				
</tbody>


		<?php } ?>
		<tfoot>

				<tr>
					<td colspan="7">
					</div><!-- /.shopping-cart-btn -->
						<div class="alert alert-danger text-right text_bold">
	<p class="icontext "><i class="icon text-success pull-right fa fa-box"></i> Grand Total:Ugx.<?= number_format($total ,2);?> </p>
</div>
						<div class="shopping-cart-btn">
							<span class="">
								<a href="home.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<a href="checkout.php" class="btn btn-upper btn-primary outer-right-xs float-md-right">Place Your Order(s)</a>
								
							</span>
					
	
					</td>
					
					
				</tr>
				
	
			</tfoot>
		
		
</table>

</form>	

</div> <!-- card.// -->


	<div class="alert alert-success mt-3">
	<p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within Kampala</p>
</div>
</div><!-- /.shopping-cart-table -->
		
</div>
		</div> 



	</main> <!-- col.// -->
	
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name border-top padding-y">
<div class="container">
<h6>Payment and refund policy</h6>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->

<?php include"./includes/footer.php";?>