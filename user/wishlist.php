<?php
include "../connect.php";
session_start();
   if(!empty($_SESSION['customerid'])){
    $id=$_SESSION['customerid'];
   
    $query="SELECT * FROM `customer` where customerid='$id' ";
    $rs = $conn->query($query);
    $row = $rs->fetch_assoc();
    
  
    $query3="SELECT * FROM `cart` where customerid='$id' ";
    $rs3 = $conn->query($query3);
    $num3=$rs3->num_rows;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARtistic - Home</title>
    <style>
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
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="wishlist.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body >
  <div class="d-flex fixed-button">
    <a href="#navbar" class="btn btn-primary "><i class="fa fa-arrow-up"></i></a>
    <a href="#footer" class="btn btn-primary "><i class="fa fa-arrow-down"></i></a>
</div>
    <nav class="navbar navbar-expand-lg navbar-dark   mt-2" id="navbar" style="background-color: #453c5c;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"style="margin-left: 3rem;">
           <span class="pink">AR</span>tistic
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent2" style="margin-left: 5rem;" >
            <form class="d-flex search " style="margin-right: 2rem;transform: translateY(0.7rem);">
              <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit">SEARCH</button>
            </form>
            
            <form class="d-flex" style="transform: translateY(0.7rem);">
              
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="mobile-hide" class="nav-item" >
                    <a href="cart.php" style="color: white;margin-right: 2rem;">
                        <div class="icon-large"><i class="fa fa-shopping-cart"></i></div>
                         <div class="fly-item"><span class="item-number"><?php echo $num3?></span></div>
                    </a>
                </li>
            </ul>
            
            </form>
            <form class="d-flex" style="margin-right: 2rem;transform:translateY(0.5rem)">
             <a href="profile.php" class="d-flex" style="color:white;text-decoration:none;text-transform:capitalize;"> <img src="../admin/images/<?php echo $row['profilepic']?>"  style="border-radius:50%;" alt="user-img" height="35"width="36"
                                    class="img-circle me-2 "><?php echo $row['username'];?></a>
              </form>
          </div>
        </div>
      </nav>
      <div class="container-fluid">
        <p><a style="text-decoration: none;" href="index.php" class="pink">Home</a> / wishlist</p>
        <div class="table-responsive"><table class="table table-hover table-nowrap ">
            <thead>
             
    
            <tr>
              <th scope="col" width="5%">#</th>
              <th scope="col" width="40%">Item</th>
              <th scope="col" width="20%">Price</th>
              <th scope="col" width="20%">Category</th>
              <th scope="col" width="10%">Action </th>
            </tr>
            </thead>
            <tbody>
            <?php   $query2="SELECT * FROM `wishlist` where customerid='$id' ";
    $rs2 = $conn->query($query2);
    $num2=$rs2->num_rows;
    if($num2>0){
      $count=1;
      while($row2 = $rs2->fetch_assoc()){?>
            <tr>
              <th scope="row"><?php echo $count?></th>
              <td>
                <table>
                  <tr><?php
                  $prod=$row2['productid'];
                     $query4="SELECT * FROM `product` where productid='$prod' ";
                     $rs4 = $conn->query($query4);
                     $row4 = $rs4->fetch_assoc();?>
                    <td>  <img src="../admin/images/<?php echo $row4['mainpic']?>" width="50px"></td>
                    <td><h5><?php echo $row4['productname']?></h5></td>
                  </tr>
                </table>
          
              </td>
              <td>
                <p><?php echo $row4['price']?> XAF</p>
            </td>
            <td>
            <?php
            $cat=$row4['categoryid'];
             $query5="SELECT * FROM `category` where categoryid='$cat' ";
                     $rs5 = $conn->query($query5);
                     $row5 = $rs5->fetch_assoc();
                     echo $row5['categoryname']?>
            </td>
            
            
            <td class="actions" style="text-align: center;">
               
                    <a style="background-color:#11615d;color:white;border-radius: 5px;border:none;padding:5px;cursor: pointer;" href="product.php?id=<?php echo $prod?>"><i class="fa fa-eye"></i></a>
                    <a style="background-color:#ff6b6b;color:white;border-radius: 5px;border:none;padding:5px;cursor: pointer;" href="operation.php?deletewishlistid=<?php echo $prod?>"><i class="fa fa-trash"></i></a>
                
            </td>

            </tr>
            <?php } }else{?>
              <td colspan="5" class="text-center"><b>No Products In Wishlist<b></td>
              <?php }?>
            </tbody>
          </table>
      
        </div>
      </div>
      <div class="footer d-flex">
        <div class="logo"><a href="#"><span class="pink">AR</span>tistic</a></div> 
        <ul>
            <li><b>ABOUT US</b></li>
            <li><a href="#">Wayfair Proffesional</a></li>
            <li><a href="#">Gift Cards</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Investor Relations</a></li>
        </ul>
        <ul>
            <li><b>CONTACT US</b></li>
            <li class="button"><a href="#">QUICK SERVICES</a></li>
            <li>+237672084416</li>
            <li>enowbrenda91106@gmail.com</li>
            <li>Yaounde, cameroon</li>
            
        </ul>
        <ul>
            <li><b>NEED HELP?</b></li>
            <li><a href="#">My Orders</a></li>
            <li><a href="#">My Account</a></li>
            <li><a href="#">Help Center</a></li>
            <li><a href="#">Report A Bug</a></li>
        </ul>
        
       

    </div>
    <footer class="d-flex" id="footer">
        <p>Privacy Policy | Terms of Use | Internet-Based Ads</p>
        <p>&copy;2023<span class="pink">ARtistic</span> All Rights Reserved</p>
    </footer>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="cheatsheet.js"></script>
</body>
</html>