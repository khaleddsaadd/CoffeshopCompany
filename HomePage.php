<?php session_start();?>
<?php require_once("HomePageClass.php");
 ?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="HomePageCss.css">
    </head>
    <body>
        <div id="product-grid">
            <?php 
                $allproducts =HomeProducts::AllProducts();
                foreach($allproducts as $product)
                {
            ?>
                   <div class="product-item" width="200px">
                        <form method="Post" action="HomePage.php?id=<?php echo $product->id;?>&pr=<?php echo $product->price;?>">
                            <img class ="P_IMG"src="images/<?php echo $product -> image?>"><br><br>
                            <center>
                            <label class="Name"><?php echo $product -> name ?></label> <br><br>
                            <label class="Price"><?php echo $product -> price ?> EGP</label> <br><br>
                            <input type="number" name="quantity" placeholder="Quantity" value="1"><br><br>
                            <input type="submit" value ="Add to cart" name="ID"> <br>
                            </center>
                        </form>
                   </div> 
            <?php 
                }
                if($_POST)
                {
                    $id= $_GET["id"];
                    $pr = $_GET["pr"];
                    $quantity = $_POST['quantity'];
                    $uid = $_SESSION['uid'];
                    $items = new HomeProducts($id);
                    $items -> addtocart($uid,$id,$pr,$quantity);

                }
            ?>
        </div>
    </body>
</html>