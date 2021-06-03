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
class HomeProducts
{
    public $id;
    public $image; 
    public $name;
    public $price;

    function __construct($id)
    {
        $db_handle = new DB();
        $sql="SELECT * FROM products WHERE P_Id=".$id;
		$result = mysqli_query($db_handle -> conn , $sql);
		if ($row = mysqli_fetch_array($result))
		{
            $this->id = $row["P_Id"];
            $this->name = $row["P_Name"];
            $this->price = $row["P_Price"];
            $this->image = $row["P_Image"];
        }
    }
    static function AllProducts()
    {
        $db_handle = new DB();
		$sql="select * from products";
		$result = mysqli_query($db_handle -> conn,$sql);
		$i=0;
		$Result;
		while ($row = mysqli_fetch_array($result))
		{
			$MyObj= new HomeProducts($row["P_Id"]);
			$Result[$i]=$MyObj;
			$i++;
		}
		return $Result;	
    }
	public function addtocart($uid,$pid,$Q,$pr)
	{
		$db_handle = new DB();
		echo $uid;
		$res = "INSERT INTO `cart`(`User_id`,`P_Id`, `Total_Price`, `Quantity`)
		 VALUES ('$uid','$pid','$pr','$Q')";
		$s = mysqli_query($db_handle->conn,$res);
  		return $res;
	}
} 
?>