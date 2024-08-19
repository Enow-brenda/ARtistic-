<?php

include "../connect.php";
session_start();


if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    //$password = md5($password);

      $query2 = "SELECT * FROM users WHERE emailaddress ='$email' && `password`='$password'";
      $rs2 = $conn->query($query2);
      $num2 = $rs2->num_rows;
      $row2 = $rs2->fetch_assoc();

      if($num2 > 0){
        echo $row2['roletype'];
          $userid=$row2['userid'];
          if ($row2['roletype']==1){
            $query3= "SELECT * FROM customer WHERE customerid ='$userid'";
            $rs3 = $conn->query($query3);
            $row3 = $rs3->fetch_assoc();
            $_SESSION['customerid'] = $row3['customerid'];
            $_SESSION['pic'] = $row3['profilepic'];
            $_SESSION['email']=$row3['email'];
            $_SESSION['name'] = $row3['name'];
            $_SESSION['role'] = $row2['roletype'];
            header('Location: ../user/index.php');
          }
          else if($row2['roletype']==2){
            $query3= "SELECT * FROM supplier WHERE supplierid ='$userid'";
            $rs3 = $conn->query($query3);
            $row3 = $rs3->fetch_assoc();
            $_SESSION['supplierid'] = $row3['supplierid'];
            $_SESSION['pic'] = $row3['profilepic'];
            $_SESSION['name'] = $row3['name'];
            $_SESSION['role'] = $row2['roletype'];
            $_SESSION['secretkey'] = $row3['secretkey'];
            header('Location: ../supplier/index.php');
          }
          else if($row2['roletype']==3){
            $query3= "SELECT * FROM admin WHERE adminid ='$userid'";
            $rs3 = $conn->query($query3);
            $row3 = $rs3->fetch_assoc();
            $_SESSION['adminid'] = $row3['adminid'];
            $_SESSION['pic'] = $row3['profilepic'];
            $_SESSION['name'] = $row3['name'];
            $_SESSION['role'] = $row2['roletype'];
            $_SESSION['secretkey'] = $row3['secretkey'];
            header('Location: ../admin/index.php');
          }
        
      }
      else{
        $error="Invalid Credentials!";
        header('Location: ../user/signup.php?message='.$error);

      }
    }
   
   

?>