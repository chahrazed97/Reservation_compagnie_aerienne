<?php 
session_start();
$dep_r=$_GET['dep_r'];
$pays_dep_r=$_GET['pays_dep_r'];
$arr_r=$_GET['arr_r'];
$pays_arr_r=$_GET['pays_arr_r'];
$date_r=$_GET['date_r'];
$escal_r=$_GET['escale_r'];
$heure_dep_ret=$_GET['heure_dep_ret'];
$heure_arr_ret=$_GET['heure_arr_ret'];
$tarif_r=$_GET['tarif_r'];
$tarif_enf_r=$_GET['tarif_enf_r'];
$tarif_bb_r=$_GET['tarif_bb_r'];
$nom_av_r=$_GET['nom_av_r'];
$type_av_r=$_GET['type_av_r'];
$id_vol_ret=$_GET['id_vol_ret'];

$dates_retour_base=explode('-',$date_r);
$annee_ret_b=$dates_retour_base[0];
$mois_ret_b=$dates_retour_base[1];
$jour_ret_b=$dates_retour_base[2];
    
switch($mois_ret_b){
                       case 1:$mois_rlb='Janvier';break;
                       case 2:$mois_rlb='Février';break;
                       case 3:$mois_rlb='Mars';break;
                       case 4:$mois_rlb='Avril';break;
                       case 5:$mois_rlb='Mai';break;
                       case 6:$mois_rlb='Juin';break;
                       case 7:$mois_rlb='Juillet';break;
                       case 8:$mois_rlb='Aout';break;
                       case 9:$mois_rlb='Septembre';break;
                       case 10:$mois_rlb='Octobre';break;
                       case 11:$mois_rlb='Novembre';break;
                       case 12:$mois_rlb='Décembre';break;
                            
                    }
$date_retour_lettre=$jour_ret_b.' '.$mois_rlb.' '.$annee_ret_b;
$_SESSION['date_retour_lettre']=$date_retour_lettre;

$_SESSION['dep_r']=$dep_r;
$_SESSION['pays_dep_r']=$pays_dep_r;
$_SESSION['arr_r']=$arr_r;
$_SESSION['pays_arr_r']=$pays_arr_r;
$_SESSION['date_r']=$date_r;
$_SESSION['escal_r']=$escal_r;
$_SESSION['heure_dep_ret']=$heure_dep_ret;
$_SESSION['heure_arr_ret']=$heure_arr_ret;
$_SESSION['tarif_r']=$tarif_r;
$_SESSION['tarif_enf_r']=$tarif_enf_r;
$_SESSION['tarif_bb_r']=$tarif_bb_r;
$_SESSION['nom_av_r']=$nom_av_r;
$_SESSION['type_av_r']=$type_av_r;
$_SESSION['id_vol_ret']=$id_vol_ret;

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
    <link rel="stylesheet" type="text/css" href="./slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
    <link rel="stylesheet" href="./css/carstyl2.css">
    
    <style>
        body{
            background-color:white;
            height: auto;
        }
    
    .left{
         float:none !important;
     }
     .prix p{
 
    font-weight: 700;
    text-align: center;
}
.prix{
    background-color: #172646;
    margin-left: 20px;
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
    margin-top: 20px;
    border-left: #17264645 solid 1px;
}
.info1 {
    background-color: rgb(242, 242, 242) !important;
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
.modifier{
    background-color: #a5c4d2;
    padding: 5px;
    font-weight: 700;
    margin-right: 38px;
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

    <?php include("head.php"); ?>
    <div class="row navbar" style="background-color:#2d2d2f;display: flex;margin-top:20px;height:50px;">
    <div class=" item "   style="display: flex;background-color: #172646;">
    <i class="fas fa-plane-departure" style="font-size:1.5em;color:gold;"></i>
    <p style="color:white;">Sellectionner Vol</p>
</div>
<div class=" item " style="display: flex;">
<i class="fas fa-paper-plane" style="font-size:1.5em;color:gold;"></i>
    <p style="color:white;">Réservation</p>
</div>
<div class="item " style="display: flex;">
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
    
     <div class="info ">
            <h3  style="margin-bottom:20px;font-size:1.5rem;font-weight:600;color:#172646;">Vol de départ selectionné</h3>
            <div  style="height:150px;display: flex;">
                <div style="width: 60%;background-color:#172646;"><p style="left: 20px;"><?php echo $_SESSION['heure_dep'].' -'. $_SESSION['dep'].' ('.$_SESSION['pays_dep'].')'; ?><br><span class="voldirect">▼<?php
                    echo ' '.$_SESSION['escal']; ?> </span><br><?php echo $_SESSION['heure_arr'].' -'.$_SESSION['arr'].' ('.$_SESSION['pays_arr'].')'; ?></p><br>
                   </div>
                
               
                <div class="prix"><p><?php echo $_SESSION['classe']; ?><br><?php echo $_SESSION['devise']; ?><br><?php echo $_SESSION['tarif']; ?></p></div>
                
            </div>
            
            <button class="collapsible popout" style="width: 96%;align-items: baseline;">
                <div class="collapsible-header " > ▼ Afficher les informations du vol détaillèes</div>
                <div class="collapsible-body"><span><table>
                <tr><th>VOL</th><th>DE</th><th>A</th><th>PRIX</th></tr>
                <tr><td><?php echo $_SESSION['classe']; ?><br><?php echo $_SESSION['nom_av'].' '.$_SESSION['type_av']; ?></td><td><?php echo $heure_dep_ret; ?> <br><?php echo $_SESSION['pays_dep']; ?><br><?php echo $_SESSION['dep']; ?></td><td><?php echo $_SESSION['heure_arr']; ?> <br><?php echo $_SESSION['pays_arr']; ?> <br><?php echo $_SESSION['arr']; ?></td><td><b><?php echo $_SESSION['tarif'].' '.$_SESSION['devise']; ?></b><br>Pour enfant: <?php echo $_SESSION['tarif_enf'].' '.$_SESSION['devise']; ?><br>pour bébé: <?php echo $_SESSION['tarif_bb'].' '.$_SESSION['devise']; ?></td></tr>

                </table></span></div>
            </button>
            <form style="float: right;" action="selectionner_vol_aller_ch.php" method="get">
                    <button class="modifier" type="submit" name="bouton2" value="Modifier">Modifier</button>
            </form>
           </div>
    
    
     <div class="info ">
            <h3  style="margin-bottom:20px;font-size:1.5rem;font-weight:600;color:#172646;">Vol de retour selectionné</h3>
            <div  style="height:150px;display: flex;">
                <div style="width: 60%;background-color:#172646;"><p style="left: 20px;"><?php echo $heure_dep_ret.' -'. $dep_r.' ('.$pays_dep_r.')'; ?><br><span class="voldirect">▼<?php
                    echo ' '.$escal_r; ?></span> <br><?php echo $heure_arr_ret.' -'.$arr_r.' ('.$pays_arr_r.')'; ?></p>
                   
                </div>
                
                <div class="prix"><p><?php echo $_SESSION['classe']; ?><br><?php echo $_SESSION['devise']; ?><br><?php echo $tarif_r; ?></p></div>
            </div>
            <button class="collapsible popout" style="width: 96%;align-items: baseline;">
                <div class="collapsible-header " > ▼ Afficher les informations du vol détaillèes</div>
                <div class="collapsible-body"><span><table>
                <tr><th>VOL</th><th>DE</th><th>A</th><th>PRIX</th></tr>
                <tr><td><?php echo $_SESSION['classe']; ?><br><?php echo $nom_av_r.' '.$type_av_r; ?></td><td><?php echo $heure_dep_ret; ?> <br><?php echo $pays_dep_r; ?><br><?php echo $dep_r; ?></td><td><?php echo $heure_arr_ret; ?> <br><?php echo $pays_arr_r; ?> <br><?php echo $arr_r; ?></td><td><b><?php echo $tarif_r.' '.$_SESSION['devise']; ?></b><br>Pour enfant: <?php echo $tarif_enf_r.' '.$_SESSION['devise']; ?><br>pour bébé: <?php echo $tarif_bb_r.' '.$_SESSION['devise']; ?></td></tr>

                </table></span></div>
            </button>
            <form style="float: right;" action="vol retour.php" method="get">
                    <button class="modifier" type="submit" name="bouton2" value="Modifier">Modifier</button>
                </form>
           </div>
           <div style="width:100%">
           <a href="reserv.php" style="color: black;float:left;margin-top: 30px;"><button style="width: 150px;
           background-color: #efd807;padding: 8px;font-weight: 700;">CONTINUER</button></a></li>
</div>
    </div>
    
      <div class=" details_vol ">
            <div class="voir"><span>+</span><p>Voir réservation</p></div>
            <div style="height: auto; background-color:white;margin-top:0px;width: 100%;" >
            <div id="myDIV" style="display: block;padding:20px 10px;"">
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
                <li style="font-size:20px;color:#172646;font-weight:bold">Vol aller</li>
               <li><?php echo $_SESSION['date_aller_lettre']; ?></li>
               <li><?php echo $_SESSION['heure_dep'].' '.$_SESSION['dep']; ?></li>
               <li><?php echo $_SESSION['heure_arr'].' '.$_SESSION['arr']; ?></li>
               <li><?php echo 'Durée total ...'.$_SESSION['escal']; ?></li>
                <li><?php echo 'PRIX :'.$_SESSION['tarif']; ?></li>
                    </ul>
             </div>
                <div id="myDIV" style="margin-top: 20x;">
                        
                    <ul class="list1">
                            <li style="font-size:20px;color:#172646;font-weight:bold">Vol Retour</li>
                        <li><?php echo $_SESSION['date_retour_lettre']; ?></li>
               <li><?php echo $_SESSION['heure_dep_ret'].' '.$_SESSION['dep_r']; ?></li>
               <li><?php echo $_SESSION['heure_arr_ret'].' '.$_SESSION['arr_r']; ?></li>
               <li><?php echo $escal_r; ?></li>
                <li><?php echo 'PRIX :'.$_SESSION['tarif_r']; ?></li>
                    </ul>
                </div>
                 <div id="myDIV" style="margin-top: 20x;">
                    <ul class="list1">
                    <?php
                     if (!empty($_SESSION['enfant'])){
                                $total_enf=($_SESSION['tarif_enf']+$_SESSION['tarif_enf_r'])*$_SESSION['enfant'];
                            }else{
                                $total_enf=0;
                            }
            
                             if (!empty($_SESSION['bebe'])){
                                 $total_bb=($_SESSION['tarif_bb']+$_SESSION['tarif_bb_r'])*$_SESSION['bebe'];
                             }else{
                                 $total_bb=0;
                             }  
                            $total_adult=($_SESSION['tarif']+$_SESSION['tarif_r'])*$_SESSION['adulte'];
                            $total=$total_adult+$total_enf+$total_bb; 
                            $_SESSION['total']=$total;
                    ?>
                     <li style="font-size:18px;color:#172646;font-weight:bold">Frais de transport aérien : </li>
                     <li><?php echo $total.' '.$_SESSION['devise']; ?></li>
                     <?php 
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
                     $_SESSION['taxe']=$taxe; ?>
                     <li style="font-size:18px;color:#172646;font-weight:bold">Taxes et frais : </li>
                     <li><?php echo $taxe.' '.$_SESSION['devise']; ?></li>
                     <?php
                     $nbr_passag=$_SESSION['nbr_passagers'];
                     $taxe_tal=$nbr_passag*$taxe;
                     $total_t=$total+$taxe_tal;
                     $_SESSION['total_t']=$total_t; ?>
                     <li style="font-size:18px;color:#172646;font-weight:bold">Total :</li>
                     <li> <?php echo $total_t.' '.$_SESSION['devise']; ?></li>
                    </ul>
                </div>
                
        </div>
        
        </div>
    </div>
    <!-- le codes js pour la classe collapsible -->
 <script src="./js/jquery-3.4.1.min.js"> </script>
    <script src="./js/materialize.min.js"></script>
    <script>
     var coll = document.getElementsByClassName("collapsible-header");
     var i;
     for(i=0;i<coll.length;i++){
         coll[i].addEventListener("click",function(){
             this.classList.toggle("active");
             var content = this.nextElementSibling;
             if(content.style.display === "block"){
                content.style.display = "none";
             }else{
                content.style.display = "block"; 
             }
         });
     }
    
    
    </script> 
    <?php include("footer.php") ?>
    </body>
</html>
    