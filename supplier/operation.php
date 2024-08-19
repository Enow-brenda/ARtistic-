
<?php
include '../connect.php';
if(isset($_POST['addproduct'])){
    $name=$_POST['pname'];
    $creatorid=$_POST['creatorid'];
    $creatorrole=$_POST['creatorrole'];
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
            move_uploaded_file($file_tmp=$_FILES['images']['tmp_name'][$key],"../admin/images/".$file_name);
            $uploadedfiles=$file_name;
            $query2 = "INSERT INTO `productimage`( `productid`, `image`) VALUES ('$id','$file_name')";
            $rs2 = $conn->query($query2);
        }
    }
   }
   $message="New Product Added Successively";
   header('Location: products.php?message= '. $message); 
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
            move_uploaded_file($file_tmp=$_FILES['file']['tmp_name'],"../admin/messageattach/".$file_name);
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
if(isset($_POST['updatesup'])){
    $id=$_POST['id'];
    $des=$_POST['des'];
    $key=$_POST['key'];
    $name=$_POST['name'];   
    $password=$_POST['password'];                                                                                                                                                                                                                                                                                             
    $company=$_POST['company'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $profilepic="";
    if(isset($_FILES['profilepic'])){
        echo 'hi1';
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
    $query2 = "UPDATE `supplier` SET `secretkey`='$key',`password`='$password',`email`='$email',`name`='$name',`company`='$company',`gender`='$gender',`contact`='$contact',`description`='$des',`profilepic`='$profilepic' WHERE supplierid='$id'";
   $rs2 = $conn->query($query2);

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
   $message=" ProductEdited Successively";
   header('Location: products.php?message= '. $message); 
}
?>