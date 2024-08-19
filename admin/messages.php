<?php
include "../connect.php";
session_start();
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
    <div class="position-fixed pt-3">
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
                <h1 class="h2 ">Messages</h1>
        <div>
        <a href="addmessage.php" class="btn d-inline-flex btn-sm btn-success border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span>New Message</span>
                                </a>
      
        </div>
        
        </div>
        
        <div class=container-fluid>
        <div class="card shadow border-0 mb-7" style="margin-top:30px;">
                    <div class="card-header">
                        <h5 class="mb-0">Inbox</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">From</th>
                                   
                                    <th scope="col">Sender Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $myid=$_SESSION['adminid'];
                            $role=$_SESSION['role'];
                            
                                 $query1 = "SELECT distinct senderid,sendertype FROM `messages` where receiverid=$myid && receivertype=$role";
                                 $rs1 = $conn->query($query1);
                                 $num1 = $rs1->num_rows;
                                 if($num1>0){
                                  $count=1;
                                 while($row1 = $rs1->fetch_assoc()){
                                 ?>
                                <tr>
                                  <td><?php echo $count?></td>
                                  <?php
                                  $sendid=$row1['senderid'];
                                  $sendrole=$row1['sendertype'];
                                  if($sendrole=='2'){
                                    $query2 = "SELECT * FROM `supplier` where supplierid=$sendid ";
                                    $rs2 = $conn->query($query2);
                                    $num2 = $rs2->num_rows;
                                  }else if($sendrole=='1'){
                                    $query2 = "SELECT * FROM `customer` where supplierid=$sendid ";
                                    $rs2 = $conn->query($query2);
                                    $num2 = $rs1->num_rows;
                                  }
                                  else{
                                    $query2 = "SELECT * FROM `admin` where adminid=$sendid ";
                                    $rs2 = $conn->query($query2);
                                    $num2 = $rs1->num_rows;
                                  }
                                 
                                  ?>
                                    <td class="d-flex">
                                        <img alt="..." src="images/<?php $row2=$rs2->fetch_assoc(); echo $row2['profilepic']?>" width="30" height="30" class="avatar avatar-sm rounded-circle me-2">
                                        <p>
                                        <?php
                                        
                                         echo $row2['name']?>
                                       </p>
                                    </td>
                                    
                                    <td>
                                        <?php
                                        if($row1['sendertype']=='2'){
                                          echo 'Supplier';
                                        }elseif($row1['sendertype']=='1'){
                                          echo 'Customer';
                                        }else{
                                          echo 'Admin';
                                        }
                                        ?>
                                    </td>
                                    
                                    <td class="text-end">
                                        <a href="viewinbox.php?role=<?php echo $sendrole?>&id=<?php echo $sendid?>" class="btn btn-sm btn-neutral" style="border:1px black solid">View</a>
                                        <button type="button" onclick="showSweetAlert()" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        
                                    </td>
                                    
                                </tr>
                                <?php $count++; 
                                 }}else{
                                  ?><tr><td colspan="6" class="text-center"><b><?php echo "No Message Received"; ?></b></td></tr><?php
                                    
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-2">
                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                            <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link bg-info text-white" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div>
                </div>
        
      </div>
      <div class="card shadow border-0 mb-7" style="margin-top:30px;">
                    <div class="card-header">
                        <h5 class="mb-0">Sent box</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Receiver status</th>
                                   
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $myid=$_SESSION['adminid'];
                            $role=$_SESSION['role'];
                                 $query1 = "SELECT distinct receiverid,receivertype FROM `messages` where senderid=$myid && sendertype=$role";
                                 $rs1 = $conn->query($query1);
                                 $num1 = $rs1->num_rows;
                                 if($num1>0){
                                  $count=1;
                                 while($row1 = $rs1->fetch_assoc()){
                                 ?>
                                <tr>
                                  <td><?php echo $count?></td>
                                  <?php
                                  $sendid=$row1['receiverid'];
                                  $sendrole=$row1['receivertype'];
                                  if($sendrole=='2'){
                                    $query2 = "SELECT * FROM `supplier` where supplierid=$sendid ";
                                    $rs2 = $conn->query($query2);
                                    $row2 = $rs2->fetch_assoc();
                                   
                                  }else if($sendrole=='1'){
                                    $query2 = "SELECT * FROM `customer` where supplierid=$sendid ";
                                    $rs2 = $conn->query($query2);
                                    $row2 = $rs2->fetch_assoc();
                                  }
                                  else{
                                    $query2 = "SELECT * FROM `admin` where adminid=$sendid ";
                                    $rs2 = $conn->query($query2);
                                    $row2 = $rs2->fetch_assoc();
                                  }
                                 
                                  ?>
                                    <td class="d-flex">
                                        <img alt="..." src="images/<?php echo $row2['profilepic']?>" class="avatar avatar-sm rounded-circle me-2" width="30" height="30">
                                        <p>
                                        <?php echo $row2['name']?>
                                       </p>
                                    </td>
                                    
                                    <td>
                                        <?php
                                        if($row1['receivertype']=='2'){
                                          echo 'Supplier';
                                        }elseif($row1['receivertype']=='1'){
                                          echo 'Customer';
                                        }else{
                                          echo 'Admin';
                                        }
                                        ?>
                                        
                                    </td>
                                    <td class="text-end">
                                        <a href="viewsentbox.php?role=<?php echo $sendrole?>&&id=<?php echo $sendid?>" class="btn btn-sm btn-neutral" style="border:1px black solid">View</a>
                                        <button type="button" onclick="showSweetAlert()" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        
                                    </td>
                                </tr>
                                <?php $count++; 
                                 }}else{
                                  ?><tr><td colspan="6" class="text-center"><b><?php echo "No Message Sent"; ?></b></td></tr><?php
                                    
                                }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-2">
                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                            <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link bg-info text-white" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div>
                </div>
        
      </div>
      <div class="card shadow border-0 mb-7" style="margin-top:30px;">
                    <div class="card-header">
                        <h5 class="mb-0">Requests</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">From</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $query3 = "SELECT * FROM `request`";
                                 $rs3 = $conn->query($query3);
                                 $num3 = $rs3->num_rows;
                                 if($num3>0){
                                  $count=1;
                                 while($row3 = $rs3->fetch_assoc()){
                                  $requestid=$row3['requestid'];
                                 ?>
                                <tr>
                                  <td><?php echo $count?></td>
                                    <td class="d-flex">

                                      <?php
                                      if($row3['requesttype']=="Post of supplier"){
                                        $query4 = "SELECT * FROM `supplyrequests` where requestid='$requestid'";
                                        $rs4 = $conn->query($query4);
                                        $row4= $rs4->fetch_assoc();
                                      } 
                                      else if($row3['requesttype']=="Blog Request"){
                                        
                                        $query7 = "SELECT * FROM `blog` where id='$requestid'";
                                        $rs7 = $conn->query($query7);
                                        $row7= $rs7->fetch_assoc();
                                        $cusid=$row7['customerid'];
                                        $query4 = "SELECT * FROM `customer` where customerid='$cusid'";
                                        $rs4 = $conn->query($query4);
                                        $row4= $rs4->fetch_assoc();
                                        
                                      }
                                       
                                      ?>
                                        <img alt="..." src="images/<?php echo $row4['profilepic']?>" class="avatar avatar-sm rounded-circle me-2" width="30" height="30">
                                        <p>
                                        <?php echo $row4['name']?> 
                                       </p>
                                    </td>
                                    <td>
                                    <?php echo $row3['requesttype'] ?>
                                    </td>
                                    <td>
                                    <?php echo $row3['requeststatus'] ?> 
                                    </td>
                                    
                                   
                                    <td>
                                    <?php echo $row3['date'] ?> 
                                    </td>
                                    <td class="text-end">
                                     
                                        <a href="viewrequest.php?requestid=<?php echo $row3['requestid'] ?>&&id=<?php echo $row3['id'] ?>&&type=<?php echo $row3['requesttype'] ?> " class="btn btn-sm btn-neutral" style="border:1px black solid">View</a>
                                      
                                        <button type="button" onclick="showSweetAlert()" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        
                                    </td>
                                </tr>
                                <?php $count++;} }else{?>
                                  <tr>
                                    <td colspan="6" class="text-center"><b>No Request Available</b></td>
                                  </tr>
                                  <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-2">
                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                            <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link bg-info text-white" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div>
                </div>
        
      </div>
        </div>
      
      </div>
    </main>
  

    <script src="delete.js"></script>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="sidebars.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
