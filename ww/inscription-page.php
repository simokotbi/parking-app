<!doctype html>
<html lang="en">
 <?php session_start(); ?> 
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Inscription</title>
  </head>
  
  <body>
  <?php  
                                if(isset($_SESSION['message'])):
                             ?>  
                             <div class="alert alert-<?=$_SESSION['msg_type']?>">
                                 <?php 
                                 echo $_SESSION['message'] ; 
                                 unset($_SESSION['message']);
                                 ?>
                             </div>  
                             <?php endif; ?> 
     <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Gestion des Parkings</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="acceui.php">Home</a></li>
                            <li class="breadcrumb-item active">Insription</li>
                        </ol>
                    </div>
                    
                </div>
<div class="row justify-content-center">
     <div class="row">

                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                             <h4 class="card-title">S'inscrire:</h4>
                              
                                <h6 class="card-subtitle">
                                <div class="table-responsive">
                 <!-- <div class="col-lg-8 col-xlg-9 col-md-7"> -->
                        <!-- <div class="card">  -->  
                            <div class="container-fluid">

                                <form class="form-horizontal form-material" action="proces.php" method="POST">
                                
                                   <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="adress" aria-describedby="emailHelp" placeholder="Enter email"><!-- 
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
                                         <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="pass" placeholder="Password">
  </div>
                                       
                                    <!-- </div>
                                    
                                    </div> -->
                                    <div class="form-group">

                                        <div class="col-sm-12">
                                            <button class="btn btn-success"
                                             name="sinscrire">S'inscrire</button>
                                             
                                           <a href="autentification.php" class="btn btn-primary"> 
                                            S'authentifier</a>
                                            
                                        </div>
                                         <a class="form-text text-muted" href="changepass.php">Restitution ou changemment du mot de pass</a>
                                    </div>
                                   
                                    </div></form> </div></div></div>
                            </div></div></div></div>
                             </div></div></div></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>