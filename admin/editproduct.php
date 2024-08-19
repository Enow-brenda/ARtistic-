<?php
include "../connect.php";
session_start();
$prodid=$_GET['id'];
    if( empty($_SESSION["secretkey"]) ){
        header("Location: ../../user/signup.php");
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>ARtistic  </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 100px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }.dropdown{
          margin:20px 10px;
        }input[type="search"]{
          margin:0px 10px;
        }
      }.logo{
        font-size: 30px;
        text-align: center;
        margin-left: 30px;
        
      }.pink{
        color:#ff6b6b;
      }.sucess{
          background-color: palegreen;
          color:darkgreen;
          padding:3px;
          border-radius: 10px;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top   p-0 " style="background:#453c5c">

<a class="navbar-brand ml-4 logo p-2" href="#"><span class="pink">AR</span>tistic</a>
<button class="navbar-toggler  d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
  <form class="d-flex">
  <input class="form-control me-2"  type="search"  placeholder="Search" aria-label="Search">
        <button class="btn btn-primary" style="background-color: #ff6b6b ;border:none;" type="submit">Search</button>
  </form>
 
        <div class="dropdown d-flex me-4">
            <i class="fa fa-notification"></i>
        <a class="profile-pic dropdown-toggle" style="text-decoration:none;" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false" href="#">
            
                                <img src="../admin/images/<?php echo $_SESSION['pic']?>"  style="border-radius:50%;" alt="user-img" width="36"
                                    class="img-circle me-2 ">
                                    <span class="text-white font-medium"style="text-decoration:none;"> Admin</span></a>
                                    
                                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="../user/signup.php">Sign out</a></li>
        </ul>
                                  </div>
        
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    
    <?php
    $id=$_SESSION["id"];
     $query1 = "SELECT * FROM admin where adminid=$id";
    $rs1 = $conn->query($query1);
    $row1 = $rs1->fetch_assoc();?>
    <div class="position-sticky pt-3">
      <div class="d-flex flex-column" >
      <div class="d-flex flex-column mt-2" style="align-items:center;margin-bottom:-10px;">
      <img src="../admin/images/<?php echo $row1['profilepic']?>" style="border-radius:50%;" alt="user-img" width="50" height="50"
                                    class="img-circle me-2"></a>
                                    <span class="text-white font-medium text-center"> 
                                        <?php echo $row1["name"];?>
                                        <p><?php echo $row1["position"];?>
                                          </p>
                                         
                                    </span>
      </div>
      
                                    <hr style="color:white">
                                    <?php include "includes/sidebar.php"?>
                                  </div>
       

        
       
      </div>
    </nav>
<!-- content inside the main-->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php if(isset($_GET['error'])){?>
                <div style="width: px"class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo $_GET['error']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>     
                <?php }?>
                <?php if(isset($_GET['message'])){?>
                <div style="width: px"class="alert alert-success alert-dismissible fade show" role="alert"><?php echo $_GET['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>     
                <?php }?>
      <div class="r pt-3 pb-2 mb-3 ">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 ">Products</h1>
        <div>
        <a href="products.php" class="btn d-inline-flex btn-sm btn-danger border-base mx-1">
                                    
                                    <span>Back</span>
                                </a>
        
        </div>
        
        </div>
        
        <div class=container-fluid>
        <div class="card shadow border-0 mb-7" style="margin-top:30px;">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Products</h5>
                    </div>
                    
                   <form class="p-4 pt-3" method="post" action="operation.php" enctype="multipart/form-data">
                    
                    <input type="hidden" name="id"value="<?php echo $prodid?>">
                    <?php 
                      $query2 = "SELECT * FROM `product` where productid=$prodid";
                      $rs2 = $conn->query($query2);
                      $row2 = $rs2->fetch_assoc()?>
                       <div class="d-flex flex-column p-4 pt-3" style="align-items:center">
                      <img src="../admin/images/<?php echo $row2['mainpic']?>" width="500" height="300">
                      <div class="d-flex mt-2" style="overflow-x:scroll;max-width:400px;">
                      <?php 
                      $query3 = "SELECT * FROM `productimage` where productid='$prodid'";
                      $rs3 = $conn->query($query3);
                      while($row3 = $rs3->fetch_assoc()){
                      ?>
                      <img src="../admin/images/<?php echo $row3['image']?>" class="me-2" width="100" height="50">
                      <?php }?>
                      
                      </div>
                   </div>
                    <label>Product Name</label>
                    <input type="text" name="pname" value="<?php echo $row2['productname']?>" class="form-control mb-2">
                    <label>Product Description</label>
                    <input type="text" name="pdes" value="<?php echo $row2['description']?>" class="form-control mb-2">
                    <label>Product Price</label>
                    <input type="number" name="price" value="<?php echo $row2['price']?>" class="form-control mb-2">
                    <label>Product Quantity</label>
                    <input type="number" name="quantity" value="<?php echo $row2['quantity']?>" class="form-control mb-2">
                    <label>Product Category</label>
                    <select name="category" class="form-control mb-2">
                      <?php 
                      $query1 = "SELECT * FROM `category`";
                      $rs1 = $conn->query($query1);
                      while($row1 = $rs1->fetch_assoc()){
                        if($row1['categoryid']==$row2['categoryid']){
                      ?>
                      <option selected value="<?php echo $row1['categoryid']?>"><?php echo $row1['categoryname']?></option>
                      <?php }else{?>
                      <option value="<?php echo $row1['categoryid']?>"><?php echo $row1['categoryname']?></option>
                      <?php } }?>
                    </select>
                    <label>Product Size</label>
                    <div class="d-flex">
                        <input type="number" value="<?php echo $row2['length']?>" class="form-control mb-2 me-2" name="length" placeholder="Enter length">
                        <input type="number" value="<?php echo $row2['width']?>" class="form-control mb-2 me-2" name="width" placeholder="Enter Width">
                        <input type="number"  value="<?php echo $row2['height']?>"class="form-control mb-2"  name="height" placeholder="Enter Height">
                    </div>
                    <label>Product Images</label>
                    <h6>Change Main Image</h6>
                    <input type="file" name="mainpic" class="form-control mb-2 me-2">
                    <h6>Add Other Image</h6>
                    <div class="d-flex flex-column">
                        <div class="d-flex ">
                            <input type="file" name="images[]" class="form-control mb-2 me-2" multiple accept="image/*" >
                            <input type="file" name="images[]" class="form-control mb-2 me-2" multiple accept="image/*" >
                            <input type="file" name="images[]" class="form-control mb-2 me-2" multiple accept="image/*" >
                        </div>
                        <div class="d-flex ">
                           <input type="file" name="images[]" class="form-control mb-2 me-2" multiple accept="image/*" >
                            <input type="file" name="images[]" class="form-control mb-2 me-2" multiple accept="image/*" >
                            <input type="file" name="images[]" class="form-control mb-2 me-2" multiple accept="image/*" >
                        </div>
                    </div>
                    <button class="btn btn-primary" style="background-color: #ff6b6b ;border:none;" name="updateproduct" type="submit">Edit Product</button>
                   </form>
                </div>
        
      </div>
        </div>
      
      </div>
    </main>
  


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="sidebars.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
