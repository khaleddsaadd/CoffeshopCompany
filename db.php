<?php
class db {
public $servername = "localhost";
public $username = "root";
public $password = "";
public $dbname="coffee_shop";

protected function connect ()
{
$this->servername = "localhost";
$this->username = "root";
$this->password = "";
$this->dbname="coffee_shop";

$conn = new mysqli($this->servername, $this->username, $thid->password,$this->dbname);
return $conn;
}
}
?>