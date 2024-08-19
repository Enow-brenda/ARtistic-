<?php
include "../connect.php";
session_start();
$blogid=$_POST['id'];
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
$querys="SELECT * FROM `blog` where id='$blogid' ";
$rss = $conn->query($querys);
$rows = $rss->fetch_assoc();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Blog Template · Bootstrap v5.0</title>
    <link href="blog.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <body>
        <div class="d-flex fixed-button">
            <a href="#navbar" class="btn btn-primary "><i class="fa fa-arrow-up"></i></a>
            <a href="#footer" class="btn btn-primary "><i class="fa fa-arrow-down"></i></a>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark  mt-2" id="navbar" style="background-color: #453c5c;">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"style="margin-left: 3rem;width:30%">
               <span class="pink">AR</span>tistic
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent2" style="margin-left: 5rem;">
               
              <form class="d-flex" style="margin-right: 2rem;transform:translateY(0.5rem)">
                <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">SEARCH</button>
              </form>
              <?php if(isset($_SESSION['email'])){?>
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
              <form class="d-flex" style="margin-left: 2rem;">
             <a href="profile.php" class="d-flex"  style="color:white;text-decoration:none;text-transform:capitalize;align-items:center"> <img src="../admin/images/<?php echo $row['profilepic']?>"  style="border-radius:50%;" alt="user-img" height="35"width="36"
                                    class="img-circle me-2 "><?php echo $row['username'];?></a>
              </form>
              <?php }else {?>
                <a  class="btn btn-primary" style="background-color:#ff6b6b;border:none" href="signup.php">SIGN UP</a>
            <?php }?>
            </div>
            </div>
          </nav>
          <div class="container-fluid" style="max-width:90%;">
            <p><a style="text-decoration: none;" href="index.php" class="pink">Home</a> / Blog / <?php echo $rows['mainheading'];?></p>
            <p>by <?php echo $rows['author'];?> <?php echo ' / '.$rows['datecreated']?> </p>
            <div class="d-flex text-center" style="text-transform:capitalize;align-items:center;justify-content:center;">
                <div class="main">
                    <img width="600px" height="400px" src="../blog/<?php echo $rows['image1'];?>">
                </div>
                <div class="headone  p-5">
                    <p><b style="font-size: 30px;"><?php echo $rows['subheading1'];?></b></p>
                    <p><?php echo $rows['content1'];?></p>
                    </div>
            </div>
            <div class="d-flex text-center" style="text-transform:capitalize;align-items:center;justify-content:center;">
               
                <div class="headone  p-5">
                    <p><b style="font-size: 30px;"><?php echo $rows['subheading2'];?></b></p>
                    <p><?php echo $rows['content2'];?></p>
                    </div>
                    <div class="main">
                        <img width="600px" height="400px" src="../blog/<?php echo $rows['image2'];?>">
                    </div>
            </div>
          </div>
          <div class="blog">
            
              <div style="margin-left:50px;">
                <h1 class="main" >Related Blog</h1>
                <hr style="border:3px red solid;border-radius: 10px;margin-left: 20px;">
              </div>  
               
            
            <div class="table">
                <center>
                    <table>
                    <tr class="mobile-scroll">
                    <?php 
        $queryb="SELECT * FROM `request` where requeststatus='Accepted' && requesttype='Blog Request' && requestid!='$blogid'";
        $rsb = $conn->query($queryb);
        $numb=$rsb->num_rows;
        if($numb>0){
        while($rowb = $rsb->fetch_assoc()){
            $blog2id=$rowb['requestid'];

     $querys="SELECT * FROM `blog` where id='$blog2id' ";
    $rss = $conn->query($querys);
    
    
      $rows = $rss->fetch_assoc()?>
    
    
                        <td>
                            <div class="perscrol">
                                <img src="../blog/<?php echo $rows['mainphoto']?>"><p></p>
                                <p class="description"><?php echo $rows['mainheading']?><br></p>
                                <p class="details"><?php echo $rows['datecreated']." / ".$rows['author']?> </p>
                                <form action="blog.php" method="post">
                                  <input type="hidden" name="id" value="<?php echo $blog2id?>">
                                <button class="see-more" style="border:none;">See More <i class="fa fa-plus"></i></button>
                                </form>
                            </div>
                        </td>
                        <?php }}else{?>
                       <h3 style="color:#ff6b6b">NO OTHER BLOG AVAILABLE</h3>
                       <?php } ?>
                    </tr>
                    </table>
                </center>
               
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
        <footer class="d-flex col" id="footer">
            <p>Privacy Policy | Terms of Use | Internet-Based Ads</p>
            <p>&copy;2023<span class="pink">ARtistic</span> All Rights Reserved</p>
        </footer>
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    
        <script src="cheatsheet.js"></script>  
    </body>
    
 
</html>
