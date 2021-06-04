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

    function setproduct($P_Id)
    {
        $db_handle = new DB();
        $sql="SELECT * FROM products WHERE P_Id=".$P_Id;
		$result = mysqli_query($db_handle -> conn , $sql);
		if ($row = mysqli_fetch_array($result))
		{
            $this->P_Name = $row["P_Name"];
            $this->P_Image = $row["P_Image"];
            
        }
    }

    function __construct($User_id)
    {
        $db_handle = new DB();
        $sql="SELECT * FROM cart WHERE User_id=".$User_id;
		$result = mysqli_query($db_handle -> conn , $sql);
		if ($row = mysqli_fetch_array($result))
		{
            $this->ID = $row["ID"];
            $this->User_id = $row["User_id"];
            $this->P_Id = $row["P_Id"];
            $this->Total_Price = $row["Total_Price"];
            $this->quantity = $row["Quantity"];
        }
        $this->setproduct($this->P_Id);
    }


    static function UserCart($User_id)
    {
        $db_handle = new DB();
		$sql="SELECT * FROM cart WHERE User_id=".$User_id;
		$result = mysqli_query($db_handle -> conn,$sql);
		$i=0;
		$Result;
		while ($row = mysqli_fetch_array($result))
		{
			$MyObj= new CartItem($row["User_id"]);
			$Result[$i]=$MyObj;
			$i++;
		}
		if(!empty ($Result)){
			return $Result;	
		}else return ;

		
    }
	/*	Static function UserCart($User_id)
		{
            $db_handle = new DB();
		    $sql ="SELECT * FROM cart WHERE User_id=".$User_id;
		    $result = mysqli_query($db_handle -> conn,$sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}*/
	public function removefromcart($removedID)
	{
		$db_handle = new DB();
        $removeitem = "DELETE FROM cart WHERE ID=$removedID";
        $removeResultt = mysqli_query($db_handle->conn, $removeitem);
  		return $removeResultt;
	}
    /*
    public function saveorder()
	{
		$db_handle = new DB();
        $clearCart = "DELETE * FROM cart WHERE User_id=$User_id";
        $clear = mysqli_query($db_handle->conn, $clearCart);
	} */
    public function saveorder($User_id)
    {
        $db_handle = new DB();
        $clearCart = "DELETE FROM cart WHERE User_id = '$User_id'";
        $sql1 = mysqli_query($db_handle->conn, $clearCart);
		if ($sql1==true) {
			echo "<script type='text/javascript'>alert('THANK YOU FOR PURCHASING');</script>";
		}else{
			echo "<script type='text/javascript'>alert('Something went wrong.Try again.');</script>";
		    }
    }

} 
?>