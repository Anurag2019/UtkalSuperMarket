<?php

session_start();
require_once("dbcontroller.php");
$status="";


if ( (isset($_POST['pid']) && $_POST['pid']!="")&& (isset($_POST['quantity']) && $_POST['quantity']!=""))
{

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

    if(isset($_SESSION['username'])){
        $username=$_SESSION['username'];
        $result=mysqli_query($con,"SELECT count(*) as num from cart where username='$username'");
        $data=mysqli_fetch_assoc($result);
        $num_products=$data['num'];
       
       
        if($num_products==0)
        {
            $sql="insert into cart(username,pId,pName,pPrice,pQty,pImage) 
            values('$username','$id','$name','$price','$qty','$image')";
            if(mysqli_query($con,$sql)){
            $status = "<div class='box'>Product is added to your cart!</div>";
            }
        }
        else{
            $sql="select pId from cart where username='$username'";
            $result=mysqli_query($con,$sql);
            $pIds = array();
			while($row = mysqli_fetch_assoc($result))
			{
				$pIds[] = $row['pId'];
			}

		
            if(in_array($id,$pIds) )
            {
                $sql="select pQty from cart where pId='$id' and username='$username'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_row($result);
                $pQty=$row[0];
                $qty=$qty+$pQty;
                $sql="update cart set pQty='$qty' where pId='$id' and username='$username'";
                if(mysqli_query($con,$sql)){
                    $status = "<div class='box' style='color:red;'>
                    Product is updated to your cart!</div>";
                }
            }
            else{
                $sql="insert into cart(username,pId,pName,pPrice,pQty,pImage) 
                values('$username','$id','$name','$price','$qty','$image')";
                if(mysqli_query($con,$sql)){
                $status = "<div class='box'>Product is added to your cart!</div>";
                }       
               }
            
        }
      
      
      
    }
    else{

        if(empty($_SESSION["shopping_cart"])) {
            $_SESSION["shopping_cart"] = $cartArray;
            $status = "<div class='box'>Product is added to your cart!</div>";
        
        }else{
            
            $array_keys = array_keys($_SESSION["shopping_cart"]);
           // print_r($array_keys);
          
           /* $pid_array=array();
            foreach($_SESSION["shopping_cart"] as $product)
            {
                foreach($product as $key=>$value)
                {
                    if($key=='id')
                    {
                        $pid_array[]=$value;
                    }
                }
            }*/
           
            if(in_array($id,$array_keys)) {
                $_SESSION["shopping_cart"][$id]['quantity']=$_SESSION["shopping_cart"][$id]['quantity']+$qty;
                $status = "<div class='box' style='color:red;'>
                Product is updated to your cart!</div>";
                print_r($_SESSION["shopping_cart"]);	
                echo "<br>";
            } else {
            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
            print_r($_SESSION["shopping_cart"]);
            $status = "<div class='box'>Product is added to your cart!</div>";
            }
        
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
		   	  </div></div>";
          
        }
        mysqli_close($con);
?>
          
            
        </div>

    </section>


    
</body>
</html>