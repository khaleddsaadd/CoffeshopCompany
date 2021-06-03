<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
</head>
<body>
<?php


session_start();



class Cart  
{
private $total_price=0;
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

        $conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
        return $conn;
        }

   
    function show_name()
    {
        $sql = "SELECT * FROM cart WHERE User_id = 1";
        $result = $this->connect()->query($sql);
        $show = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        foreach($show as $row) 
        {
            $pid = $row['P_Id'];
            $p_name = "SELECT * FROM products WHERE P_Id = $pid";
            $result_name = $this->connect()->query($p_name);
            if ($result->num_rows > 0) 
            {
                while($roww = $result_name->fetch_assoc()) 
                {
                    echo $roww["P_Name"]."<br>"."<br>"."<br>";
                }
            }
        }     
    }

    function show_image()
    {
        $sql = "SELECT * FROM cart WHERE User_id = 1";
        $result = $this->connect()->query($sql);
        $show = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        foreach($show as $row) 
        {
            $pid = $row['P_Id'];
            $p_name = "SELECT * FROM products WHERE P_Id = $pid";
            $result_name = $this->connect()->query($p_name);
            if ($result->num_rows > 0) 
            {
                while($roww = $result_name->fetch_assoc()) 
                {
                    echo $roww["P_Image"]."<br>"."<br>"."<br>";
                }
            }
        }     
    }
    function show_price()
    {
        $sql = "SELECT * FROM cart WHERE User_id = 1";
        $result = $this->connect()->query($sql);
        $show = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        foreach($show as $row) 
        {
            $pid = $row['P_Id'];
            $p_name = "SELECT * FROM products WHERE P_Id = $pid";
            $result_name = $this->connect()->query($p_name);
            if ($result->num_rows > 0) 
            {
                while($roww = $result_name->fetch_assoc()) 
                {
                    echo $roww["P_Price"]."<br>"."<br>"."<br>";
                }
            }
        }    
    }

    function show_quantity() 
    {
        $sql = "SELECT * FROM cart WHERE User_id = 1";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
            echo $row["Quantity"]."<br>"."<br>"."<br>";
            }
    }

    }

    function show_id() 
    {
        $sql = "SELECT * FROM cart WHERE User_id = 1";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
            echo $row["P_Id"]."<br>"."<br>"."<br>";
            }
    }

    }

    function show_total_price() 
    {
         $sql = "SELECT * FROM cart WHERE User_id = 1";
         $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
            echo $row["Total_Price"]."<br>"."<br>"."<br>";
            }
        }
    }
}
?> 
</body>
</html>