<?php 
include "../connect.php";
if(isset($_POST['tryitem'])){
    $prod=$_POST['productid'];
    $query1="SELECT * FROM `product` where productid='$prod' ";
    $rs1 = $conn->query($query1);
    $row1 = $rs1->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Test AR #1</title>

  <!-- include A-Frame obviously -->
<script src="https://aframe.io/releases/0.6.0/aframe.min.js"></script>
<!-- include ar.js for A-Frame -->
<script src="https://jeromeetienne.github.io/AR.js/aframe/build/aframe-ar.js"></script>
<body style='margin : 0px; overflow: hidden;'>
  <a-scene embedded arjs>
  
    <!-- create your content here. just a box for now -->
    <a-marker type="pattern" url="pattern-hiro.patt">
    <a-image src="../admin/images/<?php echo $row1['mainpic'];?>" width="4" height="2.25"  position='0 0.5 0' rotation="90 0 0"></a-image>
    <!-- define a camera which will move according to the marker position -->
    </a-marker>
  </a-scene>
</body>
  

</body>
</html>
