<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Parking application</title>
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="tables_style.css">
</head>

<body class="fix-header card-no-border">
    <div id="main-wrapper">
        
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
              
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <b>
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            
                        </b>
                       
                        <span>
                          
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                        </span>
                    </a>
                </div>
               
                <div class="navbar-collapse">
                
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kotbi mohamed</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
       
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a href="acceui.php" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="gestion-parking.php" class="waves-effect"><i class="fa fa-car m-r-10" aria-hidden="true"></i>Gestion des parkings</a>
                        </li>
                        
                        <li>
                            <a href="gestion-tarif.php" class="waves-effect"><i class="fa fa-font m-r-10" aria-hidden="true"></i>Gestion des tarifs</a>
                        </li>
                          <li>
                            <a href="stationer.php" class="waves-effect"><i class="fa fa-font m-r-10" aria-hidden="true"></i>Strationnements</a>
                        </li>
                         <li>
                            <a href="affichage_chifres.php" class="waves-effect"><i class="fa fa-font m-r-10" aria-hidden="true"></i>Chifres d'affaires</a>
                        </li>
                      <!--   <li>
                            <a href="affichage-ident.php" class="waves-effect"><i class="fa fa-globe m-r-10" aria-hidden="true"></i>Affichage identifiant</a>
                        </li> -->
                        <li>
                            <a href="autentification.php" class="waves-effect"><i class="fa fa-columns m-r-10" aria-hidden="true"></i>Authentification</a>
                        </li>
                        <li>
                            <a href="inscription-page.php" class="waves-effect"><i class="fa fa-info-circle m-r-10" aria-hidden="true"></i>S'inscrire</a>
                        </li>
                    </ul>
                   
                </nav>
              
            </div>
           
        </aside>
       
        <div class="page-wrapper">
            
            <div class="container-fluid">
              
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Gestion des Tarifs</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="acceui.php">Home</a></li>
                            <li class="breadcrumb-item active">Gestion des Tarifs</li>
                        </ol>
                    </div>
                    
                </div>
                
                

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
            </div>
           
            <h3>Operation sur les types des tarifs</h3>
                 <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
       
     
                   
    <form class="form-horizontal form-material" action="proces.php" method="POST">
         <label for="exampleInputEmail1">Id</label>
    <input type="text" class="form-control" name="idtarif" aria-describedby="emailHelp" placeholder="Entrer Id"><!-- 
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
         
            <label for="exampleInputEmail1">Type</label>
            <input type="text" class="form-control" name="typetarif" aria-describedby="emailHelp" placeholder="Entrer Type">
    
                              <br><br>  
                                   <div class="form-group">
   
                               
                                       
                                    <!-- </div>
                                    
                                    </div> -->
                                    <div class="form-group">

                                        <div class="col-sm-12">
                                            <button class="btn btn-success"
                                             name="ajoutertarif">Ajouter</button>
                                             <button class="btn btn-primary"
                                             name="modifiertarif">Modifier</button>
                                             <button class="btn btn-danger"
                                             name="supprimertarif">Supprimer</button>

                                           <!-- <a href="autentification.php" class="btn btn-primary"> 
                                            modifier</a> -->
                                            
                                     
                                   
                                    </div></form> 
  <?php 
            $mysqli=new mysqli('localhost:3308','root','','dbparking') 
            or die(mysqli_error($mysqli));
            $result=$mysqli->query("select*from typetarif")or die($mysqli->error);
    
    ?>

                                      <form method="POST" action="proces.php">
                                    
                                    <table class="table" action="proces.php" methode="POST" >

                                        <thead>
                                            <thead><tr>
                                                <td>Id</td>
                                                <td>Type</td>
                                                
                                              </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        while($row=$result->fetch_array()):
                                                 ?>
                                                 
                                            <tr>

                                                <td><?php echo $row['idtype']; ?></td>
                                                <td><?php echo $row['nomtype']; ?></td>
                                                
                                                <td>

                                                   <!-- 
                                                    -->    
                                                 </td> 
                                                    
                                            </tr>
                                                </form>
                                            <?php endwhile; ?>

                                        </tbody>
                                    </table>
         <!--    <div class="form-group">

                                        <div class="col-sm-12">
                                            <button class="btn btn-success" id="amodifierP">Modifier Parking</button>
                                            <button class="btn btn-success"id="supprimerp">Supprimer Parking</button>
                                            <button class="btn btn-success" id="ajouterp">AjouterParking</button>
                                            <button class="btn btn-success" id="afficherp">Afficher Parking</button>
                                        </div>
                                    </div> -->
                                    <br> <br> <br>
                                    <h3 class="text-themecolor m-b-0 m-t-0">Tarifs du Parking</h3>
                                     
                           </div>     
                                   <div class="form-group">
                                            
                                     
                                   
                                    </div></form> 
  <?php 
            $mysqli=new mysqli('localhost:3308','root','','dbparking') 
            or die(mysqli_error($mysqli));
            $result=$mysqli->query("select*from tarifparking")or die($mysqli->error);
    
    ?>

                                      <form method="POST" action="proces.php">
                                        <label for="exampleInputEmail1">Id Parking</label>
                                    <input type="text" class="form-control" name="idpark" aria-describedby="emailHelp" placeholder="Entrer Id"><!-- 
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  
         
            <label for="exampleInputEmail1">Id Du Type</label>
            <input type="text" class="form-control" name="idtype" aria-describedby="emailHelp" placeholder="Entrer Type">
               <label for="exampleInputEmail1">Prix</label>
            <input type="text" class="form-control" name="prix" aria-describedby="emailHelp" placeholder="Entrer Prix">
             <br><br>
                                     <div class="form-group">

                                        <div class="col-sm-12">
                                            <button class="btn btn-success"
                                             name="ajouter_tarif">Ajouter</button>
                                             <!-- <button class="btn btn-primary"
                                             name="modifier_tarif">Modifier</button> -->
                                             <button class="btn btn-danger"
                                             name="supprimer_tarif">Supprimer</button>
                                             <br><br>
                                    <table class="table" action="proces.php" methode="POST" >

                                        <thead>
                                            <thead><tr>
                                                <td>Id Parking</td>
                                                <td>Id Du Type</td>
                                                <td>Prix</td>
                                              </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                        while($row=$result->fetch_array()):
                                                 ?>
                                                 
                                            <tr>

                                                <td><?php echo $row['idpark']; ?></td>
                                                <td><?php echo $row['idtype']; ?></td>
                                                <td><?php echo $row['prix']; ?></td>
                                                <td>

                                                   <!-- 
                                                    -->    
                                                 </td> 
                                                    
                                            </tr>
                                                </form>
                                            <?php endwhile; ?>

                                        </tbody>
                                    </table>
                                      <br><br>    <br><br>  
            <footer class="footer text-center" style="background-color: rgb(0,185,216)">
                Kotbi Parking application
            </footer>
            
        </div>
       
    </div>

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
