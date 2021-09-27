<?php
session_start();
require'connexion_bdd.php';
//if(isset($_POST['aeroport_aller']) AND isset($_POST['aeroport_arriver']) AND isset($_POST['date_aller']) AND isset($_POST['date_retour']) AND isset($_POST['nbr_passagers']) AND isset($_POST['classe']))

$err='';
    if (isset($_GET['bouton']) OR isset($_GET['bouton2'])) {
        if ($_SESSION['vol_retour']==1){
            $date_retour=$_SESSION['date_retour']; 
            $annee_r=$_SESSION['annee_r'];
            $mois_r=$_SESSION['mois_r'];
            $mois_lr=$_SESSION['mois_lr'];
            $jour_r=$_SESSION['jour_r'];
            $date_re=$_SESSION['date_re'];
        }
    $aeroport_aller= $_SESSION['aeroport_aller'];
    $aeroport_arrive=$_SESSION['aeroport_arrive'];
    $date_aller=$_SESSION['date_aller'];
    $nbr_adulte=$_SESSION['adulte'];
    $nbr_enfant=$_SESSION['enfant'];
    $nbr_bebe=$_SESSION['bebe'];
    $nbr_passagers=$_SESSION['nbr_passagers'];
    $classe=$_SESSION['classe'];
    $devise=$_SESSION['devise'];
    $annee=$_SESSION['annee'];
    $mois=$_SESSION['mois'];
    $jour=$_SESSION['jour'];
    $mois_l=$_SESSION['mois_l'];
    $vol_retour=$_SESSION['vol_retour'];
    $date_al=$_SESSION['date_al'];
        
    }else{

    $aeroport_aller=$_POST['aeroport_aller'];
    $aeroport_arrive=$_POST['aeroport_arrive'];
    $date_aller=$_POST['date_aller'];
      
    //$date_retour=$_POST['date_retour'];
    $nbr_adulte=$_POST['adulte'];
    $nbr_enfant=$_POST['enfant'];
    $nbr_bebe=$_POST['bebe'];
    $classe=$_POST['classe'];
    $devise=$_POST['devise'];
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
    //$_SESSION['date_retour']=$date_retour;
    $_SESSION['adulte']=$nbr_adulte;
    $_SESSION['enfant']=$nbr_enfant;
    $_SESSION['bebe']=$nbr_bebe;
    $_SESSION['nbr_passagers']=$nbr_passagers;
    $_SESSION['classe']=$classe;
    $_SESSION['devise']=$devise;
    
    $les_dates_aller=explode('-',$_SESSION['date_aller']);
    $annee=$les_dates_aller[0];
    $mois=$les_dates_aller[1];
    $jour=$les_dates_aller[2];
        
    switch($mois){   //le mois aller recuperé du form
                            case 1:$mois_l='Janvier';break;
                            case 2:$mois_l='Février';break;
                            case 3:$mois_l='Mars';break;
                            case 4:$mois_l='Avril';break;
                            case 5:$mois_l='Mai';break;
                            case 6:$mois_l='Juin';break;
                            case 7:$mois_l='Juillet';break;
                            case 8:$mois_l='Aout';break;
                            case 9:$mois_l='Septembre';break;
                            case 10:$mois_l='Octobre';break;
                            case 11:$mois_l='Novembre';break;
                            case 12:$mois_l='Décembre';break;
                            
                    }
    
    $_SESSION['annee']=$annee;
    $_SESSION['mois']=$mois;
    $_SESSION['mois_l']=$mois_l; //le mois du form en lettre
    $_SESSION['jour']=$jour;

        
    $date_aller_func=$_SESSION['date_aller'];
    $date_al = new DateTime($date_aller_func);
    $date_al = $date_al->format("d-M-Y");
    $_SESSION['date_al']=$date_al;
      
	if($_SESSION['nbr_passagers']>9){
		$err="Veuilez vérifier vos informations";
	}
    
if(!empty($_POST['date_retour'])){
    $vol_retour=1;
    $date_retour=$_POST['date_retour'];
    $_SESSION['date_retour']=$date_retour;
    
    $les_dates_retour=explode('-',$_SESSION['date_retour']);
    $annee_r=$les_dates_retour[0];
    $mois_r=$les_dates_retour[1];
    $jour_r=$les_dates_retour[2];
    
    switch($mois_r){  //mois retour recuperé du form
                            case 1:$mois_lr='Janvier';break;
                            case 2:$mois_lr='Février';break;
                            case 3:$mois_lr='Mars';break;
                            case 4:$mois_lr='Avril';break;
                            case 5:$mois_lr='Mai';break;
                            case 6:$mois_lr='Juin';break;
                            case 7:$mois_lr='Juillet';break;
                            case 8:$mois_lr='Aout';break;
                            case 9:$mois_lr='Septembre';break;
                            case 10:$mois_lr='Octobre';break;
                            case 11:$mois_lr='Novembre';break;
                            case 12:$mois_lr='Décembre';break;
                            
                    }
     $date_re_func=$_SESSION['date_retour'];
     $date_re = new DateTime($date_re_func);
     $date_re= $date_re->format("d-M-Y"); 
    
    $_SESSION['annee_r']=$annee_r;
    $_SESSION['mois_r']=$mois_r;
    $_SESSION['mois_lr']=$mois_lr;
    $_SESSION['jour_r']=$jour_r;
    $_SESSION['date_re']=$date_re;
	//tester si la date retour et avant la date depart
	if($_SESSION['date_retour']<$_SESSION['date_aller']){
		$err="Veuilez vérifier vos informations";
	}
}else{
    $_SESSION['date_retour']=0;
    $vol_retour=0;
}
$_SESSION['vol_retour']=$vol_retour;

    }

if(!empty($err)){
	header('Location:index.php?err='.$err);
}

//tester si ya aucun vol
$sql1='SELECT id,nom,pays FROM aeroport WHERE nom=:aero_dep ';
            $requete1= $bdd->prepare($sql1);
            $requete1->execute(array('aero_dep'=>$aeroport_aller));
            $donnee1=$requete1->fetch();
            $aero_dep_id=$donnee1['id'];
            $aero_dep_nom=$donnee1['nom'];
			$aero_dep_pay=$donnee1['pays'];
			$_SESSION['aero_dep_id']=$aero_dep_id;
			$_SESSION['aero_dep_nom']=$aero_dep_nom;
			$_SESSION['aero_dep_pay']=$aero_dep_pay;
            //recuperer le id de vol arrivé
            $sql2='SELECT id,nom,pays FROM aeroport WHERE nom=:aero_arr ';
            $requete2= $bdd->prepare($sql2);
            $requete2->execute(array('aero_arr'=>$aeroport_arrive));
            $donnee2=$requete2->fetch();
            $aero_arr_id=$donnee2['id'];
            $aero_arr_nom=$donnee2['nom'];
			$aero_arr_pay=$donnee2['pays'];
			$_SESSION['aero_arr_id']=$aero_arr_id;
			$_SESSION['aero_arr_nom']=$aero_arr_nom;
			$_SESSION['aero_arr_pay']=$aero_arr_pay;
			
            $sql3="SELECT id,nom FROM classe WHERE nom='$classe'";
            $reponse3=$bdd->query($sql3);
            $donnee3=$reponse3->fetch();
            $id_classe=$donnee3['id'];
            $_SESSION['id_classe']=$id_classe;
                
            
			$sql4='SELECT vol.id, vol.date_dep, vol.heure_dep, vol.date_arr, vol.heure_arr, vol.type_v as type_vol, vol.escale, avion.type, avion.nom, tarif.tarif_enfant, tarif.tarif_bb, tarif.tarif_vol FROM avion INNER JOIN vol INNER JOIN tarif ON avion.id = vol.avion_id AND vol.id= tarif.vol_id WHERE vol.aero_dep_id=:aero_dep_id AND vol.aero_arr_id=:aero_arr_id AND date_dep=:date AND tarif.classe_id=:classe_id';
             $requete4 = $bdd->prepare($sql4);
            $requete4->execute(array('aero_dep_id'=>$aero_dep_id,'aero_arr_id'=>$aero_arr_id,'date'=>$_SESSION['date_aller'], 'classe_id'=>$id_classe));
            $vol =$requete4->fetch();
            if($vol==false){
				$err="destination indisponible pour le moment, veuillez choisir une autre destination";
				header('Location:index.php?err='.$err);
			}

        

?>