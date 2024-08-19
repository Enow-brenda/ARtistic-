<?php
include "../connect.php";
session_start();
$prodid=$_GET['id'];
$query1="SELECT * FROM `product` where productid='$prodid' ";
$rs1 = $conn->query($query1);
$row1 = $rs1->fetch_assoc();

$query3="SELECT * FROM `reviews` where productid='$prodid' ";
$rs3 = $conn->query($query3);
$num3 = $rs3->num_rows;
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
}?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>ARtistic - Product</title>
  
    <link href="product.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .stars select span{
            background: yellow;
        }
        
        body{
    font-size: 15px;
}
.fly-item{
    position:absolute;
    height:16px;
    font-weight: 400;
    padding:3px;
    text-align:center;
    line-height: 10px;
    color:white;
}.blog .perscrol img{
    width:25.2rem;
    height:12rem;
    
}.blog .description{
   font-weight: 600;
   color:black;
}
.blog .details{
    
    color:rgb(116, 114, 114);
    font-size: 15px;
 }.blog{
    margin-top: 3rem;
    margin-bottom: 3rem;
 }.blog .d-flex{
    gap: 50rem;
 }.see-more{
    width: fit-content;
    padding: 10px;
    background:#ff6b6b;
    color: white;
   margin-top: -115px;
   margin-left: 18.7rem;
   cursor: pointer;
    position: absolute;
    display:none;
    transition: filter all 0.3s ease;
}.perscrol:hover .see-more{
    display: block;
    
}.table td img{
    margin-right: 20px;
}
 .blog a{
    float:right;
    color: black;
    text-decoration: none;
    margin-right: 20px;
    margin-top: 10px;
 }.blog a:hover{
    color:#ff6b6b;
 }
nav .fly-item{
    margin-top: -20px;
    width:fit-content;
    height: fit-content;
    border-radius: 3px;
   margin-left:10px;
   font-size: 10px;
   background-color: red;
   border-radius: 20px;
   padding-bottom: 0px;
}.icon-large{
    position: relative;
    }
.pink{
    color:#ff6b6b ; 
}
#services{
    list-style: none;
    text-align: center;
    justify-content: center;
    align-items: center;
    gap:2em;
    font-size: 13px;
    margin-top: 2rem;
}.collection{
    background-color:rgb(230, 227, 227) ;
    width:100%;
    padding-top: 30px;
    padding-bottom: 30px;
    text-align: center;
    }
    .tables td img{
        background-color: white;
        padding:5px;
        width:15rem;
        height:12rem
    }.tables .larger img{
        width:30rem;
    }.tables p{
        color: #fd5959;
    }hr{
        border-radius: 50px;
        border:#ff6b6b 2px solid;
        width:6rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .scrolls{
        display:flex;
        gap:1em;
        overflow-x: auto;
        justify-content: center;
    }.perscroll:hover .overlay{
        display: block;
    }.perscroll{
        position: relative;
    }.overlay i{
        padding: 10px;
        margin-left: 10px;
      color:white
    }.overlay{
        display: flex;
        gap:6rem;
        position:absolute;
        top:8rem;
        display: none;
        background: #ff6b6b;
        left:3rem;
        opacity:1;
        color:white;
        transition: all 0.3s ease;
    }.stars i{
        color: rgb(238, 238, 45);
    }.perscroll:hover img {
        filter: blur(2px);
    }.perscroll img{
        width:15rem;
        height:20rem;
    }.under{
        color:white;
        font-weight: bolder;
        font-size: 20px;
    }.state{
        color:rgb(150, 149, 148);
    }
    #flex{
        text-align: center;
        justify-content: center;
        align-items:center;
        gap:3rem;
    }.left1{
        width:50%;
    }#Enter-message{
        padding:5rem 10rem;
        gap:2rem;
        background-color: rgb(230, 227, 227);
    }#Enter-message form{
        width:50%;
    }#Enter-message textarea{
        height:200px;
    }
    #Enter-message button{
        width:100%;
    }#Enter-message .logo{
        margin-top: 3rem;
      font-size: 4rem;
      text-align: center;
    }#Enter-message .logo a{
        color:#453c5c;
        text-decoration: none;
    }
.newsletter{
    background-color: #453c5c;
    color:white;
    text-align: center;
    justify-content: center;
    align-items: center;
    gap:2em;
    padding:1em;
    margin-top: 2em;
}.footer{
    
    background-color:rgb(230, 227, 227) ;
    width:100%;
    padding-top: 30px;
    padding-bottom: 30px;
    
    margin-top: 2rem;
}.footer ul{
list-style: none;
display: flex;
flex-direction: column;
gap:1rem;
margin-right: 3rem;

}.footer a,.footer li{
text-decoration: none;
color:gray;
font-size: 15px;
}.footer a:hover{
color: #ff6b6b;

}body{
    margin:20px;
}
.footer b{
color: black;
}.footer .button{

padding:5px 5px;
background-color: #ff6b6b;
width: fit-content;
border-radius: 20px;
}.footer .button a{
color: white;
font-size: 10px;
}.footer .logo a{
font-size: 50px;
color:#794afa;
margin-left: 7rem;
margin-right: 7rem;
}
footer{
display: flex;
gap:20rem;
color:gray;
font-size: 10px;
margin-left: 15%;
margin-top: 1rem;
}

@media (max-width: 1000px) {
    #services {
      font-size: 5px;
     margin-left: -3rem;
      gap:0.5em;
     
    }.mobile{
        display: flex;
       flex-direction: column;
       gap:1rem;
    }
    .tables td img{
        width:5rem;
        height:5rem;
    }body{
        font-size: 12px;
    }
    .tables .larger img{
        width:10rem;
    }.tables p{
        font-size: 12px;
    }#product input[type="text"]{
         margin-bottom: 20px;
    }.d-flex{
        flex-direction: column;
    }.col{
        flex-direction: row;
    }
    .img{
        width:90%;
    }body{
        margin:0px;
    }
#nav-tab{
        font-size: 12px;
    }.scrolls img{
        width:10rem;
        height:15rem;
    }.overlay{
        gap:1rem;
        position:absolute;
        top:7rem;
        display: none;
        background: #ff6b6b;
        left:1rem;
        opacity:1;
    }.overlay i{
        font-size: 12px;
    }.scrolls p{
        font-size: 12px;
    }.scrolls h2{
        font-size: 15px; 
    }#flex .under{
        font-size: 15px;
    }#flex{
        gap:1em
    }#Enter-message{
        flex-direction: column;
        padding:0px;
        justify-content: center;
        align-items: center;
        padding-top: 1em;
        
    }#Enter-message form{
        width:80%;
    }.blog .d-flex{
        flex-direction: column;
        gap:1em;
    }
    .table td img{
        width:10rem;
    }.table{
        overflow-x: auto;
    }.table .perscrol img{
        width:20rem
    }.see-more{
        display: block;
        margin:0px;
        position: relative;
       
    }.newsletter{
        flex-direction: column;
    }.collection p{
        padding:0px;
    }.footer{
        flex-direction: column;
    }.footer .logo{
        text-align: center;
    }
   
    footer p{
        font-size: 0.5rem;
        margin-left: 1rem;

    }footer{
        gap:0rem;
        margin-left: 0rem;
    }col{
        flex-direction: row;
    }.fixed-button{
        bottom: 5rem;
        right: 2rem;
      }
}

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }body{
        margin:20px;
      }

      @media (max-width: 1000px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }#quantityInput{
            width:3rem;
        }
      }
      .accordion {
      border: 1px solid #ddd;
      margin: 5px;
    }

    .accordion-header {
      background-color: #f4f4f4;
      padding: 10px;
      cursor: pointer;
    }

    .accordion-content {
      padding: 10px;
      display: none;
    }.fixed-button {
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

    <body>
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
               
                    <form class="d-flex search col" style="margin-right: 2rem;transform:translateY(0.5rem)">
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
                    <form class="d-flex" style="margin-right: 2rem;transform:translateY(0.5rem)">
                    <a href="profile.php" style="color:white;text-decoration:none;text-transform:capitalize;"> <img src="../admin/images/<?php echo $row['profilepic']?>"  style="border-radius:50%;" alt="user-img" height="35"width="36"
                                            class="img-circle me-2 " ><?php echo $row['username'];?></a>
                    </form>
                    <?php }else {?>
                        <a  class="btn btn-primary" href="signup.php">SIGN UP</a>
                    <?php }?>
              </div>
            </div>
          </nav>
          <div class="container-fluid">
            <p><a style="text-decoration: none;" href="index.php" class="pink">Home</a> / Product / <?php echo $row1['productname']?></p>
            <div class="d-flex" style="justify-content:center;">
                <div class="main">
                    <img width="500px" class="img" height="400px" src="../admin/images/<?php echo $row1['mainpic']?>">
                    <div class="d-flex col other" style="gap:0.5rem;margin-top: 0.5rem;justify-content:center;">
                      
                        <?php 
                      $query2 = "SELECT * FROM `productimage` where productid='$prodid'";
                      $rs2 = $conn->query($query2);
                      while($row2 = $rs2->fetch_assoc()){
                      ?>
                      <img width="70px" src="../admin/images/<?php echo $row2['image']?>" class="me-2" width="100" height="50">
                      <?php }?>
                    </div>
                    <form action="../AR/test.php" method="post">
                        <input type="hidden" name="productid" value="<?php echo $row1['productid']?>">
                        <button class="w-100 btn btn-primary btn-lg" style="background-color: #ff6b6b;border:none;margin-top: 1rem;" name="tryitem" >Try Item</button>
                    </form>
                    
                </div>
                <div class="uright">
                    <div class="itemS">
                       <div class="headone">
                        <p><b style="font-size: 30px;text-transform:capitalize"><?php echo $row1['productname'];?></b></p>
                        <div class="stars">
                            <a href="#" id="1"><i class="fa fa-star"></i></a>
                            <a href="#" id="2"><i class="fa fa-star"></i></a>
                            <a href="#" id="3"><i class="fa fa-star"></i></a>
                            <a href="#" id="4"><i class="fa fa-star"></i></a>
                            <a href="#" id="5"><i class="fa fa-star"></i></a>
                            <a id="review" href="" style="text-decoration: none;color:black;margin-left: 20px;">4.0 | <span id ="review" style="color:#ff6b6b"><?php echo $num3?> Reviews</span></a>
                        </div>
                       </div>
                       <div class="headtwo">
                        <p><span id="nowprice" style="color:rgb(82, 82, 136);font-size: 25px;"><b><?php echo $row1['price'];?> XAF</b></span><br><br><span id="status" style="color:#ff6b6b;font-weight: bold;"> ON SALE(<?php echo $row1['quantity'];?>)</span></p>
                       </div>
                       <?php
                        $query5="SELECT * FROM `cart` where productid='$prodid' && customerid='$id' ";
$rs5 = $conn->query($query5);
$row5 = $rs5->fetch_assoc();
$num5 = $rs5->num_rows;
if($num5==0){?>
 <form action="operation.php" method="post">
                       
                       <div class="quantity">

                        <table width="100%">
                            <tr>
                                
                                <td>
                                    <div style="margin-left: 15px;width:fit-content; border:2px black solid;border-radius: 10px;text-align: center;padding:5px;"><i class="fa fa-heart" id="heart" onclick="changecolor()"></i></div> 
                                </td>
                                <td width="60%">
                                  <input type="hidden" name="product" value="<?php echo $row1['productid']?>">
                                    <button class="btn btn-primary" name="cartadd">Add to Cart</button>
                                </form>
                                </td>
                            </tr>
                        </table>
                        
                        
                       </div>
                    </div><br>

                    <?php }?>
                    <div class="accordion">
                        <div class="accordion-header" onclick="toggleAccordion(this)">INFORMATION</div>
                        <div class="accordion-content">
                          <table>
                            <tr>
                                <td>
                                    <b>Manufacturer:</b>
                                </td>
                                <td style="text-transform:capitalize">
                                <?php 
                                      $creatorid=$row1['creatorid'];
                                      if ($row1['creatorrole']==1){
                                          $querya = "SELECT * FROM admin where adminid='$creatorid'";
                                          $rsa = $conn->query($querya);
                                          $rowa = $rsa->fetch_assoc();
                                          echo $rowa['position']." - ".$rowa['name']; 
                                      }else{
                                        $querya = "SELECT * FROM supplier where supplierid='$creatorid'";
                                          $rsa = $conn->query($querya);
                                          $rowa = $rsa->fetch_assoc();
                                          echo $rowa['company']. "- ".$rowa['name']; 
                                      }?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Available:</b>
                                </td>
                                <td>
                                <?php echo $row1['quantity'];?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Size:</b>
                                </td>
                                <td>
                            <?php echo $row1['length']." X ".$row1['width']." X ".$row1['height']." mm"?>
                                </td>
                            </tr>
                           </table>
                        </div>
                      </div>
                      <div class="accordion">
                        <div class="accordion-header" onclick="toggleAccordion(this)">DETAILS</div>
                        <div class="accordion-content">
                          <p style="font-size: 13px;"><?php echo $row1['description'];?></p>
                        </div>
                      </div>
                      <div class="accordion">
                        <div class="accordion-header" onclick="toggleAccordion(this)">REVIEW</div>
                        <div class="accordion-content">
                          
                            <h2>Write a Review</h2>
                      
                            <form style="display:block;text-align: left;" action="operation.php" method="post">
                            <p class="stars">
                             <span id="question">
                                 How satisfied Are you?
                             </span>
                             <select name="stars" class="form-control">
                                <option value="1"><span>&#9733;</span></option>
                                <option value="2">
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                            </option>
                            <option value="3">
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                            </option>
                            <option value="4">
                                     <span>&#9733;</span>
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                            </option>
                            <option value="5">
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                            </option>
                             </select>
                            </p>
                            
                                 <input type="hidden" name="productid" value="<?php echo $row1['productid']?>" class="form-control">
                             
                             
                             <div>
                                 <label>REVIEW</label><br>
                                 <textarea name="reviewdes" id="" cols="10" rows="5" class="form-control"></textarea>
                             </div>
                             <br>
                             <button class="btn btn-primary" name="review">Submit Review</button>
                            </form>
                          
                        </div>
                      </div>
                      
                    
                    
                    
                  </div>
            </div>
           
          </div>
        
          <div class="rating d-flex " style="background-color: #ddd;">
          <?php if($num3>0){
            $rating=0;
            while($rowp = $rs3->fetch_assoc()){
               $rating=$rating+$rowp['stars']; 
            }
            ?>
           
            <div class="leftrating">
                <h1><?php echo ($rating/$num3).'.0'?></h1>
                    <div class="stars">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                    </div>
               
                <p><?php echo $num3.' Reviews'?></p>
            </div>
            <div class="rightrating">
                <table>
                    <tr class="tr">
                        <td width="">
                             5<i class="fa fa-star"></i></td>
                        <td>
                            <div class="whole">
                                <div class="range" id="range5"></div>
                            </div>
                        </td>
                        <td><p><?php 
                        $queryr="SELECT * FROM `reviews` where productid='$prodid' && stars='5' ";
                        $rsr = $conn->query($queryr);
                       echo $numr = $rsr->num_rows;
                        ?></p></td>
                    </tr>
               
                    <tr>
                        <td>4<i class="fa fa-star"></i></td>
                        <td>
                            <div class="whole">
                                <div class="range" id="range4"></div>
                            </div>
                        </td>
                        <td><p>  <?php
                        $queryr="SELECT * FROM `reviews` where productid='$prodid' && stars='4' ";
                        $rsr = $conn->query($queryr);
                       echo $numr = $rsr->num_rows;?></p></td>
                    </tr>
                    <tr>
                        <td>3 <i class="fa fa-star"></i></td>
                        <td>
                            <div class="whole">
                                <div class="range" id="range3"></div>
                            </div>
                        </td>
                        <td><p><?php
                        $queryr="SELECT * FROM `reviews` where productid='$prodid' && stars='3' ";
                        $rsr = $conn->query($queryr);
                       echo $numr = $rsr->num_rows;?></p></td>
                    </tr>
                    <tr>
                        <td>2 <i class="fa fa-star"></i></td>
                        <td>
                            <div class="whole">
                                <div class="range" id="range2"></div>
                            </div>
                        </td>
                        <td><p><?php
                        $queryr="SELECT * FROM `reviews` where productid='$prodid' && stars='2' ";
                        $rsr = $conn->query($queryr);
                       echo $numr = $rsr->num_rows;?></p></td>
                    </tr>
                    <tr>
                        <td>1 <i class="fa fa-star"></i></td>
                        <td>
                            <div class="whole">
                                <div class="range" id="range1"></div>
                            </div>
                        </td>
                        <td><p><?php
                        $queryr="SELECT * FROM `reviews` where productid='$prodid' && stars='1' ";
                        $rsr = $conn->query($queryr);
                       echo $numr = $rsr->num_rows;?></p></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="customerreview" style="margin-top: 3em;margin-bottom: 2em;">
         
          <div class="revscroll" >
            
            <table>
              <tr class="d-flex col trow" style="justify-content:center;align-items:center">
              <?php 
              $query3="SELECT * FROM `reviews` where productid='$prodid' ";
              $rs3 = $conn->query($query3);
              while($rowp1= $rs3->fetch_assoc()){?>
                  <td>
            
                      <div class="individual" >
                          <div class="top">
                          <?php
                          $custoid=$rowp1['customerid'];
                        $queryp2="SELECT * FROM `customer` where customerid='$custoid'";
                        $rsp2 = $conn->query($queryp2);
                        $rowp2= $rsp2->fetch_assoc();?>
                              <img style="width:65px;height:60px;border-radius: 50px;"src="../admin/images/<?php echo $rowp2['profilepic']?>">
                              <div>
                                  <p class="pb-2"><?php echo $rowp2['name'];?><br><span ><?php echo $rowp1['datecreated'];?></span></p>
                              </div>
                          </div>
                          <div class="stars">
                         
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href=""><i class="fa fa-star"></i></a>
                              <a href=""><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href=""><i class="fa fa-star"></i></a>
                          </div>
                          <p> <p><?php echo $rowp1['review'];?></p></p>
                         
                      </div>
                  </td>
                  <?php }?>
              </tr>
          </table>
          </div>
        <?php }else{?>
        <h3>No Customer Review</h3><?php }?>
      </div>
              
      <div class="products">
        <dir>
            <di>
                <h1 class="main1">Related  Products</h1>
                <center><hr style="color: #ef1414;height: 5px;"></center>
            </di>
            
           
        </dir>
                
            
        <div class="scrolls">
        <?php
        $category = $row1['categoryid'];
         $query4="SELECT * FROM `product` WHERE categoryid='$category' AND productid!='$prodid'";
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

                    <a href="product.php?id=<?php echo $row4['productid']?>"><i class="fa fa-eye"></i></a>
                    <a href="operation.php?id=<?php echo $row4['productid']?>"><i class="fa fa-heart"></i></a>
                    <a href="operation.php?id=<?php echo $row4['productid']?>"><i class="fa fa-shopping-cart"></i></a>
                    
                </div>
            </div>
            <?php } }else{?>
                <h3 style="margin:20px">NO RELATED PRODUCT AVAILABLE</h3>
                <?php }?>
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
        <script>
           
            document.getElementById('incrementBtn').addEventListener('click', function() {
          var quantityInput = document.getElementById('quantityInput');
          quantityInput.value = parseInt(quantityInput.value) + 1;
        });
      
        document.getElementById('decrementBtn').addEventListener('click', function() {
          var quantityInput = document.getElementById('quantityInput');
          if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
          }
        });
          </script>
          <script>
            function toggleAccordion(header) {
              var content = header.nextElementSibling;
              if (content.style.display === "block") {
                content.style.display = "none";
              } else {
                content.style.display = "block";
              }
            }
            document.getElementById("heart").style.color="black";
            function changecolor(){
              
              var color=document.getElementById("heart").style.color;
             if(color=="black"){
             document.getElementById("heart").style.color="#ff6b6b";
            }else{
              document.getElementById("heart").style.color="black";
            }
          }
          const stars=document.querySelectorAll('.stars span');
        stars.forEach((star,index)=> {
            star.addEventListener('click',
            function(){
                const rating=index +1;
                console.log('you rated'+rating+'stars')
            })
        })
          </script>
    </body>
    
 
</html>
