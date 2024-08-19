<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARtistic - Signup</title>
    <link rel="stylesheet" href="signup.css">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
  display: flex;
  align-items: center;
  padding-top: 10px;
  padding-bottom: 40px;
  background-color: #f5f5f5;

}

.form-signin {
  width: 100%;
  max-width: 350px;
  padding: 15px;
  margin: auto;
}
    </style>
    
</head>
  
<body class="text-center">
    <main class="form-signin">
    <?php if(isset($_GET['error'])){?>
                <div style="width: px"class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo $_GET['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>     
                <?php }?>
                <?php if(isset($_GET['success'])){?>
                <div style="width: px"class="alert alert-success alert-dismissible fade show" role="alert"><?php echo $_GET['success']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>     
                <?php }?>
        <div id="loginbox">
            <div class="content">
            
             <h1 class="h3 mb-3 fw-normal"><a href="#" style="text-decoration: none;color:black"><span style="color:#ff6b6b;">AR</span>tistic</a></h1>
             <section class="wrappers">
                 <div class="form signup">
                   <header>Signup</header>
                   
                   <form action="auth/signin.php" method="post">
                     <h4 style="text-align: center;font-size: 20px;color: white;">Join <span class="pink">AR</span>tistic!</h4>
                     <input type="text" name="name" class="form-control" placeholder="Full name" required />
                     <input type="text"  name="email" class="form-control" placeholder="Email address" required />
                     <input type="password"  name="Password" class="form-control" placeholder="Password" required />
                     <a href="supplierrequest.php" style="color:#ff6b6b;text-decoration:none">Want to be a Supplier?</a>
                     <input type="submit" name="signup" value="Signup" />
                   </form>
                 </div>
                
                 <div class="form login">
                     <header>Login</header>
                     <form action="../auth/login.php" method="post">
                         <h4 style="text-align: center;font-size: 20px;color: black;">Welcome Back to<span class="pink"> AR</span>tistic!</h4>
                       <input type="text" name="email" placeholder="Email address" required />
                       <input type="password" name="password" placeholder="Enter Password" required />
                       <input type="submit" name="login" value="Login"/>
                     </form>
                   </div>
             
                   <script>
                     const wrapper = document.querySelector(".wrappers"),
                       signupHeader = document.querySelector(".signup header"),
                       loginHeader = document.querySelector(".login header");
             
                     loginHeader.addEventListener("click", () => {
                       wrapper.classList.add("active");
                     });
                     signupHeader.addEventListener("click", () => {
                       wrapper.classList.remove("active");
                     });
                   </script>
           </section>
            
        </div>
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      
         </div>
    </main>
   
</body>
</html>