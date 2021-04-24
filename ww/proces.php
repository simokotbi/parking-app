<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 session_start();
$localhost='localhost:3308';
$my_user='root';
$my_password='';
$my_db='dbparking';

$mysqli=new mysqli($localhost,$my_user,$my_password,$my_db)
 OR die(mysqli_error($connect));

#$sel= $_POST["coch"];
if(isset($_POST['sup']) ){
$cocher=$_POST["coch"] ;
//header("location:gestion-parking.php");
if(isset($_POST["coch"])){
foreach ($cocher as $idpark) {

	$mysqli->query("delete from parking where idpark =".$idpark) or die($mysqli->error);
	$_SESSION['message']="supression avec Succé!";
	$_SESSION['msg_type']="danger";
	header("location:gestion-parking.php");
}
} else{
 	$_SESSION['message']="Rien n'ai selectionné!!";
 	$_SESSION['msg_type']="danger";
 	header("location:gestion-parking.php");
 }
 }

	
if(isset($_POST['ajouter'])){
	$idpark= $_POST['idpark'];
	$nompark= $_POST['nompark'];
	$adpark= $_POST['adpark'];
	$ville= $_POST['ville'];
	$nbplace= $_POST['nbplace'];
	$nbplacelibre=$_POST['nbplacelibre'];
	$mysqli->query("insert into parking(idpark,nompark,adpark,ville,nbplace,nbplacelibre)values('$idpark','$nompark',
	'$adpark','$ville','$nbplace','$nbplacelibre' )")
OR die($mysqli->error);
$_SESSION['message']="Ajout avec Succé!";
	$_SESSION['msg_type']="success";
header("location:gestion-parking.php");
}

	if(isset($_POST['modifier'])){

    $idpark= $_POST['idpark'];
	$nompark= $_POST['nompark'];
	$adpark= $_POST['adpark'];
	$ville= $_POST['ville'];
	$nbplace= $_POST['nbplace'];
	$nbplacelibre=$_POST['nbplacelibre'];

    $mysqli->query("update parking set nompark ='$nompark',adpark='$adpark',ville='$ville',
    	nbplace='$nbplace',nbplacelibre='$nbplacelibre' where idpark=$idpark")OR die($mysqli->error);
header("location:gestion-parking.php");
	}

	#authentification page
	$var;
	$_SESSION['error']="";
	$check=0;
	$_SESSION['error']="";
	function emailcheck($var){
      	if(filter_var($var,FILTER_VALIDATE_EMAIL)){
      		$check=1;
      		header("location:autentification.php");
      	}else{
      		$check=0;
      		header("location:autentification.php");
      	}return $check;

      }

function countthenumberofusers($Uadress){
	$sql=mysqli_query($mysqli,"SELECT * FROM utilisateur WHERE adresseutil='$Uadress'");
	$resulta=mysqli_num_rows($sql);
	if($resulta>0){
		$count= 1;
	}else{ $count= 0;}
	return $count;
}
	if(isset($_POST['Sauthentifier'])){

		$Uid=$_POST['Uid'];
		$Uname=$_POST['Unom'];
		$Uprenom=$_POST['Uprenom'];
		$Uadress=$_POST['Uadress'];
		$Upass=$_POST['Upass'];

		 $sql=mysqli_query($mysqli,"SELECT * FROM utilisateur WHERE adresseutil='$Uadress'");
	     $resulta=mysqli_num_rows($sql);
	     echo $resulta;
      //emailcheck($Uadress);
		 if(empty($Uid)||empty($Uname)||empty($Uprenom)||empty($Upass)){

            // $_SESSION['error']="invalid emeil format il doit etre sou forme exemple@gmail.com";
			$_SESSION['message']="Verifier les champs doivent etre remplie";
	        $_SESSION['msg_type']="danger";
	
header("location:autentification.php");

		  }if(emailcheck($Uadress)==0){
		  	$_SESSION['error']="invalid emeil format il doit etre sou forme exemple@gmail.com";
	         $_SESSION['msg_type']="danger";
		 }
		 else if($resulta>0){
			$_SESSION['message']="Utilisateure deja existant utiliser un autre e mail!";
	        $_SESSION['msg_type']="danger";
		}
		else{
			$mysqli->query("insert into utilisateur(idutil,nom,prenutil,adresseutil,pass)values('$Uid','$Uname',
	'$Uprenom','$Uadress','$Upass')");
				$_SESSION['message']="Authentification avec Succé!";
	$_SESSION['msg_type']="success";
	
	
	}


}
if(isset($_POST['sinscrire'])){

		$adress=$_POST['adress'];
		$pass=$_POST['pass'];

		$mail=mysqli_query($mysqli,"SELECT*FROM utilisateur WHERE adresseutil='$adress' AND pass='$pass'");
		 	$exists=mysqli_num_rows($mail);
		if(empty($adress)||empty($pass)){
			$_SESSION['message']="Verifier les champs doivent etre remplie";
	        $_SESSION['msg_type']="danger";
		 }//else if(emailcheck($adress)==0){
		// 	$_SESSION['message']="invalid emeil format il doit etre sou forme exemple@gmail.com";
	 //         $_SESSION['msg_type']="danger";
	 //     }
		 	
		 	else if($exists>0){
		 		$_SESSION['message']="Inscription avec Succé!";
	$_SESSION['msg_type']="success";
	  header("location:acceui.php");
		 	}else{
		 		$_SESSION['message']="Utilisateure inexistant ou mot de pass non valide!";
	        $_SESSION['msg_type']="danger";
	        header("location:inscription-page.php");
		 	}
		 	
}

//password change
if(isset($_POST['changepassword'])){
	$adres=$_POST['email'];
		$motdepas=$_POST['oldpass'];
		$newpass=$_POST['newpass'];
		$renewpass=$_POST['renewpass'];
		$same=mysqli_query($mysqli,"SELECT*FROM utilisateur WHERE adresseutil='$adres' AND pass='$motdepas'");
		$countsame=mysqli_num_rows($same);
		 if($countsame==0){
			$_SESSION['message']="l email ou le mot de pass ne sont pas correct!";
	        $_SESSION['msg_type']="danger";
	         header("location:changepass.php");
		}if(empty($newpass)||$newpass!=$renewpass){
			$_SESSION['message']="les mot de pass ne sont pas les méme!";
	        $_SESSION['msg_type']="danger";
 header("location:changepass.php");
		}
		else if($countsame>0){
			$mysqli->query("UPDATE utilisateur SET pass= '$newpass' where adresseutil='$adres'") 
			or die($mysqli->error);
			$_SESSION['message']="Mot de passe changer avec Succé!";
	$_SESSION['msg_type']="success";
	 header("location:changepass.php");
		}
}

//retrieve the password
if(isset($_POST['envoyer'])){

require 'C:/xampp/htdocs/ww/PHPMailer/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/ww/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/ww/PHPMailer/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
	$adresmail=$_POST['mailadress'];
	$code=uniqid(true);
$sqlq=mysqli_query($mysqli, "UPDATE utilisateur SET pass= '$code' where adresseutil='$adresmail'");	
  
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'email@gmail.com';                    
    $mail->Password   = 'fgpqkzynbvednntd';                               
    $mail->SMTPSecure = 'tls';         
    $mail->Port       = 587;                                     

   
    
    $mail->setFrom('email@gmail.com', 'simokotbi');
    $mail->addAddress($adresmail, 'Joe User');     
    $mail->addReplyTo('simo240d@gmail.com', 'Information');

    // Content
    $link="http://localhost:81/ww/recoveremail.php?code=$code";
    $mail->isHTML(true);                                 
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "Bienvenue <a href='$link'>clicker ici </a>pour recevoir votre mot de pass $code <b>in bold !</b>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
      header("location:passoublier.php");
     $_SESSION['message']="Verifier votre boite mail!";
	$_SESSION['msg_type']="success";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
//header("location:recoveremail.php");
// if(!isset($_GET['code'])){
// 	 //header("location:passoublier.php");
//  exit('page not found');
// }
// if(isset($_POST['changepass'])){
// $adress=$_POST['email'];
// $newpass=$_POST['newpass'];
// $renewpass=$_POST['renewpass'];
// $code=$_GET["code"];
// $qu=mysqli_query($mysqli,"SELECT adresseutil FROM utilisateur WHERE  pass='$code'");
// $exist=mysqli_num_rows($qu);
// if($exist==0){
	
//     $_SESSION['message']="pas dutilisateures avec ces information";
// $_SESSION['msg_type']="danger";

  
// }else if($exist>0||$newpass==$renewpass){
// $quer=mysqli_query($mysqli,"UPDATE utilisateur SET  pass='$newpass'FROM WHERE adresseutil='$adress'" );

//  $_SESSION['message']="mot de pass changer avec succer!";
// $_SESSION['msg_type']="success";
// }
// }

//gestion des tarifs
if(isset($_POST['ajoutertarif'])){
	$idtarif=$_POST['idtarif'];
	$type=$_POST['typetarif'];

	if(empty($idtarif)||empty($type)){
	 $_SESSION['message']="verifier les champs vide!";
     $_SESSION['msg_type']="danger";	
	}else{
		$mysqli->query("INSERT INTO typetarif (idtype,nomtype) VALUES ('$idtarif','$type')")or die($mysqli->error);
		$_SESSION['message']="type ajouter avec succer!";
		$_SESSION['msg_type']="success";
	}
	 header("location:gestion-tarif.php ");
}
if( isset($_POST['modifiertarif'])){
	$idtarif=$_POST['idtarif'];
	$type=$_POST['typetarif'];
		if(empty($idtarif)||empty($type)){
	 $_SESSION['message']="verifier les champs vide!";
     $_SESSION['msg_type']="danger";	
	}else{
		$mysqli->query("UPDATE typetarif SET nomtype='$type' where idtype='$idtarif'")or die($mysqli->error);
		$_SESSION['message']="type modifier avec succer!";
		$_SESSION['msg_type']="success";
	}
	 header("location:gestion-tarif.php ");
}
if( isset($_POST['supprimertarif'])){
	$idtarif=$_POST['idtarif'];
	$type=$_POST['typetarif'];
		if(empty($idtarif)){
	 $_SESSION['message']="verifier les champs vide!";
     $_SESSION['msg_type']="danger";	
	}else{
		$mysqli->query("DELETE FROM typetarif WHERE idtype='$idtarif'")or die($mysqli->error);
		$_SESSION['message']="type supprimer avec succer!";
		$_SESSION['msg_type']="success";
	}
	 header("location:gestion-tarif.php ");
}
//stationnements
if(isset($_POST['ajouterstationnement'])){
	$idstats=$_POST['idstat'];
	$datestats=$_POST['datestat'];
    $idutils=$_POST['idutil'];
    $idtypes=$_POST['idtype'];
    $idparks=$_POST['idpark'];
    $nbrunits=$_POST['nbrunit'];
 			
	if(empty($idstats)||empty($datestats)||empty($idutils)||empty($idtypes)||empty($idparks)||empty( $nbrunits)){
	 $_SESSION['message']="verifier les champs vide!";
     $_SESSION['msg_type']="danger";	
	}else{
		$mysqli->query("INSERT INTO stationnement (idstat,datestat,idutil,idtype,idpark,nbrunit) VALUES
		 ('$idstats','$datestats','$idutils','$idtypes','$idparks','$nbrunits')")or die($mysqli->error);
		$_SESSION['message']="type ajouter avec succer!";
		$_SESSION['msg_type']="success";
	}
	 header("location:stationer.php ");
	// exit($idstats);
}


//suprimer stationnement
if(isset($_POST['supstat'])){
	$idstats=$_POST['idstat'];
    $cocherstat=$_POST["cochstationement"] ;
if(isset($_POST["cochstationement"])){
foreach ($cocherstat as $idstats) {

	$mysqli->query("delete from stationnement where idstat =".$idstats) or die($mysqli->error);
	$_SESSION['message']="supression avec Succé!";
	$_SESSION['msg_type']="danger";
	
} header("location:stationer.php");

}else if(!isset($_POST["cochstationement"])){
	
	$_SESSION['message']="Rien n'ais selectioné!";
	$_SESSION['msg_type']="danger";
	header("location:stationer.php");
}

}
//modifier stationnements modifierstat

if( isset($_POST['modifierstat'])){
	$idstati=$_POST['idstat'];
	$datestati=$_POST['datestat'];
    $idutili=$_POST['idutil'];
    $idtypei=$_POST['idtype'];
    $idparki=$_POST['idpark'];
    $nbruniti=$_POST['nbrunit'];
		if(empty($idstati)||empty($datestati)||empty($idutili)||empty($idtypei)||empty($idparki)||empty( $nbruniti)){
	 $_SESSION['message']="verifier les champs vide!";
     $_SESSION['msg_type']="danger";	
	}else{
		$mysqli->query("UPDATE stationnement SET  datestat='$datestati' ,idutil='$idutili', idtype='$idtypei', idpark='$idparki',nbrunit='$nbruniti' where idstat='$idstati'")or die($mysqli->error);
		$_SESSION['message']="Stationnement modifier avec succer!";
		$_SESSION['msg_type']="success";
	}
	 header("location:stationer.php ");
}
//ajouter_tarif
if(isset($_POST['ajouter_tarif'])){
	$idparks=$_POST['idpark'];
	$idtypes=$_POST['idtype'];
    $prix=$_POST['prix'];
	if(empty($idparks)||empty($idtypes)||empty($prix)){
	 $_SESSION['message']="verifier les champs vide!";
     $_SESSION['msg_type']="danger";	
	}else{
		$mysqli->query("INSERT INTO tarifparking (idpark,idtype,prix) VALUES ('$idparks','$idtypes','$prix')")or die($mysqli->error);
		$_SESSION['message']="tarif ajouter avec succer!";
		$_SESSION['msg_type']="success";
	}
	 header("location:gestion-tarif.php ");
}
//modifier_tarifs
// if( isset($_POST['modifier_tarif'])){
// 	$idparks=$_POST['idpark'];
// 	$idtypes=$_POST['idtype'];
//     $prix=$_POST['prix'];
// 		if(empty($idparks)||empty($idtypes)||empty($prix)){
// 	 $_SESSION['message']="verifier les champs vide!";
//      $_SESSION['msg_type']="danger";	
// 	}else{
// 		$mysqli->query("UPDATE tarifparking SET idtype='$idtype',prix='$prix' where idpark='$idparks'")or die($mysqli->error);
// 		$_SESSION['message']="tarif modifier avec succer!";
// 		$_SESSION['msg_type']="success";
// 	}
// 	 header("location:gestion-tarif.php ");
// }

//supprimer_tarif
if(isset($_POST['supprimer_tarif'])){
    $idparks=$_POST['idpark'];
	$idtypes=$_POST['idtype'];
    $prix=$_POST['prix'];
if(!empty($idparks)){

	$mysqli->query("delete from tarifparking where idpark =".$idparks) or die($mysqli->error);
	$_SESSION['message']="supression avec Succé!";
	$_SESSION['msg_type']="danger";
	 header("location:gestion-tarif.php");
}

else{
	
	$_SESSION['message']="Pas de tarif avec cet Id!";
	$_SESSION['msg_type']="danger";
	header("location:gestion-tarif.php");
}

}
//chifres_daffaire
	
?>