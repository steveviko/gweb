<?php
// session_start();
error_reporting(0);
include('includes/config.php');
$pageTitle = "products";
$cid=intval($_GET['cid']);
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($bd,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			header('location:shopping_cart.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}
// COde for Wishlist
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:user-login.php');
}
else
{
mysqli_query($bd,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:wishlist.php');

}
}
?>
<?php  include("./includes/header.php");  ?> 


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div id="message"></div>
<div class="container">


<!-- ============================  FILTER TOP  ================================= -->
 <!-- card.// -->
<!-- ============================ FILTER TOP END.// ================================= -->


<div class="row">
	<?php  include("./includes/aside_full.php");  ?>
	<main class="col-md-9">


<header class="mb-3">
		<div class="form-inline">
			<!-- <strong class="mr-md-auto">32 Items found </strong> -->
			<select class="mr-2 form-control">
				<option>Latest items</option>
				<option>Trending</option>
				<option>Most Popular</option>
				<option>Cheapest</option>
			</select>
			<div class="btn-group">
				<a href="products2.php" class="btn btn-light" data-toggle="tooltip" title="List view"> 
					<i class="fa fa-bars"></i></a>
				<a href="products.php" class="btn btn-light active" data-toggle="tooltip" title="Grid view"> 
					<i class="fa fa-th"></i></a>
			</div>
		</div>
</header><!-- sect-heading -->


<article class="card card-product-list">
        <div class="row">
        <?php
        $find="%{$_POST['product']}%";
    $ret=mysqli_query($bd,"select * from products where productName like '$find'");
    $num=mysqli_num_rows($ret);
    if($num>0)
    {
	while ($row=mysqli_fetch_array($ret)) 
	{
		//code...


	?>
                <div class="col-md-3">
                        <figure class="card card-product-grid">
                            <div class="img-wrap"> 
                                <span class="badge badge-danger"> NEW </span><br> <small class="text-success pull-right mt-3">Free Delivery Within Kampala</small><a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>">
                                <img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>"></a>
                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                    <a href="product_details.php?pid=<?php echo htmlentities($row['id']);?>" class="title mb-2"><?php echo htmlentities($row['productName']);?></a>
                                    <div class="price-wrap">
                                            <span class="price">Ugx,<?php echo htmlentities($row['productPrice']);?>/=</span> 
                                            
                                        </div> <!-- price-wrap.// -->                             
                                        <hr>
                                        
                                        <div class="rating-wrap mb-2">
                                                <ul class="rating-stars">
                                                    <li style="width:100%" class="stars-active"> 
                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                        <i class="fa fa-star"></i> 
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                        <i class="fa fa-star"></i> 
                                                    </li>
                                                </ul>
                                                <div class="label-rating">3/5 <span class="tag"> 34 reviews </span></div>
                                            </div> <!-- rating-wrap.// -->
											<form action="" class="form_submit" >
											<input type="hidden" class="pid" value=" <?php echo htmlentities($row['id']);?>">
														<input type="hidden" class="pcode" value=" <?php echo htmlentities($row['id']);?>">
											<input type="hidden" class="pname" value=" <?php echo htmlentities($row['productName']);?>">
											<input type="hidden" class="pimage" value=" <?php echo htmlentities($row['productImage1']);?>">
											<input type="hidden" class="pprice" value=" <?php  echo htmlentities($row['productPrice']);?>">
														<?php //print_r($row['productImage1']); ?>
																<button  class="btn btn-outline-secondary btn-sm addItemBtn"> Add to cart 
																		<i class="fa fa-shopping-cart"></i> 
																		</button>
																	<a href="products.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" title="Wishlist" ><i class="fa fa-heart text-danger"></i> </a><br><br>
																	<!-- <button href="add.php" class="btn btn-outline-primary btn-sm"> Buy Now &nbsp;&nbsp;&nbsp;
																			<i class="fa fa-box"></i>
																		</button> -->
											
												</form>	
                                    
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                    <?php } } else {?>
	
    <div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Item found for search results</h3>
    </div>
    
<?php } ?>	
        </div>
</article> <!-- card-product .// -->



<?php 
//set page pagination number
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM products";
$result = mysqli_query($bd,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM products LIMIT $offset, $no_of_records_per_page"; 

$res_data = mysqli_query($bd,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
        }
        mysqli_close($bd);
    

?>


<nav class="mb-4 " aria-label="Page navigation sample">

  <ul class="pagination">
     <li class="page-item "><a class="page-link" href="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Previous</a></li>&nbsp;&nbsp;
    <li class="page-item active "><a class="page-link" href="?pageno=1"><?php echo $pageno; ?></a></li>
	&nbsp;&nbsp;
    <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>"><?php echo $pageno +1; ?></a></li> &nbsp;&nbsp;
    <li class="page-item"><a class="page-link" href="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a></li>
  </ul> 
</nav>




	</main> <!-- col.// -->

</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= SECTION SUBSCRIBE  ========================= -->

<!-- ========================= SECTION SUBSCRIBE END// ========================= -->
<?php include"./includes/footer.php";?>