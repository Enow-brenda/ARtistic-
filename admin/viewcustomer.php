<?php
include "../connect.php";
session_start();
$id=$_SESSION['adminid'];
    $prodid=$_GET['id'];
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
                <h1 class="h2 ">Orders</h1>
        <div>
        <a href="customers.php" class="btn d-inline-flex btn-sm btn-danger border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span>Back</span>
                                </a>
        
        </div>
        
        </div>
        
        <div class=container-fluid>
        <div class="container">
        <div class="row ">
            <div class="col-4 ">
            </div>
            <?php
           
           $query1 = "SELECT * FROM `customer` where customerid='$prodid'";
           $rs1 = $conn->query($query1);
           $row1 = $rs1->fetch_assoc();
           $id=$row1['customerid'];
           ?>
            <div class="col-12 col-lg-6 col-md-6">
                <div class="card shadow" style="width: 20rem;">
                <img src="images/<?php echo $row1['profilepic']?>" class="rounded img-fluid  card-img-top"  style="height: 300px "  alt="...">
                    <div class="card-body">
                    <h2 class="text-center mb-4"><?php echo $row1['username']?></h2>
                   
                    <p class="card-text">Name: <?php echo $row1['name']?> </p>
                        <p class="card-text">Email: <?php echo $row1['email']?> </p>
                        <p class="card-text">Gender: <?php echo $row1['gender']?> </p>
                        <p class="card-text">Contact: <?php echo $row1['contact']?> </p>
                        
                        <p class="card-text">Account Created: <?php echo $row1['datecreated']?> </p>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow border-0 mb-7" style="margin-top:30px;">
                    <div class="card-header">
                        <h5 class="mb-0">Order Details</h5>
                    </div>
                   <div class="p-4 pt-3">
                   
                    
                    
                   
                  
                    <div class="d-flex">
                    <h6>Total Orders: </h6>
                    <h6>Balance Due: </h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Order Number</th>
                                    <th scope="col">Revenue</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td>1</td>
                                    <td class="d-flex">
                                        <img alt="..." src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                       <div>
                                        <h6>name of product</h6>
                                       <p>
                                            color
                                       </p>
                                       </div> 
                                    </td>
                                    <td>
                                        james smith
                                    </td>
                                    <td>
                                       smith@gmail.com
                                    </td>
                                    <td>
                                        +237 672084416   
                                        
    </td>
                                   
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    
                  
                   
                   
                   
                    
                    

                    
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
