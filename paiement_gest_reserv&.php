<?php
session_start();
require'connexion_bdd.php';

$_SESSION['paiement']=1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link type="text/css" rel="stylesheet" href="./css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/select_vol.css">
    <link rel="stylesheet" href="./css/carstyl2.css">
    <style>
    .dessumenuseconnecter {
    width: 182px !important;
    height: 31px !important;}
    .dessumenuinscrire {
    width: 153px !important;
    height: 31px !important;
    }
  
        body{
            background-color:white;
        }
    
     .left{
         float:none !important;
     }
    .slider {
        margin-top:20px;
    position: relative;
    height: 90px !important;
    width: 80% !important;
    margin-left:53px;
}
i.small{
    color:gold;
}
.item{
    align-items: center;
    width: 25%;
    justify-content:center;
    border-left:2px solid white ;
}
.item:hover {
    cursor: pointer !important;
    background-color:inherit;
}
.details_vol {
    margin: 0;
    margin-top:-20px;
    border-left: #17264645 solid 1px;
}
.info1 {
    background-color: rgb(242, 242, 242) !important;
}
button:focus{
    background-color:rgb(242, 242, 242) !important;
}
.fa-arrow-right{
    color:#2d2d2f;
    font-size:30px;
}
.dessumenuseconnecter {
    width: 189px !important;}
    .dessumenuinscrire {
    width: 164px !important;
    }
    .imagelogo {
    width: 175px;
    height: 125px !important;
}
.slider .slick-center .items{
    background-color: #4c0d0d;
}
.slick-next:before,.slick-prev:before{
    color:#4c0d0d !important;
}
.slider .items{
    background-color:#2d2d2f;
}
.collapsible-header, th{
    font-weight: 600;
    color: #172646;
    font-size: 17px;
    border:none;
}

@media only screen and (max-width: 720px) {
    .item p{
       font-size:10px;
       margin-left:3px;
   }
   .fas{
       font-size:16px;
   }
   .item p{
       padding:0px;
   }
   .prix{
    width:40%;
}
   .prix a{
       margin-left:-27px;
   }
}
    </style>
        

    
</head>

<body>
<?php  include("head.php"); ?>
<div class="row navbar" style="background-color:#2d2d2f;display: flex;margin-top:20px;height:50px;">
    <div class=" item "   style="display: flex;">
    <i class="fas fa-plane-departure" style="font-size:1.5em;color:gold;"></i>
    <p style="color:white;">Sellectionner Vol</p>
</div>
<div class=" item " style="display: flex;">
<i class="fas fa-paper-plane" style="font-size:1.5em;color:gold;"></i>
    <p style="color:white;">Réservation</p>
</div>
<div class="item " style="display: flex;background-color: #172646;">
<i class="fas fa-dollar-sign" style="font-size:1.5em;color:gold;"></i>    
<p style="color:white;">Paiement</p>
</div>
<div class="item " style="display: flex;">
<i class="fas fa-dollar-sign" style="font-size:1.5em;color:gold;"></i>
    <p style="color:white;">Billets</p>
</div>
</div>
    <div class="flex">
        <div class="left">
            
            <div class="info info1">
                <div class="row flex">
                    <?php
                    
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
                   
                    //calculer le total
                     if ($vol_id_r!=0){
                         $_SESSION['vol_retour']=1;
                         $_SESSION['date_retour']=1;
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
                            if (!empty($nbr_enf)){
                                $total_enf=($tarif_enf_a+$tarif_enf_r)*$nbr_enf;
                            }else{
                                $total_enf=0;
                            }
                             if (!empty($nbr_bb)){
                                 $total_bb=($tarif_bb_a+$tarif_bb_r)*$nbr_bb;
                             }else{
                                 $total_bb=0;
                             }  
                            $total_adult=($tarif_vol_a+$tarif_vol_r)*$nbr_adl;
                            $total=$total_adult+$total_enf+$total_bb;
                            
                          
                        }else{
                          $_SESSION['vol_retour']=0;
                          $_SESSION['date_retour']=0;
                            if (!empty($nbr_enf)){
                                $total_enf=$tarif_enf_a*$nbr_enf;
                            }else{
                                $total_enf=0;
                            }
                             if (!empty($nbr_bb)){
                                 $total_bb=$tarif_bb_a*$nbr_bb;
                             }else{
                                 $total_bb=0;
                             }  
                            $total_adult=$tarif_vol_a*$nbr_adl;
                            $total=$total_adult+$total_enf+$total_bb;
                          
                            
                        }
                    if ($_SESSION['devise']=='Euro €'){
                        $total=$total/200;
                    }
                    if($_SESSION['devise']=='Dollars $'){
                        $total=$total/190;
                        $total=round($total);
                    }
                    $_SESSION['total']=$total;
                       
                    
                  
                    $sql_typ='SELECT type_v FROM vol WHERE id=:id';
                    $rqt_typ=$bdd->prepare($sql_typ);
                     $rqt_typ->execute(array('id'=>$vol_id_a));
                    $donne=$rqt_typ->fetch();
                    $type_vol=$donne['type_v'];
                    if ($type_vol=='international'){
                        $_SESSION['type_vol']=1;
                    }else{
                        $_SESSION['type_vol']=0;
                    }
                    
                    if ($_SESSION['type_vol']==1){
                        $taxe=4830;
                    }else{
                        $taxe=2830;
                    }
                    if($_SESSION['devise']=='Euro €'){
                    $taxe=$taxe/200;
                    $taxe=round($taxe);}
                    if($_SESSION['devise']=='Dollars $'){
                    $taxe=$taxe/190;
                    $taxe=round($taxe);
                    }
                    $taxe_tt=$taxe*$nbr_passag;
                    $total_avc_tax=$total+$taxe_tt;
                    ?>
                    <h6 style="color: black;"><?php echo 'numéro de réservation: '.$_SESSION['num_reserv']; ?></h6>
                    <h6>Le total: <?php echo $total_avc_tax.' '.$_SESSION['devise']; ?></h6>
                    <p>Vous avez un delai de 3h pour confirmer votre voyage, si le paiement n'est pas effectuer votre reservation sera annulée</p>
                </div>

            </div>
            
            <form action="fonction_payer.php" method="post">
            <h5 style="margin: 2%;font-weight: bold;">Identification</h5>
            <?php 
                $type='Adulte';
                $type_enf='Enfant';
                     $rqt='SELECT nom,prenom FROM client_passager WHERE reservation_id=:id AND type=:type';
                     $requete = $bdd->prepare($rqt);
                     $requete->execute(array('id'=>$_SESSION['id_reserv'], 'type'=>$type));
                     $i=1;
                     while($data =$requete->fetch()){
                   
                      
    ?>

            <div class="info info1">
                <div class="row flex">
                    <i class="large material-icons" style="color: black;font-size: 3rem;">person</i>
                    <h5 style="color: black;"><?php echo $data['nom'].' '.$data['prenom']; ?></h5>
                </div>

            </div>
            
            <div class="row">
                <div class="col s12 ">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="input-field col s12 ">

                                    <select name="identite" id="identité" class="selecte">
                                                <option value="" disabled selected>identifiez vous</option>
                                                <?php
                                                    
                                                         if ($_SESSION['type_vol']==1){ ?>
                                                <option value="Passeport">Passeport</option>
                                                   <?php }else{ 
                                                           ?>
                                                <option value="Passeport">Passeport</option>
                                                <option value="Carte d'Identité">Carte National d'Identité</option>
                                                   <option value="Permis de conduite">Permis de Conduite   </option>
                                                  <?php } ?>
                                        </select>
                                    <label for="identité"></label>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="input-field col s12 ">
                                    <input id="input_text" type="text" max-length="1" name="num_pass<?php echo $i; ?>">
                                    <label for="input_text">entrer votre numéro</label>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; } 
                
                 $i=1;
                $type_enf='Enfant';
                     $rqt_enf='SELECT nom,prenom FROM client_passager WHERE reservation_id=:id AND type=:type_enf ';
                     $requete_enf = $bdd->prepare($rqt_enf);
                     $requete_enf->execute(array('id'=>$_SESSION['id_reserv'], 'type_enf'=>$type_enf));
                   
                     while($data_enf =$requete_enf->fetch()){
                   
                      
    ?>

            <div class="info info1">
                <div class="row flex">
                    <i class="large material-icons" style="color: black;font-size: 3rem;">person</i>
                    <h5 style="color: black;"><?php echo $data_enf['nom'].' '.$data_enf['prenom']; ?></h5>
                </div>

            </div>
            
            <div class="row">
                <div class="col s12 ">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="input-field col s12 ">

                                    <select name="identite" id="identité" class="selecte">
                                                <option value="" disabled selected>identifiez vous</option>
                                                <?php
                                                     $sql_typ='SELECT type FROM vol WHERE id=:id';
                                                     $rqt_typ=$bdd->prepare($sql_typ);
                                                     $rqt_typ->execute(array('id'=>$vol_id_a));
                                                     $donne=$rqt_typ->fetch();
                                                     $type_vol=$donne['type'];
                                                     if ($type_vol=='international'){
                                                         $_SESSION['type_vol']=1; ?>
                                                <option value="Passeport">Passeport</option>
                                                   <?php }else{ 
                                                         $_SESSION['type_vol']=0; ?>
                                                <option value="Passeport">Passeport</option>
                                                <option value="Carte d'Identité">Carte National d'Identité</option>
                                                   <option value="Permis de conduite">Permis de Conduite   </option>
                                                  <?php } ?>
                                        </select>
                                    <label for="identité"></label>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="input-field col s12 ">
                                    <input id="input_text" type="text" max-length="1" name="num_pass_enf<?php echo $i; ?>">
                                    <label for="input_text">entrer votre numéro</label>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; } ?>

            <div class="totalapayer">
                <div class="row flex">
                    <h5 style="color: black;">Total : </h5>

                    <h5 style="color: black;"><?php echo $total.' '.$_SESSION['devise']; ?></h5>
                        
                    
                </div>


            </div>
            
                <div class="row">
                    
                 <?php  if ($_SESSION['devise']=='Dinar(DZD)'){ ?>
                    <h5>Choisissez un mode de payement</h5>
                    <div class=" col s12 m6 l6">
                        
                        <p>
                            <label>
               <input name="groupe1" value="dhahabia" checked type="radio"  onclick="document.getElementById('code_carte').style.display='block';document.getElementById('suivant').style.display='none';document.getElementById('payer').style.display='block'"/>
               <span style="color:black"> Carte El-Dhahabia</span>
             </label>
                        </p>

                        <p>
                            <label>
               <input name="groupe1" value="cib" type="radio" onclick="document.getElementById('code_carte').style.display='block';document.getElementById('suivant').style.display='none';document.getElementById('payer').style.display='block'"/>
               <span style="color:black">Carte Bancaire</span>
             </label>
                        </p>


                    </div>
                    <?php  }
                     if ($_SESSION['devise']=='Euro €' OR $_SESSION['devise']=='Dollars $'){ ?>
                    
                <div class="row">
                    <h5>Choisissez un mode de payement</h5>
                    <div class=" col s12 m6 l4">
                        <p>
                            <label>
                  <input
                    name="groupe1" value="mastercart"
                    style="margin-top: 3%;"
                    type="radio"
                    onclick="document.getElementById('code_carte').style.display='block';
                    document.getElementById('mastercard').style.display='block';
                     document.getElementById('visa').style.display='none';"
                  />
                  <span><img src="img/mastercard.png" width="40%"/></span>
                </label>
                        </p>
                    </div>
                    <div class=" col s12 m6 l4">
                        <p>
                            <label>
                  <input
                    name="groupe1" value="visa"
                    style="margin-top: 3%;"
                    type="radio"
                    onclick="document.getElementById('code_carte').style.display='block';
                    document.getElementById('mastercard').style.display='none';
                    document.getElementById('visa').style.display='block'"
                  />
                  <span><img src="img/visacard.png" width="25%"/></span>
                </label>
                        </p>
                    </div>
                    <div class=" col s12 m6 l3" style="display: none;" id="visa">
                        <img src="img/verifiedvisa.jfif" />
                    </div>
                    <div class=" col s12 m6 l3" style="display: none;" id="mastercard">
                        <img src="img/mastercardd.png" / width="56%;">
                    </div>
                </div>
          
            <!--formulaire-->
            <div class="formulaire" style="display: none;" id="code_carte">
                
                    <div class="row">
                        <div class="col s12 m6 l4 ">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" id="codecarte" name="num_card" maxlength="19" pattern="\d+" required/>
                                    <label for="codecarte"> Numéro de la carte</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s10 m6 l3 " style="margin-left: 6%;">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" id="securite_carte" class="code_carte" maxlength="4" pattern="\d+"  required/>
                                    <label for="securite_carte">code de sécurité</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s2 m4 l3 " style="margin-top: 4%;">
                            <div class="row">
                                <i class="material-icons suffix">help</i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 l3 ">
                            <h6>Expire le* :</h6>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="number" class="mois" id="mois" min="1" max="12" required/>
                                    <label for="mois"> Mois</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3 " style="margin-top: 4%;">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="number" class="annee" id="annee" min="<?php echo date("Y");?>" required/>
                                    <label for="annee"> Année</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s10 m6 l3 " style="margin-left: 6%;margin-top: 4%;">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" id="nomcarte" class="nomcarte" name="nom_card" maxlength="90" pattern="[a-zA-Z \S]+" required  />
                                    <label for="nomcarte">Nom sur votre Carte</label>
                                </div>
                            </div>
                        </div>
                    </div>

                   <!-- <div class="col s12 m6 l5 right " id="payer"  style="margin-bottom:10%;">
                        <a href="carte-embarquement.php" class="waves-effect waves-light btn" id="bouton">Payer</a>-->
              
            </div>
            <!--<a
              href="ajout-bagage.php"
              class="waves-effect waves-light btn right"
              id="bouton"
               style="margin-bottom:10%;">Annuler</a
            >-->
         
                   <?php } ?>   
                </div> 

                <div class="col s12 m6 l5 right " id="payer">
                    <button type="submit" class="waves-effect waves-light btn" id="bouton">Payer</button>

                </div>
               <!-- <div class="col s12 m6 l5 right" style="display:none" id="suivant">
                    <a href="message.html" class="waves-effect waves-light btn" id="bouton">Suivant</a></div> -->

            </form>
            <div class="row">

                <div class=" col s12">
                    <h5 style="margin: 2%;font-weight: bold;">Condition générale</h5>
                    <p>
                        <label>
                            <input class="with-gap" name="group1" type="radio" />
                            <span>OUI J'ai lu et j'accepte les conditions</span>
                             </label>
                    </p>
                </div>
            </div>

           
        </div>
        
  
    <?php
     $sql1='SELECT vol_id_a, vol_id_r, classe_id FROM reservation WHERE id=:id';
         $requete1 = $bdd->prepare($sql1);
          $requete1->execute(array('id'=>$_SESSION['id_reserv']));
         $donnee1=$requete1->fetch();
         $vol_al=$donnee1['vol_id_a'];
         $vol_ret=$donnee1['vol_id_r'];
          
     
   
        $sql3='SELECT vol.aero_dep_id, vol.aero_arr_id, vol.date_dep, vol.heure_dep, vol.date_arr, vol.heure_arr, vol.escale, avion.type, avion.nom FROM vol INNER JOIN avion ON vol.avion_id=avion.id WHERE vol.id=:id';   

        $requete3 = $bdd->prepare($sql3);
        $requete3->execute(array('id'=> $vol_al));
        $donnee3=$requete3->fetch();
        $aero_dep_id=$donnee3['aero_dep_id'];
		$aero_arr_id=$donnee3['aero_arr_id'];
			
		$sql_d='SELECT nom,pays FROM aeroport WHERE id=:id';
		$requete_d = $bdd->prepare($sql_d);
         $requete_d->execute(array('id'=> $aero_dep_id));
          $donnee_d=$requete_d->fetch();

        $sql_a='SELECT nom,pays FROM aeroport WHERE id=:id';
		$requete_a = $bdd->prepare($sql_d);
         $requete_a->execute(array('id'=> $aero_arr_id));
          $donnee_a=$requete_a->fetch();
			
        $aero_dep=$donnee_d['nom'];
        $pays_dep=$donnee_d['pays'];
        $aero_arr=$donnee_a['nom'];
        $pays_arr=$donnee_a['pays'];
        $date_dep=$donnee3['date_dep'];
        $heure_dep=$donnee3['heure_dep'];
        $heure_arr=$donnee3['heure_arr'];
        $av_type=$donnee3['type'];
        $av_nom=$donnee3['nom'];
    $nbr_passager=$nbr_adl+$nbr_enf+$nbr_bb;
    $_SESSION['nbr_passager']=$nbr_passager;
     if($donnee3['escale']==1){
                        $escale='Avec escale';
                    }else{
                        $escale='Vol direct';
                    }
    $date_dep_a=$date_dep;
    $date_a = new DateTime($date_dep_a);
    $date_a = $date_a->format("d-M-Y"); 
    ?>
    <div class=" details_vol ">
            <div style="height: 500px; background-color: rgba(254, 254, 255, 0.473);margin-top: 20px;" >
            <div id="myDIV">
                <ul>
               <li><?php echo $nbr_passager.' '.'Voyageurs :'; ?></li>
               <li><?php if ($nbr_adl>1){$Adulte='Adultes';}else{$Adulte='Adulte';}
                        echo $nbr_adl.' '. $Adulte; ?>
                   <?php if (!empty($nbr_enf)){ 
                          if ($nbr_enf>1){$Enfant='Enfants';}else{$Enfant='Enfant';}
                              echo $nbr_enf.' '. $Enfant;}
                          if(!empty($nbr_bb)){
                          if ($nbr_bb>1){$Bebe='Bébés';}else{$Bebe='Bébé';}
                              echo $nbr_bb.' '. $Bebe;
                              
                          }?></li></ul>
             
            </div>
            <div id="myDIV" style="margin-top: 20x;">
                <b>Vol aller</b>
                <ul>
               <li><?php echo $date_a; ?></li>
               <li><?php echo $heure_dep.' '.$aero_dep; ?></li>
               <li><?php echo $heure_arr.' '.$aero_arr; ?></li>
               <li><?php echo 'Durée total ...'.$escale; ?></li>
               <li><?php echo 'PRIX :'.  $tarif_vol_a; ?></li>
                </ul>
             </div>
            <div id="myDIV" style="margin-top: 20x;">
                 <?php
                     if ($vol_id_r!=0){
                         $sql33='SELECT vol.aero_dep_id, vol.aero_arr_id, vol.date_dep, vol.heure_dep, vol.date_arr, vol.heure_arr, vol.escale, avion.type, avion.nom FROM vol INNER JOIN avion ON vol.avion_id=avion.id WHERE vol.id=:id';   

        $requete33 = $bdd->prepare($sql3);
        $requete33->execute(array('id'=> $vol_ret));
        $donnee33=$requete3->fetch();
        $aero_dep_id3=$donnee33['aero_dep_id'];
		$aero_arr_id3=$donnee33['aero_arr_id'];
			
		$sql_d3='SELECT nom,pays FROM aeroport WHERE id=:id';
		$requete_d3 = $bdd->prepare($sql_d3);
         $requete_d3->execute(array('id'=> $aero_dep_id3));
          $donnee_d3=$requete_d3->fetch();

        $sql_a3='SELECT nom,pays FROM aeroport WHERE id=:id';
		$requete_a3 = $bdd->prepare($sql_a3);
         $requete_a3->execute(array('id'=> $aero_arr_id3));
          $donnee_a3=$requete_a3->fetch();
			
        $aero_dep_r=$donnee_d3['nom'];
        $pays_dep_r=$donnee_d3['pays'];
        $aero_arr_r=$donnee_a3['nom'];
        $pays_arr_r=$donnee_a3['pays'];
        $date_dep_r=$donnee33['date_dep'];
        $heure_dep_r=$donnee33['heure_dep'];
        $heure_arr_r=$donnee33['heure_arr'];
        $av_type_r=$donnee33['type'];
        $av_nom_r=$donnee33['nom'];
                          if($donnee33['escale']==1){
                              $escale_r='Avec escale';
                          }else{
                              $escale_r='Vol direct';
                          }
                         $date_dep_r=$date_dep_r;
                         $date_r = new DateTime($date_dep_r);
                         $date_r = $date_r->format("d-M-Y"); 
                ?>
                <b>Vol retour</b>
               <ul> 
               <li><?php echo $date_r; ?></li>
               <li><?php echo $heure_dep_r.' '.$aero_dep_r; ?></li>
               <li><?php echo $heure_arr_r.' '.$aero_arr_r; ?></li>
               <li><?php echo $escale_r; ?></li>
               <li><?php echo 'PRIX :'.$tarif_vol_r; ?></li>
              
                </ul>
                   <?php } ?>
               
            </div>
                <div id="myDIV" style="margin-top: 20x;">
                    <b>Frais de transport aérien : <?php echo $total.' '.$_SESSION['devise']; ?></b><br>
                    <b>Taxes et frais : <?php echo $taxe_tt.' '.$_SESSION['devise']; ?></b><br>
                     <b>Total : <?php echo $total_avc_tax.' '.$_SESSION['devise']; ?></b>
                </div>
            <div id="myDIV" style="margin-top: 20x;">
                <ul>
            <li><a>Détails de le réservation</a></li>
               <li><a>Notes tarifaires</a></li>
                </ul>
        </div>
        </div>
        
        </div>
    </div>   
    <?php  include("footer.php"); ?>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
       <script>
   const mastercard =document.querySelector("#mastercard1");
   const viza = document.querySelector("#visa");
   var formvisa = document.getElementById("visa_form") ;
   var formcard = document.getElementById("mastercard");
   var img = document.getElementById("image");
   viza.addEventListener("change",function(){
     if(viza.checked){
        formvisa.style.display="block";
     
        formcard.style.display="none";
        img.style.display="none"; 
        formvisa.scrollIntoView();
     }
   });
   mastercard.addEventListener("change",function(){
     if(mastercard.checked){
        formvisa.style.display="none";
     
        formcard.style.display="block"; 
        img.style.display="none"; 
        formcard.scrollIntoView();
     }
   });
   </script>




</body>

</html>