<?php
session_start();

require'connexion_bdd.php';

$err='';
$ident=$_POST['identite'];
$_SESSION['identite']=$ident;
$moyen_pay=$_POST['groupe1'];
$_SESSION['moyen_pay']=$moyen_pay;
 if ($moyen_pay=='cib'){
     $lien='paiement_cib.php';
 }

 if ($moyen_pay=='dhahabia'){
     $lien='dhahabia.php';
      
 }

 if ($moyen_pay=='visa'){
     $nom_visa=$_POST['nom_card'];
     $num_visa=$_POST['num_card'];
     
     //recuperer le solde de client 
$sql='SELECT id,solde FROM visa WHERE owner=:owner AND num_compte=:num_compte';
$requete=$bdd->prepare($sql);
$requete->execute(array('owner'=> $nom_visa, 'num_compte'=> $num_visa));
$donnee=$requete->fetch();
if($donnee==true){
if($donnee['solde']<$_SESSION['total']){
    $err='VOTRE SOLDE EST INSUFFISANT POUR EFFECTUER CE PAIEMENT';
	
}else{
//recuperer le solde de la compagnie
$owner_compagnie='air_dorado';
$num_compagnie=1234;
$sql2='SELECT solde FROM visa WHERE owner=:owner AND num_compte=:num_compte';
$requete2=$bdd->prepare($sql2);
$requete2->execute(array('owner'=> $owner_compagnie, 'num_compte'=> $num_compagnie));
$donnee2=$requete2->fetch();

//effectuer le paiment
$solde_client=$donnee['solde']-$_SESSION['total'];
$solde_compagnie=$donnee2['solde']+$_SESSION['total'];
$id_compte=$donnee['id'];

$stmt0 = $bdd->prepare('UPDATE visa SET solde=:solde WHERE owner=:owner AND num_compte=:num_card');
$stmt0->bindValue(':solde',$solde_client);
$stmt0->bindValue(':owner',$nom_visa);
$stmt0->bindValue(':num_card',$num_visa);
$stmt0->execute();
    
$stmt1 = $bdd->prepare('UPDATE visa SET solde=:solde WHERE owner=:owner AND num_compte=:num_card');
$stmt1->bindValue(':solde',$solde_compagnie);
$stmt1->bindValue(':owner',$owner_compagnie);
$stmt1->bindValue(':num_card',$num_compagnie);
$stmt1->execute();

//les transactions
$type1='debit';
$type2='credit';
$stmt2=$bdd->prepare('INSERT INTO trans_visa SET type=:type, compte_id=:compte_id, montant=:montant');
$stmt2->bindValue(':type',$type1);
$stmt2->bindValue(':compte_id',$id_compte);
$stmt2->bindValue(':montant',$_SESSION['total']);
$stmt2->execute();


$id_compagnie=1;    
$stmt3=$bdd->prepare('INSERT INTO trans_visa SET type=:type, compte_id=:compte_id, montant=:montant');
$stmt3->bindValue(':type',$type2);
$stmt3->bindValue(':compte_id',$id_compagnie);
$stmt3->bindValue(':montant',$_SESSION['total']);
$stmt3->execute();
    
//generer les billets
    if($_SESSION['paiement']==0){
$reserv_id=$_SESSION['last_id'];
    }
    if($_SESSION['paiement']==1){
$reserv_id=$_SESSION['id_reserv'];
    }
$state='done';
    
             //generer le code 'ref'
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}

 if($_SESSION['paiement']==0){
$nbr_passager=$_SESSION['nbr_passagers'];
    }
    if($_SESSION['paiement']==1){
$nbr_passager=$_SESSION['nbr_passager'];
    }    

    for($i=1; $i<=$nbr_passager; $i++){
$ref=generate_string($permitted_chars, 10);
$bil=$bdd->prepare('INSERT INTO billet (ref, state, reservation_id) VALUES (:ref , :state, :reservation_id)');
$bil->bindValue(':ref',$ref);
$bil->bindValue(':state',$state);
$bil->bindValue(':reservation_id',$reserv_id);
$bil->execute();
    }
// mettre le champs 'state' de la table reservation a done
$state='done';
$reserv = $bdd->prepare('UPDATE reservation SET state=:state WHERE id=:id ');
$reserv->bindValue(':state',$state);
$reserv->bindValue(':id',$reserv_id);
$reserv->execute();
    
$lien='info.php';
}
}else{
    $err= "CE COMPTE N'EXISTE PAS VEUILLEZ VERIFIER VOS INFORMATIONS";
	
}
 }

 if ($moyen_pay=='mastercart'){
$nom_master=$_POST['nom_card'];
$num_master=$_POST['num_card'];
    //recuperer le solde de client 
$sql='SELECT id,solde FROM master WHERE owner=:owner AND num_compte=:num_compte';
$requete=$bdd->prepare($sql);
$requete->execute(array('owner'=> $nom_master, 'num_compte'=> $num_master));
$donnee=$requete->fetch();
if($donnee==true){
if($donnee['solde']<$_SESSION['total']){
    $err='VOTRE SOLDE EST INSUFFISANT POUR EFFECTUER CE PAIEMENT';
	
}else{
//recuperer le solde de la compagnie
$owner_compagnie='air_dorado';
$num_compagnie=1234;
$sql2='SELECT solde FROM master WHERE owner=:owner AND num_compte=:num_compte';
$requete2=$bdd->prepare($sql2);
$requete2->execute(array('owner'=> $owner_compagnie, 'num_compte'=> $num_compagnie));
$donnee2=$requete2->fetch();

//effectuer le paiment
$solde_client=$donnee['solde']-$_SESSION['total'];
$solde_compagnie=$donnee2['solde']+$_SESSION['total'];
$id_compte=$donnee['id'];

$stmt0 = $bdd->prepare('UPDATE master SET solde=:solde WHERE owner=:owner AND num_compte=:num_card');
$stmt0->bindValue(':solde',$solde_client);
$stmt0->bindValue(':owner',$nom_master);
$stmt0->bindValue(':num_card',$num_master);
$stmt0->execute();
    
$stmt1 = $bdd->prepare('UPDATE master SET solde=:solde WHERE owner=:owner AND num_compte=:num_card');
$stmt1->bindValue(':solde',$solde_compagnie);
$stmt1->bindValue(':owner',$owner_compagnie);
$stmt1->bindValue(':num_card',$num_compagnie);
$stmt1->execute();

//les transactions
$type1='debit';
$type2='credit';
$stmt2=$bdd->prepare('INSERT INTO trans_master SET type=:type, compte_id=:compte_id, montant=:montant');
$stmt2->bindValue(':type',$type1);
$stmt2->bindValue(':compte_id',$id_compte);
$stmt2->bindValue(':montant',$_SESSION['total']);
$stmt2->execute();


$id_compagnie=1;    
$stmt3=$bdd->prepare('INSERT INTO trans_master SET type=:type, compte_id=:compte_id, montant=:montant');
$stmt3->bindValue(':type',$type2);
$stmt3->bindValue(':compte_id',$id_compagnie);
$stmt3->bindValue(':montant',$_SESSION['total']);
$stmt3->execute();
    
//generer les billets
 if($_SESSION['paiement']==0){
$reserv_id=$_SESSION['last_id'];
    }
    if($_SESSION['paiement']==1){
$reserv_id=$_SESSION['id_reserv'];
    }
$state='done';
    
             //generer le code 'ref'
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
    
    if($_SESSION['paiement']==0){
$nbr_passager=$_SESSION['nbr_passagers'];
    }
    if($_SESSION['paiement']==1){
$nbr_passager=$_SESSION['nbr_passager'];
    }    
    

    for($i=1; $i<=$nbr_passager; $i++){
$ref=generate_string($permitted_chars, 10);
$bil=$bdd->prepare('INSERT INTO billet (ref, state, reservation_id) VALUES (:ref , :state, :reservation_id)');
$bil->bindValue(':ref',$ref);
$bil->bindValue(':state',$state);
$bil->bindValue(':reservation_id',$reserv_id);
$bil->execute();
    }
    
    // mettre le champs 'state' de la table reservation a done
$state='done';
$reserv = $bdd->prepare('UPDATE reservation SET state=:state WHERE id=:id ');
$reserv->bindValue(':state',$state);
$reserv->bindValue(':id',$reserv_id);
$reserv->execute();
    
$lien='info.php';
}
}else{
    $err= "CE COMPTE N'EXISTE PAS VEUILLEZ VERIFIER VOS INFORMATIONS";
	
}
 }

//for($i=1; $i<=$_SESSION['adulte']; $i++){

if($_SESSION['paiement']==0){
$reserv_id=$_SESSION['last_id'];
$nbr_adulte=$_SESSION['adulte'];
$nbr_enfant=$_SESSION['enfant'];
    }
    if($_SESSION['paiement']==1){
$reserv_id=$_SESSION['id_reserv'];
$nbr_adulte=$_SESSION['nbr_adulte'];
$nbr_enfant=$_SESSION['nbr_enfant'];
    }



if(empty($err)){
$type_adl='Adulte';
$sql_adl='SELECT id FROM client_passager WHERE type=:type AND reservation_id=:id';
$requete_adl=$bdd->prepare($sql_adl);
$requete_adl->execute(array('type'=> $type_adl, 'id'=> $reserv_id));
$i=1;
while(($donnee_adl=$requete_adl->fetch()) AND ($i<=$nbr_adulte) ){
$pass_adl='num_pass'.$i;
$num_pass=$_POST[$pass_adl];
    
$stmt = $bdd->prepare('UPDATE client_passager SET num_pass=:num_pass WHERE type=:type AND reservation_id=:id AND id=:id_passager');
$stmt->bindValue(':num_pass',$num_pass);
$stmt->bindValue(':type',$type_adl);
$stmt->bindValue(':id',$reserv_id);
$stmt->bindValue(':id_passager',$donnee_adl['id']);
$stmt->execute();
$i++;
}

//for($i=1; $i<=$_SESSION['enfant']; $i++){
//$pass='num_pass_enf'.$i;
//$num_pass=$_POST[$pass];
//$type_clt='Enfant';
$type_enf='Enfant';
$sql_enf='SELECT id FROM client_passager WHERE type=:type AND reservation_id=:id';
$requete_enf=$bdd->prepare($sql_enf);
$requete_enf->execute(array('type'=> $type_enf, 'id'=> $reserv_id));
$i=1;
while(($donnee_enf=$requete_enf->fetch()) AND ($i<=$nbr_enfant) ){
$pass='num_pass_enf'.$i;
$num_pass=$_POST[$pass];

$stmt = $bdd->prepare('UPDATE client_passager SET num_pass=:num_pass WHERE type=:type AND reservation_id=:id AND id=:id_passager');
$stmt->bindValue(':num_pass',$num_pass);
$stmt->bindValue(':type',$type_enf);
$stmt->bindValue(':id',$reserv_id);
$stmt->bindValue(':id_passager',$donnee_enf['id']);
$stmt->execute();
$i++;
}


 header('Location:'.$lien) ;
}else{
	header('Location:paiement.php?err='.$err);
}


?>