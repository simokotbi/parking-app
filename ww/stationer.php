<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Parking application</title>

    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
 
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
              <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="tables_style.css">
  
           <script type="text/javascript">
                            $(document).ready(function(){

                                   $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'  
 
           }); 
                                $(function(){
                                $("#time").datepicker();
                               
                                });
                            });
                       </script>
      </head>  

<body class="fix-header card-no-border">
  
    <div id="main-wrapper">
 
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
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
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
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
                            <li class="breadcrumb-item"><a href="acceui.php">Home</a></li>
                            <li class="breadcrumb-item active">Gestion des Parkings</li>
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
            <h3>Stationnements</h3>
                 <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
       <form class="form-horizontal form-material" method="POST" action="proces.php">
                                    <div class="form-group">
                                        <label class="col-md-12">Id Stationnement</label>
                                        <div class="col-md-12">
                                       <input type="text" class="form-control form-control-line" name="idstat" required>
                                        </div>
                                         <div class="form-group">
                                        <label class="col-md-12">Date de stationnement</label>
                                        <div class="col-md-12">
                                            <input type="text" id="time" autocomplete="off" class="form-control form-control-line" name="datestat" required>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-12">id utilisateur</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="idutil" required>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-12">Id type</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="idtype" required>
                                        </div>
                                         <div class="form-group">
                                        <label class="col-md-12">Id park</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="idpark" required>
                                        </div>
                                         <div class="form-group">
                                        <label class="col-md-12">nombre unite</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="nbrunit" required>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    <button class="btn btn-success"
                                             name="ajouterstationnement">Ajouter Tarifs</button>
                                             <button class="btn btn-primary"
                                             name="modifierstat">Modifier Tarifs</button>
                                             <!-- <button class="btn btn-danger"
                                             name="supprimertarif">Supprimer</button> -->
                                   
                                    </div></form>
     <!-- <select class="btn btn-success" style="width: 220px">
         <option 0>heures</option>
         <option 1>jours</option>
         <option 2>mois</option>
     </select>
     </div>  -->
                              <br><br>  
                                  <!--  <div class="form-group">
   
                                    <div class="form-group">

                                        <div class="col-sm-12"> -->
                                           <!--  <button class="btn btn-success"
                                             name="ajouterstationnement">Ajouter</button>
                                             <button class="btn btn-primary"
                                             name="modifiertarif">Modifier</button>
                                             <button class="btn btn-danger"
                                             name="supprimertarif">Supprimer</button> -->

                                           <!-- <a href="autentification.php" class="btn btn-primary"> 
                                            modifier</a> -->
                                            
                                     
                                   
                                   <!--  </div></form>  -->
                                    <script type="text/javascript"></script>
                                    

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
            $resulta=$mysqli->query("select*from stationnement")or die($mysqli->error);
    
    ?>

                                      <form method="POST" action="proces.php">
                                     <button class="btn btn-danger" 
                                            name="supstat" >Supprimer Stationnements</button>
                                    <table class="table" action="proces.php" methode="POST" >

                                        <thead>
                                            <thead><tr>
                                                <td>Id Stationnement</td>
                                                <td>Date de stationnement</td>
                                                <td>id utilisateur</td>
                                                 <td>Id type</td>
                                                <td>Id park</td>
                                                <td>nombre unite</td>
                                              </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        while($row=$resulta->fetch_array()):
                                                 ?>
                                                 
                                            <tr>


                                                <td><?php echo $row['idstat']; ?></td>
                                                <td><?php echo $row['datestat']; ?></td>
                                                <td><?php echo $row['idutil']; ?></td>
                                                <td><?php echo $row['idtype']; ?></td>
                                                <td><?php echo $row['idpark']; ?></td>
                                               <td><?php echo $row['nbrunit']; ?></td>
                                                <td>

                             <input type="checkbox" name="cochstationement[]" value="<?php echo $row['idstat']; ?>"/>     
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
                                    <br> <br> <br>
            <footer class="footer text-center" style="background-color: rgb(0,185,216)">
                Kotbi Parking application
            </footer>
        </div>
    </div>
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
