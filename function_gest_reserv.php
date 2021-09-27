<?php
session_start();
require'connexion_bdd.php';

$nom=$_POST['nom_passager'];
$num_reserv=$_POST['num_reserv'];
$err='';
//if(isset($nom) AND !empty($nom) AND isset($num_reserv) AND !empty($num_reserv)){
$sql='SELECT id,state,devise FROM reservation WHERE ref=:ref';
//$sql='SELECT nom, prenom, sexe, num_pass, type, date_nais FROM client_passager WHERE reservation_id=:id LIMIT 1';
$requete = $bdd->prepare($sql);
$requete->execute(array('ref'=> $num_reserv));
$donnee=$requete->fetch();
    if($donnee==true){
     $id_reserv=$donnee['id'];
     $_SESSION['id_reserv']=$id_reserv;
     $sql2='SELECT nom FROM client_passager WHERE reservation_id=:id LIMIT 1';
     $requete2=$bdd->prepare($sql2);
     $requete2->execute(array('id'=> $id_reserv));
     $donnee2=$requete2->fetch();
     if($donnee2==true){
         if($donnee2['nom']==$nom){
             if($donnee['state']=='none'){
                 $devise=$donnee['devise'];
                 $_SESSION['devise']=$devise;
                 $_SESSION['num_reserv']=$num_reserv;
                 $lien='paiement_gest_reserv.php';
             }
             if($donnee['state']=='done'){
				 $_SESSION['paiement']=1;
				 
				  $sqlT='SELECT vol_id_a, vol_id_r, classe_id FROM reservation WHERE id=:id';
                    $requeteT = $bdd->prepare($sqlT);
                    $requeteT->execute(array('id'=>$_SESSION['id_reserv']));
                    $dataT =$requeteT->fetch();
                    $vol_id_a=$dataT['vol_id_a'];
                    $vol_id_r=$dataT['vol_id_r'];
                    $_SESSION['vol_id_r']=$vol_id_r;
                    $classe_id=$dataT['classe_id'];
                    
                    $sql_class='SELECT nom FROM classe WHERE id=:id_classe';
                    $rqt_class=$bdd->prepare($sql_class);
                    $rqt_class->execute(array('id_classe'=>$classe_id));
                    $donnee_class=$rqt_class->fetch();
                    $nom_classe=$donnee_class['nom'];
                    $_SESSION['nom_classe']=$nom_classe;
				     $devise=$donnee['devise'];
                     $_SESSION['devise']=$devise;
                     $_SESSION['num_reserv']=$num_reserv;
				     
				      
                    $sql_trf='SELECT tarif_bb,tarif_enfant,tarif_vol FROM tarif WHERE vol_id=:vol_id AND classe_id=:classe_id';
                    $requete_trf=$bdd->prepare($sql_trf);
                    $requete_trf->execute(array('vol_id'=>$vol_id_a , 'classe_id'=>$classe_id));
                    $data_trf=$requete_trf->fetch();
                    $tarif_bb_a=$data_trf['tarif_bb'];
                    $_SESSION['tarif_bb']=$tarif_bb_a;
                    $tarif_enf_a=$data_trf['tarif_enfant'];
                    $_SESSION['tarif_enf']=$tarif_enf_a;
                    $tarif_vol_a=$data_trf['tarif_vol'];
                    $_SESSION['tarif']=$tarif_vol_a;
                    
                    $type_enf='Enfant';
                    $sql_enf='SELECT id FROM client_passager WHERE reservation_id=:id AND type=:type';
                    $requete_enf=$bdd->prepare($sql_enf);
                    $requete_enf->execute(array('id'=>$_SESSION['id_reserv'] , 'type'=>$type_enf));
                    $nbr_enf=0;
                    while($data_enf=$requete_enf->fetch()){
                    $nbr_enf=$nbr_enf+1;
                    }
                    $_SESSION['enfant']=$nbr_enf;
                    
                    
                     $type_bb='Bébe';
                    $sql_bb='SELECT id FROM client_passager WHERE reservation_id=:id AND type=:type';
                    $requete_bb=$bdd->prepare($sql_bb);
                    $requete_bb->execute(array('id'=>$_SESSION['id_reserv'] , 'type'=>$type_bb));
                    $nbr_bb=0;
                    while($data_bb=$requete_bb->fetch()){
                    $nbr_bb=$nbr_bb+1;
                    }
                    $_SESSION['bebe']=$nbr_bb;
                    
                     $type_adl='Adulte';
                    $sql_adl='SELECT id FROM client_passager WHERE reservation_id=:id AND type=:type';
                    $requete_adl=$bdd->prepare($sql_adl);
                    $requete_adl->execute(array('id'=>$_SESSION['id_reserv'] , 'type'=>$type_adl));
                    $nbr_adl=0;
                    while($data_adl=$requete_adl->fetch()){
                    $nbr_adl=$nbr_adl+1;
                    }
                    $_SESSION['adulte']=$nbr_adl;
                    
                    $nbr_passag=$nbr_adl+$nbr_enf+$nbr_bb;
				 
				    if ($vol_id_r!=0){
                         $_SESSION['vol_retour']=1;
                         $_SESSION['date_retour']=1;
					}else{
						$_SESSION['vol_retour']=0;
                        $_SESSION['date_retour']=0;
					}
				      $sql_trf_r='SELECT tarif_bb,tarif_enfant,tarif_vol FROM tarif WHERE vol_id=:vol_id AND classe_id=:classe_id';
                           $requete_trf_r=$bdd->prepare($sql_trf_r);
                           $requete_trf_r->execute(array('vol_id'=>$vol_id_r , 'classe_id'=>$classe_id));
                           $data_trf_r=$requete_trf_r->fetch();
                           $tarif_bb_r=$data_trf_r['tarif_bb'];
                           $_SESSION['tarif_bb_r']=$tarif_bb_r;
                           $tarif_enf_r=$data_trf_r['tarif_enfant'];
                           $_SESSION['tarif_enf_r']=$tarif_enf_r;
                           $tarif_vol_r=$data_trf_r['tarif_vol'];
                           $_SESSION['tarif_r']=$tarif_vol_r;
				 
				   $sql_typ='SELECT type_v FROM vol WHERE id=:id';
				   $requete_typ=$bdd->prepare($sql_typ);
				   $requete_typ->execute(array('id'=>$vol_id_a));
				   $data_typ=$requete_typ->fetch();
				  $type_v=$data_typ['type_v'];
				 if($type_v=='international'){
				  $_SESSION['type_vol']=1;
				 }else{
				  $_SESSION['type_vol']=0;
				 }
				 $_SESSION['identite']='passport';
                   
                 $lien='menu_siege_G.R.php';
             }
              
         }
		 
     }
		header('Location:'.$lien) ;
       
        if($donnee2==false){
            $err="Reservation introuvable";
			header('Location:index.php?err='.$err);
        }
    }
    if($donnee==false){
        $err="Reservation introuvable";
		
    }
if(!empty($err)){
	header('Location:index.php?err='.$err);
}
//}
?>