<?php
include "../connect.php";
session_start();
    $id=$_SESSION['customerid'];
   
    $query="SELECT * FROM `cart` where customerid='$id' ";
    $rs = $conn->query($query);
  
    $query3="SELECT * FROM `wishlist` where customerid='$id' ";
    $rs3 = $conn->query($query3);
    $num3=$rs3->num_rows;
    $query2="SELECT * FROM `customer` where customerid='$id' ";
    $rs2 = $conn->query($query2);
    $row2 = $rs2->fetch_assoc();
    
  
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">

    <title>ARtistic - Home</title>
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="cart.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .accordion {
      border: 1px solid #ddd;
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
        @media (max-width: 1000px) {
   body{
        font-size: 15px;
    }h2{
        font-size: 20px;
    }#incrementBtn,#decrementBtn{
        display:none;
    }
  }
  </style>
</head>
<body>
  <div class="d-flex fixed-button">
    <a href="#navbar" class="btn btn-primary "><i class="fa fa-arrow-up"></i></a>
    <a href="#footer" class="btn btn-primary "><i class="fa fa-arrow-down"></i></a>
</div>
    <nav class="navbar navbar-expand-lg navbar-dark  mt-2" id="navbar"style="background-color: #453c5c;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"style="margin-left: 3rem;">
           <span class="pink">AR</span>tistic
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent2" style="margin-left: 5rem;">
            <form class="d-flex search " style="margin-right: 2rem;transform:translateY(0.5rem)">
              <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit">SEARCH</button>
            </form>
            
            <form class="d-flex" style="transform: translateY(0.7rem);">
              
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="mobile-hide" class="nav-item" >
                    <a href="wishlist.php" style="color: white;margin-right: 2rem;">
                        <div class="icon-large"><i class="fa fa-heart"></i></div>
                         <div class="fly-item"><span class="item-number"><?php echo $num3?></span></div>
                    </a>
                </li>
            </ul>
            
            </form>
            <form class="d-flex" style="margin-left: 2rem;">
             <a href="profile.php" class="d-flex"  style="color:white;text-decoration:none;text-transform:capitalize;align-items:center"> <img src="../admin/images/<?php echo $row2['profilepic']?>"  style="border-radius:50%;" alt="user-img" height="35"width="36"
                                    class="img-circle me-2 "><?php echo $row2['username'];?></a>
              </form>
          </div>
        </div>
      </nav>
      <form  action="operation.php" method="post">
      <div class="container-fluid">
        <p><a style="text-decoration: none;" href="index.php" class="pink">Home</a> / cart</p>
      </div>
      
      <div class="d-flex cart">
        
        <div class="container-fluid tables table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                  <th scope="col" width="5%">#</th>
                  <th scope="col" width="25%">Item</th>
                  <th scope="col" width="10%">Price</th>
                  <th scope="col" width="10%">Quantity</th>
                  <th scope="col" width="15%">Total Sum</th>
                  <th scope="col"  width="2%">   </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $count=1;
                 while($row = $rs->fetch_assoc()){?>
                <tr>
                    <th scope="row"><?php echo $count?></th>
                    <td>
                <table>
                  <tr>
                    <?php
                    $prod=$row['productid'];
                     $query1="SELECT * FROM `product` where productid='$prod' ";
                     $rs1 = $conn->query($query1);
                     $row1 = $rs1->fetch_assoc();
                    ?>
                    <td>  <img src="../admin/images/<?php echo $row1['mainpic']?>" width="50px"></td>
                    <td><h5><?php echo $row1['productname']?></h5></td>
                  </tr>
                </table>
          
              </td>
                    <td>
                      <p><?php echo $row1['price'].' '?></p>
                  </td>
                  <td style="text-align: center;">
                    <div class="container">
                      
                      <div class="input-group mb-3">
                       
                        <input type="text" class="form-control text-center quantity" id="quantityInput" name="<?php echo 'quantity'.$row['productid']?>" value="1">
                       
                      </div>
                    </div>
                    
                  </td>
                  
                  <td class="total">
                    <p>
                      <?php 
                      echo $row1['price'];
                      ?>
                    </p>
                </td>
                  <td  style="text-align: center;">
                  
                    <div class="action d-flex">
                        <input type="checkbox" value="<?php echo $row['productid']?>" name="check[]" class="check">
                        <p><h1><a href="operation.php">&times;</a></h1></p>
                    </div>
                </td>
      
                  </tr>
                  <?php 
                $count++;
                }?>
                </tbody>
              </table>
          </div>
        <div class="col-md-5 col-lg-4 order-md-last" >
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-primary">Check Out</span>
            </h4>
            <form  action="operation.php" method="post">
                <div class="input-group">
                  <input type="text" name="coupon" class="form-control" placeholder="Enter Coupon">
                  <button name="applycoupon" class="btn btn-secondary">Apply</button>
            
                </div>
              </form>
            
            <ul class="list-group mb-3">
                <li class="list-group-item  lh-sm">
                  <div class="accordion">
                    <div class="accordion-header" onclick="toggleAccordion(this)"><h6>Delivery Details</h6></div>
                    <div class="accordion-content">
                   
                        <div>
                          <label>Full Name</label><br>
                          <input type="text" name="fname" class="form-control" required>
                      </div>
                      <div>
                          <label>Address</label><br>
                          <input type="text" name="address" class="form-control" required>
                      </div>
                      
                      <div>
                          <label>Phone Number</label><br>
                          <input type="number" name="phone" class="form-control" required>
                      </div>
                      
                      <div>
                          <label>Region</label><br>
                          <select id="region" name="region" class="form-control" required>
                              <option selected>Select your Region</option>
                              <option value="Center">Center</option>
                              <option value="Littoral">Littoral</option>
                              <option value="North West">North West</option>
                              <option value="South West">South West</option>
                              <option value="North">North</option>
                              <option value="South">South</option>
                              <option value="East">East</option>
                              <option value="West">West</option>
                          </select>
                      </div>
                    </div>
                  </div>
                    <div class="accordion">
                      <div class="accordion-header" onclick="toggleAccordion(this)"><h6 class="my-0">Payment Details</h6></div>
                      <div class="accordion-content">
                        <p>Select Payment method</p>
                        <div>
                          <div class="d-flex justify-content-between lh-sm my-2">
                            <div class="d-flex align-items-center">
                              <img src="../assets/menu/menu_bg3.jpg" width="50" height="50">
                              <p>MTN Mobile Money</p>
                            </div>
                    
                            <input type="radio" value="1" name="payment">
                          </div>
                          <div class="d-flex justify-content-between lh-sm my-2">
                            <div class="d-flex  align-items-center">
                              <img src="../assets/menu/menu_bg1.jpg" width="50" height="50">
                              <p>Orange Money</p>
                            </div>
                             <input type="radio" value="2" name="payment">
                            
                          </div>
                          <div class="d-flex justify-content-between lh-sm my-2">
                            <div class="d-flex align-items-center">
                              <img src="../assets/menu/menu_bg2.jpg" width="50" height="50">
                              <p>Card Payment</p>
                            </div>
                            <input type="radio" value="3" name="payment">
                          </div>
                            
                        </div>
                      </div>
                    </div>
                    <div class="accordion">
                      <div class="accordion-header" onclick="toggleAccordion(this)"><h6 class="my-0">Request</h6></div>
                      <div class="accordion-content">
                        <p>Special Request</p>
                       <textarea name="request" class="form-control"></textarea>
                      </div>
                    </div>
                   
                   
                    </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Sub Total</h6>
                </div>
                <span class="text-muted" id="subtotal">0 </span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Discount</h6>
                  
                </div>
                <span class="text-muted" id="discount"></span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Delivery Fee</h6>
                  
                </div>
                <span class="text-muted" id="delivery">5000 </span>
              </li>
              
              <li class="list-group-item d-flex justify-content-between">
                <span>Total (FCFA)</span>
                <h2 id="total"><strong></strong></h2>
              </li>
            </ul>
              <input type="hidden" id="discount2" name="discount">
              <input type="hidden" id="subtotal2" name="subtotal" >
              <input type="hidden" id="total2" name="total">
              
              <button class="w-100 btn btn-primary btn-lg" name="checkout" style="background-color: #ff6b6b;border:none">Continue to checkout</button>
            </form>
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
    <script>
     document.addEventListener('input',function(e){
      if(e.target.classList.contains('quantity')){
        const tr=e.target.closest('tr');
        const price=parseFloat(tr.children[2].innerText);
        const quantity=parseFloat(e.target.value);
        tr.children[4].innerText=(price*quantity).toFixed(0);
      }
     })
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

      const checkboxes=document.querySelectorAll('.check');
      const prices=document.querySelectorAll('.total');
      
       let totalsum=0;
       let discount=<?php if(isset($_GET['discount'])){ echo $_GET['discount'];}else{echo '0';}?>
       
       checkboxes.forEach((checkbox,index)=>{
        checkbox.addEventListener('change',()=>{
          if(checkbox.checked){
            totalsum += parseInt(prices[index].textContent);
          }else{
            totalsum-=parseInt(prices[index].textContent)
          }
          
          document.getElementById('subtotal').innerHTML=totalsum;
          let discountamount=(discount/100)*totalsum;
          console.log('Total:',discountamount);
          document.getElementById('discount').innerText="-"+discountamount;
          document.getElementById('discount2').value=discountamount;
          document.getElementById('subtotal2').value=totalsum;
          
          document.getElementById('total').innerHTML=(totalsum + parseInt(document.getElementById('delivery').innerText) - discountamount);
          document.getElementById('total2').value= document.getElementById('total').innerHTML;
        });
       });
       
    </script>
</body>
</html>