<?php
include "../connect.php";
session_start();
   if(!empty($_SESSION['customerid'])){
    $id=$_SESSION['customerid'];
   
    $query="SELECT * FROM `customer` where customerid='$id' ";
    $rs = $conn->query($query);
    $row = $rs->fetch_assoc();
    $queryc="SELECT * FROM `cart` where customerid='$id' ";
    $rsc = $conn->query($queryc);
    $numc=$rsc->num_rows;
    $queryw="SELECT * FROM `wishlist` where customerid='$id' ";
    $rsw = $conn->query($queryw);
    $numw=$rsw->num_rows;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ARtistic - Home</title>
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

  <style>
    body{
      margin:1rem 1rem;
      overflow-x: none;
    }    .scrolls{
        display:flex;
        gap:1em;
        align-items: center;
        justify-content: center;
        overflow-x: auto;
    }
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }   .fixed-button {
            position: fixed;
            bottom: 2rem;
            right: 1rem;
            z-index: 9999;
            gap:20px;
            
        }.fixed-button a{
            border-radius: 50px;
            background: #ff6b6b;
            border: none;
        }.item-number{
            font-size: 10px;
        }
        
    @media (max-width: 1000px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }.fixed-button{
        bottom: 5rem;
        right: 2rem;
      }.col{
        display:flex;
        flex-direction: column;
      }video{
        width:100%;
      }.tables td img{
        width:5rem;
        height:5rem;
      
    }.tables td p{
      font-size: 10px;
    }
    }
  </style>

</head>
<body>
  <main>
    <!--nav bar-->
    <div class="d-flex fixed-button">
        <a href="#navbar" class="btn btn-primary "><i class="fa fa-arrow-up"></i></a>
        <a href="#footer" class="btn btn-primary "><i class="fa fa-arrow-down"></i></a>
    </div>
    
   <nav class="navbar navbar-expand-lg navbar-dark  mt-2" id="navbar" style="background-color: #453c5c;">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"style="margin-left: 3rem;">
             <span class="pink">AR</span>tistic
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent2" style="margin-left: 5rem;">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#"><span class="pink">HOME</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#product">PRODUCT</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contact">CONTACT US</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#blog">BLOG</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#aboutus">ABOUT US</a>
                </li>
              
              </ul>
              <form class="d-flex" style="margin-right: 1rem;transform:translateY(0.5rem)">
                <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">SEARCH</button>
              </form>
              <?php if(isset($_SESSION['customerid'])){?>
              <form class="d-flex" style="margin-right: 2rem;transform: translateY(0.7rem);">
                
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
              <form class="d-flex" style="margin-left: rem;">
             <a href="profile.php" class="d-flex"  style="color:white;text-decoration:none;text-transform:capitalize;align-items:center;"> <img src="../admin/images/<?php echo $row['profilepic']?>"  style="border-radius:50%;" alt="user-img" height="35"width="36"
                                    class="img-circle me-2 "><?php echo $row['username'];?></a>
              </form>
              <?php }else {?>
                <a  class="btn btn-primary" style="background-color:#ff6b6b;border:none" href="signup.php">SIGN UP</a>
            <?php }?>
            </div>
          </div>
        </nav>
        <!--carousel-->
        <article class="my-2" id="carousel">
    
          <div>
            <div class="bd-example">
        
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="R (6).jfif" width="100%" height="500" alt="First slide">
                  <div class="carousel-caption  text-start">
                    <h4>Home Furnitures</h4>
                    <h2><span>See Before You Buy</span><br><span>Furnish Your Future Home</span></h2>
                    <p>
                        <a class="btn btn-lg btn-primary"  style="background-color:#ff6b6b;border:none" href="#product">Learn more</a></p>
                  </div>
                </div>
                <div class="carousel-item">
                <img src="R (7).jfif" width="100%" height="500" alt="Second slide">
    
                  <div class="carousel-caption">
                    <h4>Home Decors</h4>
                    <h2><span>Find Your Perfect Piece</span><br><span>Discover Endless Design Possibilities</span></h2>
                    <p><a class="btn btn-lg btn-primary" style="background-color:#ff6b6b;border:none" href="#product">Learn more</a></p>
                  </div>
                </div>
                <div class="carousel-item">
                <img src="Reff-Private-office-1.jpg" width="100%" height="500" alt="Third slide">
    
                  <div class="carousel-caption text-end">
                    <h4>Office Furnitures</h4>
                    <h2><span>Create Your Dream Office</span><br><span>Personalise Your Working Space</span></h2>
                    <p><a class="btn btn-lg btn-primary" style="background-color:#ff6b6b;border:none" href="#product">Learn more</a></p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            </div>
          </div>
        </article>

        <!--services-->
      
          <ul class="d-flex" id="services">
            <li class="nav-item">
                <table>
                    <tr class="text-center">
                        <td></td>
                        <td><p><b>Home Delivery</b><br><span id="disappear">Get your products from home</span></p></td>
                    </tr>
                  </table> 
            </li>
            <li class="nav-item">
                <table>
                    <tr class="text-center">
                        <td></td>
                        <td><p><b>30days warranty</b><br><span id="disappear">Garantee our product's quality</span></p></td>
                    </tr>
                  </table> 
            </li>
            <li class="pink">
                <table>
                    <tr class="text-center">
                        <td></td>
                        <td><p><b>AR testing</b><br><span id="disappear">Real time testing of products</span></p></td>
                    </tr>
                  </table> 
            </li>
            <li>
                <table>
                    <tr class="text-center">
                        <td></td>
                        <td><p><b>Secure Payment</b><br><span id="disappear">Digitally buy products</span></p></td>
                    </tr>
                  </table> 
            </li>
            <li>
                <table>
                    <tr class="text-center">
                        <td></td>
                        <td><p><b>24/7 availability</b><br><span id="disappear">Platform always available</span></p></td>
                    </tr>
                  </table> 
            </li>
        </ul>
        </div>
        <div class="collection">
          <center>
            <h1 class="main">Our Collection</h1>
          <hr>
          </center>
          
          <div class="tables">
              <center>
                  <table>
                      <tr>
                          <td>
                              <img src="../assets/products/home2.jpg">
                              <p>LIGHTS</p>
                          </td>
                          <td>
                              <img  src="../assets/products/darlightinggroup_1931972_Lupita6LightPendantBlacka.jpg.webp">
                              <p>DECORATIONS</p>
                          </td>
                          <td class="larger" colspan="2">
                              <img src="../assets/products/outdoor-furniture.jpg">
                              <p>OUTDOOR DESIGN</p>
                          </td>
                      </tr>
                      <tr>
                          <td colspan="2" class="larger">
                              <img src="../assets/menu/menu_bg4.jpg">
                              <p>SPACE FURNITURE</p>
                          </td>
                          <td>
                              <img src="../assets/banner/banner1.jpg">
                              <p>FURNITURE</p>
                          </td>
                          <td >
                             
                              <img src="../assets/products/Reff-Private-office-1.jpg">
                              <p>OFFICE CHAIRS</p>
                          </td>
                      </tr>
                  </table>
              </center>
             
          </div>
      </div>
      <nav class="navbar  nav-tabs " id="product" aria-label="Second navbar example">
        <div class="container-fluid">
          <div class="product">
            <h1 class="main">Our Products</h1>
            <hr>
          </div>
          
            <form class="d-flex">
              <input class="form-control" type="text" placeholder="Search" aria-label="Search">
            </form>
              <div class="bd-example">
                <nav>
                  <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Furnitures</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-acces" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Accesories</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-office" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Office</button>
                    <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-couches" type="button" role="tab" aria-controls="nav-home" aria-selected="false">Home</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-furniture" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Outdoor</button>
                    
                  </div>
                </nav>
               
                </div>
                
           
          </div>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="scrolls">
          <?php $query1="SELECT * FROM `product`";
    $rs1 = $conn->query($query1);
    
    $num1 = $rs1->num_rows;
    if($num1>0){
        while($row1 = $rs1->fetch_assoc()){
    ?>
           <div class="perscroll">
                <?php ?>
                <img src="../admin/images/<?php echo $row1['mainpic']?>">
                <div class="stars"> <div class="stars">
                    <a href="#"><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                    <a href="#"><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                </div></div>
                <p><?php echo $row1['productname']?><br><span id="price"></span></p>
                <h4><?php echo $row1['price'].' XAF'?></h4>
                <div class="overlay" width="50px">
                 
                <?php if(isset($_SESSION['customerid'])){?>
                    <a href="product.php?id=<?php echo $row1['productid']?>"><i class="fa fa-eye"></i></a>
                    <?php 
                     
                    $mypid=$row1['productid'];
                     $query="SELECT * FROM `wishlist` where customerid='$id' && productid='$mypid' ";
                     $rs = $conn->query($query);
                     $num=$rs->num_rows;
                     $queryca="SELECT * FROM `cart` where customerid='$id' && productid='$mypid' ";
                     $rsca = $conn->query($queryca);
                     $numca=$rsca->num_rows;
                    if($num<=0){?>
                    <a href="operation.php?addwishlistid=<?php echo $row1['productid']?>"><i class="fa fa-heart"></i></a>
                    <?php }else{?>
                      <a href="operation.php?deletewishlistid=<?php echo $row1['productid']?>"><i style="color:#453c5c"class="fa fa-heart"></i></a>
                    <?php }if($numca<=0){?>
                    <a href="operation.php?addcartid=<?php echo $row1['productid']?>"><i class="fa fa-shopping-cart"></i></a>
                    <?php }else{?>
                      <a ><i style="color:#453c5c" class="fa fa-shopping-cart"></i></a>
                      <?php }}else{?>
                        <a href="signup.php" class="p-3" style="text-decoration:none;color:white;margin-left:0px">Sign In To View</a>
                        <?php }?>
                </div>
            </div>
            <?php } }else{?>
                <h2 style="margin:20px">NO PRODUCT AVAILABLE</h2>
                <?php }?>
        </div>
        </div>
        <div class="tab-pane fade" id="nav-acces" role="tabpanel" aria-labelledby="nav-profile-tab">
          <div class="scrolls">
          <?php $query2="SELECT * FROM `product` WHERE categoryid='3'";
    $rs2 = $conn->query($query2);
    
    $num2 = $rs2->num_rows;
    if($num2>0){
        while($row2 = $rs2->fetch_assoc()){
    ?>
           <div class="perscroll">
                <img src="../admin/images/<?php echo $row2['mainpic']?>">
                <div class="stars"> <div class="stars">
                    <a href="#"><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                    <a href="#"><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                </div></div>
                <p><?php echo $row2['productname']?><br><span id="price"></span></p>
                <h4><?php echo $row2['price'].' XAF'?></h4>
                <div class="overlay">
                <?php if(isset($_SESSION['customerid'])){?>
                    <a href="product.php?id=<?php echo $row2['productid']?>"><i class="fa fa-eye"></i></a>
                    <?php 
                    
                    $mypid=$row2['productid'];
                     $query="SELECT * FROM `wishlist` where customerid='$id' && productid='$mypid' ";
                     $rs = $conn->query($query);
                     $num=$rs->num_rows;
                     $queryca="SELECT * FROM `cart` where customerid='$id' && productid='$mypid' ";
                     $rsca = $conn->query($queryca);
                     $numca=$rsca->num_rows;
                    if($num<=0){?>
                    <a href="operation.php?addwishlistid=<?php echo $row2['productid']?>"><i class="fa fa-heart"></i></a>
                    <?php }else{?>
                      <a href="operation.php?deletewishlistid=<?php echo $row2['productid']?>"><i style="color:#453c5c"class="fa fa-heart"></i></a>
                    <?php }if($numca<=0){?>
                    <a href="operation.php?addcartid=<?php echo $row2['productid']?>"><i class="fa fa-shopping-cart"></i></a>
                    <?php }else{?>
                      <a ><i style="color:#453c5c" class="fa fa-shopping-cart"></i></a>
                      <?php }}else{?>
                        <a href="signup.php" class="p-3" style="text-decoration:none;color:white;margin-left:0px">Sign In To View</a>
                        <?php }?>
                    
                </div>
            </div>
            <?php } }else{?>
                <h2 style="margin:20px">NO PRODUCT AVAILABLE</h2>
                <?php }?>
          
        </div>
        </div>
        <div class="tab-pane fade" id="nav-office" role="tabpanel" aria-labelledby="nav-contact-tab">
          <div class="scrolls">
          <?php $query3="SELECT * FROM `product` WHERE categoryid='2'";
    $rs3 = $conn->query($query3);
    
    $num3= $rs3->num_rows;
    if($num3>0){
        while($row3 = $rs3->fetch_assoc()){
    ?>
           <div class="perscroll">
                <img src="../admin/images/<?php echo $row3['mainpic']?>">
                <div class="stars"> <div class="stars">
                    <a href="#"><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                    <a href="#"><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                </div></div>
                <p><?php echo $row3['productname']?><br><span id="price"></span></p>
                <h4><?php echo $row3['price'].' XAF'?></h4>
                <div class="overlay">
                <?php if(isset($_SESSION['customerid'])){?>
                    <a href="product.php?id=<?php echo $row3['productid']?>"><i class="fa fa-eye"></i></a>
                    <?php 
                    
                    $mypid=$row3['productid'];
                     $query="SELECT * FROM `wishlist` where customerid='$id' && productid='$mypid' ";
                     $rs = $conn->query($query);
                     $num=$rs->num_rows;
                     $queryca="SELECT * FROM `cart` where customerid='$id' && productid='$mypid' ";
                     $rsca = $conn->query($queryca);
                     $numca=$rsca->num_rows;
                    if($num<=0){?>
                    <a href="operation.php?addwishlistid=<?php echo $row3['productid']?>"><i class="fa fa-heart"></i></a>
                    <?php }else{?>
                      <a href="operation.php?deletewishlistid=<?php echo $row3['productid']?>"><i style="color:#453c5c"class="fa fa-heart"></i></a>
                    <?php }if($numca<=0){?>
                    <a href="operation.php?addcartid=<?php echo $row3['productid']?>"><i class="fa fa-shopping-cart"></i></a>
                    <?php }else{?>
                      <a ><i style="color:#453c5c" class="fa fa-shopping-cart"></i></a>
                      <?php }}else{?>
                        <a href="signup.php" class="p-3" style="text-decoration:none;color:white;margin-left:0px">Sign In To View</a>
                        <?php }?>
                    
                </div>
            </div>
            <?php } }else{?>
                <h2 style="margin:20px">NO PRODUCT AVAILABLE</h2>
                <?php }?>
        </div>
        </div>
        <div class="tab-pane fade" id="nav-couches" role="tabpanel" aria-labelledby="nav-contact-tab">
          <div class="scrolls">
          <?php $query4="SELECT * FROM `product` WHERE categoryid='1'";
    $rs4 = $conn->query($query4);
    
    $num4 = $rs4->num_rows;
    if($num4>0){
        while($row4 = $rs4->fetch_assoc()){
    ?>
           <div class="perscroll">
                <img src="../admin/images/<?php echo $row4['mainpic']?>">
                <div class="stars"> <div class="stars">
                    <a href="#"><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                    <a href="#"><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                </div></div>
                <p><?php echo $row4['productname']?><br><span id="price"></span></p>
                <h4><?php echo $row4['price'].' XAF'?></h4>
                <div class="overlay">
                <?php if(isset($_SESSION['customerid'])){?>
                    <a href="product.php?id=<?php echo $row4['productid']?>"><i class="fa fa-eye"></i></a>
                    <?php 
                   
                    $mypid=$row4['productid'];
                     $query="SELECT * FROM `wishlist` where customerid='$id' && productid='$mypid' ";
                     $rs = $conn->query($query);
                     $num=$rs->num_rows;
                     $queryca="SELECT * FROM `cart` where customerid='$id' && productid='$mypid' ";
                     $rsca = $conn->query($queryca);
                     $numca=$rsca->num_rows;
                    if($num<=0){?>
                    <a href="operation.php?addwishlistid=<?php echo $row4['productid']?>"><i class="fa fa-heart"></i></a>
                    <?php }else{?>
                      <a href="operation.php?deletewishlistid=<?php echo $row4['productid']?>"><i style="color:#453c5c"class="fa fa-heart"></i></a>
                    <?php }if($numca<=0){?>
                    <a href="operation.php?addcartid=<?php echo $row4['productid']?>"><i class="fa fa-shopping-cart"></i></a>
                    <?php }else{?>
                      <a ><i style="color:#453c5c" class="fa fa-shopping-cart"></i></a>
                      <?php }}else{?>
                        <a href="signup.php" class="p-3" style="text-decoration:none;color:white;margin-left:0px">Sign In To View</a>
                        <?php }?>
                    
                </div>
            </div>
            <?php } }else{?>
                <h2 style="margin:20px">NO PRODUCT AVAILABLE</h2>
                <?php }?>
           
        </div>
        </div>
        <div class="tab-pane fade" id="nav-furniture" role="tabpanel" aria-labelledby="nav-contact-tab">
          <div class="scrolls">
          <?php $query5="SELECT * FROM `product` WHERE categoryid='4'";
    $rs5 = $conn->query($query5);
    
    $num5 = $rs5->num_rows;
    if($num5>0){
        while($row5 = $rs5->fetch_assoc()){
    ?>
           <div class="perscroll">
                <img src="../admin/images/<?php echo $row5['mainpic']?>">
                <div class="stars"> <div class="stars">
                    <a href="#"><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                    <a href="#"><i class="fa fa-star"></i></a>
                    <a href=""><i class="fa fa-star"></i></a>
                </div></div>
                <p><?php echo $row5['productname']?><br><span id="price"></span></p>
                <h4><?php echo $row5['price'].' XAF'?></h4>
                <div class="overlay text-center">
                <?php if(isset($_SESSION['customerid'])){?>
                    <a href="product.php?id=<?php echo $row5['productid']?>"><i class="fa fa-eye"></i></a>
                    <?php 
                     
                    $mypid=$row5['productid'];
                     $query="SELECT * FROM `wishlist` where customerid='$id' && productid='$mypid' ";
                     $rs = $conn->query($query);
                     $num=$rs->num_rows;
                     $queryca="SELECT * FROM `cart` where customerid='$id' && productid='$mypid' ";
                     $rsca = $conn->query($queryca);
                     $numca=$rsca->num_rows;
                    if($num<=0){?>
                    <a href="operation.php?addwishlistid=<?php echo $row5['productid']?>"><i class="fa fa-heart"></i></a>
                    <?php }else{?>
                      <a href="operation.php?deletewishlistid=<?php echo $row5['productid']?>"><i style="color:#453c5c"class="fa fa-heart"></i></a>
                    <?php }if($numca<=0){?>
                    <a href="operation.php?addcartid=<?php echo $row4['productid']?>"><i class="fa fa-shopping-cart"></i></a>
                    <?php }else{?>
                      <a ><i style="color:#453c5c" class="fa fa-shopping-cart"></i></a>
                      <?php }}else{?>
                        <a href="signup.php" class="p-3" style="text-decoration:none;color:white;margin-left:0px">Sign In To View</a>
                        <?php }?>
                    
                </div>
            </div>
            <?php } }else{?>
                <h2 style="margin:20px">NO PRODUCT AVAILABLE</h2>
                <?php }?>
           
        </div>
      
        </div>
      </div>
     
      <div class="collection" id="contact" style="background-color: #453c5c;">
         <div>
          <center>
            <h1 class="main" style="color:white;">Contact Us</h1>
          <hr>
          </center>
         </div>
         <div class="d-flex" id="flex">
          <div class="adress">
            <head>
                <img src="">
                <p class="under">ADDRESS</p>
            </head>
            <P class="state">Cameroon, Yaounde V<br>Nomayos</P>
           </div>
           <div class="email">
            <head>
                <i class="fa fa-location"></i>
                <p class="under">EMAIL</p>
            </head>
            <P class="state">enowbrenda91106@gmail.com<br>enoweweh@gmail.com<br>ARtistic23@gmail.com</P>
           </div>
           <div class="phone">
            <head>
                <img src="">
                <p class="under">PHONE</p>
            </head>
            <P class="state"><img src=""> +237672084416<br><img src=""> +237692711651</P>
           </div>
         
         </div>
      </div>
      <div class="d-flex" id="Enter-message">
        <div class="left1">
          <h2>Message Us</h2>
          <p>Welcome to our ARtistic .If you have any inquiries, feedback, or need assistance, feel free to reach out to us. Our team is here to help you to get the most out of Augmented reality furniture exploration experience</p>
          <p>Our team typically responds within 24hours. For immediate assistance, please give us a call at +237 672084416 during bussiness hours</p>
          <p>Your personal information will be handled in accordance with our privacy policy. By contacting us you agree to our terms of service</p>
          <div class="logo"><a href="/"><span class="pink">AR</span>tistic</a></div> 
      </div>
 
      <form action="operation.php" method="post">
      <?php if(isset($_SESSION['customerid'])){?>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" name="username" value="<?php echo $row['username']?>">
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" name="email" value="<?php echo $row['email']?>" >
          <label for="floatingInput">Email address</label>
        </div>
        <?php }else {?>
          <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" name="username">
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" name="email">
          <label for="floatingInput">Email address</label>
        </div>
        <?php }?>
          <div class="form mb-3">
            <label for="message">Message</label><br>
            <textarea class="form-control" id="message" name="message" aria-label="With textarea"></textarea>
          </div>
          <button class="btn btn-primary" name="sendmessage" style="background-color:#ff6b6b;border:none">SEND</button>
      </form>
      </div>
      <div class="blog" id="blog">
        <div class="d-flex">
          <div>
            <h1 class="main">Explore Our Blog</h1>
            <hr>
          </div>  
           
        </div>
        <div class="table">
            <center>
                <table>
                    <tr class="mobile-scroll">
                        <?php 
        $queryb="SELECT * FROM `request` where requeststatus='Accepted' && requesttype='Blog Request'";
        $rsb = $conn->query($queryb);
        while($rowb = $rsb->fetch_assoc()){
            $blogid=$rowb['requestid'];

     $querys="SELECT * FROM `blog` where id='$blogid' ";
    $rss = $conn->query($querys);
    $nums=$rss->num_rows;
    if($nums>0){
      $rows = $rss->fetch_assoc()?>
    
    
                        <td>
                            <div class="perscrol">
                                <img src="../blog/<?php echo $rows['mainphoto']?>"><p></p>
                                <p class="description"><?php echo $rows['mainheading']?><br></p>
                                <p class="details"><?php echo $rows['datecreated']." / ".$rows['author']?> </p>
                                <form action="blog.php" method="post">
                                  <input type="hidden" name="id" value="<?php echo $blogid?>">
                                <button class="see-more" style="border:none;">See More <i class="fa fa-plus"></i></button>
                                </form>
                            </div>
                        </td>
                        <?php }else{?>
                       <h3 style="color:#ff6b6b">NO BLOG AVAILABLE</h3>
                       <?php } }?>
                    </tr>
                </table>
            </center>
           
        </div>
    </div>
    <div class="collection p-5 d-flex col" id="aboutus" >
    
      <div>
      <center>
            <h1 class="main">ABOUT US</h1>
            <hr>
        </center>
        
        <p class="about container-fluid">Welcome to ARtistic your destination for AR furniture exploration. ARtistic is an augmented reality furniture platform founded by ENOW EWEH MAC BRENDA in 2024 in pursuance of her HND in cameroon ,YIBS to be precised. Learn more about who we are, Our mission and why we are passionate about AR technology and interior design</p>
      </div>
      <video src="../A monster in paris - La seine.mp4" type="video/mp4" width="50%" height=""controls></video>
        
    </div>
    <div class="newsletter d-flex">
        <div>
            <h2>Join Our newsletter and Get Unlimited<span class="pink"> Discount</span></h2>
            <p>Sign up and Get Updated with Exclusive Offers and Discounts</p>
        </div>
        
        <div class="send">
          <form class="operation.php" method="post">
        <?php if(isset($_SESSION['customerid'])){?>
            <input type="email" class="form-control-sm p-2"  name="email" value="<?php echo $row['email']?>">
            <?php }else{?>
              <input type="email" class="form-control-sm p-2" name="signupemail" placeholder="Enter Your Email Address Here">
              <?php }?>
            <button class="btn btn-primary" name="newsletter" style="background-color:#ff6b6b;border:none">Sign Up</button>
        <form>
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
            <li class="button"><a href="#contact">QUICK SERVICES</a></li>
            <li>+237672084416</li>
            <li>enowbrenda91106@gmail.com</li>
            <li>Yaounde, cameroon</li>
            
        </ul>
        <ul>
            <li><b>NEED HELP?</b></li>
            <li><a href="#">My Orders</a></li>
            <li><a href="#">My Account</a></li>
            <li><a href="#">Help Center</a></li>
            <li><a href="#contact">Report A Bug</a></li>
        </ul>
        
       

    </div>
    <footer id="footer">
        <p>Privacy Policy | Terms of Use | Internet-Based Ads</p>
        <p>&copy;2023<span class="pink">ARtistic</span> All Rights Reserved</p>
    </footer>
        </main>

        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

        <script src="cheatsheet.js"></script>
        
</body>
</html>