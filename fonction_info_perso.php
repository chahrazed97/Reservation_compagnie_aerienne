<?php
session_start();
require'connexion_bdd.php';

$email=$_POST['email'];
$confirm_email=$_POST['confirm_email'];
$tel=$_POST['tel'];
$confirm_tel=$_POST['confirm_tel'];

if (($email==$confirm_email) AND ($tel==$confirm_tel)){
//$date_act=date();
if($_SESSION['vol_retour']==1){
    $type='aller/retour';
    $id_vol_ret=$_SESSION['id_vol_ret'];
}else{
    $type='aller simple';
    $id_vol_ret=0;
}

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

$ref=generate_string($permitted_chars, 10);
$state='none';
$date_heure=date('y/m/d h:i:s');
$vol_id_a=$_SESSION['id_vol_al'];
$classe_id=$_SESSION['id_classe'];
$devise=$_SESSION['devise'];

//inserer la reservation dans la bdd
$req = $bdd->prepare('INSERT INTO reservation(ref,state,date_heure,type,vol_id_a,vol_id_r,classe_id,devise) VALUES (:ref, :state, :date_heure,:type, :vol_id_a, :vol_id_r, :classe_id, :devise) ');
        $req->bindValue(':ref',$ref);
        $req->bindValue(':state',$state);
        $req->bindValue(':date_heure',$date_heure);
        $req->bindValue(':type',$type);
        $req->bindValue(':vol_id_a',$vol_id_a);
        $req->bindValue(':vol_id_r',$id_vol_ret);
        $req->bindValue(':classe_id',$classe_id);
        $req->bindValue(':devise',$devise);
        $req->execute();
        $last_id = $bdd->lastInsertId();
        $_SESSION['last_id']=$last_id;

for($i=1;$i<=$_SESSION['adulte'];$i++){
    $titre='titre'.$i;
    $nom='nom'.$i;
    $prenom='prenom'.$i;
    
    $_SESSION[$titre]=$_POST[$titre];
    $_SESSION[$nom]=$_POST[$nom];
    $_SESSION[$prenom]=$_POST[$prenom];
    if($i==1){
       $num_carte=0;
       $req1 = $bdd->prepare('INSERT INTO client(email,tel,num_carte) VALUES (:email, :tel, :num_carte) ');
       $req1->bindValue(':email',$_POST['email']);
       $req1->bindValue(':tel',$_POST['tel']);
       $req1->bindValue(':num_carte',$num_carte);
       $req1->execute();
       $last_id_client = $bdd->lastInsertId();
    }
    $nais_adult='';
    $type_adlt='Adulte';
    $num_pass=0;
    $menu_id=0;
    $req2 = $bdd->prepare('INSERT INTO client_passager(nom,prenom,sexe,num_pass,type,date_nais,client_id,reservation_id,menu_id) VALUES (:nom , :prenom, :sexe, :num_pass, :type, :date_nais, :client_id, :reservation_id, :menu_id) ');
     $req2->bindValue(':nom',$_SESSION[$nom]);
     $req2->bindValue(':prenom',$_SESSION[$prenom]);
     $req2->bindValue(':sexe',$_SESSION[$titre]);
     $req2->bindValue(':num_pass',$num_pass);
     $req2->bindValue(':type',$type_adlt);
     $req2->bindValue(':date_nais',$nais_adult);
     $req2->bindValue(':client_id',$last_id_client);
     $req2->bindValue(':reservation_id',$last_id);
     $req2->bindValue(':menu_id',$menu_id);
     $req2->execute();
     
}
if(!empty($_SESSION['enfant'])){
for($i=1;$i<=$_SESSION['enfant'];$i++){
    $titre_enf='titre_enf'.$i;
    $nom_enf='nom_enf'.$i;
    $prenom_enf='prenom_enf'.$i;
    $date_nsc_enf='date_nsc_enf'.$i;
    
    $_SESSION[$titre_enf]=$_POST[$titre_enf];
    $_SESSION[$nom_enf]=$_POST[$nom_enf];
    $_SESSION[$prenom_enf]=$_POST[$prenom_enf];
    $_SESSION[$date_nsc_enf]=$_POST[$date_nsc_enf];
    
     
    $type_adlt='Enfant';
    $num_pass=0;
    $menu_id=0;
    $req2 = $bdd->prepare('INSERT INTO client_passager(nom,prenom,sexe,num_pass,type,date_nais,client_id,reservation_id,menu_id) VALUES (:nom , :prenom, :sexe, :num_pass, :type, :date_nais, :client_id, :reservation_id, :menu_id) ');
     $req2->bindValue(':nom',$_SESSION[$nom_enf]);
     $req2->bindValue(':prenom',$_SESSION[$prenom_enf]);
     $req2->bindValue(':sexe',$_SESSION[$titre_enf]);
     $req2->bindValue(':num_pass',$num_pass);
     $req2->bindValue(':type',$type_adlt);
     $req2->bindValue(':date_nais',$_SESSION[$date_nsc_enf]);
     $req2->bindValue(':client_id',$last_id_client);
     $req2->bindValue(':reservation_id',$last_id);
     $req2->bindValue(':menu_id',$menu_id);
     $req2->execute();
}
}
	

if(!empty($_SESSION['bebe'])){
for($i=1;$i<=$_SESSION['bebe'];$i++){
    $titre_bb='titre_bb'.$i;
    $nom_bb='nom_bb'.$i;
    $prenom_bb='prenom_bb'.$i;
    $date_nsc_bb='date_nsc_bb'.$i;
    
    $_SESSION[$titre_bb]=$_POST[$titre_bb];
    $_SESSION[$nom_bb]=$_POST[$nom_bb];
    $_SESSION[$prenom_bb]=$_POST[$prenom_bb];
    $_SESSION[$date_nsc_bb]=$_POST[$date_nsc_bb];
    
    
    $type_adlt='Bébe';
    $num_pass=0;
    $menu_id=0;
    $req2 = $bdd->prepare('INSERT INTO client_passager(nom,prenom,sexe,num_pass,type,date_nais,client_id,reservation_id,menu_id) VALUES (:nom , :prenom, :sexe, :num_pass, :type, :date_nais, :client_id, :reservation_id, :menu_id) ');
     $req2->bindValue(':nom',$_SESSION[$nom_bb]);
     $req2->bindValue(':prenom',$_SESSION[$prenom_bb]);
     $req2->bindValue(':sexe',$_SESSION[$titre_bb]);
     $req2->bindValue(':num_pass',$num_pass);
     $req2->bindValue(':type',$type_adlt);
     $req2->bindValue(':date_nais',$_SESSION[$date_nsc_bb]);
     $req2->bindValue(':client_id',$last_id_client);
     $req2->bindValue(':reservation_id',$last_id);
     $req2->bindValue(':menu_id',$menu_id);
     $req2->execute();
}
}


$_SESSION['email']=$email;
$_SESSION['confirm_email']=$confirm_email;
$_SESSION['tel']=$tel;
$_SESSION['confirm_tel']=$confirm_tel;



header('Location:paiement.php');

}else{
    $err_mail='';
    $err_tell='';
	$age_b='';
	$age_en='';
	if($email!==$confirm_email){
    $err_mail='veuillez confirmer votre email';
  
}
if($tel!==$confirm_tel){
    $err_tel='veuillez confirmer votre numéro de téléphone';
 
}
	if(!empty($_SESSION['enfant'])){
    for($i=1;$i<=$_SESSION['enfant'];$i++){
	$date_nsc_enf='date_nsc_enf'.$i;
	$date_enf=$_POST[$date_nsc_enf];
	$date_n_enf = new DateTime($date_enf);
    $date_n_enf = $date_n_enf->format("Y");
	$age_enf=date("Y")-$date_n_enf;
		if($age_enf<2 OR $age_enf>12){
			$age_en="l'age de l'enfant doit etre compris entre 3 ans et 12 ans";
		}
}}
	if(!empty($_SESSION['bebe'])){
	for($i=1;$i<=$_SESSION['bebe'];$i++){
		$date_nsc_bb='date_nsc_bb'.$i;
		$date_bb=$_POST[$date_nsc_bb];
		$date_n_bb = new DateTime($date_bb);
        $date_n_bb = $date_n_bb->format("Y");
		$age=date("Y")-$date_n_bb;
		if($age>2){
			$age_b="L'age du bébé ne doit pas etre superieure a deux (2) ans ";
		}
	}
	}
	 header('location:reserv.php?err2='.$err_tel.'&err='.$err_mail.'&err_b='.$age_b.'&err_en='.$age_en);
}
?>