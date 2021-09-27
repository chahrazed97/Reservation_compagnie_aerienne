<?php
session_start();
if(!empty($_POST)){
    $errors= array();
    //require_once "db.php";

  //virifier si les cases du formulaires ne sont pas vide// 
 if(empty($_POST['cond'])){
    $errors['cond']="Veuillez lire et acceptez nos conditions";
   
}

}

//if ($_SESSION['devise']=='Euro' OR $_SESSION['devise']=='Dollars'){ 
  //if(!isset($_SESSION['acces'])){
     // echo 'echec';
 // }
//}else{
require'connexion_bdd.php';

$_SESSION['paiement']=0;
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
    margin-top:20px;
    border-left: #17264645 solid 1px;
}
.info1 {
    background-color: rgb(242, 242, 242) !important;
}


.left{
         float:none !important;
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
    border-left: #17264645 solid 1px;
}
.info1 {
    background-color: rgb(242, 242, 242) !important;
}
button:focus{
    background-color:rgb(242, 242, 242) !important;
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
    width: 175px;
    height: 125px !important;
}
.slider .slick-center .items{
    background-color: #4c0d0d;
}
.slick-next:before,.slick-prev:before{
    color:#4c0d0d !important;
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
input[type=text]:not(.browser-default){
    color: #172646;
    font-weight:bold;
  
    
}
#bouton{
    width: 180px !important;
    height: 43px;
    border-radius: 11px;
    background-color: #172646 !important;
    border: 0px solid #172646 ;
    margin-right: 20px;
    margin-top: 10px;
    font-weight: 700;
    color:white;
	transition: 0.3s;
}
#bouton:hover{
    background-color: #172646;
    color: gold;
    cursor: pointer;
	transform: scale(1.05);
}
.ident{
    margin-top: 37px !important;
    margin-bottom: 37px !important;
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
   input[type=text]:not(.browser-default){
       width: 60%;
       padding-left:10px;
   }
   .ident{
       width: 95% !important;
   }
   .ident label{
       padding: 0px !important;
   }
}

@media only screen and (max-width: 720px) {
    .item p{
       font-size:10px;
       margin-left:3px;
       padding:0px;
   }
   .fas{
       font-size:16px;
   }
   .prix{
    width:40%;
}
   .prix a{
       margin-left:-27px;
   }
}
    </style>
     

<?php  include("head.php"); ?>
<div class="row navbar" style="background-color:#2d2d2f;display: flex;margin-top:20px;height:50px;">
    <div class=" item "   style="display: flex;">
    <i class="fas fa-plane-departure" style="font-size:1.5em;color:gold;"></i>
    <p style="color:white;">Sellectionner Vol</p>
</div>
<div class=" item " style="display: flex;">
<i class="fas fa-paper-plane" style="font-size:1.5em;color:gold;"></i>
    <p style="color:white;">Réservation</p>
</div>
<div class="item " style="display: flex;background-color: #172646;">
<i class="fas fa-dollar-sign" style="font-size:1.5em;color:gold;"></i>    
<p style="color:white;">Paiement</p>
</div>
<div class="item " style="display: flex;">
<i class="fas fa-dollar-sign" style="font-size:1.5em;color:gold;"></i>
    <p style="color:white;">Billets</p>
</div>
</div>
    <div class="flex">
        <div class="left" style="margin-bottom: 60px;">
            <div class="info info1">
				 
                <div class="row" style="justify-content: space-between;padding-left: 20px;">
                    <?php
                     $rqt='SELECT ref FROM reservation WHERE id=:id ';
                     $requete = $bdd->prepare($rqt);
                     $requete->execute(array('id'=>$_SESSION['last_id']));
                     $num =$requete->fetch();
                     $_SESSION['ref']=$num['ref'];
                     
					?>
                    <h6 style="color: #2d2d2f;"><span style="color: #172646;font-weight:bold;">Numéro de réservation:</span> <?php echo $num['ref']; ?></h6>
                    <h6 style="color:#2d2d2f ;font-size: 20px;"><span style="color: #172646;font-weight:bold;">Le total à payer: </span> <?php echo $_SESSION['total_t'].' '.$_SESSION['devise']; ?></h6>
                    <p style="color: black;
                font-weight: 600;">Vous avez un delai de 3h pour confirmer votre voyage, si le paiement n'est pas effectuer votre reservation sera annulée</p>

                </div>

            </div>
             <form action="fonction_payer.php" method="post">
                <div class="ident" style="width: 50%;margin:auto;">
                    <h5 style="margin: 2%;font-weight: bold;text-align: center;color: #172646;">Identification</h5>
                    <?php for($i=1;$i<=$_SESSION['adulte'];$i++){
                           $nom='nom'.$i;
                           $prenom='prenom'.$i;
            
                     ?>
                    <div class="info" style="background-color: #172646;height: 70px;">
                        <div class="row flex">
                                <i class="medium material-icons" style="color: gold;">person_pin</i>
                            <h5 style="color: white;"><?php echo $_SESSION[$nom].' '.$_SESSION[$prenom]; ?></h5>
                        </div>
        
                    </div>
                
                    <div class="flex" style="align-items: baseline;justify-content: center;">
                       <div style="margin-right:20px;">
                        <select name="identite" id="identité"   required>
                            <option value="" disabled selected>identifiez vous</option>
                             <?php if ($_SESSION['type_vol']=1){ ?>
                             <option value="Passeport">Passeport</option>
                                <?php }else{ ?>
                             <option value="Passeport">Passeport</option>
                             <option value="Carte d'Identité">Carte National d'Identité</option>
                                <option value="Permis de conduite">Permis de Conduite   </option>
                               <?php } ?>
        
                         </select></div>
                     <div class="input-field col s12 ">
                        <input id="input_text" type="text" max-length="1" name="num_pass<?php echo $i; ?>" maxlength="19" pattern="\d+" required>
                        <label for="input_text" style="padding-left:10px;color: #172646;font-weight:bold;line-height: 1;">Entrer votre numéro</label>
        
                    </div> </div></div>
             <?php }
                for($i=1;$i<=$_SESSION['enfant'];$i++){
                    $nom_enf='nom_enf'.$i;
                    $prenom_enf='prenom_enf'.$i;
                    ?>
              <div class="ident" style="width: 50%;margin:auto;">
     
             <div class="info" style="background-color: #172646;height: 70px;">
                <div class="row flex">
                    <i class="medium material-icons" style="color: gold;">person_pin</i>
                    <h5 style="color: white;"><?php echo $_SESSION[$nom_enf].' '.$_SESSION[$prenom_enf]; ?></h5>
                </div>

            </div>
            <div class="flex" style="align-items: baseline;justify-content: center;">
                <div style="margin-right:20px;">
                 <select name="identite" id="identité"   required>
                    <option value="" disabled selected>identifiez vous</option>
                    <?php if ($_SESSION['type_vol']==1){ ?>
                    <option value="Passeport">Passeport</option>
                       <?php }else{ ?>
                    <option value="Passeport">Passeport</option>
                    <option value="Carte d'Identité">Carte National d'Identité</option>
                       <option value="Permis de conduite">Permis de Conduite   </option>
                      <?php } ?>
                  </select></div>
              <div class="input-field col s12 ">
                 <input id="input_text" type="text" max-length="1" name="num_pass_enf<?php echo $i; ?>" maxlength="19" pattern="\d+" required>
                 <label for="input_text" style="padding-left:10px;color: #172646;font-weight:bold;line-height: 1;">Entrer votre numéro</label>
 
             </div> </div>
               
                </div> 
                <?php } ?>
                


            
          
                <div class="row">
                    <?php if ($_SESSION['devise']=='Dinar(DZD)'){ ?>
                    <h5 style="margin: 2%;font-weight: bold;">Paiement</h5>
                    <div class=" col s12 m6 l6">
                        <p>
                            <label>
               <input name="groupe1" value="dhahabia" checked type="radio"  onclick="document.getElementById('code_carte').style.display='block';document.getElementById('suivant').style.display='none';document.getElementById('payer').style.display='block'"/>
               <span style="color:black"> Carte El-Dhahabia</span>
             </label>
                        </p>

                        <p>
                            <label>
               <input name="groupe1" type="radio" value="cib" onclick="document.getElementById('code_carte').style.display='block';document.getElementById('suivant').style.display='none';document.getElementById('payer').style.display='block'"/>
               <span style="color:black">Carte Bancaire</span>
             </label>
                        </p>


                    </div>

                      <?php }
                    if ($_SESSION['devise']=='Euro €' OR $_SESSION['devise']=='Dollars $'){ ?>
                    
                <div class="row">
                    <h5>Choisissez un mode de payement</h5>
					<?php if(isset($_GET['err'])){
                    ?>
					<b style="color: red; "><?php echo $_GET['err']; ?></b>
				<?php } ?>
                    <div class=" col s12 m6 l4">
                        <p>
                            <label>
                  <input
                    name="groupe1" value="mastercart"
                    style="margin-top: 3%;"
                    type="radio"
                    onclick="document.getElementById('code_carte').style.display='block';
                    document.getElementById('mastercard').style.display='block';
                     document.getElementById('visa').style.display='none';"
                  />
                  <span><img src="img/mastercard.png" width="40%"/></span>
                </label>
                        </p>
                    </div>
                    <div class=" col s12 m6 l4">
                        <p>
                            <label>
                  <input
                    name="groupe1" value="visa"
                    style="margin-top: 3%;"
                    type="radio"
                    onclick="document.getElementById('code_carte').style.display='block';
                    document.getElementById('mastercard').style.display='none';
                    document.getElementById('visa').style.display='block'"
                  />
                  <span><img src="img/visacard.png" width="25%"/></span>
                </label>
                        </p>
                    </div>
                    <div class=" col s12 m6 l3" style="display: none;" id="visa">
                        <img src="img/verifiedvisa.jfif" />
                    </div>
                    <div class=" col s12 m6 l3" style="display: none;" id="mastercard">
                        <img src="img/mastercardd.png"  width="56%;">
                    </div>
                </div>
          
            <!--formulaire-->
            <div class="formulaire" style="display: none;" id="code_carte">
                
                    <div class="row">
                        <div class="col s12 m6 l4 ">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" id="code_carte" name="num_card" maxlength="19" pattern="\d+" required/>
									<div style="color: red; " id="erreurcb"></div>
                                    <label for="codecarte"> Numéro de la carte</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s10 m6 l3 " style="margin-left: 6%;">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" id="security1" class="code_carte" maxlength="4" pattern="\d+"  required />
									<div style="color: red; " id="erreurcb"></div>
                                    <label for="securite_carte">code de sécurité</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s2 m4 l3 " style="margin-top: 4%;">
                            <div class="row">
                                <i class="material-icons suffix">help</i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 l3 ">
                            <h6>Expire le* :</h6>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="number" class="mois" id="mois" min="1" max="12" required />
                                    <label for="mois"> Mois</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3 " style="margin-top: 4%;">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="number" class="annee" id="annee" min="<?php echo date("Y");?>" required/>
                                    <label for="annee"> Année</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s10 m6 l3 " style="margin-left: 6%;margin-top: 4%;">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" id="nom_carte" class="nomcarte" name="nom_card" maxlength="90" pattern="[a-zA-Z \S]+" required />
									<div style="color: red; " id="erreurnom1"></div>
                                    <label for="nomcarte">Nom sur votre Carte</label>
                                </div>
                            </div>
                        </div>
                    </div>

                   <!-- <div class="col s12 m6 l5 right " id="payer"  style="margin-bottom:10%;">
                        <a href="carte-embarquement.php" class="waves-effect waves-light btn" id="bouton">Payer</a>-->
              
            </div>
            <!--<a
              href="ajout-bagage.php"
              class="waves-effect waves-light btn right"
              id="bouton"
               style="margin-bottom:10%;">Annuler</a
            >-->
         
                   <?php } ?>   
                </div>
                <div class="col s12 m6 l5 right " id="payer">
                        <button type="submit" class="waves-effect waves-light btn" id="bouton">Payer</button>
    
                    </div>
            </form>
        </div>
                <div class=" details_vol ">
                        <div class="voir"><span>+</span><p>Voir réservation</p></div>
                    <div  style="height: auto; margin-top:0px;width: 100%;" >
                    <div id="myDIV" style="display: block;padding:20px 10px;">
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
                        
                            <li style="font-size:20px;color:#172646;font-weight:bold;text-align: center;">Vol aller</li>
                           
                         <li><?php echo $_SESSION['date_aller_lettre']; ?></li>
                       <li><?php echo $_SESSION['heure_dep'].' '.$_SESSION['dep']; ?></li>
                       <li><?php echo $_SESSION['heure_arr'].' '.$_SESSION['arr']; ?></li>
                       <li><?php echo 'Durée total ...'.$_SESSION['escal']; ?></li>
                        <li><?php echo 'PRIX :'.$_SESSION['tarif']; ?></li>
                            </ul>
                     </div>
                         <?php
                        if ($_SESSION['vol_retour']==1 AND !empty( $_SESSION['date_retour'])){ ?>
                        <div id="myDIV" style="display: block;padding:20px 10px;">
                                <ul class="list1">
                            <li style="font-size:20px;color:#172646;font-weight:bold;text-align: center;">Vol retour</li>
                           
                                <li><?php echo $_SESSION['date_retour_lettre']; ?></li>
                       <li><?php echo $_SESSION['heure_dep_ret'].' '.$_SESSION['dep_r']; ?></li>
                       <li><?php echo $_SESSION['heure_arr_ret'].' '.$_SESSION['arr_r']; ?></li>
                       <li><?php echo 'Durée total ...'.$_SESSION['escal_r']; ?></li>
                        <li><?php echo 'PRIX :'.$_SESSION['tarif_r']; ?></li>
                            </ul>
                        </div>
                        <?php } ?>
                        <div id="myDIV" style="display: block;padding:20px 10px;">
                            <ul class="list1">
                        <li>Frais de transport aérien : <?php echo $_SESSION['total'].' '.$_SESSION['devise']; ?></li>
                        <li>Taxes et frais : <?php echo $_SESSION['taxe'].' '.$_SESSION['devise']; ?></li>
                        <li>Total : <?php echo $_SESSION['total_t'].' '.$_SESSION['devise']; ?></li>
                    </ul>   
                    </div>
                         
                </div>
                
                </div>
               
                <!--<div class="col s12 m6 l5 right" style="display:none" id="suivant">
                    <a href="message.html" class="waves-effect waves-light btn" id="bouton">Suivant</a></div>-->
                
           
           <!-- <div class="row">

                <div class=" col s12">
                    <h5 style="margin: 2%;font-weight: bold;">Condition générale</h5>
                    <p>
                        <label>
                            <input class="with-gap" name="group1" type="radio" />
                            <span>OUI J'ai lu et j'accepte les conditions</span>
                             </label>
                    </p>
                </div>
            </div>-->


        </div>
        
       
    </div>

    
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('select').formSelect();
        });
    </script>
    <script>
        $(document).ready(function() {
            M.updateTextFields();
        });
    </script>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>





</body>

</html>