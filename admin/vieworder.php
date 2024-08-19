<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Template · Bootstrap v5.0</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

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

      @media (min-width: 100px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }.dropdown{
          margin:20px 10px;
        }input[type="search"]{
          margin:0px 10px;
        }
      }.logo{
        font-size: 30px;
        text-align: center;
        margin-left: 30px;
        
      }.pink{
        color:#ff6b6b;
      }.sucess{
          background-color: palegreen;
          color:darkgreen;
          padding:3px;
          border-radius: 10px;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top   p-0 " style="background:#453c5c">

<a class="navbar-brand ml-4 logo p-2" href="#"><span class="pink">AR</span>tistic</a>
<button class="navbar-toggler  d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
  <form class="d-flex">
  <input class="form-control me-2"  type="search"  placeholder="Search" aria-label="Search">
        <button class="btn btn-primary" style="background-color: #ff6b6b ;border:none;" type="submit">Search</button>
  </form>
 
        <div class="dropdown d-flex me-4">
            <i class="fa fa-notification"></i>
        <a class="profile-pic dropdown-toggle" style="text-decoration:none;" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false" href="#">
            
                                <img src="assets/Ikea-Place-App2.jpg"  style="border-radius:50%;" alt="user-img" width="36"
                                    class="img-circle me-2 ">
                                    <span class="text-white font-medium"style="text-decoration:none;"> Administrator</span></a>
                                    
                                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="../user/signup.php">Sign out</a></li>
        </ul>
                                  </div>
        
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    
    <div class="position-sticky pt-3">
      <div class="d-flex flex-column" >
      <div class="d-flex flex-column mt-2" style="align-items:center;margin-bottom:-10px;">
      <img src="assets/Ikea-Place-App2.jpg" style="border-radius:50%;" alt="user-img" width="50"
                                    class="img-circle me-2"></a>
                                    <span class="text-white font-medium text-center"> Enow Brenda<p>CEO</p></span>
      </div>
      
                                    <hr style="color:white">
                                    <?php include "includes/sidebar.php"?>
                                  </div>
       

        
       
      </div>
    </nav>
<!-- content inside the main-->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="r pt-3 pb-2 mb-3 ">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 ">Orders</h1>
        <div>
        <a href="#" class="btn d-inline-flex btn-sm btn-danger border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span>Back</span>
                                </a>
        
        </div>
        
        </div>
        
        <div class=container-fluid>
        <div class="card shadow border-0 mb-7" style="margin-top:30px;">
                    <div class="card-header">
                        <h5 class="mb-0">Order Details</h5>
                    </div>
                   <div class="p-4 pt-3">
                    <h4>Preliminary Info</h4>
                    <hr>
                   
                   <div class="d-flex">
                        <h6>Order Number: </h6>
                        <h6>Total Amount: </h6>
                    </div>
                    <div class="d-flex">
                    <h6>Customer Name: </h6>
                    <h6>Amount Payed: </h6>
                    </div>
                    <div class="d-flex">
                    <h6>Payment Method: </h6>
                    <h6>Date Made: </h6>
                    </div>
                    
                    <hr>
                    <h4>Delivery Info</h4>
                    <hr>
                   
                  
                    <div class="d-flex">
                    <h6>Delivery Status: </h6>
                    <h6>Delivery Fee: </h6>
                    </div>
                    <div class="d-flex">
                    <h6>Address: </h6>
                    <h6>Contact: </h6>
                    </div>
                    <hr>
                    <h4>Products Info</h4>
                    <hr>
                   
                  
                    <div class="d-flex">
                    <h6>Total Products: </h6>
                    <h6>Products Price: </h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Grand Price</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td>1</td>
                                    <td class="d-flex">
                                        <img alt="..." src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                       <div>
                                        <h6>name of product</h6>
                                       <p>
                                            color
                                       </p>
                                       </div> 
                                    </td>
                                    <td>
                                        james smith
                                    </td>
                                    <td>
                                       smith@gmail.com
                                    </td>
                                    <td>
                                        +237 672084416   
                                        
    </td>
                                   
                                </tr>
                                
                            </tbody>
                        </table>
                        
                    </div>
                    <form class="d-flex" style="justify-content:space-between">
                      <div>
                        Order State:<select class="mx-3">
                          <option>Ready</option>
                          <option>Delivered</option>
                        </select>
                      </div>
                      <div class="d-flex" >
                        <button class="btn btn-success me-2">Accept</button>
                        <button class="btn btn-danger">Cancel</button>
                      </div>
                       
                    </form>
                  
                   
                   
                   
                    
                    

                    
                </div>
                
        
      </div>
        </div>
      
      </div>
    </main>
  


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="sidebars.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
