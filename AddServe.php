<head>
<style>
  <?php 
  include "css/addproduct.css";
  ?>
</style>
</head>
<body>
  <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                      <h3>Add Products</h3>
<form method= "post" action ="" >
<div class="col-md-12">
 <input class="form-control" type="text" name="pName" placeholder="Product Name" ></div><br>

<div class="col-md-12">
 <input class="form-control" type="text" name="pPrice" placeholder="Product Price" ></div><br>

<div class="col-md-12">
 <input class="form-control" type="file" name="pImage" placeholder="Product Image" ></div><br>

<div class="col-md-12">
 <input class="form-control" type="text" name="pDescription" placeholder="Product Description"></div><br>

<div class="col-md-12">
 <input class="form-control" type="text" name="pIngredients" placeholder="Ingredients"></div><br>

  <div class="col-md-12">
 <input class="form-control" type="text" name="pBeverages" placeholder="Type" ></div><br>
  <div class="form-button mt-3">

<input class="btn btn-primary" id="submit" type="submit" name='sub'>
</div>
</form>
</div>
                </div>
            </div>
        </div>
    </div>
</body>
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