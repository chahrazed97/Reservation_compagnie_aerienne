<?php
session_start();

require'connexion_bdd.php';
if (isset($_GET['bouton2']) OR isset($_GET['bouton'])) {
$dep=$_SESSION['dep'];
$pays_dep=$_SESSION['pays_dep'];
$arr=$_SESSION['arr'];
$pays_arr=$_SESSION['pays_arr'];
$date_aller_b=$_SESSION['date_aller_lettre'];
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
}else{
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
    
/**$dates_aller_base=explode('-',$date);
$annee_all_b=$dates_aller_base[0];
$mois_all_b=$dates_aller_base[1];
$jour_all_b=$dates_aller_base[2];
    
switch($mois_all_b){
                       case 1:$mois_alb='Janvier';break;
                       case 2:$mois_alb='Février';break;
                       case 3:$mois_alb='Mars';break;
                       case 4:$mois_alb='Avril';break;
                       case 5:$mois_alb='Mai';break;
                       case 6:$mois_alb='Juin';break;
                       case 7:$mois_alb='Juillet';break;
                       case 8:$mois_alb='Aout';break;
                       case 9:$mois_alb='Septembre';break;
                       case 10:$mois_alb='Octobre';break;
                       case 11:$mois_alb='Novembre';break;
                       case 12:$mois_alb='Décembre';break;
                            
                    }**/
//$date_aller_lettre=$jour_all_b.' '.$mois_alb.' '.$annee_all_b;
$_SESSION['date_aller_lettre']=$date_aller_b;

    
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
}

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
        body{
            background-color:white;
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
.slider {

  
    flex-wrap: wrap;
     margin-left
        margin:auto !important;
    position: relative;
    height: auto !important;
    width: 80% !important;

    flex-wrap: wrap;
    padding-bottom:20px;
}
.details_vol {
    margin: 0;
    margin-top:-20px;
    border-left: #17264645 solid 1px;
}
.info1 {
    background-color: rgb(242, 242, 242) !important;
}

.fa-arrow-right{
    color:#2d2d2f;
    font-size:30px;
}



.collapsible-header, th{
    font-weight: 600;
    color: #172646;
    font-size: 17px;
    border:none;
}
.navbar{
    margin-bottom:20px;
}
.left{
    float: none !important;
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
    text-align:center ;
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
.collapsible.popout{
    background-color: white;
}
.choixvol{
    text-align: center;
}
.choixvol:hover{
    color: red;
}
button{
    border:none;
}
.modifier{
    background-color: #a5c4d2;
    padding: 5px;
    font-weight: 700;
}
@media only screen and (max-width: 720px) {
    footer{
    margin-top: 200px;
}
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
        <div class="left" style="width: 80%;">
            <div class="info info1">
                <div class="row" style="display: flex ;">
					
                 <h3 style="margin:0px;font-size:1.8rem;font-weight:600;color:#1a3369;">   <?php echo $heure_dep.' '.$dep; ?>
                   <span style="color: rgb(70, 70, 10);font-weight: 900;">↔</span>
                   <?php echo $heure_arr.' '.$arr; ?></h3>
                </div>
                <b><?php echo $date_aller_b; ?></b>
                <form style="float: right;" action="selectionner_vol_aller_ch.php" method="get">
                    <button class="modifier" type="submit" name="bouton2" value="Modifier">Modifier</button>
                </form>
                
            </div>
            <h5 style="margin-left: 20px;font-weight: bold;color: rgb(5, 5, 5);">DATE DU VOL RETOUR
            </h5>
            <form action="" type="get" style="margin-left:40px;margin-bottom:50px;margin-top:10px;">
            <section class="slider variable">
            <?php
            
            //dates suivantes
            $date_slid=$_SESSION['date_re'];
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
            $date_slid=$_SESSION['date_re'];
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
           
                <button type="submit" class="items" name="bouton" value="<?php echo $_SESSION['date_re']; ?>"><p><?php echo $_SESSION['date_re']; ?></p></button>
           
                <button type="submit" class="items" name="bouton" value="<?php echo $date1; ?>"><p><?php echo $date1; ?></p></button>
           
                <button type="submit" class="items" name="bouton" value="<?php echo $date2; ?>"><p><?php echo $date2; ?></p></button>
           
                <button type="submit" class="items" name="bouton" value="<?php echo $date3; ?>"><p><?php echo $date3; ?></p></button>
            
            
                
            </section>
            </form>

            <div class="flex row" style="justify-content: space-between;margin: 2%;align-items: baseline;">
                <label class="tri-lab" style="margin-right:37%">Trier par:</label>
                 <form action="" method="get">
                     <button type="submit" name="bouton" class="butn-tri" value="heure_dep" >Départ</button>
                     <button type="submit" name="bouton" class="butn-tri" value="heure_arr">Arrivé</button>
                     <button type="submit" name="bouton" class="butn-tri" value="tarif_vol">Tarif</button>
                 </form>
            </div>
            <?php
			
            $id_classe=$_SESSION['id_classe'];
            
        
            $sql='SELECT vol.id, vol.date_dep, vol.heure_dep, vol.date_arr, vol.heure_arr, vol.type_v as type_vol, vol.escale, avion.type, avion.nom, tarif.tarif_enfant, tarif.tarif_bb, tarif.tarif_vol FROM avion INNER JOIN vol INNER JOIN tarif ON avion.id = vol.avion_id AND vol.id= tarif.vol_id WHERE vol.aero_dep_id=:aero_dep_id AND vol.aero_arr_id=:aero_arr_id AND date_dep=:date AND tarif.classe_id=:classe_id';
        
         $colTab = ['heure_dep', 'heure_arr','tarif_vol'];
        
         if (isset($_GET['bouton'])){
            if(in_array($_GET['bouton'], $colTab))
         {
           $sql .= ' ORDER BY '.$_GET['bouton'];
         }else{
            $_SESSION['date_retour'] = new DateTime($_GET['bouton']);
           
            $_SESSION['date_retour'] = $_SESSION['date_retour']->format("Y-m-d");   
            }
         }
        
             $requete = $bdd->prepare($sql);
             $requete->execute(array('aero_dep_id'=>$_SESSION['aero_arr_id'],'aero_arr_id'=>$_SESSION['aero_dep_id'],'date'=>$_SESSION['date_retour'], 'classe_id'=>$id_classe));
             while($vol =$requete->fetch()){
                 $id_vol_ret=$vol['id'];
				 $heure_dep_ret = new DateTime($vol['heure_dep']);
               
                $heure_dep_ret = $heure_dep_ret->format("H\hi");
				
				$heure_arr_ret = new DateTime($vol['heure_arr']);
               
                $heure_arr_ret = $heure_arr_ret->format("H\hi");
				 
                 ?>
            <div class="info ">
            <div  style="height:150px;display: flex;">
                <div style="width: 70%;background-color:#172646;"><p style="left: 20px;"><?php echo $heure_dep_ret.' - '.$_SESSION['aero_arr_nom']; ?><br><span class="voldirect"><?php if($vol['escale']==1){
                    $escale_r='Avec escale';
                }else{
                    $escale_r='Vol direct';
                }
                echo ' '.$escale_r; ?> </span><br><?php echo $heure_arr_ret.' - '.$_SESSION['aero_dep_nom']; ?></p></div>
                <?php // convertir le dinar en euro ou en dollar
                $tarif_dev_ret=$vol['tarif_vol'];
                $tarif_dev_enf_ret=$vol['tarif_enfant'];
                $tarif_dev_bb_ret=$vol['tarif_bb'];
                if ($_SESSION['devise']=='Euro €'){
                    $tarif_dev_ret=$vol['tarif_vol']/200;
                    $tarif_dev_enf_ret=$vol['tarif_enfant']/200;
                    $tarif_dev_bb_ret=$vol['tarif_bb']/200;
                }
                if ($_SESSION['devise']=='Dollars $'){
                        $tarif_dev_ret=$vol['tarif_vol']/190;
                        $tarif_dev_enf_ret=$vol['tarif_enfant']/190;
                        $tarif_dev_bb_ret=$vol['tarif_bb']/190;
                    
                        $tarif_dev_ret=round($tarif_dev_ret);
                        $tarif_dev_enf_ret=round($tarif_dev_enf_ret);
                        $tarif_dev_bb_ret=round($tarif_dev_bb_ret);
                } ?>

                <div class="prix"><p style="left: 30%;" onclick="myFunction2()">
                    <a href="modif_aller_retour.php?dep_r=<?php echo $_SESSION['aero_arr_nom']; ?>&id_vol_ret=<?php echo $id_vol_ret; ?>&arr_r=<?php echo $_SESSION['aero_dep_nom']; ?>&pays_dep_r=<?php echo $_SESSION['aero_arr_pay']; ?>&pays_arr_r=<?php echo $_SESSION['aero_dep_pay'];?>&escale_r=<?php echo $escale_r; ?>&date_r=<?php echo $vol['date_dep']; ?>&heure_dep_ret=<?php echo $heure_dep_ret ; ?>&heure_arr_ret=<?php echo $heure_arr_ret ; ?>&tarif_r=<?php echo $tarif_dev_ret; ?>&tarif_enf_r=<?php echo $tarif_dev_enf_ret; ?>&tarif_bb_r=<?php echo $tarif_dev_bb_ret;
                    ?>&nom_av_r=<?php echo $vol['nom']; ?>&type_av_r=<?php echo $vol['type']; ?>">
                    <?php echo $_SESSION['classe']; ?><br><?php echo $_SESSION['devise'] ?><br><span style="color: gold;"><?php echo $tarif_dev_ret; ?></span></a></p>
                     <a class="choixvol" href="modif_aller_retour.php?dep_r=<?php echo $_SESSION['aero_arr_nom']; ?>&id_vol_ret=<?php echo $id_vol_ret; ?>&arr_r=<?php echo $_SESSION['aero_dep_nom']; ?>&pays_dep_r=<?php echo $_SESSION['aero_arr_pay']; ?>&pays_arr_r=<?php echo $_SESSION['aero_dep_pay'];?>&escale_r=<?php echo $escale_r; ?>&date_r=<?php echo $vol['date_dep']; ?>&heure_dep_ret=<?php echo $vol['heure_dep'] ; ?>&heure_arr_ret=<?php echo $vol['heure_arr'] ; ?>&tarif_r=<?php echo $tarif_dev_ret; ?>&tarif_enf_r=<?php echo $tarif_dev_enf_ret; ?>&tarif_bb_r=<?php echo $tarif_dev_bb_ret;
                        ?>&nom_av_r=<?php echo $vol['nom']; ?>&type_av_r=<?php echo $vol['type']; ?>">Choisir ce vol</a>
                </div>
                
            </div>
            <button class="collapsible popout" style="width: 100%;align-items: baseline;">
                <div class="collapsible-header " > ▼ Afficher les informations du vol détaillèes</div>
                <div class="collapsible-body"><span><table>
                <tr><th>VOL</th><th>DE</th><th>A</th><th>PRIX</th></tr>
                <tr><td><?php echo $_SESSION['classe']; ?> <br> <?php echo $vol['nom'].' '.$vol['type']; ?></td>
                    <td><?php echo $heure_dep_ret; ?> <br> <?php echo $_SESSION['aero_arr_pay']; ?><br><?php echo $_SESSION['aero_arr_nom']; ?></td>
                    <td><?php echo $heure_arr_ret; ?> <br><?php  echo $_SESSION['aero_dep_pay']; ?><br><?php echo  $_SESSION['aero_dep_nom']; ?></td>
                    <td><b><?php echo $tarif_dev_ret.' '.$_SESSION['devise']; ?></b><br>Pour enfant: <?php echo $tarif_dev_enf_ret.' '.$_SESSION['devise']; ?><br>pour bébé: <?php echo $tarif_dev_bb_ret.' '.$_SESSION['devise']; ?></td></tr>

                </table></span></div>
            </button>
           </div>
           <?php } ?>
        </div>
        <div class=" details_vol ">
                <div class="voir"><span>+</span><p>Voir réservation</p></div>
            <div style="height: auto;margin-top: 0px;width: 100%;" >
            <div id="myDIV"style="display: block;padding:20px 10px;">
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
                               
         }?></li>
         <li style="font-size:20px;color:#172646;font-weight:bold">Date de départ</li>

                <li><?php echo $_SESSION['date_aller_lettre']; ?></li>
                <li><?php echo $_SESSION['heure_dep'].' '.$_SESSION['dep']; ?></li>
                <li><?php echo $_SESSION['heure_arr'].' '.$_SESSION['arr']; ?></li>
                <li><?php echo 'Durée total ...'.$escal; ?></li>
                </ul>
                 <ul>
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
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
   <script type="text/javascript">
        $(document).on('ready', function() {
            
            $(".variable").slick({
                dots: false,
                infinite: true,
                variableWidth: true,
                centerMode: true,
            });
           
        });
           
        
 function myFunction2() {
  var x = document.getElementById("myDIV2");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
 }


        /////
        function myFunction() {
              var x = document.getElementById("myDIV");
              if (x.style.display === "none") {
                x.style.display = "block";
              } else {
                x.style.display = "none";
              }
        }
    </script>

<?php include("footer.php"); ?> 
</body>

</html>