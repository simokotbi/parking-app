
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
     <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">

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
                     <!--    <li>
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
      
            </div>

            <h3>Authentification</h3>
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
                 <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <form class="form-horizontal form-material" method="POST" action="proces.php">
                                    <div class="form-group">
                                        <label class="col-md-12">Id Utilisateure</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="Uid" required>
                                        </div>
                                         <div class="form-group">
                                        <label class="col-md-12">Nom Utilisateure</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="Unom" required>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-12">Prenom</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="Uprenom" required>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-12">Adresse</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="Uadress" required>
                                            <small>
                                                 <?php  
                                if(isset($_SESSION['error'])):
                             ?> 
                                                 <p> <?php echo $_SESSION['error'];
                                                   ?></p>
                              <?php endif; ?> 
                                             </small>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-12">mot de pass</label>
                                        <div class="col-md-12">
                                            <input type="password"  class="form-control form-control-line" name="Upass">
                                        </div>
                                
                                    </div>
                                    
                                    </div>
                                   
                                   
                                    </div></form>



                                             <div class="form-group">

                                        <div class="col-sm-12">
                                            <button class="btn btn-success" name="Sauthentifier">S'authentifier</button>
                                            <a class="btn btn-danger" name="sinscrire" href="inscription-page.php">S'inscrire</a>
                                            
                                        </div>
                                    </div>
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
