<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>ARtistic - Request</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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
      }form{
        max-width: fit-content;
        padding: 2rem;
        background:#453c5c;
        border-radius: 20px;
        

        
      }main{
        justify-content: center;
        align-items: center;
        margin-top:3rem;
      }
    </style>

    
    <!-- Custom styles for this template -->
    
  </head>
  <body class="text-center text-white">
  <?php if(isset($_GET['error'])){?>
                <div style="width: px"class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo $_GET['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>     
                <?php }?>
                <?php if(isset($_GET['success'])){?>
                <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo $_GET['success']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>     
                <?php }?> 
<main class="d-flex">

  <form class="d-flex flex-column" action="operation.php" method="post" enctype="multipart/form-data">
  <h1 class="h1 mb-3 fw-normal"><a href="#" style="text-decoration: none;color:white;"><span style="color:#ff6b6b;">AR</span>tistic</a></h1>
    <p class="h5 mb-3 fw-normal" style="text-align:left">Fill in the Following Information</p>
  <div class="d-flex" style="gap:1rem">
      <div>
      <input type="text" class="form-control me-4 mb-2" name="name" placeholder="Enter Full Name">
      <input type="password" class="form-control me-4 mb-2" name="password" placeholder="Enter Password">
      <input type="email" class="form-control me-4 mb-2" name="email" placeholder="Enter Email Address">
      </div>
      <div>
      <input type="number" class="form-control me-4 mb-2" name="contact" placeholder="Enter Contact">
      <input type="text" class="form-control me-4 mb-2" name="company" placeholder="Enter Company">
      
      </div>
      
    </div>
    <label style="text-align:left;">Gender</label>
    <select name="gender" class="form-control">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <label style="text-align:left;">Brief Description</label>
    <textarea name="description"></textarea>
    <label style="text-align:left;">Image</label>
    <input type="file" name="profilepic" class="form-control me-4 mb-2" multiple accept="image/*">
    <button class="btn btn-success mt-2" name="addsup" style="background-color: #ff6b6b;border:none">Send Request</button>
  </form>
</main>

    
  </body>
</html>
