<?php

require_once("dbcontroller.php");

if(isset($_SESSION['username'])){
  
  $username=$_SESSION['username'];
  $result=mysqli_query($con,"SELECT sum(pQty) as totalproducts from cart where username='$username'");
  $data=mysqli_fetch_assoc($result);
  $totalproducts=$data['totalproducts'];
  if($totalproducts==NULL){
    $cart_count=0;
  }
  else{
    $cart_count=$totalproducts;
  }
 
}
else{
  if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    }
    else{
      $cart_count=0;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="style.css">
        
        <link rel="stylesheet" href="style1.css">
        
        
        <title>Utkal Supermarket</title>
        <style>
    .cart-div{
		margin-right:30px
	}
  .cart-div .badge {
  position: absolute;
  
  top: 4px;
  right: 25px;
  padding: 5px 10px;
  border-radius: 50%;
  font-size: 10px;
  background-color: red;
  color: white;
}
  
  
  .my-cart-icon-affix {
    
    z-index: 1000;
  }
  a
  {
    color:whitesmoke
  }
  a.logout{
    margin-left: 20px;
  }

  
  </style>
    </head>
<body>
    <table border="0" width="100%" height="60px">
        <tr>
            <td align="right"><h1>Utkal Supermarket</h1></td>
            <td class="search-bar"><input type="text" placeholder="Search for products, brands and more" style="width: 550px;height: 25px;">
            <input type="button" value="Search"  class="search-button" style="height: 25px;"></td>
           
            <th class="signin">
              <font color="white" size="3px">
                <?php 
                  if(isset($_SESSION['username'])){
                    echo "<div>
                    <i class='fa fa-user' aria-hidden='true'></i> ".$_SESSION['username']." <a href='logout.php' class='logout'>Logout</a>
                      </div>";
                  }
                  else{
                    echo " <div>
                    <a href='login.php' class='loginlink'><i class='fa fa-user' aria-hidden='true'></i> Login/Signup</a>
                  </div>";
                  }
                ?>
               
              
            </font></th>
            <th class="cart"><font color="white" size="5px">
              <div class="cart-div">
              <span style="font-size:35px"><a href="cart.php" class="cartlink"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></span>
              <span class="badge badge-notify my-cart-badge"><?php echo $cart_count; ?></span>
              </div>

             </font></th>
           
        </tr>
    </table>
    <div class="navbar">
        
        <div class="dropdown">
            <button class="dropbtn">Fruits & Vegetables 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <a href="fruits.php">Fresh Fruits</a>
            <a href="vegetables.php">Fresh Vegetables</a>
            <a href="herbs.php">Herbs & Seasionings</a>
            <a href="exotic-fruits-vegetables.php">Exotic Fruits & Vegetables</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Dairy & Bakery 
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="dairy.php">Dairy</a>
                <a href="toast-khari.php">Toast & Khari</a>
                <a href="cakes-muffins.php">Cakes & Muffins</a>
                <a href="breads-and-buns.php">Breads and Buns</a>
                <a href="baked-cookies.php">Baked Cookies</a>
                <a href="bakery-snacks.php">Bakery Snacks</a>
                <a href="batter-chutney.php">Batter & Chutney</a>
                <a href="cheese.php">Cheese</a>
                <a href="ghee.php">Ghee</a>
                <a href="paneer-tofu.php">Paneer & Tofu</a>
                </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Staples
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
            <a href="staples_01.php">Atta, Flour & Sooji</a>
            <a href="staples_02.php">Dals & Pulses</a>
            <a href="staples_03.php">Rice & Rice Products</a>
            <a href="staples_04.php">Edible Oils</a>
            <a href="staples_05.php">Masalas & Spices</a>
            <a href="staples_06.php">Salt, Sugar & Jaggery</a>
            <a href="staples_07.php">Soya Products, Wheat & Other Grains</a>
            <a href="staples_08.php">Dry Fruits & Nuts</a>
            </div>
        </div>
       
        <div class="dropdown">
            <button class="dropbtn">Snacks & Branded Foods
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="biscut_cookies.php">Biscuits & Cookies</a>
                <a href="noodles_pasta.php">Noodle, Pasta, Vermicelli</a>
                <a href="breakfast_cereals.php">Breakfast Cereals</a>
                <a href="snacks_namkeen.php">Snacks & Namkeen</a>
                <a href="chocolate_candies.php">Chocolates & Candies</a>
                <a href="ready_to_cook_eat.php">Ready To Cook & Eat</a>
                <a href="frozen_veggies_snacks.php">Frozen Veggies & Snacks</a>
                <a href="spreads_sauces_ketchups.php">Spreads, Sauces, Ketchup</a>
                <a href="indian_sweets.php">Indian Sweets</a>
                <a href="pickels_chutney.php">Pickles & Chutney</a>
            </div>
        </div>
      </div>
      </div> 
      </div>
</body>

 
</html>