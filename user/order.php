<?php
include "../connect.php";
session_start();
    $id=$_SESSION['customerid'];
   
    $query="SELECT * FROM `customer` where customerid='$id' ";
    $rs = $conn->query($query);
    $row = $rs->fetch_assoc();
    $query1="SELECT * FROM `order` where customerid='$id' ";
    $rs1 = $conn->query($query1);
    $row1 = $rs1->fetch_assoc();
    $num1 = $rs1->num_rows;
    $queryc="SELECT * FROM `cart` where customerid='$id' ";
    $rsc = $conn->query($queryc);
    $numc=$rsc->num_rows;
    $queryw="SELECT * FROM `wishlist` where customerid='$id' ";
    $rsw = $conn->query($queryw);
    $numw=$rsw->num_rows;
    
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="cart.css">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    hr{
        background-color: #ff6b6b;
        margin-left: 10px;
        width:50px;
    }.search{
        margin-right: 20px;
    }@media (max-width: 1000px) {
        .order-table{
            overflow-x: scroll;
        }.order-table i{
            padding-bottom:1rem;
        }
    }
    .fixed-button {
            position: fixed;
            bottom: 2rem;
            right: 1rem;
            z-index: 9999;
            gap:20px;
            
        }.fixed-button a{
            border-radius: 50px;
            background: #ff6b6b;
            border: none;
        }
</style>
</head>

<body>
    <div class="container1" style="margin:20px">
        <nav class="navbar navbar-expand-lg navbar-dark  mt-2" style="background-color: #453c5c;">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"style="margin-left: 3rem;">
               <span class="pink">AR</span>tistic
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent2" >
                <form class="d-flex search" style="margin-right: 2rem;">
                  <input class="form-control me-1" class="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-light" style="margin-left: 0.5rem;"type="submit">SEARCH</button>
                </form>
                
                <form class="d-flex" style="margin-right: 2rem;">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mobile">
                  <li class="mobile-hide" class="nav-item">
                      <a href="wishlist.php" style="color: white;margin-right: 2rem;">
                          <div class="icon-large"><i class="fa fa-heart"></i></div>
                           <div class="fly-item"><span class="item-number"><?php echo $numw?></span></div>
                      </a>
                  </li>
                  <li class="mobile-hide" class="nav-item" >
                      <a href="cart.php" style="color: white;margin-right: 2rem;">
                          <div class="icon-large"><i class="fa fa-shopping-cart"></i></div>
                           <div class="fly-item"><span class="item-number"><?php echo $numc?></span></div>
                      </a>
                  </li>
              </ul>
              
              </form>
                <form class="d-flex" style="margin-left: 2rem;">
             <a href="profile.php" class="d-flex"  style="color:white;text-decoration:none;text-transform:capitalize;align-items:center"> <img src="../admin/images/<?php echo $row['profilepic']?>"  style="border-radius:50%;" alt="user-img" height="35"width="36"
                                    class="img-circle me-2 "><?php echo $row['username'];?></a>
              </form>
                
              </div>
            </div>
          </nav>
    <div class="container light-style flex-grow-1 container-p-y">
    <a class="pull-right m-2  btn btn-danger" href="profile.php">Back</a>
    <div class="container-fluid">
        <p><a style="text-decoration: none;" href="index.php" class="pink">Home</a> / Order Details</p>
      </div>
        <h4 class="font-weight-bold py-3 mb-4">
            Order Details
        </h4>
        <div class="card">
                <div>
                        <div id="account-social-links">
                            
                            <div class="card-body pb-2">
                                <h2>Order History</h2>
                                <hr>
                                <form action="">
                                Search By:
                                <div class="d-flex"style="">
                                <select style="margin-right: 30px;" class="form-control">
                                
                                    <option>Order ID</option>
                                    <option>Order Status</option>
                                    <option>Total Amount</option>
                                    <option>Date Added</option>
                                    <option>Date Modified</option>
                                </select><input type="search" class="form-control">
                               
                                 <input type="submit" value="search" class="btn btn-primary" style="background-color:#ff6b6b;border:none;margin-left:10px" >
                                </div></form><div class="order-table">
                                    <table class="table table-bordered table-striped" style="margin-top: 20px;">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Order Status</th>
                                                <th>Total Amount</th>
                                                <th>Date Added</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($num1>0){?>
                                          
                                            <tr>
                                                <td>
                                                <?php echo "ARtistic".$row1['customerid'].'ORD'.$row1['orderid']?>
                                                </td>
                                                <td><?php
                                                $orderid=$row1['orderid'];
                                                  $query2="SELECT * FROM `deliveryandorder` where orderid='$orderid' ";
                                                  $rs2 = $conn->query($query2);
                                                  $row2 = $rs2->fetch_assoc();
                                                 echo $row2['deliverystatus']?></td>
                                                <td><?php echo $row1['amount']?></td>
                                                <td><?php echo $row1['datecreated']?></td>
                                                
                                                <td>
                                                    <a  href="vieworder.php?id=<?php echo $row1['orderid']?>"  style="background-color:#11615d;color:white;border-radius: 5px;border:none;padding:5px;cursor: pointer;"><i class="fa fa-eye"></i></a>
                                                    <a href="editorder.php?id=<?php echo $row1['orderid']?>" style="background-color:#6b95ff;color:white;border-radius: 5px;border:none;padding:5px;cursor: pointer;"><i class="fa fa-edit"></i></a>
                                                    <a style="background-color:#ff6b6b;color:white;border-radius: 5px;border:none;padding:5px;cursor: pointer;"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php }else{?>
                                                <tr>
                                                    <td>No Order Record</td>
                                                </tr>
                                                <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                   
                            </div>
                        </div>
                       
                        
                        
                    </div>
                </div>
           
        </div>
      
    
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        function deleteaccount(){
            window.prompt("Enter Password To Permanently Delete your Account")
        }
        function logout(){
            window.prompt("Enter Password To Log Out")
        }
        function management(){
            var secret=window.prompt("Enter your administrator secret key");
            var password=window.prompt("Enter Password related to this key")
        }
    </script>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="cheatsheet.js"></script>
</body>

</html>