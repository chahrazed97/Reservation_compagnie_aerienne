<?php
require'calcul_total.php';
unset($_SESSION['acces']);  
require'connexion_bdd.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="css/materialize.min.css">
    <!-- Compiled and minified Jquery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="js/materialize.min.js"></script>
    <!-- Compiled and minified fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/info.css">
    <title>Document</title>

</head>


<body>
    <?php include("head.php"); ?>
   
    <div class="row-glb row">
        <div class="col-res col s8">
            <div class="row-numres row">
                <p>Numéro de Reservation: <?php
                    if($_SESSION['paiement']==0){
                        $ref=$_SESSION['ref'];
                        $reserv_id=$_SESSION['last_id'];
                        $classe=$_SESSION['classe'];
                            }
                            if($_SESSION['paiement']==1){
                        $ref=$_SESSION['num_reserv'];
                        $reserv_id=$_SESSION['id_reserv'];
                        $classe=$_SESSION['nom_classe'];
                        
                            }    
                    echo $ref; ?></p>
            </div>
        </div>
        <div class="col-ttl col s4">
            <p>TOTAL : <?php echo $total_t.' '.$_SESSION['devise']; ?></p>
        </div>

    </div>

    <div>
        <div class="row lesbtn">
            <div class="gerer-res">
                <a href="choixmenu_info.php" class="waves-effect waves-light btn btn-gerer">Choisir un menu </a>
            </div>
            <div class="obt-conf">
                <a class="waves-effect waves-light btn btn-gerer"> Obtenir le billet  </a>
            </div>
            <div class="drop">
                <form>
                    <p>
                        <label>
                                        
                            <input name="group1" type="radio" checked />
                            <span><a href="billet_mail.php">Envoyer Par E-mail</a></span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="group1" type="radio" />
                            <span> <a href="billet_pdf.php">Imprimer Le billet</a></span>
                                
                        </label>
                    </p>
                </form>

            </div>
        </div>

    </div>
    
    <table class="tab-2">
        <thead class="entet-tab-2">
            <tr class="partie1-tab-2">
                <th>TOTAL : <?php echo $total_t.' '.$_SESSION['devise']; ?></th>
                <th>Tarif Détaillé : </th>

            </tr>
            
        </thead>

        <tbody class="corp-tab-2">
            <tr class="partie2-tab-2">
                <td class="td-tab-2">Tarif De Transport aérien : <?php echo '  '.$total.' '.$_SESSION['devise']; ?><br>Taxes et frais :<?php echo '  '.$taxe_total.' '.$_SESSION['devise']; ?></td>
                <td>1 Adulte     <?php echo $total_adult_tax.' '.$_SESSION['devise']; ?> <br>
                <b>Frais de transport aérien totaux :    </b><?php echo $total_un_adult.' '.$_SESSION['devise']; ?><br>
                    <b>Taxes et frais</b><br>Taxe de timbre fiscal :     <?php echo $taxe1.' '.$_SESSION['devise']; ?><br>Taxe de transport international :     <?php echo $taxe2.' '.$_SESSION['devise']; ?><br>Taxe aéroportuaire international :     <?php echo $taxe3.' '.$_SESSION['devise']; ?><br>
                    <?php if ($_SESSION['type_vol']==1){
                    ?>Taxe d'aéroport :     <?php echo $taxe_inter.' '.$_SESSION['devise']; } ?><br><b>Total des Taxes et Frais :     <?php echo $taxe.' '.$_SESSION['devise']; ?></b><br>Total par Adulte :     <?php echo $total_adult_tax.' '.$_SESSION['devise']; ?><br>
                *<?php echo $nbr_adl.' Adulte :     '.$total_adl.' '.$_SESSION['devise']; ?><br><br>
                    
                    <!--Enfant -->
                    <?php if (!empty($_SESSION['enfant'])){ ?>
                    1 Enfant     <?php echo $total_enf_tax.' '.$_SESSION['devise']; ?> <br>
                <b>Frais de transport aérien totaux :    </b><?php echo $total_un_enf.' '.$_SESSION['devise']; ?><br>
                    <b>Taxes et frais</b><br>Taxe de timbre fiscal :     <?php echo $taxe1.' '.$_SESSION['devise']; ?><br>Taxe de transport international :     <?php echo $taxe2.' '.$_SESSION['devise']; ?><br>Taxe aéroportuaire international :     <?php echo $taxe3.' '.$_SESSION['devise']; ?><br>
                    <?php if ($_SESSION['type_vol']==1){
                    ?>Taxe d'aéroport :     <?php echo $taxe_inter.' '.$_SESSION['devise']; } ?><br><b>Total des Taxes et Frais :     <?php echo $taxe; ?></b><br>Total par Enfant :     <?php echo $total_enf_tax.' '.$_SESSION['devise']; ?><br>
                *<?php echo $nbr_enf.' Enfant :     '.$total_enf.' '.$_SESSION['devise']; ?><br><br><?php } 
                    
                     //Bebe 
                     if (!empty($_SESSION['bebe'])){ ?>
                     1 Bébé     <?php echo $total_bb_tax.' '.$_SESSION['devise']; ?> <br>
                <b>Frais de transport aérien totaux :    </b><?php echo  $total_un_bb.' '.$_SESSION['devise']; ?><br>
                    <b>Taxes et frais</b><br>Taxe de timbre fiscal :     <?php echo $taxe1.' '.$_SESSION['devise']; ?><br>Taxe de transport international :     <?php echo $taxe2.' '.$_SESSION['devise']; ?><br>Taxe aéroportuaire international :     <?php echo $taxe3.' '.$_SESSION['devise']; ?><br>
                    <?php if ($_SESSION['type_vol']==1){
                    ?>Taxe d'aéroport :     <?php echo $taxe_inter.' '.$_SESSION['devise']; } ?><br><b>Total des Taxes et Frais :     <?php echo $taxe.' '.$_SESSION['devise']; ?></b><br>Total par Bébé :     <?php echo $total_bb_tax.' '.$_SESSION['devise']; ?><br>
                *<?php echo $nbr_bb.' Bébé :     '. $total_bb.' '.$_SESSION['devise']; ?><br><?php } ?>
                </td>

            </tr>
           
           

        </tbody>

        <div>
            <p>



            </p>

        </div>

<?php 
   
       $sql='SELECT nom, prenom, sexe, num_pass, type, date_nais FROM client_passager WHERE reservation_id=:id LIMIT 1';
       $requete = $bdd->prepare($sql);
       $requete->execute(array('id'=> $reserv_id));
       $donnee=$requete->fetch();
        
       $sql_date='SELECT date_heure FROM reservation WHERE id=:id';
       $requete_date = $bdd->prepare($sql_date);
       $requete_date->execute(array('id'=> $reserv_id));
       $donnee_date=$requete_date->fetch();
       $date_heure_reserv=$donnee_date['date_heure'];
       $date_reserv = new DateTime($date_heure_reserv);
       $date_reserv = $date_reserv->format("d-M-Y");
    ?>
        <table class="striped tab-3">
            <thead class="entet-tab-3">
                <tr class="partie1-tab-3">
                    <th class="th-tab-3">
                        Information Sur Le Billet :
                    </th>


                </tr>
            </thead>

            <tbody class="corp-tab-3">
                <tr class="partie2-tab-3">
                    <td>Nom Du Passager : <?php echo ' '.$donnee['nom']; ?></td>

                </tr>
                <tr class="partie3-tab-3">
                    <td>Numéro De Reservation : <?php echo $ref; ?></td>


                </tr>
                <tr class="partie4-tab-3">
                    <td>Date D'émission : <?php echo $date_reserv; ?></td>
                </tr>
                <tr class="partie5-tab-3">
                    <td>Mode De Livraisons : Billet electronique</td>
                </tr>

            </tbody>
        </table>

        <div class="lng-sep">

        </div>
        <?php
      
   
         $sql1='SELECT vol_id_a, vol_id_r, classe_id FROM reservation WHERE id=:id';
         $requete1 = $bdd->prepare($sql1);
         $requete1->execute(array('id'=> $reserv_id));
         $donnee1=$requete1->fetch();
         $vol_al=$donnee1['vol_id_a'];
         $vol_ret=$donnee1['vol_id_r'];
          
     
   
        $sql3='SELECT vol.aero_dep_id, vol.aero_arr_id, vol.date_dep, vol.heure_dep, vol.date_arr, vol.heure_arr, avion.type, avion.nom FROM vol INNER JOIN avion ON vol.avion_id=avion.id WHERE vol.id=:id';   

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
         
        ?>
        <table class="striped tab-3">
            <thead class="entet-tab-3">
                <tr class="partie1-tab-3">
                    <th class="th-tab-3">
                        Itinéraire:
                    </th>
                </tr>
            </thead>

            <tbody class="corp-tab-3">
                <tr class="partie2-tab-3">
                    <td><?php echo'Vol de départ'; ?><br>
                        <?php echo $pays_dep.' - '.$pays_arr; ?><br>
                    <?php  
                             $date_d = new DateTime($date_dep);
                             $date_d = $date_d->format("d-M-Y"); 
                            echo $date_d; ?><br><br>
                        <?php echo $heure_dep.' '.$pays_dep; ?><br>
                        <?php echo $aero_dep; ?><br><br>
                        
                        <?php echo $donnee3['heure_arr'].' '.$pays_arr; ?><br>
                        <?php echo $aero_arr; ?><br>
                        
                    </td>
                    <td>
                    <?php echo 'Compagnie: Air Dorado'; ?><br>
                    <?php echo $av_type.' '. $av_nom; ?><br>
                    <?php echo 'Cabine: '.$classe; ?></td>
                </tr>

            </tbody> 
            <?php
             if($_SESSION['paiement']==0){
                 $retour=$vol_ret;
             }
            if($_SESSION['paiement']==1){
                $retour=$_SESSION['vol_id_r'];
            }
            if ($retour!=0) {
    
           $sql33='SELECT vol.aero_dep_id, vol.aero_arr_id, vol.date_dep, vol.heure_dep, vol.date_arr, vol.heure_arr, avion.type, avion.nom FROM vol INNER JOIN avion ON vol.avion_id=avion.id WHERE vol.id=:id';   

        $requete33 = $bdd->prepare($sql3);
        $requete33->execute(array('id'=> $vol_ret));
        $donnee33=$requete33->fetch();
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
 ?>
             <tbody class="corp-tab-3">
                <tr class="partie2-tab-3">
                    <td><?php echo 'Vol de retour'; ?><br>
                        <?php echo  $pays_dep_r.' - '.$pays_arr_r; ?><br>
                    <?php  
                             $date_r = new DateTime($donnee33['date_dep']);
                             $date_r = $date_r->format("d-M-Y"); 
                            echo $date_r; ?><br><br>
                        <?php echo  $heure_dep_r.' '.$pays_dep_r; ?><br>
                        <?php echo $aero_dep_r; ?><br><br>
                        
                        <?php echo $heure_arr_r.' '.$pays_arr_r; ?><br>
                        <?php echo $aero_dep_r; ?><br>
                        
                    </td>
                    <td>
                    <?php echo 'Compagnie: Air Dorado'; ?><br>
                    <?php echo  $av_type_r.' '.  $av_nom_r2Z; ?><br>
                    <?php echo 'Cabine: '.$classe; ?></td>
                </tr>

            </tbody> 
            <?php } ?>
        </table>

        <table class="striped tab-3">
            <thead class="entet-tab-3">
                <tr class="partie1-tab-3">
                    <th class="th-tab-3">
                        Voyageurs:
                    </th>
                </tr>
            </thead>
          <?php 
          
   
            $sql4='SELECT nom, prenom, sexe, num_pass, type, date_nais FROM client_passager WHERE reservation_id=:id';
            $requete4 = $bdd->prepare($sql4);
            $requete4->execute(array('id'=> $reserv_id));
            while($donnee4=$requete4->fetch()){
   
            ?>
            <tbody class="corp-tab-3">
                 <tr class="partie2-tab-3">
                    <th><?php echo $donnee4['type']; ?></th>
                </tr>
                <tr class="partie2-tab-3">
                    <td>Nom & Prénom : <?php echo $donnee4['nom'].' '.$donnee4['prenom']; ?></td>
                </tr>
                <tr class="partie3-tab3">
                    <?php 
                     if($donnee4['type']=='Adulte'){
                    ?>
                    <td>Numéro <?php echo ' '.$_SESSION['identite'].': '.$donnee4['num_pass']; ?></td>
                    <?php }else{ ?>
                      <td>Date de naissance : <?php echo ' '.$donnee4['date_nais']; ?></td>   
                    <?php } ?>
                </tr>

            </tbody><br><br> 
            <?php } ?>
        </table>
        <script>
            $(document).ready(function() {
                $('.obt-conf').click(function() {
                    $('.drop').slideToggle(300);
                });
            })
        </script>
<?php include("footer.php"); ?>
</body>

</html>