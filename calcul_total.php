<?php
session_start();

    $nbr_adl=$_SESSION['adulte'];
    $nbr_enf=$_SESSION['enfant'];
    $nbr_bb=$_SESSION['bebe'];
    
    
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

    $taxe1=30;
    $taxe2=1500;
    $taxe3=1300;
    $taxe_inter=2000;
if($_SESSION['devise']=='Euro €'){
    $taxe1=$taxe1/200;
    $taxe1=round($taxe1);
     $taxe2=$taxe2/200;
    $taxe2=round($taxe2);
     $taxe3=$taxe3/200;
    $taxe3=round($taxe3);
     $taxe_inter=$taxe_inter/200;
    $taxe_inter=round($taxe_inter);
}
if($_SESSION['devise']=='Dollars $'){
    $taxe1=$taxe1/190;
    $taxe1=round($taxe1);
     $taxe2=$taxe2/190;
    $taxe2=round($taxe2);
     $taxe3=$taxe3/190;
    $taxe3=round($taxe3);
     $taxe_inter=$taxe_inter/190;
    $taxe_inter=round($taxe_inter);
}
    if ($_SESSION['vol_retour']==1 AND !empty($_SESSION['date_retour'])){
    if (!empty($_SESSION['enfant'])){
        $total_un_enf=($_SESSION['tarif_enf']+$_SESSION['tarif_enf_r']);
        
    }else{
        $total_un_enf=0;
    }
            
     if (!empty($_SESSION['bebe'])){
         $total_un_bb=($_SESSION['tarif_bb']+$_SESSION['tarif_bb_r']);
         
     }else{
         $total_un_bb=0;
     }  
    $total_un_adult=($_SESSION['tarif']+$_SESSION['tarif_r']);
    
    }else{
      if (!empty($_SESSION['enfant'])){
          $total_un_enf=$_SESSION['tarif_enf'];
         
    }else{
          $total_un_enf=0;
      }
    if (!empty($_SESSION['bebe'])){
        $total_un_bb=$_SESSION['tarif_bb'];
       
    }else{
        $total_un_bb=0;
    }
        $total_un_adult=$_SESSION['tarif'];
        
    }
    $total_enf_tax=$total_un_enf+$taxe;
    $total_bb_tax=$total_un_bb+$taxe;
    $total_adult_tax=$total_un_adult+$taxe;


   $total_adl=$total_adult_tax*$nbr_adl;
   $total_enf=$total_enf_tax*$nbr_enf;
   $total_bb=$total_bb_tax*$nbr_bb;
   
   $total_t=$total_adl+$total_enf+$total_bb;
   $total=($total_un_adult*$nbr_adl)+($total_un_enf*$nbr_enf)+($total_un_bb*$nbr_bb);

  $taxe_total=$taxe*($nbr_adl+$nbr_enf+$nbr_bb);
  
   
?>