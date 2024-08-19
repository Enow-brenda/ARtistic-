<?php
include '../connect.php';
session_start();
if(isset($_POST['addsup'])){
    $des=$_POST['description'];
    $name=$_POST['name'];   
    $password=$_POST['password'];                                                                                                                                                                                                                                                                                             
    $company=$_POST['company'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $contact=$_POST['contact'];
    $profilepic="";
    if(isset($_FILES['profilepic'])){
        $file_name=$_FILES['profilepic']['name'];
        $file_tmp=$_FILES['profilepic']['tmp_name'];
        if($file_name!=""){
            move_uploaded_file($file_tmp=$_FILES['profilepic']['tmp_name'],"../admin/images/".$file_name);
            $profilepic=$file_name;
        }
    }
    
    $query="INSERT INTO `request`(`requesttype`, `requeststatus`) VALUES ('Post of supplier','pending')";
    $rs = $conn->query($query);
    $query1 = "INSERT INTO `supplyrequests`(`name`, `contact`, `password`, `company`, `email`, `description`, `profilepic`,`gender`) VALUES ('$name','$contact','$password','$company','$email','$des','$profilepic','$gender')";
    $rs1 = $conn->query($query1);
    $message="Request Sent Successively";
    header('Location: signup.php?success= '. $message);
}
if(isset($_POST['cartadd'])){
    $product=$_POST['product'];
    
    $cust=$_SESSION['customerid'];

    $query1="INSERT INTO `cart`(`customerid`, `productid` ) VALUES ('$cust','$product')";
    $rs1 = $conn->query($query1);
    $message="New Product Added To Cart";
    header('Location: cart.php?success= '. $message);
}
if(isset($_POST['updatecus'])){
    echo "hi";
    $id=$_SESSION['customerid'];
    $username=$_POST['username'];                                                                                                                                                                                                                                                                                              
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $contact=$_POST['contact'];
    $profilepic="";
    if(isset($_FILES['profilepic'])){
        $file_name=$_FILES['profilepic']['name'];
        $file_tmp=$_FILES['profilepic']['tmp_name'];
        if($file_name!=""){
            move_uploaded_file($file_tmp=$_FILES['profilepic']['tmp_name'],"images/".$file_name);
            $profilepic=$file_name;
        }else{
            $query1 = "SELECT  profilepic FROM  customer where customerid=$id";
            $rs1 = $conn->query($query1); 
            $row1 = $rs1->fetch_assoc(); 
            $profilepic=$row1['profilepic'];   
        }
    }
    $query1 = "UPDATE `customer` SET `username`='$username',`name`='$name',`gender`='$gender',`email`='$email',`contact`='$contact',`profilepic`='$profilepic' WHERE customerid='$id'";
    $rs1 = $conn->query($query1);
    $query2 = "SELECT id FROM `users` WHERE userid='$id' && roletype='1'";
    $rs2 = $conn->query($query2);
    $row2 = $rs2->fetch_assoc();
    $uid= $row2['id'];
    $query3 = "UPDATE `users` SET `emailaddress`='$email' WHERE id='$uid'";
    $rs3 = $conn->query($query3);
    $message=" Details Updated Successively";
    header('Location: profile.php?message= '. $message);
}
if(isset($_POST['changepass'])){
    $id=$_SESSION['customerid'];
    $old=$_POST['old'];
    $new=$_POST['new'];
    $confirm=$_POST['confirm'];
    if($new==$confirm){
        $query2 = "SELECT `password` FROM `customer` WHERE customerid='$id'";
        $rs2 = $conn->query($query2);
        $row2 = $rs2->fetch_assoc();
        if($row2['password']==$old){
            $query1 = "UPDATE `customer` SET  `password`=$new WHERE customerid='$id'";
            $rs1 = $conn->query($query1); 
            $query3 = "UPDATE `users` SET `password`=$new WHERE userid='$id' && roletype='1'";
            $rs3 = $conn->query($query3);
            $message="Password Updated successively";
            header('Location: profile.php?success= '. $message);
        }else{
            $error="Wrong Password"; 
            header('Location: profile.php?error= '. $error); 
        }
    } else if($new!=$confirm){
        $error="Password Dont Match"; 
        header('Location: profile.php?error= '. $error);
    }
    

    
    
}
if(isset($_POST['paydetail'])){
    $momoname=$_POST['momoname'];
    $cardname=$_POST['cardname'];
    $orangename=$_POST['orangename'];
    $momonum=$_POST['momonum'];
    $cardnum=$_POST['cardnum'];
    $orangenum=$_POST['orangenum'];
    $id=$_SESSION['customerid'];

    $query1="UPDATE `paymentmethod` SET `accountname`='$momoname',`accountnumber`='$momonum' WHERE `paymentmethodid`='1' && customerid='$id'";
    $rs1 = $conn->query($query1);
    $query2="UPDATE `paymentmethod` SET `accountname`='$cardname',`accountnumber`='$cardnum' WHERE `paymentmethodid`='3' && customerid='$id'";
    $rs2 = $conn->query($query2);
    $query3="UPDATE `paymentmethod` SET `accountname`='$orangename',`accountnumber`='$orangenum' WHERE `paymentmethodid`='2' && customerid='$id'";
    $rs3 = $conn->query($query3);
    $message="Payment Details Updated";
    header('Location: profile.php?success= '. $message);
}
if(isset($_POST['blog'])){
    $id=$_SESSION['customerid'];
    $author=$_POST['author'];
    $mainhead=$_POST['mainhead'];
    $sub1=$_POST['sub1'];
    $sub2=$_POST['sub2'];
    $content1=$_POST['content1'];
    $content2=$_POST['content2'];

    $mainpic=$_FILES['mainpic']['name'];
    $mainpic_tmp=$_FILES['mainpic']['tmp_name'];
    move_uploaded_file($mainpic_tmp,"../blog/".$mainpic);
    $pic1=$_FILES['pic1']['name'];
    $pic1_tmp=$_FILES['pic1']['tmp_name'];
    move_uploaded_file($pic1_tmp,"../blog/".$pic1);
    $pic2=$_FILES['pic2']['name'];
    $pic2_tmp=$_FILES['pic2']['tmp_name'];
    move_uploaded_file($pic2_tmp,"../blog/".$pic2);
    
    $query="INSERT INTO `blog`(`author`, `mainphoto`, `mainheading`, `image1`, `subheading1`, `subheading2`, `content1`, `content2`, `image2`,`customerid`) VALUES ('$author','$mainpic','$mainhead','$pic1','$sub1','$sub2','$content1','$content2','$pic2','$id')";
    $rs = $conn->query($query);
    $query2="SELECT * FROM `blog` WHERE `author`='$author' && `mainphoto`='$mainpic'  && `mainheading`='$mainhead' && `image1`='$pic1'  && `subheading1`='$sub1'  && `subheading2`='$sub2' && content1='$content1' && content2='$content2' && image2='$pic2' && customerid='$id'";
    $rs2 = $conn->query($query2);
    $row2 = $rs2->fetch_assoc();
    $req=$row2['id'];
    $query1="INSERT INTO `request`(`requestid`,`requesttype`, `requeststatus`) VALUES ('$req','Blog Request','pending')";
    $rs1 = $conn->query($query1);
  
    

   
    $message="Blog was sent to Admin for Review";
    header('Location: profile.php?success= '. $message);
}
if(isset($_GET['addwishlistid'])){
    $cust=$_SESSION['customerid'];
    $product=$_GET['addwishlistid'];
   

    $query1="INSERT INTO `wishlist`(`customerid`, `productid`) VALUES ('$cust','$product')";
    $rs1 = $conn->query($query1);
    $message="New Product Added To Wishlist";
    header('Location: wishlist.php?success= '. $message);
}
if(isset($_GET['deletewishlistid'])){
    $cust=$_SESSION['customerid'];
    $product=$_GET['deletewishlistid'];
    $query1="DELETE FROM `wishlist` WHERE customerid='$cust' && productid='$product'";
    $rs1 = $conn->query($query1);
    $message="Product Removed From Wishlist";
    header('Location: wishlist.php?success= '. $message);
}
if(isset($_POST['applycoupon'])){
    $coupon=$_POST['coupon'];
    $query1="SELECT * FROM coupon WHERE coupon='$coupon'";
    $rs1 = $conn->query($query1);
    $row1 = $rs1->fetch_assoc();
    $end=$row1['enddate'];
    $start=$row1['startdate'];
    $present=date('Y-m-d');
    
    if( $present>=$start && $present<=$end){
        
         header('Location: cart.php?discount='. $row1['discountpercent']);
    }else{
        $message="Coupon has expired";
         header('Location: cart.php?error= '. $message);
    } 
}if(isset($_POST['checkout'])){
    $customer=$_SESSION['customerid'];
   $payment=$_POST['payment'];
    $request=$_POST['request'];
    $amount=$_POST['total'];
    $discount=$_POST['discount'];
    //delivery
    $fname=$_POST['fname'];
    $address=$_POST['address'];
    $region=$_POST['region'];
    $addressfinal=$_POST['region'].' - '.$_POST['address'];
    $phone=$_POST['phone'];
    if(!empty($_POST['check'])){
    $query1="INSERT INTO `order`(`customerid`, `paymentmethodid`, `amount`,`discount`,`request`) VALUES ('$customer','$payment','$amount','$discount','$request')";
    $rs1 = $conn->query($query1);

    $query2="SELECT * FROM  `order` WHERE `customerid`='$customer' && `paymentmethodid`='$payment' && `amount`='$amount' && `discount`='$discount' && `request`='$request' ";
   $rs2 = $conn->query($query2);
   $row2 = $rs2->fetch_assoc();
    $orderid=$row2['orderid'];

    $query4="INSERT INTO `deliveryandorder`(`orderid`, `name`, `contact`, `deliverystatus`, `address`) VALUES ('$orderid','$fname','$phone','Pending','$addressfinal')";
    $rs4 = $conn->query($query4);

    $selected=$_POST['check'];
    foreach($selected as $product){
        $quantity=$_POST['quantity'.$product];
        $query3="INSERT INTO `productinorder`(`orderid`, `productid`, `quantity`) VALUES ('$orderid','$product','$quantity')";
        $rs3 = $conn->query($query3);
        $query5="DELETE FROM `cart` WHERE customerid='$customer'&& productid='$product' ";
        $rs5 = $conn->query($query5);

    }
    $message="Order Sent Successively";
    
    header('Location: cart.php?success= '. $message);
    
}else{
        $message="No Product Choosen";
        header('Location: cart.php?error= '. $message);
    }
     
}
if(isset($_POST['review'])){
    $customer=$_SESSION['customerid'];
    $review=$_POST['reviewdes'];
    $rating=$_POST['stars'];
    $prod=$_POST['productid'];
    $query1="INSERT INTO `reviews`( `customerid`, `productid`, `review`, `stars`) VALUES ('$customer','$prod','$review','$rating')";
    $rs1 = $conn->query($query1);

    $message="Your Review was Added";
    header('Location: product.php?id='.$prod .'&&success= '. $message);
    
    
 
}
?>