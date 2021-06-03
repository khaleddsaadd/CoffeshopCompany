<?php require_once("CartClass.php");
 ?>
<html>
    <head>
    <title>The Coffee Shop | Store</title>
        <meta name="description" content="This is the description">
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   <link rel="stylesheet" href="Cart.css" />
       
    </head>
    <body>
    <form action = "Cart.php" method = "post">
        <section class="container content-section">
            <h2 class="section-header">My Cart</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">
            <?php
                $totalPrice = 0; 
                //hna elmfrood el user id elda5el bdal 1
                $usercart =CartItem::UserCart(1);
                foreach($usercart as $cart)
                {
            ?>
            <div class="cart-row">
                    <div class="cart-item cart-column">
                    <img class="cart-item-image" src="images/<?php echo $cart->P_Image; ?>" width="100" height="100">
                    <span class="cart-item-title"><?php echo $cart->P_Name; ?></span>
                    </div>
                    <span class="cart-price cart-column"><?php echo $cart->Total_Price; ?> $</span>                
                    <div class="cart-quantity cart-column">
                        <input class="cart-quantity-input" type="number" min="1" oninput="changePrice(this.value,<?php echo $cart->Total_Price; ?>)" value="<?php echo $cart->quantity; ?>">
                        <button class="btn btn-danger" onClick="<?php echo $cart->removefromcart($cart->ID); ?>">REMOVE</button> 
                    </div>
                </div>
      
            <?php 
            $calculatedPrice = $cart->Total_Price * $cart->quantity;
            $totalPrice += $calculatedPrice;
                }
                if($_POST)
                {
                    $cart -> saveorder($totalPrice);

                }
            ?>
        </div>
        <script>
                function changePrice(x,price)
                {
                    document.getElementById('tPrice').innerHTML = x * price + "$";
                    document.getElementById('ttPrice').value = x * price;
                }
            </script>
        <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price" id="tPrice"><?php echo $totalPrice;  ?>$</span>
            </div>
            <input type="hidden" name="totalPrice" id="ttPrice" value="<?php echo $totalPrice; ?>">
            <input type = "submit" class="btn btn-primary btn-purchase" name = "save" value = "PURCHASE" >
        </section>
         </form>
    </body>
</html>