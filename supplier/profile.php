<?php
include "../connect.php";
session_start();

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
            
                                <img src="../admin/images/<?php echo $_SESSION['pic']?>"  style="border-radius:50%;" alt="user-img" height="35"width="36"
                                    class="img-circle me-2 ">
                                    <span class="text-white font-medium"style="text-decoration:none;"> Supplier</span></a>
                                    
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
    $id= $_SESSION['supplierid'];
     $query1 = "SELECT * FROM supplier where supplierid=$id";
    $rs1 = $conn->query($query1);
    $row1 = $rs1->fetch_assoc();?>
    <div class="position-sticky pt-3">
      <div class="d-flex flex-column" >
      <div class="d-flex flex-column mt-2" style="align-items:center;margin-bottom:-10px;">
      <img src="../admin/images/<?php echo $row1['profilepic']?>" style="border-radius:50%;" alt="user-img" width="50" height="50"
                                    class="img-circle me-2"></a>
                                    <span class="text-white font-medium text-center"> 
                                        <?php echo $row1["name"];?>
                                        <p><?php echo $row1["company"];?>
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
        
    <div class=container>
    <div class="row ">
        <div class="col-4 ">
        </div>
        
        <div class="col-12 col-lg-6 col-md-6">
            <div class="card shadow" style="width: 20rem;">
            <img src="../admin/images/<?php echo $row1['profilepic']?>" class="rounded img-fluid  card-img-top"  style="height: 300px "  alt="...">
                <div class="card-body">
                <h2 class="text-center mb-4"><?php echo $row1['name']?></h2>
                <h4 class="text-center mb-4"><?php echo $row1['company']?></h4>
                <p class="card-text">Seceret Key: <?php echo $row1['secretkey']?> </p>
                    
                    <p class="card-text">Email: <?php echo $row1['email']?> </p>
                    <p class="card-text">Gender: <?php echo $row1['gender']?> </p>
                    <p class="card-text">Contact: <?php echo $row1['contact']?> </p>
                    <p class="card-text">Description: <?php echo $row1['description']?> </p>
                  
                    
                    <p class="text-center">
                    <a href="editprofile.php?id=<?php echo $id?>" class="btn btn-outline-primary">Edit Profile</a>
                   
                    </p>
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

