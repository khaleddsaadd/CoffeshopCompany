<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'coffee_shop');
class DB_con
{
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}

// for username availblty
public function usernameavailblty($uname) {
$result =mysqli_query($this->dbh,"SELECT Username FROM users WHERE Username='$uname'");
return $result;

}

// Function for registration
	public function registration($uname,$uemail,$pasword)
	{
	$ret=mysqli_query($this->dbh,"insert into users(Username,Email,Password) values('$uname','$uemail','$pasword')");
	return $ret;
	}

// Function for signin
public function signin($uname,$pasword)
	{
	$result=mysqli_query($this->dbh,"select User_Id from users where Username='$uname' and Password='$pasword'");
	return $result;
	}


}
?>