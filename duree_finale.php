<?php


$dat1 =  "22:53:23";
$dat2 = "1:57:47";

$tabb1 = explode(":", $dat1);
$tabb2 = explode(":", $dat2);
if ($tabb1[0] < $tabb2[0] ) {



function secondair($dat0){
 $dat11 = 0;
 $compt = explode(":", $dat0);
foreach ($compt as $key => $value) {
        if ($key == 0) {

            $dat11 = $value * 3600;
        }elseif ($key == 1) {
           $dat11 = $dat11+($value *60);
          
        }elseif ($key == 2) {
          $dat11 = $dat11 + $value;
        }
}
return $dat11;
}
 $pdat = secondair($dat1);
    $ddat = secondair($dat2);


function result($dat1,$dat2){
  if($dat1 == $dat2){$nul = "00:00:00"; return $nul;
  }else{
    if($dat1 > $dat2){

      $dfr = $dat1 - $dat2;
    }elseif($dat1 < $dat2){
      $dfr = $dat2 - $dat1;
    }

$tab = array( );

if($dfr >= 3600){
$heur = ($dfr-($dfr % 3600))/3600;
$tab[0] = $heur;
}else{$tab[0] = "00";}
if($dfr >= 60){
$minut = (($dfr % 3600)-(($dfr % 3600) % 60))/60;
$tab[1] = $minut;
}else{$tab[1] = "00";}
if($dfr >0){
$scond = ($dfr % 3600) % 60;

$tab[2] = $scond;
}

  $defrenc = implode(":", $tab);
  return $defrenc;
}
}

 
echo"<br>".result($pdat,$ddat);
} 


elseif($tabb1[0] > $tabb2[0] ) {






$tabb1 = explode(":",$dat1);

function secon($tab1){

$mmm = $sss = "";
if ($tab1[0] > 12){
  
	$mm =  60 -$tab1[1];

	$ss = 60 - $tab1[2];
   $h = 0;

 while ($tab1[0] < 24) {
   $h = $h +1;
   $tab1[0] = $tab1[0] + 1;
 }
 /*if($ss > 0){}*/
$tab1[2] =  $ss ;
$tab1[1] =  $mm;
if($mm > 0 && $mm < 60){
$tab1[0] = $h - 1;}else{
  $tab1[0] = $h;
}
if( $mm == 60 && $ss == 60){
$tab1[0]= $h;
$tab1[1] = $tab1[2]=0;
}
  return $tab1;
   
}

}
  $hminuit = secon($tabb1);
  //print_r($hminuit);
  $val = implode(":", $hminuit);
  

$dat1 = $val;

$tabbb1 = explode(":", $dat1);
$tabb2 = explode(":", $dat2);
/*

*/

$plus = 0;
$plu = 0;

if($tabbb1[2] + $tabb2[2] > 60){
  
  $ta1 = ($tabbb1[2] + $tabb2[2]) - 60;
  $plus = 1;
 }elseif($tabbb1[2] + $tabb2[2] == 60){
  $ta1 = 0;
 $plus = 1;
}else{
  $ta1 = $tabbb1[2] + $tabb2[2];
 }
if($tabbb1[1] + $tabb2[1] + $plus > 60){
  $ta2 = ($tabbb1[1] + $tabb2[1] + $plus ) - 60;
  $plu = 1;
 }elseif($tabbb1[1] + $tabb2[1] + $plus == 60){
   $ta2 = 0;
   $plu = 1;

 }else{
  $ta2 = $tabbb1[1] + $tabb2[1];
 }
 if($plu == 1){
 $ta3 = $tabbb1[0] + $tabb2[0] + $plu ;
}else{
  $ta3 = $tabbb1[0] + $tabb2[0];
}

$fin = $ta3.":".$ta2.":".$ta1;
echo"<br>".$fin;
}