
<?php
include '../connect.php';
if(isset($_POST['addproduct'])){
    $name=$_POST['pname'];
    $des=$_POST['pdes'];
    $creatorid=$_POST['creatorid'];
    $creatorrole=$_POST['creatorrole'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $length=$_POST['length'];
    $width=$_POST['width'];
    $height=$_POST['height'];
    $category=$_POST['category'];
    $mainpic="";
    if(isset($_FILES['mainpic'])){
        $file_name=$_FILES['mainpic']['name'];
        $file_tmp=$_FILES['mainpic']['tmp_name'];
        if($file_name!=""){
            move_uploaded_file($file_tmp=$_FILES['mainpic']['tmp_name'],"images/".$file_name);
            $mainpic=$file_name;
        }
    }

    $query1 = "INSERT INTO `product`( `productname`, `description`, `price`, `quantity`, `width`, `height`, `length`, `mainpic`,  `categoryid`,`creatorid`,`creatorrole`) VALUES ('$name','$des','$price','$quantity','$width','$height','$length','$mainpic','$category','$creatorid','$creatorrole')";
    $rs1 = $conn->query($query1);

   $query3="SELECT productid FROM product WHERE productname='$name' && description='$des' && price='$price' && quantity='$quantity' && width='$width' && height='$height' && length='$length' && mainpic='$mainpic' && categoryid='$category'";
   $rs3 = $conn->query($query3);
   $row3 = $rs3->fetch_assoc();
   $id=$row3['productid'];

   if(isset($_FILES['images'])){
    $uploadedfiles=[];
    foreach($_FILES['images']['tmp_name'] as $key=>$tmp_name){
        $file_name=$_FILES['images']['name'][$key];
        $file_tmp=$_FILES['images']['tmp_name'][$key];
        if($file_name !=""){
            move_uploaded_file($file_tmp=$_FILES['images']['tmp_name'][$key],"images/".$file_name);
            $uploadedfiles=$file_name;
            $query2 = "INSERT INTO `productimage`( `productid`, `image`) VALUES ('$id','$file_name')";
            $rs2 = $conn->query($query2);
        }
    }
   }
   $message="New Product added";
    header('Location: Products.php?message= '. $message);
   
}
if(isset($_POST['adddiscount'])){
    $start=$_POST['start'];
    $end=$_POST['end'];
    $coupon=$_POST['coupon'];
    $percent=$_POST['percent'];
  

    $query1 = "INSERT INTO `coupon`( `startdate`, `enddate`, `coupon`, `discountpercent`) VALUES ('$start','$end','$coupon','$percent')";
    $rs1 = $conn->query($query1);

  
    $message="New Discount added";
    header('Location: discount.php?message= '. $message);
   
}
if(isset($_POST['editdiscount'])){
    $id=$_POST['id'];
    $start=$_POST['start'];
    $end=$_POST['end'];
    $coupon=$_POST['coupon'];
    $percent=$_POST['percent'];
    
    $query1 = "UPDATE `coupon` SET `startdate`='$start',`enddate`='$end',`coupon`='$coupon',`discountpercent`='$percent' WHERE id=$id";
    $rs1 = $conn->query($query1);
    $message="Discount Updated";
    header('Location: discount.php?message= '. $message);
   
}
if(isset($_POST['addcustomer'])){
    $username=$_POST['username'];   
    $password=$_POST['password'];                                                                                                                                                                                                                                                                                             
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $contact=$_POST['contact'];
    $profilepic="OIP (9).jfif";
    if(isset($_FILES['profilepic'])){
        $file_name=$_FILES['profilepic']['name'];
        $file_tmp=$_FILES['profilepic']['tmp_name'];
        if($file_name!=""){
            move_uploaded_file($file_tmp=$_FILES['profilepic']['tmp_name'],"images/".$file_name);
            $profilepic=$file_name;
        }
    }
    $query1 = "INSERT INTO `customer`( `username`, `password`, `name`, `email`, `contact`, `profilepic`,`gender`) VALUES ('$username','$password','$name','$email','$contact','$profilepic','$gender')";
    $rs1 = $conn->query($query1);
    $query2 = "SELECT customerid FROM `customer` WHERE `email`='$email'";
    $rs2 = $conn->query($query2);
    $row2 = $rs2->fetch_assoc();
    $userid= $row2['customerid'];
    $query3= "INSERT INTO `users`(`userid`, `emailaddress`, `password`, `roletype`) VALUES ('$userid','$email','$password','1')";
    $rs3 = $conn->query($query3);
    $count=1;
    while($count<=3){
    $query3= "INSERT INTO `paymentmethod`(`paymentmethodid`, `customerid`, `accountname`, `accountnumber`) VALUES ('$count','$userid',' ',' ')";
    $rs3 = $conn->query($query3);
    $count++;
    }
    $message="New Customer Added Successively";
    header('Location: customers.php?message= '. $message);
}
if(isset($_POST['addsup'])){
    $des=$_POST['des'];
    $key=$_POST['key'];
    $name=$_POST['name'];   
    $password=$_POST['password'];  
    $gender=$_POST['gender'];                                                                                                                                                                                                                                                                                           
    $company=$_POST['company'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $profilepic="OIP (9).jfif";
    if(isset($_FILES['profilepic'])){
        $file_name=$_FILES['profilepic']['name'];
        $file_tmp=$_FILES['profilepic']['tmp_name'];
        if($file_name!=""){
            move_uploaded_file($file_tmp=$_FILES['profilepic']['tmp_name'],"images/".$file_name);
            $profilepic=$file_name;
        }
    }
    $query1 = "INSERT INTO `supplier`( `secretkey`, `password`, `email`, `name`, `company`, `description`, `profilepic`,`contact`,`gender`) VALUES ('$key','$password','$email','$name','$company','$des','$profilepic','$contact','$gender')";
    $rs1 = $conn->query($query1);
    $query2 = "SELECT supplierid FROM `supplier`  WHERE `secretkey`='$key'";
    $rs2 = $conn->query($query2);
    $row2 = $rs2->fetch_assoc();
    $userid= $row2['supplierid'];
    $query3= "INSERT INTO `users`(`userid`, `emailaddress`, `password`, `roletype`) VALUES ('$userid','$email','$password','2')";
    $rs3 = $conn->query($query3);
    $message="New Supplier Added Successively";
    header('Location: suppliers.php?message= '. $message);
}
if(isset($_POST['sendmessage'])){
    $des=$_POST['des'];
    $subject=$_POST['subject'];
    $role=$_POST['role'];
    $sendid=$_POST['sendid'];
    $file="";
    if(isset($_FILES['file'])){
        $file_name=$_FILES['file']['name'];
        $file_tmp=$_FILES['file']['tmp_name'];
        if($file_name!=""){
            move_uploaded_file($file_tmp=$_FILES['file']['tmp_name'],"messageattach/".$file_name);
            $file=$file_name;
        }
    }
    if(isset($_POST['admin'])){
     $admin=$_POST['admin'];
     foreach($admin as $adm){
        $query1 = "INSERT INTO `messages`(`senderid`, `receiverid`, `sendertype`, `receivertype`, `subject`, `description`, `file`) VALUES ('$sendid','$adm','$role','3','$subject','$des','$file')";
        $rs1 = $conn->query($query1); 
    }
     
    }if(isset($_POST['supplier'])){
     $suppliers=$_POST['supplier'] ; 
     foreach($suppliers as $sup){
        $query2 = "INSERT INTO `messages`(`senderid`, `receiverid`, `sendertype`, `receivertype`, `subject`, `description`, `file`) VALUES ('$sendid','$sup','$role','2','$subject','$des','$file')";
        $rs2 = $conn->query($query2); 
    } 
    }
    $message="New Message Sent Successively";
    header('Location: messages.php?message= '. $message);
    
}
if(isset($_GET['deletemessageid'])){
    $id=$_GET['deletemessageid'];
    $query1 = "DELETE FROM `messages` WHERE messageid=$id";
    $rs1 = $conn->query($query1); 
    $message="Message Deleted";
    header('Location: messages.php?message= '. $message);
}
if(isset($_POST['addadmin'])){
    $dob=$_POST['dob'];
    $key=$_POST['key'];
    $name=$_POST['name'];   
    $password=$_POST['password'];                                                                                                                                                                                                                                                                                             
    $position=$_POST['position'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $class=$_POST['class'];
    $gender=$_POST['gender'];
    $profilepic="OIP (9).jfif";
    if(isset($_FILES['profilepic'])){
        $file_name=$_FILES['profilepic']['name'];
        $file_tmp=$_FILES['profilepic']['tmp_name'];
        if($file_name!=""){
            move_uploaded_file($file_tmp=$_FILES['profilepic']['tmp_name'],"images/".$file_name);
            $profilepic=$file_name;
        }
    }
    $query1 = "INSERT INTO `admin`( `secretkey`, `password`, `class`, `name`, `dateofbirth`, `position`, `email`, `gender`, `contact`, `profilepic`) VALUES ('$key','$password','$class','$name','$dob','$position','$email','$gender','$contact','$profilepic')";
    $rs1 = $conn->query($query1);
    $query2 = "SELECT adminid FROM `admin` WHERE `secretkey`='$key'";
    $rs2 = $conn->query($query2);
    $row2 = $rs2->fetch_assoc();
    $userid= $row2['adminid'];
    $query3= "INSERT INTO `users`(`userid`, `emailaddress`, `password`, `roletype`) VALUES ('$userid','$email','$password','3')";
    $rs3 = $conn->query($query3);
    $message="New Admin Added Successively";
    header('Location: admin.php?message='. $message);
}
if(isset($_POST['updateadm'])){
    $id=$_POST['id'];
    $class=$_POST['class'];
    $key=$_POST['key'];
    $name=$_POST['name'];   
    $password=$_POST['password'];                                                                                                                                                                                                                                                                                             
    $position=$_POST['position'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $profilepic="";
    if(isset($_FILES['profilepic'])){
        
        $file_name=$_FILES['profilepic']['name'];
        $file_tmp=$_FILES['profilepic']['tmp_name'];
        if($file_name!=""){
            move_uploaded_file($file_tmp=$_FILES['profilepic']['tmp_name'],"images/".$file_name);
            $profilepic=$file_name;
        }else{
          $query1 = "SELECT  profilepic FROM  admin where adminid=$id";
           $rs1 = $conn->query($query1); 
           $row1 = $rs1->fetch_assoc(); 
           $profilepic=$row1['profilepic']; 
        }
    }
    $query2 = "UPDATE `admin` SET `secretkey`='$key',`password`='$password',`email`='$email',`name`='$name',`position`='$position',`gender`='$gender',`contact`='$contact',`dateofbirth`='$dob',`class`='$class',`profilepic`='$profilepic' WHERE adminid='$id'";
   $rs2 = $conn->query($query2);
    $query2 = "SELECT id FROM `users` WHERE userid='$id' && roletype='3'";
    $rs2 = $conn->query($query2);
    $row2 = $rs2->fetch_assoc();
    $uid= $row2['id'];
    $query3 = "UPDATE `users` SET `emailaddress`='$email,`password`='$password' WHERE id='$uid'";
    $rs3 = $conn->query($query3);
    $message="Profile Updated Successively";
    header('Location: profile.php?message= '. $message);
}
if(isset($_POST['updateproduct'])){
    $id=$_POST['id'];
    $name=$_POST['pname'];
    $des=$_POST['pdes'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $length=$_POST['length'];
    $width=$_POST['width'];
    $height=$_POST['height'];
    $category=$_POST['category'];
    $mainpic="";
    if(isset($_FILES['mainpic'])){
        $file_name=$_FILES['mainpic']['name'];
        $file_tmp=$_FILES['mainpic']['tmp_name'];
        if($file_name!=""){
            move_uploaded_file($file_tmp=$_FILES['mainpic']['tmp_name'],"../admin/images/".$file_name);
            $mainpic=$file_name;
        }else{
            $query1 = "SELECT  mainpic FROM  product where productid=$id";
             $rs1 = $conn->query($query1); 
             $row1 = $rs1->fetch_assoc(); 
             $mainpic=$row1['mainpic']; 
          }
    }

    $query1 = "UPDATE `product` SET `productname`='$name',`description`='$des',`price`='$price',`quantity`='$quantity',`width`='$width',`height`='$height',`length`='$length',`mainpic`='$mainpic',`categoryid`='$category' WHERE productid=$id";
    $rs1 = $conn->query($query1);

   
   if(isset($_FILES['images'])){
    $uploadedfiles=[];
    foreach($_FILES['images']['tmp_name'] as $key=>$tmp_name){
        $file_name=$_FILES['images']['name'][$key];
        $file_tmp=$_FILES['images']['tmp_name'][$key];
        if($file_name !=""){
            move_uploaded_file($file_tmp=$_FILES['images']['tmp_name'][$key],"../admin/images/".$file_name);
            $uploadedfiles=$file_name;
           
            $query2 = "INSERT INTO `productimage`( `productid`, `image`) VALUES ('$id','$file_name')";
            $rs2 = $conn->query($query2);
        }
    }
   }
   $message=" Product Edited Successively";
   header('Location: products.php?message= '. $message); 
}
if(isset($_POST['updcustomer'])){
    $id=$_POST['id'];
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
    $message=" Customer Updated Successively";
    header('Location: customers.php?message= '. $message);
}
if(isset($_POST['updsup'])){
    $id=$_POST['id'];  
    $key=$_POST['key'];                                                                                                                                                                                                                                                                                         
    $name=$_POST['name'];
    $email=$_POST['email'];
    $company=$_POST['company'];
    $gender=$_POST['gender'];
    $contact=$_POST['contact'];
    $des=$_POST['des'];
    $profilepic="";
    if(isset($_FILES['profilepic'])){
        $file_name=$_FILES['profilepic']['name'];
        $file_tmp=$_FILES['profilepic']['tmp_name'];
        if($file_name!=""){
            move_uploaded_file($file_tmp=$_FILES['profilepic']['tmp_name'],"images/".$file_name);
            $profilepic=$file_name;
        }else{
            $query1 = "SELECT  profilepic FROM  supplier where supplierid=$id";
            $rs1 = $conn->query($query1); 
            $row1 = $rs1->fetch_assoc(); 
            $profilepic=$row1['profilepic'];   
        }
    }
    $query1 = "UPDATE `supplier` SET `secretkey`='$key',`email`='$email',`name`='$name',`company`='$company',`gender`='$gender',`contact`='$contact',`description`='$des',`profilepic`='$profilepic' WHERE supplierid='$id'";
    $rs1 = $conn->query($query1);
    $query2 = "SELECT id FROM `users` WHERE userid='$id' && roletype='2'";
    $rs2 = $conn->query($query2);
    $row2 = $rs2->fetch_assoc();
    $uid= $row2['id'];
    $query3 = "UPDATE `users` SET `emailaddress`='$email' WHERE id='$uid'";
    $rs3 = $conn->query($query3);
    $message=" Supplier Updated Successively";
    header('Location: suppliers.php?message= '. $message);
}
if(isset($_POST['updadmin'])){
    $id=$_POST['id'];
    $class=$_POST['class'];
    $key=$_POST['key'];
    $name=$_POST['name'];   
    $password=$_POST['password'];                                                                                                                                                                                                                                                                                             
    $position=$_POST['position'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $profilepic="";
    if(isset($_FILES['profilepic'])){
        
        $file_name=$_FILES['profilepic']['name'];
        $file_tmp=$_FILES['profilepic']['tmp_name'];
        if($file_name!=""){
            move_uploaded_file($file_tmp=$_FILES['profilepic']['tmp_name'],"images/".$file_name);
            $profilepic=$file_name;
        }else{
          $query1 = "SELECT  profilepic FROM  admin where adminid=$id";
           $rs1 = $conn->query($query1); 
           $row1 = $rs1->fetch_assoc(); 
           $profilepic=$row1['profilepic']; 
        }
    }
    $query2 = "UPDATE `admin` SET `secretkey`='$key',`password`='$password',`email`='$email',`name`='$name',`position`='$position',`gender`='$gender',`contact`='$contact',`dateofbirth`='$dob',`class`='$class',`profilepic`='$profilepic' WHERE adminid='$id'";
   $rs2 = $conn->query($query2);
    $query2 = "SELECT id FROM `users` WHERE userid='$id' && roletype='3'";
    $rs2 = $conn->query($query2);
    $row2 = $rs2->fetch_assoc();
    $uid= $row2['id'];
    $query3 = "UPDATE `users` SET `emailaddress`='$email' WHERE id='$uid'";
    $rs3 = $conn->query($query3);
    $message=" Admin Edited  Successively";
    header('Location: admin.php?message= '. $message);
}
if(isset($_POST['acceptsup'])){
    $key=$_POST['key'];
    $id=$_POST['id'];
    $query1 = "SELECT * FROM supplyrequests where `requestid`='$id'";
    $rs1 = $conn->query($query1);
    $row1=$rs1->fetch_assoc();
    $des=$row1['description'];
    $name=$row1['name'];
    $gender=$row1['gender'];   
    $password=$row1['password'];                                                                                                                                                                                                                                                                                             
    $company=$row1['company'];
    $email=$row1['email'];
    $contact=$row1['contact'];
    $profilepic=$row1['profilepic'];

    $query2 = "INSERT INTO `supplier`( `secretkey`, `password`, `email`, `name`, `company`, `description`, `profilepic`,`contact`,`gender`) VALUES ('$key','$password','$email','$name','$company','$des','$profilepic','$contact','$gender')";
    $rs2 = $conn->query($query2);
    

    $query3 = "UPDATE `request` SET `requeststatus`='Accepted' WHERE `requestid`='$id'";
    $rs3 = $conn->query($query3);
    $message="New Supplier added";
    header('Location: suppliers.php?message= '. $message);
    
}
if(isset($_POST['acceptblog'])){
    $id=$_POST['id'];
    $query3 = "UPDATE `request` SET `requeststatus`='Accepted' WHERE `id`='$id'";
    $rs3 = $conn->query($query3);
    $message="Blog Request Accepted Successively";
    header('Location: message.php?message= '. $message);

}
if(isset($_POST['rejectblog'])){
    $id=$_POST['id'];
    $query3 = "UPDATE `request` SET `requeststatus`='Rejected' WHERE `id`='$id'";
    $rs3 = $conn->query($query3);
    $message="Blog Request Rejected Successively";
    header('Location: message.php?message= '. $message);

}
?>