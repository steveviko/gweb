<?php 
session_start();
error_reporting(0);
include('includes/config.php');
$pageTitle ="Checkout";
if(strlen($_SESSION['login'])==0)
    {   
header('location:user-login.php');
 }

$grand_total = 0;
$allItems    = "";
$items      = array();

$sql = "SELECT CONCAT(productName, '(',qty,')') AS ItemQty, productPrice FROM cart";
$stmt =$bd->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while($row=$result->fetch_assoc()){
    $grand_total += $row['productPrice'];
    $items[] = $row['ItemQty'];


}
//echo $grand_total;
//print_r($items);

$allItems = implode(",",$items);
//echo $allItems;


?>
<?php  include("./includes/header.php");  ?> 

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row ">
	<?php  include("./includes/aside_full.php");  ?> 
	<main class="col-md-9">
    <div class="row justify-content-center">
        <div class="col-lg-6 px-4 pb-4" id="order">
            <h4 class="text-center text-info p-2">Complete your order</h4>
        
        <div class="jumbotron p-3 mb-2 text-center">
            <h6 class=" lead"><b>Product(s): </b> <?= $allItems ?></h6>
            <h6 class=" lead"><b>Delivery charge : </b>Free within Kampala </h6>
            <h6 class=" lead"><b>Total Amount Payable: </b>Ugx <?= number_format($grand_total,2) ?>/=</h6>
        </div>
        <form action=""  id="placeOrder">
        <input type="hidden" name="products" value="<?= $allItems ?>"/>
        <input type="hidden" name="grand_total" value="<?= $grand_total ?>"/>
        <div class='form-group'>
        <input type="text" name="name" class="form-control" placeholder="Enter your Name" required/>
        </div>
        <div class="form-group">
        <input type="tel" name="phone" class="form-control" placeholder="Enter your Phone Number" />
        </div>
        <div class="form-group">
        <textarea  name="address" class="form-control"  rows="3" cols="10" placeholder="Enter Delivery Location Here ..." required></textarea>
        </div>
        <h4 class="text-center lead">Select Your Area Zone</h4>
        <div class="form-group">
        <select name="area" class="form-control">
            <option value=" " selected disabled>--select Area Zone--</option>
            <option value="nakawa">Nakawa</option>
            <option value="kololo">Kololo</option>
            <option value="Naguru">Naguru</option>
            <option value="makindye">Makindye</option>
            <option value="makerere">Makerere</option>
            <option value="Bugolobi">Bugolobi</option>
            <option value="city">City centre</option>
            <option value="Mengo">Mengo</option>
            <option value="ntinda">Ntinda</option>

        </select> 
        </div>
        <div class="form-group">
        <input type="submit" name="submit" class="form-control btn btn-danger btn-block" value="Place your Order"  />
        </div>
        </form>
        </div>
    </div>
<div class="card mb-1">
<div class="alert alert-success mt-3">
    <p class="icontext"><i class="icon text-success fa fa-truck"></i> 
     
    <?php echo $name  ?> </p>
</div>
</div> <!-- card.// -->


	
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