<?php
session_start();
require'connexion_bdd.php';

ob_start();
echo '<html>
           <head><titre></titre></head>
           <body>';
             if($_SESSION['paiement']==0){
                $reserv_id=$_SESSION['last_id'];
                        
                            }
            if($_SESSION['paiement']==1){
                $reserv_id=$_SESSION['id_reserv'];
                            }
            $sql='SELECT type, nom, prenom FROM client_passager WHERE reservation_id=:id ';
            $requete = $bdd->prepare($sql);
            $requete->execute(array('id'=> $reserv_id));
            $sql_ref='SELECT ref FROM billet WHERE reservation_id=:id ';
            $requete_ref= $bdd->prepare($sql_ref);
            $requete_ref->execute(array('id'=> $reserv_id));
            while(($donnee=$requete->fetch()) AND ($donnee_ref=$requete_ref->fetch())){
                $sql2='SELECT date_heure, vol_id_a, vol_id_r, classe_id FROM reservation WHERE id=:id';    
                $requete2 = $bdd->prepare($sql2);
                $requete2->execute(array('id'=> $reserv_id));
                $donnee2=$requete2->fetch();
                $vol_id_a=$donnee2['vol_id_a'];
                $vol_id_r=$donnee2['vol_id_r'];
                $classe_id=$donnee2['classe_id'];
                $date_heure_reserv=$donnee2['date_heure'];
                $date_reserv = new DateTime($date_heure_reserv);
                $date_reserv = $date_reserv->format("d-M-Y");
                
                 $sql3='SELECT vol.aero_dep_id, vol.aero_arr_id, vol.date_dep, vol.heure_dep, vol.date_arr, vol.heure_arr, avion.type, avion.nom FROM vol INNER JOIN avion ON vol.avion_id=avion.id WHERE vol.id=:id';   

        $requete3 = $bdd->prepare($sql3);
        $requete3->execute(array('id'=> $vol_id_a));
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
            
                $sql4='SELECT nom FROM classe WHERE id=:id';
                $requete4 = $bdd->prepare($sql4);
                $requete4->execute(array('id'=>$classe_id));
                $donnee4=$requete4->fetch();
                $classe=$donnee4['nom'];
           echo '<div class="flex row">
        
        <table>
            <tr>
                <th>billet electronique</th><th>num de billet :'.$donnee_ref['ref'].'<br>issue date:'.$date_reserv.'<br>compagnie: AIR DORADO</th>
            </tr><br>
            <tr>
                <td>passager:'.$donnee['nom'].' '.$donnee['prenom'].'</td>
            </tr><br>
            <tr>
                <td>iterinaire</td>
            </tr><br>
            <tr>
                <td>DE</td><td>A</td><td>VOL</td><td>CLASSE</td><td>DATE</td><td>DEPART</td><td>ARRIVEE</td>
            </tr>
            <tr>
                <td>'.$date_dep.'<br>'.$pays_dep.'<br>'.$aero_dep.'</td><td>'.$pays_arr.'<br>'.$aero_arr.'</td><td>'.$av_type.'<br>'.$av_nom.'</td><td>'.$classe.'</td><td>'.$date_dep.'</td><td>'.$heure_dep.'</td><td>'.$heure_arr.'</td>
            </tr>
        </table><br><br>';
                 if($vol_id_r!=0){
                    $sql33='SELECT vol.aero_dep_id, vol.aero_arr_id, vol.date_dep, vol.heure_dep, vol.date_arr, vol.heure_arr, avion.type, avion.nom FROM vol INNER JOIN avion ON vol.avion_id=avion.id WHERE vol.id=:id';   

        $requete33 = $bdd->prepare($sql3);
        $requete33->execute(array('id'=> $vol_id_r));
        $donnee33=$requete3->fetch();
        $aero_dep_id3=$donnee33['aero_dep_id'];
		$aero_arr_id3=$donnee33['aero_arr_id'];
			
		$sql_d3='SELECT nom,pays FROM aeroport WHERE id=:id';
		$requete_d3 = $bdd->prepare($sql_d3);
         $requete_d3->execute(array('id'=> $aero_dep_id3));
          $donnee_d3=$requete_d3->fetch();

        $sql_a='SELECT nom,pays FROM aeroport WHERE id=:id';
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
                    echo '<table>
                     <tr>
                       <td>DE</td><td>A</td><td>VOL</td><td>CLASSE</td><td>DATE</td><td>DEPART</td><td>ARRIVEE</td>
                     </tr>
                     <tr>
                       <td>'.$date_dep_r.'<br>'.$pays_dep_r.'<br>'.$aero_dep_r.'</td><td>'.$pays_arr_r.'<br>'.$aero_arr_r.'</td>     <td>'.$av_type_r.'<br>'.$av_nom_r.'</td><td>'.$classe.'</td><td>'.$date_dep_r.'</td><td>'.$heure_dep_r.'</td>     <td>'.$heure_arr_r.'</td>
                     </tr>
                     </table><br><br>'; }
                      $sql5='SELECT tarif_bb, tarif_enfant, tarif_vol FROM tarif WHERE vol_id=:vol_id_a AND classe_id=:id_classe';
                       $requete5= $bdd->prepare($sql5);
                       $requete5->execute(array('vol_id_a'=> $vol_id_a, 'id_classe'=>$classe_id));
                       $donnee5=$requete5->fetch();
                          if($vol_id_r!=0){
                              $sql6='SELECT tarif_bb, tarif_enfant, tarif_vol FROM tarif WHERE vol_id=:vol_id_r AND classe_id=:id_classe';
                              $requete6= $bdd->prepare($sql6);
                              $requete6->execute(array('vol_id_r'=> $vol_id_r, 'id_classe'=>$classe_id));
                              $donnee6=$requete6->fetch();
                                          }
                         if($donnee['type']=='Adulte'){
                              if($vol_id_r!=0){
                                   $tarif_aerien=$donnee5['tarif_vol']+$donnee6['tarif_vol'];   
                               }else{
                                   $tarif_aerien=$donnee5['tarif_vol'];
                                    }
                                                      }
                        if($donnee['type']=='Enfant'){
                           if($vol_id_r!=0){
                            $tarif_aerien=$donnee5['tarif_enfant']+$donnee6['tarif_enfant'];   
                           }else{
                            $tarif_aerien=$donnee5['tarif_enfant'];
                           }
                         } if($donnee['type']=='Bébe'){
                             if($vol_id_r!=0){
                              $tarif_aerien=$donnee5['tarif_bb']+$donnee6['tarif_bb'];   
                             }else{
                              $tarif_aerien=$donnee5['tarif_bb'];
                             }
                         }
                         $tax=3200;
            
                         if($_SESSION['devise']=='Euro €'){
                            $tarif_aerien=$tarif_aerien/200;
                            $tax=$tax/200;
                           }
                          if($_SESSION['devise']=='Dollars $'){
                             $tarif_aerien=$tarif_aerien/190;
                             $tax=$tax/190;
                           }
                         $montant_tt=$tarif_aerien+$tax;
               echo '<table>
                <tr>
                 <th>Recu de paiement<th>
                </tr><br>
                <tr>
                <th>Nom :</th><td>'.$donnee['nom'].' '.$donnee['prenom'].'</td>
                </tr>
                <tr>
                <th>Num du billet : </th><td>'.$donnee_ref['ref'].'</td>
                </tr>
                <tr>
                <th>Mode de paiement : </th><td>'.$_SESSION['moyen_pay'].'</td>
                </tr><br>
                <tr>
                <th>Calcul du tarif</th>
                </tr><br>
                <tr>
                <th>Tarif aerien : </th><td>'.$_SESSION['devise'].' '.$tarif_aerien.'</td>
                </tr>
                <tr>
                <th>Taxes :</th><td>'.$_SESSION['devise'].' '.$tax.'</td>
                </tr>
                <tr>
                <th>Montant total :</th><td>'.$_SESSION['devise'].' '.$montant_tt.'</td>
                </tr>
                </table>
                </div><br><br><p>-----------------------------------------------------------------------------------------------</p><br><br>'; }
               echo '</body>
                </html>';

$message = ob_get_contents();
ob_end_clean();

$sql_id='SELECT client_id FROM client_passager WHERE reservation_id=:id LIMIT 1';
$requete_id= $bdd->prepare($sql_id);
$requete_id->execute(array('id'=> $reserv_id));
$donnee_id=$requete_id->fetch();
$client_id=$donnee_id['client_id'];

$sql_eml='SELECT email FROM client WHERE id=:id_client';
$requete_eml= $bdd->prepare($sql_eml);
$requete_eml->execute(array('id_client'=> $client_id));
$donnee_eml=$requete_eml->fetch();
$to=$donnee_eml['email'];

//$to="khoudichahrazed@gmail.com";
// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';
  
// send email
mail($to,"BILLETS",$message,implode("\r\n", $headers));
header('Location:info.php');
?>