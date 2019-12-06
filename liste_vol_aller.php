<?php
require'recuperer_valeur.php'; ?>
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
    <link rel="stylesheet" href="./css/design.css">
    <link rel="stylesheet" href="./css/carstyl2.css">
    <link rel="stylesheet" href="./css/sidepanel.css">

</head>

<body>
    <div><br> 
        <br>

    </div>
    <div class="row navbar" style="background-color: #010e27d3;display: flex;">

        <div class="item flex" style="align-items: center;width: 33.333333%;">
            <a class="btn-floating btn-large waves-effect waves-light red">1</a>
            <p>vols</p>
        </div>
        <div class="item flex" style="align-items: center;width: 33.333333%;">
            <a class="btn-floating btn-large waves-effect waves-light red">2</a>
            <p>reserver</p>
        </div>
        <div class="item flex" style="align-items: center;width: 33.333333%;">
            <a class="btn-floating btn-large waves-effect waves-light red">3</a>
            <p>payer</p>
        </div>
    </div>
    <div class="flex">
        <div class="left">
            <div class="info">
                <div class="row flex">
                    <h5><?php echo $aeroport_aller; ?></h5>
                    <h5 style="color: rgb(70, 70, 10);font-weight: 900;">↔</h5>
                    <h5> <?php echo $aeroport_arrive; ?></h5>
                </div>
                <b><?php
                    if (!empty($date_retour)){
                    echo $date_aller. ' -> '. $date_retour;
                    }else{
                        echo $date_aller;
                    }?></b>
                <a href="" class="more_info">plus d'information ᴗ</a>
            </div>
            <h5 style="margin: 2%;font-weight: bold;">DATE DU VOL ALLER</h5>
           <div id="slider">
               <?php require'test_slid.php'; ?>
               <!-- <ul id="sliderwrap">
                    <div>
                        <li>Sam 30</li>
                    </div>
                    <div>
                        <li>Dim 1</li>
                    </div>
                    <div>
                        <li>Lundi 2 </li>
                    </div>
                    <div>
                        <li>Mardi 3</li>
                    </div>
                    <div>
                        <li>Mercredi 4</li>
                    </div>

                </ul>
                <a href="#" id="prev">←
    
            </a>
                <a href="#" id="next">→</a>-->
            </div>
            

            <div class="flex row" style="justify-content: space-between;margin: 2%;">
                <select name="trier" id="tri" class="selecte">
                        <option value="">TRIER PAR</option>
                    <option value="">valeur par défaut</option>
                   <option value="">valeur par défaut</option>
                    <option value="">nombre d'escales</option>
                    <option value="">durée totale</option>
                    <option value="">origine</option>
                    <option value="">Déstination</option>
                </select>
                <select name="filtre" id="filtre" class="selecte">
                    <option value="">FILtrer PAR</option>
                    <option value=""></option>
                    <option value="">heure de départ entre  et   </option>
                    
                </select>
            </div>
            
                

            <?php
           
            $requete = $bdd->prepare('SELECT aero_dep,aero_arr,date_heure_arr,escale FROM vol WHERE  aero_dep=:aero_dep AND aero_arr=:aero_arr AND DAY(date_heure_dep)=:jour AND month(date_heure_dep)=:mois AND year(date_heure_dep)=:annee');
            $requete->execute(array('aero_dep'=>$aeroport_aller,'aero_arr'=>$aeroport_arrive,'jour'=>$jour,'mois'=>$mois,'annee'=>$annee));
           /** $requete->bindValue(':aero_dep',$aeroport_aller,PDO::PARAM_INT);
            $requete->bindValue(':aero_arr',$aeroport_arrive,PDO::PARAM_INT);
            $requete->bindValue(':jour',$jour,PDO::PARAM_INT);
            $requete->bindValue(':mois',$mois,PDO::PARAM_INT);
            $requete->bindValue(':annee',$annee,PDO::PARAM_INT);
            $executeIsOk =$requete->execute();**/
            while($vol =$requete->fetch()){

            ?>
            <div class="info" style="height:200px;" onclick="document.getElementById('div_essaie').style.display='block';apparaitresimple();cachermulti()">
                <div style="width: 50%;"><?php echo $vol['aero_dep']; ?></div>
                <div style="width: 16.6666666667%;"><?php echo $vol['aero_arr']; ?></div>
                <div style="width: 16.6666666667%;"><?php 
                    if($vol['escale']==1){
                        echo' Avec escale';
                    }else{
                        echo' Sans escale';
                    } ?></div>
                <div style="width: 16.6666666667%;"><a href="">plus de détails</a><br></div>
               <table>
                    <tr>
                    <td>VOL</td>
                    <td>DE</td>
                    <td>A</td>
                    <td>DUREE</td>
                </tr>
                <tr>
                    <td><?php  ?></td>
                    <td><?php ?></td>
                    <td><?php ?></td>
                    <td><?php ?></td>
                </tr>
                    </table>
                <a href="liste_vol_retour.php"><button>Selectionner ce vol</button></a>
                </div>
            
            <?php } ?>

        </div>
    <div class="" style="width: 20%">
        
<button class="collapsible">Votre réservation</button>
<div class="content">
  <p><ul>
    <li><?php if ($nbr_adulte>1){$Adulte='Adultes';}else{$Adulte='Adulte';}
                        echo $nbr_adulte.' '. $Adulte; ?> <br/>

                      <?php if (!empty($nbr_enfant) and !empty($nbr_bebe)){
                          if ($nbr_enfant>1){$Enfant='Enfants';}else{$Enfant='Enfant';}
                          if ($nbr_bebe>1){$Bebe='Bébés';}else{$Bebe='Bébé';}
                          echo $nbr_enfant.' '. $Enfant; ?> <br/>
                          <?php echo $nbr_bebe.' '. $Bebe;
                              
        }?></li>
            <li><?php echo 'Date départ:'.' '.$date_aller; ?> <br/>
                    <?php   echo 'Date retour:'.' '.$date_retour; ?></li>
            <li><a>Détails de le réservation</a></li>
            <li><a>Notes tarifaires</a></li>
        
    </p>
</div>
        <script src="myspiderpanel.js"></script>
    </div>
    </div>
</body>

</html>