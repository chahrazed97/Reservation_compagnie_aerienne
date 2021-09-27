<?php
session_start();
require'connexion_bdd.php';
$pay='';
$code_cib=$_POST['code_cib'];
$nom_cib=$_POST['nom_cib'];

//recuperer le solde de client 
$sql='SELECT id,solde FROM cib WHERE owner=:owner AND num_compte=:num_compte';
$requete=$bdd->prepare($sql);
$requete->execute(array('owner'=> $nom_cib, 'num_compte'=> $code_cib));
$donnee=$requete->fetch();
if($donnee==true){
if($donnee['solde']<$_SESSION['total']){
    $pay='VOTRE SOLDE EST INSUFFISANT POUR EFFECTUER CE PAIEMENT';
    
}else{
//recuperer le solde de la compagnie
$owner_compagnie='air_dorado';
$num_compagnie=1234;
$sql2='SELECT solde FROM cib WHERE owner=:owner AND num_compte=:num_compte';
$requete2=$bdd->prepare($sql2);
$requete2->execute(array('owner'=> $owner_compagnie, 'num_compte'=> $num_compagnie));
$donnee2=$requete2->fetch();

//effectuer le paiment
$solde_client=$donnee['solde']-$_SESSION['total'];
$solde_compagnie=$donnee2['solde']+$_SESSION['total'];
$id_compte=$donnee['id'];

$stmt0 = $bdd->prepare('UPDATE cib SET solde=:solde WHERE owner=:owner AND num_compte=:num_card');
$stmt0->bindValue(':solde',$solde_client);
$stmt0->bindValue(':owner',$nom_cib);
$stmt0->bindValue(':num_card',$code_cib);
$stmt0->execute();
    
$stmt1 = $bdd->prepare('UPDATE cib SET solde=:solde WHERE owner=:owner AND num_compte=:num_card');
$stmt1->bindValue(':solde',$solde_compagnie);
$stmt1->bindValue(':owner',$owner_compagnie);
$stmt1->bindValue(':num_card',$num_compagnie);
$stmt1->execute();

//les transactions
$type1='debit';
$type2='credit';
$stmt2=$bdd->prepare('INSERT INTO trans_cib SET type=:type, compte_id=:compte_id, montant=:montant');
$stmt2->bindValue(':type',$type1);
$stmt2->bindValue(':compte_id',$id_compte);
$stmt2->bindValue(':montant',$_SESSION['total']);
$stmt2->execute();


$id_compagnie=1;    
$stmt3=$bdd->prepare('INSERT INTO trans_cib SET type=:type, compte_id=:compte_id, montant=:montant');
$stmt3->bindValue(':type',$type2);
$stmt3->bindValue(':compte_id',$id_compagnie);
$stmt3->bindValue(':montant',$_SESSION['total']);
$stmt3->execute();
    
//generer les billets
if($_SESSION['paiement']==0){
$reserv_id=$_SESSION['last_id'];
$nbr_passager=$_SESSION['nbr_passagers'];
    }
    if($_SESSION['paiement']==1){
$reserv_id=$_SESSION['id_reserv'];
$nbr_passager=$_SESSION['nbr_passager'];
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
    
header('location:info.php');
}
}else{
    $pay= "CE COMPTE N'EXISTE PAS VEUILLEZ VERIFIER VOS INFORMATIONS";
}
if(!empty($pay)){
	header('Location:paiement_cib.php?pay='.$pay);
}
?>