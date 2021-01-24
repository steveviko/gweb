<?php
session_start();
function getIp() {
  $ip = $_SERVER['REMOTE_ADDR'];

  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }

  return $ip;
}

include("./includes/config.php"); 
if(isset($_POST['pid'])){
$pid    = $_POST['pid'];
$pname  = $_POST['pname'];
$pimage = $_POST['pimage'];
$pprice = $_POST['pprice'];
$pcode = $_POST['pcode'];
$qty    = 1;
$ipAdd = getIp();


$stmt = "SELECT * from cart where productCode = '$pcode' AND ip_add='$ipAdd'";
$run = mysqli_query($bd,$stmt);
$data = mysqli_num_rows($run);

if( $data <= 0){
    $query = "INSERT INTO cart(productName,productPrice,productImage,qty,productCode,ip_add) VALUES('$pname','$pprice','$pimage','$qty','$pcode','$ipAdd')";
     
    $result = mysqli_query($bd,$query);
   
    
    echo '<div class="alert alert-success alert-dismissible text-center">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    Item  successfully Added to your cart.
  </div>';
}else{
    echo '<div class="alert alert-danger alert-dismissible text-center">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Item </strong> already exist in your cart <span class=""><a href="shopping_cart.php" class="text-success">click here to Adjust the quantity of the item you wish to add</a></span>.
  </div>'; 
}



}

if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == "cart_item" ){

    $stm = $bd->prepare("SELECT * from cart");
    $stm->execute();
    $stm->store_result();
    $rows = $stm->num_rows;

    echo $rows;
}

if(isset($_POST['submitMessage'])){ 
  $username         = $_POST['username'];
  $contact        = $_POST['contact'];
  $email      = $_POST['email'];
  $type     = $_POST['type'];
  $message     = $_POST['message'];

  $queryMsg = "INSERT INTO messages(username,contact,body_message,message_type,email) VALUES('$username','$contact','$message','$type','$email')";

  mysqli_query($bd,$queryMsg);
  echo "<script>alert('Email sent successfully. Thanks');</script>";
  echo '<script>window.location="contact.php"</script>';

  
 
  
}

if(isset($_POST['submitReserve'])){ 
  $username         = $_POST['username'];
  $contact        = $_POST['contact'];
  $msg_body      = $_POST['msg_body'];
  $sex     = $_POST['sex'];
  $price     = $_POST['price'];
  $date     = $_POST['date'];

  $queryMsg = "INSERT INTO reserves(username,contact,message_body,sex,price,deliver_date) VALUES('$username','$contact','$msg_body','$sex','$price','$date')";

  mysqli_query($bd,$queryMsg);
  echo "<script>alert('Reserevation was a success. Thanks');</script>";
  echo '<script>window.location="index.php"</script>';

  
 
  
}

if(isset($_POST['submitEmail'])){ 
  $email         = $_POST['email'];
 
 

  $queryEmail = "INSERT INTO subscribtions(email) VALUES('$email')";

  mysqli_query($bd,$queryEmail);
  echo "<script>alert('You have successfully subscribe to our News Letter. Thanks');</script>";
  echo '<script>window.open( "index.php","_self")</script>';

  
 
  
}
if(isset($_POST['pqty'])){ 
  $qty = $_POST['pqty'];
  $proid = $_POST['pid'];
  $proprice=$_POST['pprice'];

  $tprice = $qty * $proprice;

  $sql ="UPDATE cart SET qty=$qty,productPrice=$tprice WHERE productCode=$proid";   
 
  mysqli_query($bd,$sql);

}

if(isset($_GET['remove'])){
  $id =$_GET['remove'];
     
  $stmt =$bd->prepare("DELETE  from cart WHERE productCode=?");
  $stmt->bind_param("i",$id);
  $stmt->execute();

  $_SESSION['showAlert'] = "block";
  $_SESSION['message'] ="item removed from the cart";
  header('location:shopping_cart.php');

}

if(isset($_GET['removeOrder'])){
  $id =$_GET['removeOrder'];
     
  $stmt =$bd->prepare("DELETE  from orders WHERE id=?");
  $stmt->bind_param("i",$id);
  $stmt->execute();

  $_SESSION['showAlert'] = "block";
  $_SESSION['message'] ="order removed from the lists";
  header('location:orders.php');

}

if(isset($_POST['action']) && isset($_POST['action'])== 'order'){
  $name         = $_POST['name'];
  $phone        = $_POST['phone'];
  $address      = $_POST['address'];
  $products     = $_POST['products'];
  $areazone     = $_POST['area'];
  $grand_total  = $_POST['grand_total'];
  // $quantity     = $_POST['quantity'];
  // $pdd          = $_SESSION['pid'];
  $userID       = $_SESSION['id'];
  // $value        = array_combine($pdd,$quantity);
  $pay          = "COD";
  $status       = "pending";

  $data         = "";

  $stmt=$bd->prepare("INSERT INTO  orders(customer_name,phone,AreaZone,customer_address,products,total_amount,userId,orderStatus,paymentMethod) VALUES(?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param("ssssssiss",$name,$phone,$areazone,$address,$products,$grand_total,$userID,$status,$pay);
  $stmt->execute();

  

  $data .='
  <div class="text-center">
      <h1 class="display-4 text-danger mt-2">Thank you!</h1>
      <h1 class="text-success">Your order has been placed successfully</h1>
      <h4 class="bg-danger text-light rounded p-2">Items orders:'.$products.'</h4>
      <h4 class="display-4 text-danger mt-2" >personal Details</h4>
      <h4  >Name:'.$name.'</h4>
      <h4 >Phone Number:'.$phone.'</h4>
      <h4  >Delivery Address:'.$address.'</h4>
      <h4  >Total Amount to be Paid:'.number_format($grand_total, 2).'</h4>
  </div>
  ';
  $stmt =$bd->prepare("DELETE   FROM  cart");   
  $stmt->execute();

  // echo $data
  header('location:order_success.php');

}


?>