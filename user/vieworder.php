<?php
include "../connect.php";
session_start();
    $id=$_SESSION['customerid'];
    $orderid=$_GET['id'];
   
    $query="SELECT * FROM `customer` where customerid='$id' ";
    $rs = $conn->query($query);
    $row = $rs->fetch_assoc();
     $query1="SELECT * FROM `order` where orderid='$orderid'";
    $rs1 = $conn->query($query1);
    $row1 = $rs1->fetch_assoc();
    $query2="SELECT * FROM `deliveryandorder` where orderid='$orderid' ";
    $rs2 = $conn->query($query2);
    $row2 = $rs2->fetch_assoc();
    $query3="SELECT * FROM `productinorder` where orderid='$orderid' ";
    $rs3 = $conn->query($query3);
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
             <a href="profile.php" class="d-flex" style="color:white;text-decoration:none;text-transform:capitalize;"> <img src="../admin/images/<?php echo $row['profilepic']?>"  style="border-radius:50%;" alt="user-img" height="35"width="36"
                                    class="img-circle me-2 "><?php echo $row['username'];?></a>
              </form>
                
              </div>
            </div>
          </nav>
    <div class="container light-style flex-grow-1 container-p-y">
    <a class="pull-right m-2  btn btn-danger" href="order.php">Back</a>
    <a class="pull-right m-2 pe-4 btn btn-primary" href="receipt.php">Print Receipt</a>

        <h4 class="font-weight-bold py-3 mb-4">
            Order Receipt
        </h4>
        <div class="card">
                <div>
                    
                        <div id="account-view-order">
                           
                            <div class="card-body pb-2">
                                <h4 class="text-center" style="color:#453c5c"><span class="pink">AR</span>tistic</h4>
                                <div class="purchase d-flex" style="justify-content:space-between">
                                    <div>
                                        <h4>Purchased By</h4>
                                        <p><b>Buyer Name:</b>  <?php echo $row['name']?></p>
                                        <p><b>Buyer Email:</b>  <?php echo $row['email']?></p>
                                        <p><b>Order ID:</b> <?php echo "ARtistic".$row1['customerid'].'ORD'.$row1['orderid']?></p>
                                        <p><b>Order Time:</b> <?php echo $row1['datecreated']?></p>

                                    </div>
                                    <div class=" d-flex pe-4" style="flex-direction:column;">
                                        <div>
                                            <h4>Purchased From</h4>
                                            <p><b>Organisation Name:</b> ARtistic</p>
                                        </div>
                                        <div>
                                        <h5>Delivery Address</h5> 
                                        <p><?php echo $row2['name']?><br><?php echo $row2['contact']?><br><?php echo $row2['address']?></p>
                                        </div>
                                    </div>
                                </div>
                                <hr style="width:100%;background:black;border:1px black solid;margin-left:0px;">
                                <div>
                                    <h4>Order Summary</h4>
                                    <div>
                                        <h5 style="text-align:right;" >Amount</h5>
                                        <?php while($row3 = $rs3->fetch_assoc()){
                                             $prodid= $row3['productid'];
                                             $query4="SELECT * FROM `product` where productid='$prodid' ";
                                             $rs4 = $conn->query($query4);
                                             $row4 = $rs4->fetch_assoc();
                                            ?>
                                           
                                        <p class="d-flex"  style="justify-content:space-between"><span><?php echo $row3['quantity'].' '.$row4['productname'];?></span><b><?php echo $row3['quantity']*$row4['price']?></b></p>
                                        <?php } ?>
                                        <hr style="width:100%;background:black;border:1px black solid;margin-left:0px;">
                                       
                                    </div><p class="d-flex"  style="justify-content:space-between"><span>Discount Amount</span><b><?php echo '-'.$row1['discount']?></b></p>
                                    <p class="d-flex"  style="justify-content:space-between"><span>Delivery Service</span><b>5000</b></p>
                                    <hr style="width:100%;background:black;border:1px black solid;margin-left:0px;">
                                    <p class="d-flex"  style="justify-content:space-between"><span>Total</span><b><?php echo $row1['amount']?></b></p>
                                    <hr style="width:100%;background:black;border:1px black solid;margin-left:0px;">
                                </div>
                                <div>
                                    <?php 
                                    $payid=$row1['paymentmethodid'];
                                    $query6="SELECT * FROM `paymentmethod` where paymentmethodid='$payid' && customerid='$id' ";
                                    $rs6 = $conn->query($query6);
                                    $row6 = $rs6->fetch_assoc();?>
                                    <h3>Billed To:</h3>
                                    <p><?php echo $row6['accountname']?><br><?php if($payid="1"){
                                        echo 'MTN Mobile Money';}else if($payid="2"){ 
                                        echo 'Orange Mobile Money';}else if($payid="3"){
                                            echo 'Master Card';}?><br><?php echo $row6['accountnumber']?></p>
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
  
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="cheatsheet.js"></script>
</body>

</html>