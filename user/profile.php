<?php
include "../connect.php";
session_start();
    $id=$_SESSION['customerid'];
   
    $query="SELECT * FROM `customer` where customerid='$id' ";
    $rs = $conn->query($query);
    $row = $rs->fetch_assoc();
     $query1="SELECT * FROM `paymentmethod` where customerid='$id' && paymentmethodid='1'";
    $rs1 = $conn->query($query1);
    $row1 = $rs1->fetch_assoc();
    $num1 = $rs1->num_rows;
     $query2="SELECT * FROM `paymentmethod` where customerid='$id' && paymentmethodid='2'";
    $rs2 = $conn->query($query2);
    $row2 = $rs2->fetch_assoc();
    $num2 = $rs2->num_rows;
    $query3="SELECT * FROM `paymentmethod` where customerid='$id' && paymentmethodid='3'";
    $rs3 = $conn->query($query3);
    $row3 = $rs3->fetch_assoc();
    $num3 = $rs3->num_rows;
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
    <div class="container-fluid">
        <p><a style="text-decoration: none;" href="index.php" class="pink">Home</a> / Account settings</p>
      </div>
      <?php if(isset($_GET['error'])){?>
                <div style="width: px"class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo $_GET['error']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>     
                <?php }?>
                <?php if(isset($_GET['success'])){?>
                <div style="width: px"class="alert alert-success alert-dismissible fade show" role="alert"><?php echo $_GET['success']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>     
                <?php }?>
        <h4 class="font-weight-bold py-3 mb-4">
            Account settings
        </h4>
        
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="card-body media align-items-center">
                        <img class="profile"  src="../admin/images/<?php echo $row['profilepic'];?>" alt
                            style="width:10rem;height:10rem;border-radius: 50%;margin-left:15%;"><br>
                            </div>
                            <div style="text-align: center;font-size: 20px;"><b><?php echo $row['name'];?></b></div><br>
                        
                    
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            data-bs-toggle="tab" data-bs-target="#account-general" type="button" role="tab" aria-controls="account-general" aria-selected="true">Account</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                             data-bs-toggle="tab" data-bs-target="#account-change-password" type="button" role="tab" aria-controls="account-change-password" aria-selected="false">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            data-bs-toggle="tab" data-bs-target="#account-info" type="button" role="tab" aria-controls="account-info" aria-selected="false">Billing Details</a>
                        <a class="list-group-item list-group-item-action" href="order.php">My Orders</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list"
                            data-bs-toggle="tab" data-bs-target="#account-blog" type="button" role="tab" aria-controls="account-blog" aria-selected="false">Write Blog</a>
                            
                        <a class="list-group-item list-group-item-action" data-toggle="list" id="deleteaccount" onclick="deleteaccount()">Delete Account</a>
                        <a class="list-group-item list-group-item-action"  id="logout" href="signup.php" >Log Out</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="nav-tabContent">
                       
                        <div class="tab-pane fade active show" id="account-general">
                            <h2 style="padding-top: 30px;">Account</h2>
                            <hr  >
                            <div class="card-body">
                                <form action="operation.php" method="post" enctype="multipart/form-data">
                
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control mb-1" name="username" value="<?php echo $row['username'];?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control mb-1" name="email" value="<?php echo $row['email'];?>">
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Gender</label>
                    <select name="gender" class="form-control mb-2">
                        <?php if ($row['gender']=="male"){ ?>
                        <option selected value="male">Male</option>
                        <option value="female">Female</option>
                        <?php }else {?>
                            <option  value="male">Male</option>
                        <option selected value="female">Female</option>
                        <?php }?>
                    </select>
                            </div>
                                <div class="form-group">
                                    <label class="form-label">Contact</label>
                                    <input type="number" class="form-control" name="contact" value="<?php echo $row['contact'];?>">
                                </div>
                                <div class="form-group">
                                    <div class="media-body ">
                                        <label class="form-label"> Upload new photo</label>
                                        <input type="file" name="profilepic" class="form-control" multiple accept="image/*"> 
                                    </div>
                                </div>
                                <button  class="btn btn-primary pull-right me-4" name="updatecus" style="background:#ff6b6b;border:none;margin-top:20px;margin-bottom:20px;">Save Changes</button>&nbsp;
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="account-blog">
                            <h2 style="padding-top: 30px;">Blog</h2>
                            <hr>
                            <div class="card-body">
                                <form action="operation.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-label">Blog author</label>
                                    <input type="text" name="author" required class="form-control mb-1" value="<?php echo $row['name'];?>">
                                </div>
                                <div class="media-body ">
                                    <label class="form-label"> Upload Main Blog photo</label>
                                    <input type="file" name="mainpic" class="form-control" required multiple accept="image/*"> 
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> Main Heading</label>
                                    <input type="text" name="mainhead" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> Sub Heading 1</label>
                                    <input type="text" name="sub1" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Content 1</label>
                                    <textarea class="form-control" name="content1" required></textarea>
                                    
                                </div>
                                   
                                    <div class="media-body ">
                                        <label class="form-label"> Upload Attach photo For content 1</label>
                                        <input type="file" name="pic1" class="form-control" multiple accept="image/*" required> 
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label"> Sub Heading 2</label>
                                        <input type="text" name="sub2" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Content 2</label>
                                        <textarea class="form-control" name="content2" required></textarea>
                                        
                                    </div>
                                       
                                        <div class="media-body ">
                                            <label class="form-label"> Upload Attach photo For content 2</label>
                                            <input type="file" class="form-control" name="pic2"  multiple accept="image/*" required> 
                                        </div>
                                        <button  class="btn btn-primary pull-right me-4" name="blog" style="background:#ff6b6b;border:none;margin-top:20px;margin-bottom:20px;">Upload Blog</button>&nbsp;
    </form>
                                </div>
                                
                            </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <form action="operation.php" method="post">
                                <h2>Change Password</h2>
                                <hr>
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" name="old" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="new" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" name="confirm" class="form-control">
                                </div>
                            </div>
                            <button  class="pull-right me-4 btn btn-primary" name="changepass" style="background:#ff6b6b;border:none;">Change Password</button>&nbsp;
    </form>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <h2>Payment</h2>
                                <hr>
      <form action="operation.php" method="post">
                                    <h4>MTN Mobile Money</h4>
                                    <div class="form-group">
                                        <label class="form-label">Account Name</label>
                                        <input type="text" name="momoname" class="form-control" value="<?php echo $row1['accountname']?>">
                                    
                                    <div class="form-group">
                                        <label class="form-label">Account Number</label>
                                        <input type="number" name="momonum" class="form-control" value="<?php echo $row1['accountnumber']?>">
                                    </div>
                                </div>
                                
                                    <h4>Orange Money</h4>
                                    <div class="form-group">
                                        <label class="form-label">Account Name</label>
                                        <input type="text" name="orangename" class="form-control" value="<?php echo $row2['accountname']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Account Number</label>
                                        <input type="number" name="orangenum" class="form-control" value="<?php echo $row2['accountnumber']?>">
                                    </div>
                               
                                
                                    <h4>Card Payment</h4>
                                    <div class="form-group">
                                        <label class="form-label">Account Name</label>
                                        <input type="text" name="cardname" class="form-control" value="<?php echo $row3['accountname']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Account Number</label>
                                        <input type="number" name="cardnum" class="form-control" value="<?php echo $row3['accountnumber']?>">
                                    </div>

                            </div>
                            <div class="text-right mt-3">
            <button  class="btn btn-primary pull-right me-4" name="paydetail" style="background:#ff6b6b;border:none;">Save changes</button>&nbsp;
            </form>
            
        </div>
   
                        </div>
                     
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            
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