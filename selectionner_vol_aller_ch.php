<?php 
require'recuperer_valeur.php';
$_SESSION['acces']='ok';

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
    .slider {
        margin-top:20px;
        margin:auto !important;
    position: relative;
    height: auto !important;
    width: 80% !important;

    flex-wrap: wrap;
    padding-bottom:20px;
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
    border-left: #17264645 solid 1px;
}
.info1 {
    background-color: rgb(242, 242, 242) !important;
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
    width: 130px;
    height: 78px !important;
}
.items:visited{
    background-color: #4c0d0d;
}
.items{
    height:85px;
}
.item{
    background-color:#2d2d2f;
   padding:5px;
}
.collapsible-header, th{
    font-weight: 600;
    color: #172646;
    font-size: 17px;
    border:none;
}
.items:active,.items:visited,.items:focus{
background: repeating-linear-gradient(gold,#172646,#172646,#172646, #172646,#172646,gold );
}
.items:active p{
    color:gold;
}
.butn-tri{
    width: 180px;
    height: 43px;
    border-radius: 11px;
    background-color: white;
    border: 2px solid #1726468c ;
    margin-right: 20px;
    margin-top: 10px;
    font-weight: 700;
}
.butn-tri:focus,.butn-tri:hover{
    background-color: #172646;
    color: gold;
}
span.voldirect{
    font-size: 14px;
    font-weight: 600;
    color: gold;
}
.info p{
    margin-left: 20px;
    color: white;
}
.prix a{
    padding: inintial;
}
.prix{
    background-color: #172646;
    margin-left: 20px;
}
.tri-lab{
    font-weight: 600;
    font-size: 20px;
    color: black;
}
.voir{
    width: 100%;
    background-color: #2d2d2f;
    height: 40px;
    display: flex;
}
.voir span{
    background-color: #2d2d2f;background-color: #2d2d2f;
width: 20%;
font-size: 25px;
font-weight: 600;
height: 100%;
border: none;
    color: #efd807;
    text-align: center;
}
.voir p{
    width: 100%;
    height: 40px;
    margin: 9px;
    color: whitesmoke;
    font-weight: 600;
    margin: 8px;
}
.details_vol{
    margin-top: 20px;
}
#myDIV li a{
    color: black;
}
.list1{
    background-color: #f2f2f2;
    box-shadow: 0 0 4px rgba(0, 0, 0, 1);
}
.list1 li{
    text-align: center;
    padding: 5px;
    font-weight: 600;
}
button{
    border:none;
}
.choixvol{
    text-align: center;
}
.choixvol:hover{
    color: red;
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

    <?php

	include("head.php"); ?>
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
        <div class="left" style="width: 80%;">
            <div class="info info1">
                <div class="row " >
                    <h3 style="margin:0px;font-size:2rem;font-weight:600;color:#1a3369;"><?php echo $aeroport_aller; ?><i class="fas fa-arrow-right"></i><?php echo $aeroport_arrive; ?></h3>
                    <div style="margin-top:20px;"><b><?php
                   
                    if ($_SESSION['vol_retour']==1 AND !empty($date_retour)){
                    echo $jour.' '.$mois_l.' '.$annee. '  _  '. $jour_r.' '.$mois_lr.' '.$annee_r;
                    }else{
                        echo $jour.' '.$mois_l.' '.$annee;
                    }?></b></div>
                
                    
                </div>
                
                
            </div>
            <h5 style="margin-left: 20px;font-weight: bold;color: rgb(5, 5, 5);">DATE DU VOL ALLER</h5>
            <form action="" type="get" style="margin-left:40px;margin-bottom:50px;">
             <section class="slider variable" >
             
                
                <?php
            
                //dates suivantes
                $date_slid=$_SESSION['date_al'];
                $date1 = new DateTime($date_slid);
                $date1->modify("+1 day");
                $date1 = $date1->format("d-M-Y"); 
                
                $date2 = new DateTime($date_slid);
                $date2->modify("+2 day");
                $date2 = $date2->format("d-M-Y"); 
                
                $date3 = new DateTime($date_slid);
                $date3->modify("+3 day");
                $date3 = $date3->format("d-M-Y"); 
                
                //dates precedentes
                $date_slid=$_SESSION['date_al'];
                $date4 = new DateTime($date_slid);
                $date4->modify("-1 day");
                $date4 = $date4->format("d-M-Y"); 
                
                $date5 = new DateTime($date_slid);
                $date5->modify("-2 day");
                $date5 = $date5->format("d-M-Y"); 
                
                $date6 = new DateTime($date_slid);
                $date6->modify("-3 day");
                $date6 = $date6->format("d-M-Y"); 
                ?>
               
                   <button type="submit" class="items" name="bouton" value="<?php echo $date6; ?>"><p><?php echo $date6; ?></p></button>
                
                    <button type="submit" class="items" name="bouton" value="<?php echo $date5; ?>"><p><?php echo $date5; ?></p></button>
               
                    <button type="submit" class="items" name="bouton" value="<?php echo $date4; ?>"><p><?php echo $date4; ?></p></button>
               
                    <button type="submit" class="items" name="bouton" value="<?php echo $_SESSION['date_al']; ?>"><p><?php echo $_SESSION['date_al']; ?></p></button>
               
                    <button type="submit" class="items" name="bouton" value="<?php echo $date1; ?>"><p><?php echo $date1; ?></p></button>
               
                    <button type="submit" class="items" name="bouton" value="<?php echo $date2; ?>"><p><?php echo $date2; ?></p></button>
               
                    <button type="submit" class="items" name="bouton" value="<?php echo $date3; ?>"><p><?php echo $date3; ?></p></button>
                
                
            </section>
            </form>

            
                <div class="flex row" style="justify-content: space-between;margin-left:30px;margin:3%;">
               <label class="tri-lab" style="margin-right:26%">Trier par:</label>
                <form action="" method="get">
                    <button type="submit" name="bouton"  class="butn-tri" value="heure_dep" >Départ</button>
                    <button type="submit" name="bouton" class="butn-tri" value="heure_arr">Arrivé</button>
                    <button type="submit" name="bouton" class="butn-tri" value="tarif_vol">Tarif</button>
                </form>
                </div>
            
             <?php
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
            //$requete3= $bdd->prepare($sql3);
            //$requete3->execute(array('aero_dep_id'=>$aero_dep_id , 'aero_arr_id'=>$aero_arr_id));
			//$sql='SELECT vol.id, vol.aero_dep,vol.pays_dep ,vol.aero_arr, vol.pays_arr ,vol.date_dep ,vol.heure_dep ,vol.date_arr ,vol.heure_arr,vol.escale,vol.type as type_vol,avion.type, avion.nom ,tarif.tarif_bb,tarif.tarif_enfant, tarif.tarif_vol FROM avion INNER JOIN vol INNER JOIN tarif ON vol.avion_id = avion.id AND tarif.vol_id = vol.id WHERE  vol.aero_dep=:aero_dep AND vol.aero_arr=:aero_arr AND date_dep=:date AND tarif.classe_id=:classe_id';
                       
            $colTab = ['heure_dep', 'heure_arr','tarif_vol'];
            if (isset($_GET['bouton'])){
                if(in_array($_GET['bouton'], $colTab))
            {
               $sql4 .= ' ORDER BY '.$_GET['bouton'];
            }else{
               $_SESSION['date_aller'] = new DateTime($_GET['bouton']);
                  
                $_SESSION['date_aller'] = $_SESSION['date_aller']->format("Y-m-d");  
                }
            }
            
            $requete4 = $bdd->prepare($sql4);
            $requete4->execute(array('aero_dep_id'=>$aero_dep_id,'aero_arr_id'=>$aero_arr_id,'date'=>$_SESSION['date_aller'], 'classe_id'=>$id_classe));
            while($vol =$requete4->fetch()){
				
            $id_vol_al=$vol['id'];
            if ($vol['type_vol']=='international'){
              $type_vol=1;  
            }else{
                $type_vol=0;
            }
				
				
                
            ?>
            
          <div class="info " style="background-color:inherit;">
            <div  style="height:150px;display: flex;">
				<?php
				 $heure_dep = new DateTime($vol['heure_dep']);
               
                $heure_dep = $heure_dep->format("H\hi");
				
				$heure_arr = new DateTime($vol['heure_arr']);
               
                $heure_arr = $heure_arr->format("H\hi");?>
                <div style="width: 60%;background-color:#172646;"><p style="left: 20px;"><?php echo $heure_dep.' -'. $aero_dep_nom; ?><br><span class="voldirect">▼<?php 
                    if($vol['escale']==1){
                        $escale='Avec escale';
                    }else{
                        $escale='Vol direct';
                    }
                    echo ' '.$escale; ?> </span> <br><?php echo $heure_arr.' -'.$aero_arr_nom; ?></p></div>
                 <?php
                //si 'aller/retour' on passe a la page selectionner vol retour, si uniquement 'aller' on passe a la page formulaire_info
                if ($_SESSION['vol_retour']==1 AND !empty($date_retour)){
                    $lien="vol retour.php";
                }else{
                    $lien="reserv.php";
                }
                // convertir le dinar en euro ou en dollar
                $tarif_dev=$vol['tarif_vol'];
                $tarif_dev_enf=$vol['tarif_enfant'];
                $tarif_dev_bb=$vol['tarif_bb'];
                if ($devise=='Euro €'){
                    $tarif_dev=$vol['tarif_vol']/200;
                    $tarif_dev_enf=$vol['tarif_enfant']/200;
                    $tarif_dev_bb=$vol['tarif_bb']/200;
                }
                if ($devise=='Dollars $'){
                        $tarif_dev=$vol['tarif_vol']/190;
                        $tarif_dev_enf=$vol['tarif_enfant']/190;
                        $tarif_dev_bb=$vol['tarif_bb']/190;
                        $tarif_dev=round($tarif_dev);
                        $tarif_dev_enf=round($tarif_dev_enf);
                        $tarif_dev_bb=round($tarif_dev_bb);
                }
                
                
                ?>
                <div class="prix">
                    <p style="left: 30%;" onclick="myFunction2()">
                    <a  href="<?php echo $lien; ?>?id_vol_al=<?php echo $id_vol_al; ?>&dep=<?php echo $aero_dep_nom; ?>
                        &pays_dep=<?php echo $aero_dep_pay; ?>&arr=<?php echo $aero_arr_nom; ?>&pays_arr=<?php echo
                         $aero_arr_pay; ?>&escal=<?php echo $escale; ?>&date=<?php echo $vol['date_dep'];?>&nom_av=<?php
                          echo $vol['nom']; ?>&type_av=<?php echo $vol['type']; ?>&heure_dep=<?php echo $heure_dep; ?>
                          &heure_arr=<?php echo $heure_arr; ?>&tarif=<?php echo $tarif_dev; ?>&tarif_enf=<?php echo 
                          $tarif_dev_enf; ?>&tarif_bb=<?php echo $tarif_dev_bb; ?>&type_vol=<?php echo $type_vol; ?>"  
                          style="text-align: center;color:#ffd700;"><?php echo $classe; ?><br><?php echo $_SESSION['devise'];?>
                          <br><?php echo $tarif_dev; ?></a></p>
                          <a class="choixvol" href="<?php echo $lien; ?>?id_vol_al=<?php echo $id_vol_al; ?>&dep=<?php echo $aero_dep_nom; ?>
                            &pays_dep=<?php echo $aero_dep_pay; ?>&arr=<?php echo $aero_arr_nom; ?>&pays_arr=<?php echo
                             $aero_arr_pay; ?>&escal=<?php echo $escale; ?>&date=<?php echo $vol['date_dep'];?>&nom_av=<?php
                              echo $vol['nom']; ?>&type_av=<?php echo $vol['type']; ?>&heure_dep=<?php echo $heure_dep; ?>
                              &heure_arr=<?php echo $heure_arr; ?>&tarif=<?php echo $tarif_dev; ?>&tarif_enf=<?php echo 
                              $tarif_dev_enf; ?>&tarif_bb=<?php echo $tarif_dev_bb; ?>&type_vol=<?php echo $type_vol; ?>">Choisir ce vol</a>
                    </div>
            </div>
             <button class="collapsible popout" style="width: 96%;align-items: baseline;background-color:white;">
                <div class="collapsible-header " > ▼ Afficher les informations du vol détaillèes</div>
                <div class="collapsible-body"><span><table>
                <tr><th>VOL</th><th>DE</th><th>A</th><th>PRIX</th></tr>
					<tr><td><?php echo $classe; ?><br><?php echo $vol['nom'].' '.$vol['type']; ?></td><td><?php echo $heure_dep; ?> <br><?php echo $aero_dep_pay; ?><br><?php echo $aero_dep_nom; ?></td><td><?php echo $heure_arr; ?> <br><?php echo $aero_arr_pay; ?> <br><?php echo $aero_arr_nom; ?></td><td><b><?php echo $tarif_dev.' '.$_SESSION['devise']; ?></b><br>Pour enfant: <?php echo $tarif_dev_enf.' '.$_SESSION['devise']; ?><br>pour bébé: <?php echo $tarif_dev_bb.' '.$_SESSION['devise']; ?></td></tr>

                </table></span></div>
            </button>
           </div>
      
            <?php } ?>

       </div>
        <div class=" details_vol ">
            <div class="voir"><span>+</span><p>Voir réservation</p></div>
            <div style="height: auto; margin-top:0px;width: 100%;" >
            <div id="myDIV" style="display: block;padding:20px 10px;">
               <ul class="list1">
    <li style="font-size:20px;color:#172646;font-weight:bold"><?php echo $_SESSION['nbr_passagers'].' '.'Voyageurs :'; ?></li>
    <li><?php if ($nbr_adulte>1){$Adulte='Adultes';}else{$Adulte='Adulte';}
                        echo $nbr_adulte.' '. $Adulte; ?> <br/>

                      <?php if (!empty($nbr_enfant)){
                          if ($nbr_enfant>1){$Enfant='Enfants';}else{$Enfant='Enfant';}
                            echo $nbr_enfant.' '. $Enfant;?> <br/> 
                      <?php }
        
                        if(!empty($nbr_bebe)){
                        if ($nbr_bebe>1){$Bebe='Bébés';}else{$Bebe='Bébé';}
                            echo $nbr_bebe.' '. $Bebe;
                              
        }?></li>
               
            
                   <li style="font-size:20px;color:#172646;font-weight:bold;text-align: center;">Date de Départ</li>
            <li><?php echo $jour.' '.$mois_l.' '.$annee; ?></li>
                   <?php if ($_SESSION['vol_retour']==1 AND !empty($date_retour)){ ?>
            <li><?php   echo 'Date retour:'.' '.$jour_r.' '.$mois_lr.' '.$annee_r; ?></li>
                   <?php } ?>
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
     <!-- le code js pour le defilement des dates  -->
    <!--<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {
            
            $(".variable").slick({
                dots: false,
                infinite: true,
                variableWidth: true,
                centerMode: true,
            });
           
        });
           

    </script>-->

    <?php  include("footer.php"); ?>
</body>

</html>