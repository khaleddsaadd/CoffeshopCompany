<?php
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
class CartItem
{
    public $ID;
    public $User_id; 
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
            $this->quantity = $row["quantity"];
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

		return $Result;	
    }
	public function removefromcart($removedID)
	{
		$db_handle = new DB();
        $removeitem = "DELETE FROM cart WHERE ID=$removedID";
        $removeResultt = mysqli_query($db_handle->conn, $removeitem);
  		return $removeResultt;
	}
    public function saveorder($price)
	{
		$db_handle = new DB();
        $sql = "INSERT INTO `orders` (`User_id`, `P_Id` ,`Total_Price`) 
		        VALUES ('$this->User_id', '$this->P_Id', '$price')";
        $insertResult = mysqli_query($db_handle->conn, $sql);
               

        $removeCart = "DELETE FROM cart WHERE User_id=$this->User_id";
        $removeResult = mysqli_query($db_handle->conn, $removeCart);
        return $removeResult;
	}

} 
?>