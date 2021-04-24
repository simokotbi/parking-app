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
                    <a class="navbar-brand" href="acceui.php">

                        <b>
                            <img src="../assets/images/logo-icon.png" link="acceui.php" class="dark-logo" />
                            
                        </b>
                        <span>
                            <img src="../assets/images/logo-text.png" link="acceui.php" class="dark-logo" />
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
                            <a href="stationer.php" class="waves-effect"><i class="fa fa-font m-r-10" aria-hidden="true"></i>Strationnements</a>
                        </li>
                         <li>
                            <a href="affichage_chifres.php" class="waves-effect"><i class="fa fa-font m-r-10" aria-hidden="true"></i>Chifres d'affaires</a>
                        </li>
                        <li>
                            <a href="gestion-tarif.php" class="waves-effect"><i class="fa fa-font m-r-10" aria-hidden="true"></i>Gestion des tarifs</a>
                        </li>
                       <!--  <li>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Gestion des Parkings</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Gestion des Parkings</li>
                        </ol>
                    </div>
                    
                </div>
                
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Parkings</h4>
                                <h6 class="card-subtitle">
                                <div class="table-responsive">
                                    <?php 
            $mysqli=new mysqli('localhost:3308','root','','dbparking') 
            or die(mysqli_error($mysqli));
            $result=$mysqli->query("select*from parking")or die($mysqli->error);
    
    ?>

                                      <form method="POST" action="proces.php">
                                     <button class="btn btn-danger" 
                                            name="sup" >Supprimer Parking</button>
                                    <table class="table" action="proces.php" methode="POST" >

                                        <thead>
                                            <thead><tr>
                                                <td>id</td>
                                                <td>nom</td>
                                                <td>adress</td>
                                                 <td>ville</td>
                                                <td>nombre de places</td>
                                                <td>nombre de places libre</td>
                                              </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        while($row=$result->fetch_array()):
                                                 ?>
                                                 
                                            <tr>

                                                <td><?php echo $row['idpark']; ?></td>
                                                <td><?php echo $row['nompark']; ?></td>
                                                <td><?php echo $row['adpark']; ?></td>
                                                <td><?php echo $row['ville']; ?></td>
                                                <td><?php echo $row['nbplace']; ?></td>
                                               <td><?php echo $row['nbplacelibre']; ?></td>
                                                <td>

                             <input type="checkbox" name="coch[]" value="<?php echo $row['idpark']; ?>"/>     
                                                 </td> 
                                                    
                                            </tr>
                                                </form>
                                            <?php endwhile; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
           
            <h3>Operation sur les parkings</h3>
             <?php  
                                if(isset($_SESSION['message'])):
                             ?>  
                             <div class="alert alert-<?=$_SESSION['msg_type']?>">
                                 <?php 
                                 echo $_SESSION['message'] ; 
                                 unset($_SESSION['message'])
                                 ?>
                             </div>  
                             <?php endif; ?> 
                 <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <form class="form-horizontal form-material" action="proces.php" method="POST">
                                 <div class="form-group">

                                        <div class="col-sm-12">
                                            <button class="btn btn-success"
                                             name="modifier">Modifier Parking</button>
                                            
                                            <button class="btn btn-primary" 
                                            name="ajouter">AjouterParking</button>
                                        
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Id parking</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="" class="form-control form-control-line"name="idpark">
                                        </div>
                                         <div class="form-group">
                                        <label class="col-md-12">Nom du parking</label>
                                        <div class="col-md-12">
                                            <input name="nompark" type="text" placeholder="" class="form-control form-control-line">
                                        </div>
                                  <div class="form-group">
                                        <label class="col-md-12">Adress du parking</label>
                                        <div class="col-md-12">
                                            <input name="adpark" type="text" placeholder="" class="form-control form-control-line">
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-12">Ville</label>
                                        <div class="col-md-12">
                                            <input name="ville" type="text" placeholder="" class="form-control form-control-line">
                                        </div>
                                        <div class="form-group">
                                        <label name="nbplace" class="col-md-12">Nbr de places</label>
                                        <div class="col-md-12">
                                            <input type="text"  class="form-control form-control-line">
                                        </div>
                                        <label class="col-md-12">Nbr de places libre</label>
                                        <div class="col-md-12">
                                            <input type="text" name="nbplacelibre" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    
                                    </div>
                                   
                                   
                                    </div></form>


                                    <br> <br> <br>
                                 <footer class="footer text-center">
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
