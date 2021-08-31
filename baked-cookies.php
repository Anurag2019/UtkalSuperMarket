<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baked Cookies</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="style1.css">
    
	
</head>
<body>


    <?php
        require_once("dbcontroller.php");
        require_once("header.php");
    ?>
    <div class="frontview">
        <img src="image/home.png" alt="">
    </div>

    <h2 class="sub-heading">Baked Cookies</h3>

    <section class="products" id="products">
        
        
        <div class="box-container">
            <div class="box">
                <img src="images/karachi-fruit-biscuit.png" alt="">
                <h3>Karachi Fruit Biscuit 400 g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>153</span></p>
                <a href="#" class="btn my-cart-btn" data-id="1" data-name="Karachi Fruit Biscuit 400 g"  data-price="153" data-quantity="1" data-image="images/karachi-fruit-biscuit.png">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </div>

            <div class="box">
                <img src="images/lovely-coconut-cookies.png" alt="">
                <!-- <span class="fa-stack fa-lg"> <i class="far fa-square fa-stack-2x"style= "color:green" ></i> <i class="fas fa-circle fa-stack-1x" style= "color:green" ></i>   </span> -->
                <h3>Lovely Coconut Cookies 200 g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>110</span></p>
                <a href="#" class="btn my-cart-btn" data-id="2" data-name="Lovely Coconut Cookies 200 g"  data-price="110" data-quantity="1" data-image="images/lovely-coconut-cookies.png">Add to Cart <i class="fas fa-plus-circle"></i> </a>  
            </div>

            <div class="box">
                <img src="image/lovely-chocochip-cookies.png" alt="">
                <h3>Lovely Chocochip Cookies 200 g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>110</span></p>
                <a href="" class="btn my-cart-btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </div>

            <div class="box">
                <img src="image/lovely-oats-raisin-cookies.png" alt="">
                <h3>Lovely Oats & Raisin Cookies 200 g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>140</span></p>
                <a href="" class="btn my-cart-btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </div>

            <div class="box">
                <img src="image/lovely-bake-studio-butter-pista-cookies.png" alt="">
                <h3>Lovely Bake Studio Butter Pista Cookies 200 g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>157</span></p>
                <a href="" class="btn my-cart-btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </div>
            <div class="box">
                <img src="image/lovely-roasted-almond-cookies.png" alt="">
                <h3>Lovely Roasted Almond Cookies 200 g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>157</span></p>
                <a href="" class="btn my-cart-btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </div>
            <div class="box">
                <img src="image/amul-chocolate-cookies.png" alt="">
                <h3>Amul Chocolate Cookies 50 g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>125</span></p>
                <a href="" class="btn my-cart-btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </div>
            <div class="box">
                <img src="image/Chocolate-cream-cookie.png" alt="">
                <h3>Chocolate-cream-cookie 50g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>250</span></p>
                <a href="" class="btn my-cart-btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </div>
            <div class="box">
                <img src="image/Choco-chip-cookie.png" alt="">
                <h3>Choco-chip-cookie 200g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>300</span></p>
                <a href="" class="btn my-cart-btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </div>
            <div class="box">
                <img src="image/dark-choco-chip.png" alt="">
                <h3>dark-choco-chip 1kg</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>700</span></p>
                <a href="" class="btn my-cart-btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </div>
            <div class="box">
                <img src="image/sugar-cookies.png" alt="">
                <h3>sugar-cookies Baked 500g</h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>500</span></p>
                <a href="" class="btn my-cart-btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </div>
            <div class="box">
                <img src="image/gemes-cookies.png" alt="">
                <h3>Yummy Gemes-Cookies 200g </h3>
                <p>MRP: <i class="fas fa-rupee-sign"></i><span>140</span></p>
                <a href="" class="btn my-cart-btn">Add to Cart <i class="fas fa-plus-circle"></i></a>  
            </div>
        </div>

    </section>


    
</body>

</html>