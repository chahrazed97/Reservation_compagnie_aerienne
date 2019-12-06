<?php
session_start();
require'connexion_bdd.php';
//if(isset($_POST['aeroport_aller']) AND isset($_POST['aeroport_arriver']) AND isset($_POST['date_aller']) AND isset($_POST['date_retour']) AND isset($_POST['nbr_passagers']) AND isset($_POST['classe']))


    $aeroport_aller=$_POST['aeroport_aller'];
    $aeroport_arrive=$_POST['aeroport_arrive'];
    $date_aller=$_POST['date_aller'];
    $date_retour=$_POST['date_retour'];
    $nbr_adulte=$_POST['adulte'];
    $nbr_enfant=$_POST['enfant'];
    $nbr_bebe=$_POST['bebe'];
    $classe=$_POST['classe'];
    $nbr_passagers=$nbr_adulte + $nbr_enfant + $nbr_bebe;
   
/**$date_titre=date('Y-m-d');

function DateFr($date_titre){
  $datea1=substr($date_titre,0,4);
  $datem1=substr($date_titre,5,2);
  $datej1=substr($date_titre,8,10);

  return $datej1."/".$datem1."/".$datea1;
}

echo "La date du  ".DateFr($date_titre);**/

    $_SESSION['aeroport_aller']=$aeroport_aller;
    $_SESSION['aeroport_arrive']=$aeroport_arrive;
    $_SESSION['date_aller']=$date_aller;
    $_SESSION['date_retour']=$date_retour;
    $_SESSION['adulte']=$nbr_adulte;
    $_SESSION['enfant']=$nbr_enfant;
    $_SESSION['bebe']=$nbr_bebe;
    $_SESSION['nbr_passagers']=$nbr_passagers;
    $_SESSION['classe']=$classe;
    
    $les_dates_aller=explode('-',$_SESSION['date_aller']);
    $annee=$les_dates_aller[0];
    $mois=$les_dates_aller[1];
    $jour=$les_dates_aller[2];

    $les_dates_retour=explode('-',$_SESSION['date_retour']);
    $annee_r=$les_dates_retour[0];
    $mois_r=$les_dates_retour[1];
    $jour_r=$les_dates_retour[2];
    
    $_SESSION['annee']=$annee;
    $_SESSION['mois']=$mois;
    $_SESSION['jour']=$jour;

      
    $_SESSION['annee_r']=$annee_r;
    $_SESSION['mois_r']=$mois_r;
    $_SESSION['jour_r']=$jour_r;    
?>