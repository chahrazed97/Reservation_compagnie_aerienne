<?php
session_start();
require 'pdfdos/fpdf.php';
require'connexion_bdd.php';

class myPDF extends FPDF{
   /** function header(){
        // $this->Image('bleu2.JPG',10,6);
        $this->SetFont('Arial','B',14);
        $this->Cell(40,5,'Billet Electronique',0,1,'C');
        $this->SetFont('Times','',12);
        $this->Cell(224,10,'Issue date : 2019/12/31',0,1,'R');
        $this->Cell(250,10,'Compagnie Emettrice : AIR DORADO',0,1,'R');
        $this->Cell(229,10,'Num de billet : 12366789',0,1,'R');
        $this->Ln(10);
        $this->Cell(45,10,'Passager : khoudi chahrazed',0,1,'C');
        $this->SetFont('Times','B',14);
        $this->Cell(20,10,'Itineraire',0,1,'C');
        $this->Cell(45,10,'DE',1,0,'C');
        $this->Cell(45,10,'A',1,0,'C');
        $this->Cell(50,10,'Vol',1,0,'C');
        $this->Cell(30,10,'Classe',1,0,'C');
        $this->Cell(50,10,'Date',1,0,'C');
        $this->Cell(30,10,'Depart',1,0,'C');
        $this->Cell(30,10,'Arrive',1,0,'C');
        $this->Ln(20);
       
        
    }**/
    
  function footer(){
      $this->SetY(-15);
      $this->SetFont('Arial','',8);
      $this->Cell(0,10,'Notre compagnie vous souhaite un agreable voyage',0,0,'C');
  }
}
  
       $pdf=new myPDF();
       $pdf->AliasNbPages();
       //$this->Image('bleu2.JPG',10,6);
        
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
        $requete_ref->execute(array('id'=>$reserv_id));
        while(($donnee=$requete->fetch()) AND ($donnee_ref=$requete_ref->fetch())){
        $pdf->AddPage('L','A4',0);
        
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
        
        $pdf->Image('img/logobdd.PNG',20,20,20,'L');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(40,5,'Billet Electronique',0,1,'C');
        $pdf->SetFont('Times','',12);
        $pdf->Cell(224,7,'Issue date : '.$date_reserv,0,1,'R');
        $pdf->Cell(250,7,'Compagnie Emettrice : AIR DORADO',0,1,'R');
        $pdf->Cell(235,7,'Num de billet : '.$donnee_ref['ref'],0,1,'R');
        $pdf->Ln(10);
        $pdf->Cell(45,7,'Passager :'.$donnee['nom'].' '.$donnee['prenom'],0,1,'C');
        $pdf->SetFont('Times','B',14);
        $pdf->Cell(20,7,'Itineraire',0,1,'C');
            
        
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
        
            
       $pdf->Cell(90,5,'DE',1,0,'C');
       $pdf->Cell(90,5,'A',1,0,'C');
       $pdf->Cell(30,5,'Vol',1,0,'C');
       //$pdf->Cell(30,5,'Classe',1,0,'C');
       $pdf->Cell(25,5,'Date',1,0,'C');
       $pdf->Cell(25,5,'Depart',1,0,'C');
       $pdf->Cell(25,5,'Arrive',1,1,'C');
       
             
       $pdf->Cell(90,5,$date_dep,0,1,'C');
       $pdf->Cell(90,5,utf8_decode($pays_dep),0,0,'C');
       $pdf->Cell(90,5,utf8_decode($pays_arr),0,0,'C');
       // $this->Cell(45,10,$aero_dep,1,0,'C');
        
        //$this->Cell(45,10,$aero_arr,1,0,'C');
       $pdf->Cell(30,5,$av_type,0,0,'C');
        //$this->Cell(50,10,$av_nom,1,0,'C');
       //$pdf->Cell(30,5,$classe,0,0,'C');
       $pdf->Cell(25,5,$date_dep,0,0,'C');
       $pdf->Cell(25,5,$heure_dep,0,0,'C');
       $pdf->Cell(25,5,$heure_arr,0,1,'C');
       $pdf->Cell(90,5,utf8_decode($aero_dep),0,0,'C');
       $pdf->Cell(90,5,utf8_decode($aero_arr),0,0,'C');
       $pdf->Cell(30,5,$av_nom,0,1,'C');
       $pdf->Cell(396,5,utf8_decode($classe),0,1,'C');
       $pdf->Ln(10);
            
        if($vol_id_r!=0){
        
         $sql33='SELECT vol.aero_dep_id, vol.aero_arr_id, vol.date_dep, vol.heure_dep, vol.date_arr, vol.heure_arr, avion.type, avion.nom FROM vol INNER JOIN avion ON vol.avion_id=avion.id WHERE vol.id=:id';   

        $requete33 = $bdd->prepare($sql33);
        $requete33->execute(array('id'=> $vol_id_r));
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
            
            
         $pdf->Cell(90,5,'DE',1,0,'C');
        $pdf->Cell(90,5,'A',1,0,'C');
        $pdf->Cell(30,5,'Vol',1,0,'C');
        //$pdf->Cell(30,5,'Classe',1,0,'C');
        $pdf->Cell(25,5,'Date',1,0,'C');
        $pdf->Cell(25,5,'Depart',1,0,'C');
        $pdf->Cell(25,5,'Arrive',1,1,'C');
       
             
        $pdf->Cell(90,5,$date_dep_r,0,1,'C');
        $pdf->Cell(90,5,utf8_decode($pays_dep_r),0,0,'C');
        $pdf->Cell(90,5,utf8_decode($pays_arr_r),0,0,'C');
       // $this->Cell(45,10,$aero_dep,1,0,'C');
        
        //$this->Cell(45,10,$aero_arr,1,0,'C');
        $pdf->Cell(30,5,$av_type_r,0,0,'C');
        //$this->Cell(50,10,$av_nom,1,0,'C');
        //$pdf->Cell(30,5,$classe,0,0,'C');
        $pdf->Cell(25,5,$date_dep_r,0,0,'C');
        $pdf->Cell(25,5,$heure_dep_r,0,0,'C');
        $pdf->Cell(25,5,$heure_arr_r,0,1,'C');
        $pdf->Cell(90,5,utf8_decode($aero_dep_r),0,0,'C');
        $pdf->Cell(90,5,utf8_decode($aero_arr_r),0,0,'C');
        $pdf->Cell(30,5,$av_nom_r,0,1,'C');
		$pdf->Cell(396,5,utf8_decode($classe),0,1,'C');
        $pdf->Ln(2);
        }
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
                   if ($_SESSION['type_vol']==1){
                        $taxe=4830;
                    }else{
                        $taxe=2830;
                    }
                    
            if($_SESSION['devise']=='Euro €'){
                $tarif_aerien=$tarif_aerien/200;
                 $taxe=$taxe/200;
                 $taxe=round($taxe);
            }
            if($_SESSION['devise']=='Dollars $'){
                $tarif_aerien=$tarif_aerien/190;
                $tarif_aerien=round($tarif_aerien);
                 $taxe=$taxe/190;
                 $taxe=round($taxe);
            }
            $montant_tt=$tarif_aerien+$taxe;
        $pdf->Cell(70,10,'Recu de paiement',0,1,'L'); 
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(70,7,'Nom',0,0,'L');
        $pdf->SetFont('Times','',12);
        $pdf->Cell(70,7,$donnee['nom'].' '.$donnee['prenom'],0,1,'L');
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(70,7,'Num de billet',0,0,'L'); 
        $pdf->SetFont('Times','',12);
        $pdf->Cell(70,7,$donnee_ref['ref'],0,1,'L');
        $pdf->Ln();
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(70,7,'Mode de paiement',0,0,'L'); 
        $pdf->SetFont('Times','',12);
        $pdf->Cell(70,7,$_SESSION['moyen_pay'],0,1,'L');
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(70,7,'Calcul du Tarif',0,1,'L'); 
        $pdf->Cell(70,7,'Tarif Aerien',0,0,'L'); 
        $pdf->SetFont('Times','',12);
        $pdf->Cell(70,7,$_SESSION['devise'].' '.$tarif_aerien,0,1,'L');
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(70,7,'Taxes',0,0,'L'); 
        $pdf->SetFont('Times','',12);
        $pdf->Cell(70,7,$_SESSION['devise'].' '.$taxe,0,1,'L');
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(70,7,'Montant total',0,0,'L'); 
        $pdf->SetFont('Times','',12);
        $pdf->Cell(70,7,$_SESSION['devise'].' '.$montant_tt,0,1,'L');
        $pdf->Ln(30); 
        
    
        }
       
  



//$sql='SELECT ref FROM billet WHERE reservation_id=:id;';
//$requete = $bdd->prepare($sql);
//$requete->execute(array('id'=> $_SESSION['last_id']));
//while($donnee=$requete->fetch()){




$pdf->OutPut();

?>