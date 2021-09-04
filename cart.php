<?php

session_start();
$status="";
if(isset($_SESSION['username'])){
	require_once("cart_db.php");
}
else{
	require_once("cart_session.php");
}
//print_r($_SESSION['shopping_cart']);
/*if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {

	foreach($_SESSION["shopping_cart"] as $key => $value) {
		
		if( $value['id']== $_POST["pid"] ){
			
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
		
}


?>
<html>
<head>
<title>Shopping Cart </title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="cart_style.css">
 
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Shopping Cart</h2>   



<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td>Product Image</td>
<td>Product Name</td>
<td>Product Quantity</td>
<td>Product Unit Price</td>
<td>Product Total</td>
</tr>	
<?php

foreach ($_SESSION["shopping_cart"] as $product){

?>
<tr>
<td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='pid' value="<?php echo $product["id"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td><?php echo $product['quantity']; ?></td>
<td><?php echo '<i class="fas fa-rupee-sign"></i>'.$product["price"]; ?></td>
<td><?php echo '<i class="fas fa-rupee-sign"></i>'.$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo '<i class="fas fa-rupee-sign"></i>'.$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<table>
	<tr>
		<td><a href="index.php" >Continue Shopping</a></td>
		<td>
		<?php $page= isset($_SESSION['username']) ? 'checkout.php' : 'login.php'; ?>
			<a href="<?php echo $page ; ?>">Checkout</a></td>
		<td><a href="emptycart.php">Empty Cart</a></td>
	</tr>
</table>





</div>
</body>
</html>*/
?>
