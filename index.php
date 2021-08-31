<?php

session_start();
require_once("dbcontroller.php");
$status="";


if ((isset($_POST['pid']) && $_POST['pid']!="")&& (isset($_POST['quantity']) && $_POST['quantity']!="")){

$id = $_POST['pid'];
$qty=$_POST['quantity'];
$result = mysqli_query($con,"SELECT pId,pName,pPrice,pImage FROM `products` WHERE `pId`='$id'");
$row = mysqli_fetch_assoc($result);
$name = $row['pName'];
$id = $row['pId'];
$price = $row['pPrice'];
$image = $row['pImage'];

$cartArray = array(
	$id=>array(
	'name'=>$name,
	'id'=>$id,
	'price'=>$price,
	'quantity'=>$qty,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";

}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($id,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits & Vegetables</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    

</head>
<body>
<?php
       
        require_once("header.php");
    ?>
    <div class="frontview">
        <img src="images/fruits-vegetables-20200619.jpg" alt="">
    </div>

    <h2 class="sub-heading">All Products</h2>

    <section class="products" id="products">
        
        
        <div class="box-container">
          
                <?php
            $result = mysqli_query($con,"SELECT * FROM `products`");
            while($row = mysqli_fetch_assoc($result)){
		    echo "  <div class='box'>
            <div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='pid' value=".$row['pId']." />
			  <div class='image'><img src='".$row['pImage']."' /></div>
			  <div class='name'><h3>".$row['pName']."</h3></div>
		   	  <div class='price'><p>MRP:".'<i class="fas fa-rupee-sign"></i>'."<span>".$row['pPrice']."</span></div>
              <div class='cart-action'>
              <input type='number' class='product-quantity' name='quantity' value='1' style=' width:50px'  />
              <button type='submit' class='btn '>Add to Cart".' <i class="fas fa-cart-plus" ></i>'."</button>
              </div>
			  </form>
		   	  </div>  </div>";
          
        }
        mysqli_close($con);
?>
          <?php
          /*
            <div class="box"> 
              <form method="post" action="" >
			  <input type='hidden' name='pid' value="1" />
                <img src="images/orange.jpg" alt="">
                <h3>Orange imported 1 kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>20</span></p>
               <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>
              </form>  
            </div>

            <div class="box">
            <form method='post' action=''>
			  <input type='hidden' name='pid' value="2" />
                <img src="images/sweetC.png" alt="">
                <!-- <span class="fa-stack fa-lg"> <i class="far fa-square fa-stack-2x"style= "color:green" ></i> <i class="fas fa-circle fa-stack-1x" style= "color:green" ></i>   </span> -->
                <h3>Sweet Corn 1 pc (250g-400g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>140</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i> </a> 
            </form> 
            </div>

            <div class="box"> 
            <form method='post' action=''>
			  <input type='hidden' name='pid' value="3" />
                <img src="images/pineapple.png" alt="">
                <h3>Pineapple 1 pc(700g-1200g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>50</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form>
            </div>

            <div class="box"> 
            <form method='post' action=''>
			  <input type='hidden' name='pid' value="4" />
                <img src="images/banana.png" alt="">
                <h3>Banana 6pcs(800g-1100g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>35</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>
            </form>
            </div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="5" />
                <img src="images/cauliflower.png" alt="">
                <h3>Cauliflower 1 pc(700g-1000g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>40</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="6" />
                <img src="images/beetroot.png" alt="">
                <h3>Beetroot 500g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>30</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="7" />
                <img src="images/lauki.png" alt="">
                <h3>Lauki 1 kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>45</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="8" />
                <img src="images/mosambi.png" alt="">
                <h3>Mosambi 1 kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>35</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="9" />
                <img src="images/curry-leaves.png" alt="">
                <h3>Curry Leaves 1bunch(70g-100g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>15</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="10" />
                <img src="images/sweet-potato.png" alt="">
                <h3>Sweet potato 500 g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>35</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="11" />
                <img src="images/potato.png" alt="">
                <h3>Potato 1 kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>25</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="12" />
                <img src="images/capsicum-red.png" alt="">
                <h3>Red Capsicum 500 g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>35</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="13" />
                <img src="images/capsicum-yellow.png" alt="">
                <h3>Yellow Capsicum 500 g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>40</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="14" />
                <img src="images/green-capsicum.png" alt="">
                <h3>Green Capsicum 500 g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>35</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="15" />
                <img src="images/onion.png" alt="">
                <h3>Onion 1 kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>40</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="16" />
                <img src="images/cucumber.png" alt="">
                <h3>Cucumber 1 kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>35</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="17" />
                <img src="images/zucchini.png" alt="">
                <h3>Green Zucchini 1 kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>65</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="18" />
                <img src="images/zucchini-yellow.jpg" alt="">
                <h3>Yellow Zucchini 1 kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>70</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="19" />
                <img src="images/amla.png" alt="">
                <h3>Amla 1 kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>105</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="20" />
                <img src="images/tomato.png" alt="">
                <h3>Tomato 1 kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>25</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="21" />
                <img src="images/cherry-tomato.png" alt="">
                <h3>Chery Tomato 1 kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>20</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="22" />
                <img src="images/drumstick.png" alt="">
                <h3>Drumstick 1 pc(25g-50g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>9</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="23" />
                <img src="images/baby-corn.pmg.jpg" alt="">
                <h3>Baby corn 1 pc(100g-160g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>25</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="24" />
                <img src="images/apple.png" alt="">
                <h3>Apple red 4 pcs(550g-7000g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>105</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="25" />
                <img src="images/coconut.png" alt="">
                <h3>Cocunut 1 pc</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>25</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="26" />
                <img src="images/cucumber.png" alt="">
                <h3>Cucumber 500 g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>19</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="27" />
                <img src="images/plum.png" alt="">
                <h3>Indian Plum 8 pc(300g-5000g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>125</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="28" />
                <img src="images/pear-green,png.jpg" alt="">
                <h3>Green pear 6 pcs(700g-900g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>105</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="29" />
                <img src="images/kiwi-green.png" alt="">
                <h3>Kiwi Zespri 3 pcs(300g-500g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>75</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="30" />
                <img src="images/beans.png" alt="">
                <h3>Beans 500g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>25</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="31" />
                <img src="images/tender-coconut.png" alt="">
                <h3>Tender Cocunut 1pc</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>30</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="32" />
                <img src="images/sprouts-channa-brown.png" alt="">
                <h3>Sprouts Chana(200g-250g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>35</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="33" />
                <img src="images/papaya.png" alt="">
                <h3>Papaya 1 kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>59</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="34" />
                <img src="images/sweet-tamarind.png" alt="">
                <h3>Sweet tamarind 1 pack(240g-300g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>85</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="35" />
                <img src="images/sprouted.png" alt="">
                <h3>Sprouted Beans (200g-250g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>30</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="36" />
                <img src="images/sprouts-mixed.png" alt="">
                <h3>Sprouts mixed (200g-250g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>35</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="37" />
                <img src="images/pomegranate-kesar.png" alt="">
                <h3>Pomegranate Keasar 4 pcs</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>125</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="38" />
                <img src="images/mushroom.png" alt="">
                <h3>Button Mushroom 200g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>42</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="39" />
                <img src="images/lemongrass.png" alt="">
                <h3>Lemongrass 1 bunch(40g-100g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>15</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="40" />
                <img src="images/mango-neelam.png" alt="">
                <h3>Mango Neelam 4 pcs(800g-1000g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>135</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="41" />
                <img src="images/matki-sprout-pack.png" alt="">
                <h3>Matki Sprout (200g-250g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>39</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="42" />
                <img src="images/radish-white.png" alt="">
                <h3>White Radish 1 pc(80g-150g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>10</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="43" />
                <img src="images/baby-corn.pmg.jpg" alt="">
                <h3>Baby corn 1 pc(100g-160g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>25</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="44" />
                <img src="images/alfalfa-sprouts.png" alt="">
                <h3>Alfalfa Sprouts 100g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>45</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="45" />
                <img src="images/baby-kiwi.png" alt="">
                <h3>Baby Kiwi 6 pcs(400g-500g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>145</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="46" />
                <img src="images/chilli-green.png" alt="">
                <h3>Green Chilli 200g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>17</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="47" />
                <img src="images/garlic.png" alt="">
                <h3>Garlic 200g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>32</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="48" />
                <img src="images/ginger.png" alt="">
                <h3>Ginger 200g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>20</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="49" />
                <img src="images/cluster-beans.png" alt="">
                <h3>Cluster Beans 500g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>37</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="50" />
                <img src="images/spinach.png" alt="">
                <h3>Spinach(Paalak) 1 bunch(100g-2000g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>16</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="51" />
                <img src="images/ground-nuts-fresh.png" alt="">
                <h3>Ground Nuts 500g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>55</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="52" />
                <img src="images/mint-leaves.png" alt="">
                <h3>Mint leaves 1 bunch(80g-150g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>15</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="53" />
                <img src="images/Coccinia.jpg" alt="">
                <h3>Coccinia 500g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>38</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="54" />
                <img src="images/coriander.png" alt="">
                <h3>Corriander 1 bunch (50g-100g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>20</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="55" />
                <img src="images/musk-melon.png" alt="">
                <h3>Musk Melon 1 kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>70</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="56" />
                <img src="images/brinjal.png" alt="">
                <h3>Nagpure Brinjal 500g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>25</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="57" />
                <img src="images/methi-leaves.png" alt="">
                <h3>Methi Leaves 1 bunch(100g-2000g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>29</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="58" />
                <img src="images/apple-granny-smith.png" alt="">
                <h3>Green Apple 4 pcs(500g-800g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>130</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="59" />
                <img src="images/cabbage.png" alt="">
                <h3>Cabbage 1 pc(600g-9000g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>18</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="60" />
                <img src="images/bhendi.png" alt="">
                <h3>Bhendi 500g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>25</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="61" />
                <img src="images/custard-apple.png" alt="">
                <h3>Custard Apple 4 pc(800g-1000g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>138</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="62" />
                <img src="images/bitter-gourd.png" alt="">
                <h3>Bitter Gourd 500g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>20</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="63" />
                <img src="images/watermelon.png" alt="">
                <h3>Watermelon 1 pc(2000g-2400g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>90</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="64" />
                <img src="images/ridge-gourd.png" alt="">
                <h3>Ridge Gourd 500g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>25</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="65" />
                <img src="images/carrot.png" alt="">
                <h3>Carrot 500g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>25</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="66" />
                <img src="images/lemon.png" alt="">
                <h3>Lemon 100g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>10</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="67" />
                <img src="images/rosemary.png" alt="">
                <h3>Rosemary (25g-40g)</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>30</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>

            <div class="box"> <form method='post' action=''>
			  <input type='hidden' name='pid' value="68" />
                <img src="images/thyme.png" alt="">
                <h3>Thyme 25g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>45</span></p>
                <a href="" class="btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </form></div>*/
        ?>
            
        </div>

    </section>


    
</body>
</html>