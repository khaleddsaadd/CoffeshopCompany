<?php
class Database
{
	var $host = "localhost";
	var $user = "root";
	var $pass = "";
	var $db = "coffee_shop";
	var $tbname = "products";
	public function connect()
	{
		$con = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
		return $con;
	}
	public function saveRecords($N,$P,$I,$D,$In,$B)
	{
		$conn = $this->connect();
		mysqli_query($conn, "insert into ".$this->tbname."(P_Name,P_Price,P_Image,P_Description,P_Ingredients,P_Beverages) values('$N','$P','$I','$D','$In','$B')") or die(mysqli_error($conn));
		echo "<div style = 'padding:20px; background-color:yellow;'>
		Data Added Successfully</div>";
	}
}
?>