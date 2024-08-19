<?php
include "../connect.php";
session_start();
    $prodid=$_GET['id'];
    $id=$_SESSION['adminid'];
    if( empty($_SESSION["secretkey"]) ){
        header("Location: ../../user/signup.php");
    } $query="SELECT * FROM `admin` where adminid='$id' ";
    $rs = $conn->query($query);
    $row = $rs->fetch_assoc();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Template · Bootstrap v5.0</title>
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
            
                                <img src="../admin/images/<?php echo $row['profilepic']?>"  style="border-radius:50%;" alt="user-img" width="36"
                                    class="img-circle me-2 ">
                                    <span class="text-white font-medium"style="text-decoration:none;"> Administrator</span></a>
                                    
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
    
    ?>
    <div class="position-sticky pt-3">
      <div class="d-flex flex-column" >
      <div class="d-flex flex-column mt-2" style="align-items:center;margin-bottom:-10px;">
      <img src="../admin/images/<?php echo $row['profilepic']?>"  style="border-radius:50%;" alt="user-img" width="36"
                                    class="img-circle me-2 ">
                                    <span class="text-white font-medium text-center"> 
                                        <?php echo $row["name"];?>
                                       <p><?php echo $row["position"];?>
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
      <div class="r pt-3 pb-2 mb-3 ">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 ">Products</h1>
        <div>
        <a href="products.php" class="btn d-inline-flex btn-sm btn-danger border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span>Back</span>
                                </a>
        
        </div>
        
        </div>
        <?php $query1 = "SELECT * FROM `product` where productid='$prodid'";
           $rs1 = $conn->query($query1);
           $row1 = $rs1->fetch_assoc();
           $id=$row1['productid'];
           ?>
        
                
        <div class=container-fluid>
        <div class="card shadow border-0 mb-7" style="margin-top:30px;">
                   <h2 class="text-center mt-3"><?php echo $row1['productname']?></h2>
                   <div class="d-flex flex-column p-4 pt-3" style="align-items:center">
                      <img src="images/<?php echo $row1['mainpic']?>" width="500" height="300">
                      <div class="d-flex mt-2" style="overflow-x:scroll;max-width:400px;">
                      <?php 
                      $query2 = "SELECT * FROM `productimage` where productid='$id'";
                      $rs2 = $conn->query($query2);
                      while($row2 = $rs2->fetch_assoc()){
                      ?>
                      <img src="images/<?php echo $row2['image']?>" class="me-2" width="100" height="50">
                      <?php }?>
                      
                      </div>
                   </div>

                   <div class="p-4 pt-3">
                    
                    <h4>Product Description</h4>
                    <p class="mx-4"><?php echo $row1['description']?> </p>
                    <hr>
                    <h4>Product Price</h4>
                    <p class="mx-4"><?php echo $row1['price'].'XAF'?> </p>
                    <hr>
                    <h4>Product Quantity</h4>
                    <div class="mx-4">
                        <p>Sold: </p>
                        <p>Remaining: </p>
                    </div>
                    <hr>
                    <h4>Product Size</h4>
                    <div class="mx-4">
                        <p>length: <?php echo $row1['length']."mm"?></p>
                        <p>width: <?php echo $row1['width']."mm"?></p>
                        <p>height: <?php echo $row1['height']."mm"?> </p>
                    </div>
                    <hr>
                    <h4>Customer Reviews</h4>
                    <div class="col">
            <div class="card">
              <div class="card-header">
                Name
              </div>
              <div class="card-body">
                <h5 class="card-title">stars</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
              <div class="card-footer text-muted">
                2 days ago
              </div>
            </div>
          </div>
                    </div>
                    
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
