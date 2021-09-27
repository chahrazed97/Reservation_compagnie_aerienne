<?php
session_start();
if ($_SESSION['vol_retour']==0 AND empty( $_SESSION['date_retour']) AND empty($_GET['err']) AND empty($_GET['err2'])){
$dep=$_GET['dep'];
$pays_dep=$_GET['pays_dep'];
$arr=$_GET['arr'];
$pays_arr=$_GET['pays_arr'];
$date=$_GET['date'];
$nom_av=$_GET['nom_av'];
$type_av=$_GET['type_av'];
$heure_arr=$_GET['heure_arr'];
$heure_dep=$_GET['heure_dep'];
$escal=$_GET['escal'];
$tarif=$_GET['tarif'];
$tarif_enf=$_GET['tarif_enf'];
$tarif_bb=$_GET['tarif_bb'];
$type_vol=$_GET['type_vol'];
$id_vol_al=$_GET['id_vol_al'];

$date_aller_b = new DateTime($date);
$date_aller_b = $date_aller_b->format("d-M-Y");

$_SESSION['dep']=$dep;
$_SESSION['pays_dep']=$pays_dep;
$_SESSION['arr']=$arr;
$_SESSION['pays_arr']=$pays_arr;
$_SESSION['date']=$date;
$_SESSION['nom_av']=$nom_av;
$_SESSION['type_av']=$type_av;
$_SESSION['heure_arr']=$heure_arr;
$_SESSION['heure_dep']=$heure_dep;
$_SESSION['escal']=$escal;
$_SESSION['tarif']=$tarif;
$_SESSION['tarif_enf']=$tarif_enf;
$_SESSION['tarif_bb']=$tarif_bb;
$_SESSION['type_vol']=$type_vol;
$_SESSION['id_vol_al']=$id_vol_al;
$_SESSION['date_aller_lettre']=$date_aller_b;
}else{
$dep=$_SESSION['dep'];
$pays_dep=$_SESSION['pays_dep'];
$arr=$_SESSION['arr'];
$pays_arr=$_SESSION['pays_arr'];
$date=$_SESSION['date'];
$nom_av=$_SESSION['nom_av'];
$type_av=$_SESSION['type_av'];
$heure_arr=$_SESSION['heure_arr'];
$heure_dep=$_SESSION['heure_dep'];
$escal=$_SESSION['escal'];
$tarif=$_SESSION['tarif'];
$tarif_enf=$_SESSION['tarif_enf'];
$tarif_bb=$_SESSION['tarif_bb'];
$type_vol=$_SESSION['type_vol'];
$id_vol_al=$_SESSION['id_vol_al'];
$date_aller_b=$_SESSION['date_aller_lettre'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="iconfont/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/carstyl2.css">
    <title>Document</title>
    <style>
    
    .contactleft{
        width:80%;
        margin-right:50px;
        margin-left: 12%;
    }
    
    .contact{
        font-size:30px !important;
    }
    .flex{
        display:flex;
    }
   
    .champ{
        box-shadow: 0 0 5px rgba(0, 0, 0, 1) !important;
        width: 70% !important;
        padding-left: 30%;
        
    }
   
    .champ1{
        box-shadow: 0 0 5px rgba(0, 0, 0, 1) !important;
        margin-bottom:20px;
    }
    .envoyer{
        width:150px;
        height:40px;
        background-color:#efd807;
        margin-left:0px;
        margin-bottom:50px;
        margin-top:15px;
        
    }
    .envoyer a{
        font-size:20px;
        color:black;
        padding:30px 40px;
        font-weight:bold;
        text-decoration:none;
    }
    .envoyer button{
        background-color: #efd807;
        border: none;
        font-size:20px;
        font-weight:bold;
    }
    i.small{
        padding-top: 10px;
    }
    .para{
        margin-left:15px;
    }
    textarea:focus{
        color:black;
    }
    input,textarea{
        box-shadow: 0 0 5px rgba(0, 0, 0, 1) !important;
        color:#000000;
        font-family:"Montserrat", Helvetica, Arial, sans-serif;
        font-weight:600;
    }
    p{
        font-family:"Montserrat", Helvetica, Arial, sans-serif;
        color:black;
        font-weight:700;
       
        
    }
    .flex1{
        display:flex;
    }
    .item{
    align-items: center;
}
.item p{
    margin-left:20px;
    font-size:16px;
}
.item:hover {
    cursor: pointer;
    background-color: #021335;
}

i.nave{
    color:#efd807;
    margin:10px;
}
.form-styling{
   
    margin: 20px;
    height: 45px; 
}
input{
    padding-left:10px !important;
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
    width:20%;
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

.collapsible-header, th{
    font-weight: 600;
    color: #172646;
    font-size: 17px;
    border:none;
}
.fas{
    font-size:22px;
}
label{
    display: block;
    font-size: 14px !important;
    color: #172646 !important;
    margin-bottom: 4px;
    font-weight:700;
}
input,select{
    height:35px;
}
li{
    list-style-type: none;
    text-align: center;
}
    @media only screen and (max-width: 720px) {
   .flex1{
       display:block;
       margin:auto !important;
       width:90%
   }
   .contactleft{
       width:100%;
       margin:0px;
   }
   .details_vol{
       width:100%;
       margin:0px;
       height:300px;
   }
   i.nave{
       margin:0px;
   }
   .item p{
       font-size:10px;
       margin-left:3px;
   }
   .fas{
       font-size:16px;
   }
   .contact{
       line-height: 1.6;
   }
    .champ{
        width: 90% !important;
    }

}
   
        </style>
    
    
</head>
<body>
    <?php include('head.php'); ?>
    <div class="row navbar" style="background-color:#2d2d2f;display: flex;margin-top:20px;height:50px;">
    <div class=" item" style="display: flex;" >
    <i class="fas fa-plane-departure" style="color:gold;"></i>
    <p style="color:white;">Sellectionner Vol</p>
</div>
<div class=" item" style="display: flex;background-color: #172646;">
<i class="fas fa-paper-plane" style="color:gold;"></i>
    <p style="color:white;">Réservation</p>
</div>
<div class="item flex" style="display: flex;">
<i class="fas fa-dollar-sign" style="color:gold;"></i>    
<p style="color:white;">Paiement</p>
</div>
<div class="item flex" style="display: flex;">
<i class="fas fa-dollar-sign" style="color:gold;"></i>
    <p style="color:white;">Billet</p>
</div>
</div>
    <div class="flex1">
     <form class="contactleft" action="fonction_info_perso.php" method="post">
	<?php
		    $red_mail='';
		    $red_tel='';
            if((isset($_GET['err']) AND !empty($_GET['err']))){
				$red_mail='red';
              ?><br><b style="color: red;" ><?php echo $_GET['err']; ?></b>
             <?php   
            }
          
            if((isset($_GET['err2']) AND !empty($_GET['err2']))){
				$red_tel='red';
              ?><br><b style="color: red;" ><?php echo $_GET['err2']; ?></b>
             <?php   
            }
           
            if((isset($_GET['err_b']) AND !empty($_GET['err_b']))){
              ?><br><b style="color: red;" ><?php echo $_GET['err_b']; ?></b>
             <?php   
            }
            
            if((isset($_GET['err_en']) AND !empty($_GET['err_en']))){
              ?><br><b style="color: red;" ><?php echo $_GET['err_en']; ?></b>
             <?php   
            }
            ?>
     <div style="margin-bottom:40px;">
     <h3 class="contact" style="color:#172646;font-weight: 600;"><span style="border-bottom:3px solid #efd807 ;">Veu</span>illez rentrer vos informations </h3>
     </div>
         <?php 
            for($i=1;$i<=$_SESSION['adulte'];$i++){ ?>
         <div>
         <h3 style="color:#172646;font-weight: 600;">Adulte <?php echo $i; ?></h3>
     <div>
    <label for="titre">Titre</label>    
     <select name="titre<?php echo $i; ?>" id="titre" class="champ1" style="width: 30%;display:block;" required>
            <option value="feminin">Mme</option>
            <option value="masculin">Mr</option>
      </select>
    </div>
    <div>
    <label for="nom">Nom</label>
     <input type="text" name="nom<?php echo $i; ?>" id="nom" class="champ" style="margin-bottom:20px;margin-right:20px !important;" maxlength="90" pattern="[a-zA-Z \S]+" required>
     </div>
     <div>
     <label for="prenom">Prénom</label>
     <input type="text" name="prenom<?php echo $i; ?>" id="  Prenom" class="champ" style="margin-bottom:20px;" maxlength="90" pattern="[a-zA-Z \S]+"  required>
     </div>
              <?php
                    if ($i==1){
                ?>
			 
              <div>
        <label for="email">Email</label>
     <input type="email" name="email" id="email" class="champ" style="margin-bottom:20px;margin-right:20px !important;" required>
     </div>
     <div>
        <label for="email1">Confirmez votre Email</label>
     <input type="email" name="confirm_email" id="confirm_email" class="champ" style="margin-bottom:20px; border-color:<?php echo $red_mail ; ?>;" required>
        
   </div>
   <div>
    <label for="tel">Téléphone</label>
     <input type="tel" name="tel" id=" tel" maxlength="18" pattern="[0-9]+" class="champ" style="margin-bottom:20px;margin-right:20px !important;" required>
    </div>
    <div>
        <label for="tel1">Confirmez votre numéro de téléphone</label>
     <input type="tel" name="confirm_tel" id="tel1" maxlength="18" pattern="[0-9]+" class="champ" style="margin-bottom:20px; border-color:<?php echo $red_tel; ?>;"  required>
		
  </div>
    </div>
              <?php }
                    }
			   
                
                  
                if(!empty($_SESSION['enfant'])){
                    for($i=1;$i<=$_SESSION['enfant'];$i++){ ?>
         <div>
        <h5>informations sur l'enfant <?php echo $i; ?></h5>
              
     <div>
    <label for="titre_enf<?php echo $i; ?>">Titre</label>    
     <select name="titre_enf<?php echo $i; ?>" id="titre" class="champ1" style="width: 30%;display:block;" required>
            <option value="feminin">Fille</option>
            <option value="masculin">Garcon</option>
      </select>
    </div>
    <div>
    <label for="nom">Nom</label>
     <input type="text"name="nom_enf<?php echo $i; ?>" id="nom" class="champ" style="margin-bottom:20px;margin-right:20px !important;" maxlength="90" pattern="[a-zA-Z \S]+"  required>
     </div>
     <div>
     <label for="prenom">Prénom</label>
     <input type="text"name="prenom_enf<?php echo $i; ?>" id="  Prenom" class="champ" style="margin-bottom:20px;" maxlength="90" pattern="[a-zA-Z \S]+"  required>
     </div> 
    <div>
      <label for="date">Date de naissance</label>
     <input type="date" name="date_nsc_enf<?php echo $i; ?>" id="date" class="champ" max="<?php echo date("Y-m-d");?>" style="margin-bottom:20px;margin-right:20px !important;width: 48%;" required>
     </div>
     </div>
          <?php }
                }
                if(!empty($_SESSION['bebe'])){
                    for($i=1;$i<=$_SESSION['bebe'];$i++){ ?>
          <div>
       <h5>informations sur le bébé <?php echo $i; ?></h5>
              
     <div>
    <label for="titre">Titre</label>    
     <select name="titre_bb<?php echo $i; ?>" id="titre" class="champ1" style="width: 30%;display:block;" required>
            <option value="feminin">Fille</option>
            <option value="masculin">Garcon</option>
      </select>
    </div>
    <div>
    <label for="nom">Nom</label>
     <input type="text" name="nom_bb<?php echo $i; ?>" id="nom" class="champ" style="margin-bottom:20px;margin-right:20px !important;" maxlength="90" pattern="[a-zA-Z \S]+"  required>
     </div>
     <div>
     <label for="prenom">Prénom</label>
     <input type="text"name="prenom_bb<?php echo $i; ?>" id="  Prenom" class="champ" style="margin-bottom:20px;" maxlength="90" pattern="[a-zA-Z \S]+"  required>
     </div> 
    <div>
      <label for="date">Date de naissance</label>
     <input type="date" name="date_nsc_bb<?php echo $i; ?>" id="date" class="champ" max="<?php echo date("Y-m-d");?>" style="margin-bottom:20px;margin-right:20px !important;width: 48%;" required>
     </div>
     </div>
          <?php }
                }
                ?>
     
    
     <div class="envoyer" ><a ><button type="submit">Envoyer</button></a></div>
     </form>
     <div class=" details_vol" style="margin-top:20px;">
     <div class="voir"><span>+</span><p>Voir réservation</p></div>

            <div style="height: 500px; background-color:white;margin-top:0px;width: 100%;" >
            <div id="myDIV" style="display: block;height: auto;">
               <ul class="list1">
    <li style="font-size:20px;color:#172646;font-weight:bold"><?php echo $_SESSION['nbr_passagers'].' '.'Voyageurs :'; ?></li>
               <li><?php if ($_SESSION['adulte']>1){$Adulte='Adultes';}else{$Adulte='Adulte';}
                        echo $_SESSION['adulte'].' '. $Adulte; ?>
                   <?php if (!empty($_SESSION['enfant'])){ 
                          if ($_SESSION['enfant']>1){$Enfant='Enfants';}else{$Enfant='Enfant';}
                              echo $_SESSION['enfant'].' '. $Enfant;}
                          if(!empty($_SESSION['bebe'])){
                          if ($_SESSION['bebe']>1){$Bebe='Bébés';}else{$Bebe='Bébé';}
                              echo $_SESSION['bebe'].' '. $Bebe;
                                  
                              
        }?>
                   </li>
                </ul>
                </div>
                   
                <div id="myDIV" style="margin-top: 20x;">
                        <ul class="list1">
                                <li style="font-size:20px;color:#172646;font-weight:bold">Vol Aller</li>
                   
                 <li><?php echo $_SESSION['date_aller_lettre']; ?></li>
               <li><?php echo $_SESSION['heure_dep'].' '.$_SESSION['dep']; ?></li>
               <li><?php echo $_SESSION['heure_arr'].' '.$_SESSION['arr']; ?></li>
               <li><?php echo 'Durée total ...'.$_SESSION['escal']; ?></li>
                <li><?php echo 'PRIX :'.$_SESSION['tarif']; ?></li>
                    </ul>
             </div>
                 <?php
                if ($_SESSION['vol_retour']==1 AND !empty( $_SESSION['date_retour'])){ ?>
                <div id="myDIV" style="margin-top: 20x;">
                        <ul class="list1">
                                <li style="font-size:20px;color:#172646;font-weight:bold">Vol retour</li>
              
                        <li><?php echo $_SESSION['date_retour_lettre']; ?></li>
               <li><?php echo $_SESSION['heure_dep_ret'].' '.$_SESSION['dep_r']; ?></li>
               <li><?php echo $_SESSION['heure_arr_ret'].' '.$_SESSION['arr_r']; ?></li>
               <li><?php echo 'Durée total ...'.$_SESSION['escal_r']; ?></li>
                <li><?php echo 'PRIX :'.$_SESSION['tarif_r']; ?></li>
                    </ul>
                </div>
                <?php } ?>
                <div id="myDIV" style="margin-top: 20x;">
                    <?php
                    if ($_SESSION['vol_retour']==1 AND !empty($_SESSION['date_retour'])){
                        $total_t=$_SESSION['total_t']; }
                    else{
                         if (!empty($_SESSION['enfant'])){
                                $total_enf=$_SESSION['tarif_enf']*$_SESSION['enfant'];
                            }else{
                                $total_enf=0;
                            }
                             
                             if (!empty($_SESSION['bebe'])){
                                 $total_bb=$_SESSION['tarif_bb']*$_SESSION['bebe'];
                             }else{
                                 $total_bb=0;
                             } 
                           
                            $total_adult=$_SESSION['tarif']*$_SESSION['adulte'];
                            $total=$total_adult+$total_enf+$total_bb;
                        $_SESSION['total']=$total;
                        
                    
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
                     $_SESSION['taxe']=$taxe;
                    $nbr_passag=$_SESSION['nbr_passagers'];
                    $taxe_tal=$nbr_passag*$taxe;
                    $total_t=$total+$taxe_tal;
                    $_SESSION['total_t']=$total_t;
                    
                    }
                    ?>
                    <ul class="list1">
                    <li>Frais de transport aérien : <?php echo $_SESSION['total'].' '.$_SESSION['devise']; ?></li>
                    <li>Taxes et frais : <?php echo $_SESSION['taxe'].' '.$_SESSION['devise']; ?></li>
                    <li>Total : <?php echo $total_t.' '.$_SESSION['devise']; ?></li>
                    </ul>
                </div>
                
        </div>
        
        </div>
    </div>
    
    <?php include("footer.php"); ?>
</body>
</html>