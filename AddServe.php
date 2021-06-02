<form method= "post" action ="" >

 <input type="text" name="pName" placeholder="Product Name" ><br>

 <input type="text" name="pPrice" placeholder="Product Price" ><br>

 <input type="file" name="pImage" placeholder="Product Image" ><br>

 <input type="text" name="pDescription" placeholder="Product Description"><br>

 <input type="text" name="pIngredients" placeholder="Ingredients"><br>

 <input type="text" name="pBeverages" placeholder="Type" ><br>
  
<input id="submit" type="submit" name='sub'>

</form>
<?php
if(isset($_POST['sub']))
{
  include "dbclass.php";
  $pName = $_POST['pName'];
  $pPrice = $_POST['pPrice'];
  $pImage = $_POST['pImage'];
  $pDescription = $_POST['pDescription'];
  $pIngredients = $_POST['pIngredients'];
  $pBeverages = $_POST['pBeverages'];

  $obj = new Database();
  $obj ->saveRecords($pName,$pPrice,$pImage,$pDescription,$pIngredients,$pBeverages);
}
?>