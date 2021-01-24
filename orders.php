<?php 
$pageTitle ="Orders";
include('includes/config.php');

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
?>
<?php include"./includes/header.php";?>


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row">
	<?php include"./includes/aside.php";?>
	<main class="col-md-9">
	
	<article class="card card-product-list">
	<div class="row no-gutters">
	
<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col" width="220">Products</th>
  <th scope="col" width="120">Contact</th>
  <th scope="col" width="150">Total Amount</th>
  <th scope="col" width="120">status</th>
  <th scope="col" width="170">Delivery Address</th>
  
  <th scope="col" class="text-right" width="140"> Action </th>
</tr>
</thead>

	

<tbody>
<?php 
// Remove special characters
$cleanStr = preg_replace('/[^A-Za-z0-9]/', '', $ipAdd);
 ?>
	<?php
	$ret=mysqli_query($bd,"SELECT * FROM orders where userId='$cleanStr'");
	while ($row=mysqli_fetch_array($ret)) 
	{
		//code...


	?>
			<tr>
	<td>
		<p><?= $row['products']; ?>
			
		</p>
	</td>
	<td> 
	<div class="quant-input">
	
	<input type="text" size="4" class="itemQty" value="<?php echo  $row['phone']; ?>" >
		
	</div>
	</td>
	<td> 
		<div class="price-wrap mt-2"> 
		<?php $product_price=$row['total_amount'];?>
			<var class="price">Ugx. <?= number_format($product_price ,2); ?></var> 
			
		</div> <!-- price-wrap .// -->
	</td>
	<td> 
		<div class="price-wrap mt-2"> 
			<p><?php echo  $row['orderStatus']; ?></p>
		</div> <!-- price-wrap .// -->
	</td>
	<td> 
		<div class="price-wrap mt-2"> 
			<p><?php echo  $row['customer_address']; ?></p>
		</div> <!-- price-wrap .// -->
	</td>
	
	<td class="romove-item">
	<a href="action.php?removeOrder=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure you want to remove this order')"><span><i class="fa fa-trash"></i>&nbsp;<span>Remove</span></a></td>
                 
	
	
</tr>

		
		<?php } ?>
		</tbody>
		</table>
	</div> <!-- row.// -->
</article> <!-- card-product .// -->





	</div>
	</main> <!-- col.// -->
	
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<?php include"./includes/footer.php";?>
