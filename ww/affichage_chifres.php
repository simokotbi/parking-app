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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Parking application</title>
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
                                $("#time2").datepicker();
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
                        <!-- <li>
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
                                    <!-- <div class="form-group"> -->
                                      <!--   <label class="col-md-12">Identifian parking</label>
                                        <div class="col-md-12">
                                       <input type="text" class="form-control form-control-line" name="idstat" required>
                                        </div> -->
                                        
                                    <!-- </div> -->
                                  <!--   </div> -->
                                    
                                  <!--   <button class="btn btn-success"
                                             name="ajouterstationnement">Ajouter</button>
                                             <button class="btn btn-primary"
                                             name="modifiertarif">Modifier</button> -->
                                             <!-- <button class="btn btn-danger"
                                             name="supprimertarif">Supprimer</button> -->
                                   
                                    </div></form>
     <!-- <select class="btn btn-success" style="width: 220px">
         <option 0>heures</option>
         <option 1>jours</option>
         <option 2>mois</option>
     </select>
     </div>  -->
                            <!--   <br><br> -->  
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
            $resulta=$mysqli->query("select*from parking")or die($mysqli->error);
            $dropd=$mysqli->query("select idpark from parking")or die($mysqli->error);
    ?>

                                      <form method="POST" action="">
                                  
                                        <select class="btn btn-success" style="width: 220px" name="select">
                                                <option>selectioné un Id</option>
                                                <?php while ($rows=$dropd->fetch_array()):?>
                                                      <?php $idparks= $rows['idpark']; ?>  
                                                    <option><?php echo $idparks; ?></option>
                                                <?php endwhile; ?>
                                                      </select>

                                                      <br><br>
                                     <label class="col-md-12">Selectionnné deux dates pour filtrer:</label>
                                        <div class="input-group date">
                                            <input type="text" id="time" class="input-group date" name="date1" required autocomplete="off">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="text" id="time2" class="input-group date" name="date2" required autocomplete="off">
                                        </div><br><br>
                                     <button class="btn btn-success"
                                             name="syncro">Afficher</button>

                                    <table class="table" action="proces.php" methode="POST" >

                                        <thead>
                                            <thead><tr>
                                                <td>Id Parking</td>
                                                <td>Dates</td>
                                                <td>Nombre unit</td>
                                                <td>Nom</td>
                                                <td>Ville</td>
                                                <td>Chifre dafaires</td>
                                                <!--  <td>Ville</td>
                                                <td>Chifre dafaires</td>
                                                <td>nombre unite</td> -->
                                              </tr>
                                        </thead>
                                        <tbody>

         
                                   <?php 

if(isset($_POST['syncro'])){
    $date1=2020-06-01;
    $date2=2020-06-01;
    $date1=$_POST['date1'];
      $date2=$_POST['date2'];
      $select=$_POST['select'];
      $chifre_daffaires=0;
       $betwindates=mysqli_query($mysqli,"select datestat ,idpark,nbrunit from stationnement 
        where datestat >='$date1' and datestat <='$date2' and idpark='$select'
           ")or die($mysqli->error);
       $nom_vile=mysqli_query($mysqli,"select nompark ,ville from parking 
        where idpark='$select'
           ")or die($mysqli->error);
       $sum_nbrunit=mysqli_query($mysqli,"SELECT SUM(nbrunit) as 'sumnbru' from stationnement WHERE idpark='$select' ")
       or die($mysqli->error);
       $price=mysqli_query($mysqli,"SELECT prix from tarifparking WHERE idpark='$select' ")
       or die($mysqli->error);
       // $chifre_daffaires=($sum_nbrunit)*($price);
       // $nbrunit=mysqli_query($mysqli,"")
           
    //     $date;
    //   $nbrunit;
    //   $sommes;
    //  $prix;
    // $chifre_daffaires;
  // header("location:affichage_chifres.php");
                                            }
                                             ?>
                                            <?php
                                            if($betwindates):
                                            if(mysqli_num_rows($betwindates)>0):
                                        while($rowd=$betwindates->fetch_array()):
                                            while($rownv=$nom_vile->fetch_array()):
                                                while($sum=$sum_nbrunit->fetch_array()):
                                                    while($pric=$price->fetch_array()):
                                                 ?>
                                                 
                                            <tr>


<!-- SELECT p.idpark ,s.idstat from parking p , stationnement s where p.idpark= s.idstat -->
                                                <td><?php echo $rowd['idpark']; ?></td>
                                                <td><?php echo $rowd['datestat']; ?></td>
                                                <td><?php echo $rowd['nbrunit']; ?></td>
                                                <td><?php echo $rownv['nompark']; ?></td>
                                                <td><?php echo $rownv['ville']; ?></td>
                                                <td><?php echo $sum['sumnbru']*$pric['prix']; ?></td>
                                               <!--  -->
                                                
                                               
                                                <td>  
                                                 </td> 
                                                    
                                            </tr>
                                                </form>
                                            <?php endwhile; 
                                            endwhile; 
                                              endwhile; 
                                                endwhile; 
                                        endif;
                                        endif;
                                            ?>

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
