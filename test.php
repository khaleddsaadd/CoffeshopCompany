<?php
session_start();
class DB
{
   private $host = "localhost";
   private $user = "root";
   private $password = "";
   private $database = "coffee_shop";
   public $conn;

   function __construct()
   {
       $this->conn = $this->connectDB();
   }
   function connectDB() {
       $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
       return $conn;
   }
}
$User_id = $_SESSION['uid'];
class CartItem
{
   public $ID;
   public $P_Id;
   public $Total_Price;
   public $quantity;
   public $P_Name;
   public $P_Image;

    Static function UserCart($User_id)
		{
            $db_handle = new DB();
		    $sql ="SELECT * FROM cart WHERE User_id="."9";
		    $result = mysqli_query($db_handle -> conn,$sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
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
            <title>Document</title>
        </head>
        <body>
 <?php
    $display = new cartItem();
    $delete = new cartItem(); ?>
    <h1><?php $display->UserCart($User_id); ?> </h1>

            
        </body>
        </html>