<?php session_start()
?>
<!Doctype html>
<html lang="en">

<head>
    <!--Import Icon Font-->
    <link href="iconfont/material-icons.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceuil</title>

    <style>
        .secnosdest,
        .secpromo,
        .secpayment {
            margin: 50px 0px 50px 0px;
        }
        
        #imgcarte {
            height: 150px;
        }
        
        .milieu {
            padding-top: 15px;
            height: 440px;
            /* animation-name: animback;
            animation-duration: 50s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            animation-direction: normal; */
            opacity: 90%;
        }
        
        .tabs .tab a.active {
            background: linear-gradient(to right, #ff0000de 0%, #172646 85%);
            border-radius: 15px 15px 5px 5px;
        }
        
        .tab1 {
            padding: 2px;
            opacity: rgba(255, 255, 255, 0.473);
            ;
        }
        
        .btn-floating {
            background-color: #12124e;
        }
        
        .material-icons:hover {
            color: black;
        }
        
        #date_retour {
            display: none;
            margin-bottom: 10px;
            margin-top: 10px;
        }
        
        #imgcarted {
            height: 150px;
            overflow: hidden;
        }
        
        .card-action {
            height: 10%;
        }
        
        .card-content {
            height: 90px;
        }
        /* Nos Dest */
        
        .secnosdest {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/map.jpg)no-repeat fixed center;
            background-size: cover;
            padding: 10px 0px;
        }
        
        .secpayment {
            /* background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/money.jpg)no-repeat fixed center; */
            background-size: cover;
            padding: 10px 0px;
        }
        
        .incline {
            background: linear-gradient(135deg, gainsboro 0, gainsboro 58%, transparent 58%, transparent 100%);
            width: 100%;
            height: 30px;
            margin-top: -10px;
        }
        
        .incline2 {
            background: linear-gradient(135deg, transparent 0, transparent 42%, gainsboro 42%, gainsboro 100%);
            width: 100%;
            height: 30px;
            margin-bottom: -10px;
        }
        
        @media screen and (max-width: 640px) {
            strong {
                font-size: 11px;
            }
        }
        
        #tabs-swipe-demo {
            background: none;
        }
        
        label {
            font-weight: bolder;
            color: rgb(0, 0, 0, 0.8) !important;
        }
        
        * {
            font-family: "Montserrat", Helvetica, Arial, sans-serif;
            font-size: 16px;
        }
        
        @keyframes animback {
            0% {
                background: url('img/1.jpg')no-repeat fixed center;
            }
            33% {
                background: url('img/avion.jpg')no-repeat fixed center;
            }
            70% {
                background: url('img/avion.jpg')no-repeat fixed center;
            }
            100% {
                background: url('img/1.jpg')no-repeat fixed center;
            }
        }
        
        .card {
            background-color: gainsboro;
            box-shadow: 0px 0px 20px 0px rgba(32, 33, 36, 0.28);
        }
        
        #imgcarted {
            height: 150px;
            overflow: hidden;
        }
        
        #reserver {
            background-color: #fafafaa1;
            box-shadow: 0px 0px 20px 0px rgba(32, 33, 36, 0.9);
        }
        
        #gerer {
            background-color: #fafafaa1;
            box-shadow: 0px 0px 20px 0px rgba(32, 33, 36, 0.9);
        }
        
        #enregistrer {
            background-color: #fafafaa1;
            box-shadow: 0px 0px 20px 0px rgba(32, 33, 36, 0.9);
        }
        
        #titre {
            margin: 15px 0px 25px 0px;
            color: #172646;
            text-shadow: 0px 0px 4px rgba(32, 33, 36, 0.58);
        }
        
        .payer {
            width: 30%;
            margin-left: 0%;
        }
        
        #imagepayer {
            height: 100%;
        }
        
        .btn-small {
            background-color: #172646 !important;
        }
        
        .row {
            margin-bottom: 2px !important;
        }
        
        #bouton {
            margin-bottom: 10%;
            margin-top: 10%;
            margin-left: 120%;
            background: linear-gradient(to right, #ff0000 0%, #172646 85%);
            transition: 0.5s;
        }
        
        #bouton:hover {
            color: white;
            background: #172646;
        }
        
        @media screen and (max-width: 996px) {
            .milieu {
                height: auto;
            }
        }
        
        @media screen and (max-width: 700px) {
            .milieu {
                height: auto;
            }
        }
        
        @media screen and (max-width: 995px) {
            #bouton {
                margin-left: 2%;
            }
        }
    </style>
</head>

<body style="background: gainsboro;">
    <?php  
    include("head.php");
    ?>
    <!-- tabs reservation et enregistrement-->
    <section class="milieu" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(img/avion.jpg)no-repeat fixed center; ">
        <div class=" container tab1 col s12 m9 l6" style="width: 77%;">

            <ul id="tabs-swipe-demo" class=" tabs col s12 m9 l6">
                <li class="tab col s4"><a href="#reserver" class="active"><strong style="color:white;font-weight:bolder;">Resérver</strong></a></li>
                <li class="tab col s4"><a href="#gerer"><strong style="color:white;font-weight: bolder;">Ma réservation</strong></a></li>
                <li class="tab col s4"><a href="#enregistrer"><strong style="color:white;font-weight: bolder;">S'enregistrer</strong></a></li>

            </ul>

            <div id="reserver" class="col s12 ">


                <!--formulaire aller eller-retour-->

               <form action="selectionner_vol_aller_ch.php" method="post" style="padding: 10px 15px 0px 20px;">
					<b style="color: red; "><?php if(isset($_GET['err'])) {
                               echo $_GET['err'];
                                         } ?></b>
                    <!--radio button-->
                    <div class="row">
                        <div class="col s12 m6 l3">
                            <p>
                                <label>
             <input  style="color:#172646;" name="group1" type="radio" checked onclick="document.getElementById('date_retour').style.display='none';apparaitresimple();cachermulti()"  />
     
                                        
                                        <span>Aller_simple</span>
                                                            </label>
                            </p>
                        </div>
                        <div class="col s12 m6 l3">
                            <p>
                                <label>
        <input name="group1" type="radio"  onclick="document.getElementById('date_retour').style.display='block';apparaitresimple();cachermulti()" />
        <span>Aller_Retour</span>
      </label>
                            </p>
                        </div>



                        <!-- <div class="col s12 m6 l3">
                            <p>
                                <label>
        <input name="group1" type="radio" onclick="apparaitremulti();cachersimple()" />
        <span>Multi_destinations</span>
      </label>
                            </p>
                        </div> -->

                    </div>

                    <div id="allersimple">
                        <!--input-->
                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">flight_takeoff</i>
                                        <input type="text" id="autocomplete1" class="autocomplete" name="aeroport_aller"  pattern="[a-zA-Z \S]+" required>
                                        <label for="autocomplete1">Aéroport_Aller</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">flight_land</i>
                                        <input type="text" id="autocomplete2" class="autocomplete"  pattern="[a-zA-Z \S]+" name="aeroport_arrive" required>
                                        <label for="autocomplete2">Aéroport_Arrivé</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col s12 m6 l3">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">event</i>
                                        <input type="date" id="date_aller" min="<?php //echo date("Y-m-d");?>" name="date_aller" required>
                                        <label for="date_aller">Date_aller</label>
                                    </div>
                                </div>
                            </div>

                            <!--on cache la date de retour en aller simple-->
                            <div class="row" id="date_retour">
                                <div class="col s12 m6 l3">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">event</i>
                                            <input type="date" min="<?php //echo date("Y-m-d");?>" name="date_retour" >
                                            <label for="date_retour">Date_Retour</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row passager">

                            <div class="col s12 m6 l3">
                                <div class="input-field col s12 ">
                                    <input type="number" id="adultes"  max="9" min="1" name="adulte" required>
                                    <label for="adultes">Passagers_adultes</label>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="input-field col s12 ">
                                    <input type="number" id="enfants" max="8" min="0" name="enfant">
                                    <label for="enfants">Passagers_enfants</label>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="input-field col s12 ">
                                    <input type="number" id="bebee" max="4" min=0 name="bebe">
                                    <label for="bebee">Passagers_bébé</label>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="input-field col s12">
                                    <select name="classe" required>
      <option value="" disabled selected>Choisissez une classe</option>
      <option value="première_classe">Premiére classe</option>
      <option value="economique">Economique</option>
     <option value="économie premium">Economique Prémium</option>                                    
      <option value="affaire">Affaire</option>
    </select>
                                    <label>Classes</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 l4">
                                <div class="input-field col s12">
                                    <select  name="devise" required>
                                    <option value="" disabled selected>Devise</option>
                                    <option value="Dinar(DZD)">Dinar (Algérien)</option>
                                    <option value="Euro €">Euro €</option>
                                    <option value="Dollars $">Dollars $(Américain)</option>
                                  </select>

                                </div>
                            </div>
                            <div class="col s4 center"><button type="submit" class="btn submit" id="bouton">Rechercher</button></div>
                        </div>
                    </div>
                </form>
                <!--formulaire multidestination que je v cacher-->
                <form style="display: none" id="Multidestination">
                    <div class="row">
                        <div class="col s12 m6 l3">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">flight_takeoff</i>
                                    <input type="text" id="autocomplete11" class="autocomplete">
                                    <label for="autocomplete11">Aéroport_Aller</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">flight_land</i>
                                    <input type="text" id="autocomplete12" class="autocomplete">
                                    <label for="autocomplete12">Aéroport_Retour</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l4">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">event</i>
                                    <input type="date" id="date">
                                    <label for="date_aller">Date_aller</label>
                                </div>
                            </div>
                        </div>
                        <div class=" col s12 m4 l1"> <a class="btn-floating btn-small waves-effect waves-light" onclick="document.getElementById('vol2').style.display='block'"><i class="material-icons">add</i></a></div>

                    </div>

                    <div class="row" id="vol2" style="display: none;">
                        <div class="col s12 m6 l3">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">flight_takeoff</i>
                                    <input type="text" id="autocomplete3" class="autocomplete">
                                    <label for="autocomplete3">Aéroport_Aller</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">flight_land</i>
                                    <input type="text" id="autocomplete4" class="autocomplete">
                                    <label for="autocomplete4">Aéroport_Retour</label>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6 l4">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">event</i>
                                    <input type="date" id="date">
                                    <label for="date_aller">Date_aller</label>
                                </div>
                            </div>
                        </div>
                        <div class=" col s12 m4 l1"> <a class="btn-floating btn-small waves-effect waves-light" onclick="document.getElementById('vol3').style.display='block'"><i class="material-icons">add</i></a></div>
                        <div class=" col s12 m4 l1"> <a class="btn-floating btn-small waves-effect waves-light" onclick="document.getElementById('vol2').style.display='none'"><i class="material-icons">clear</i></a> </div>

                    </div>

                    <div class="row" style="display: none; " id="vol3">
                        <div id="volmultiple">
                            <div class="col s12 m6 l3">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">flight_takeoff</i>
                                        <input type="text" id="autocomplete5" class="autocomplete">
                                        <label for="autocomplete5">Aéroport_Aller</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">flight_land</i>
                                        <input type="text" id="autocomplete6" class="autocomplete">
                                        <label for="autocomplete6">Aéroport_Retour</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l4  dta">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">event</i>
                                        <input type="date" id="date">
                                        <label for="date_aller">Date_aller</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col s12 m4 l1"> <a class="btn-floating btn-small waves-effect waves-light" onclick="document.getElementById('vol4').style.display='block'"><i class="material-icons">add</i></a></div>
                        <div class=" col s12 m4 l1"> <a class="btn-floating btn-small waves-effect waves-light" onclick="document.getElementById('vol3').style.display='none'"><i class="material-icons">clear</i></a> </div>
                    </div>
                    <div class="row" style="display: none; " id="vol4">
                        <div id="volmultiple">
                            <div class="col s12 m6 l3">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">flight_takeoff</i>
                                        <input type="text" id="autocomplete7" class="autocomplete">
                                        <label for="autocomplete8">Aéroport_Aller</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">flight_land</i>
                                        <input type="text" id="autocomplete9" class="autocomplete">
                                        <label for="autocomplete9">Aéroport_Retour</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l4  dta">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">event</i>
                                        <input type="date" id="date">
                                        <label for="date_aller">Date_aller</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col s12 m4 l1"> <a class="btn-floating btn-small waves-effect waves-light" onclick="document.getElementById('vol5').style.display='block'"><i class="material-icons">add</i></a></div>
                        <div class=" col s12 m4 l1"> <a class="btn-floating btn-small waves-effect waves-light" onclick="document.getElementById('vol4').style.display='none'"><i class="material-icons">clear</i></a> </div>
                    </div>
                    <div class="row" style="display: none; " id="vol5">
                        <div id="volmultiple">
                            <div class="col s12 m6 l3">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">flight_takeoff</i>
                                        <input type="text" id="autocomplete10" class="autocomplete">
                                        <label for="autocomplete10">Aéroport_Aller</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">flight_land</i>
                                        <input type="text" id="autocomplete11" class="autocomplete">
                                        <label for="autocomplete11">Aéroport_Retour</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l4  dta">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">calendar_today</i>
                                        <input type="date" id="date">
                                        <label for="date_aller">Date_aller</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=" col s12 m4 l1"> <a class="btn-floating btn-small waves-effect waves-light" onclick="document.getElementById('vol5').style.display='none'"><i class="material-icons">clear</i></a> </div>
                    </div>


                    <div class="row passager">

                        <div class="col s12 m6 l3">
                            <div class="input-field col s12 ">
                                <input type="number" id="adulte" max="9" min="0">
                                <label for="adulte">Passagers_adulte</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="input-field col s12 ">
                                <input type="number" id="enfant" max="9" min="0">
                                <label for="enfant">Passagers_enfants</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l3">
                            <div class="input-field col s12 ">
                                <input type="number" id="bebe" max="9" min="0">
                                <label for="bebe">Passagers_bébé</label>
                            </div>
                        </div>
                        <div class="row classes">
                            <div class="col s12 m6 l3">
                                <div class="input-field col s12">
                                    <select>
      <option value="" disabled selected>Choisissez une classe</option>
      <option value="1">Premiére classe</option>
      <option value="2">Economique</option>
     <option value="2">Economique Prémium</option> 
      <option value="3">Affaire</option>
    </select>
                                    <label>Classes</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col s12 m6 l4">
                                <div class="input-field col s12">
                                    <select>
                                            <option value="" disabled selected>Devise</option>
                                            <option value="1">Dinar (Algérien)</option>
                                            <option value="2">Euro €</option>
                                            <option value="3">Dollars $ (Américain)</option>
                                          </select>

                                </div>
                            </div>
                            <div class="col s4 center"><a class="btn submit" id="bouton">Rechercher</a></div>
                        </div>

                    </div>
                </form>
            </div>
            <div id="gerer" class="col s12">

                
					 <!-- formulaire MA RESERVATION -->
                <form action="function_gest_reserv.php" method="post">
					<?php if((isset($_GET['err']) AND !empty($_GET['err']))){
                    ?><br><b style="color: red;" ><?php echo $_GET['err']; ?></b>
                    <?php } ?>   
            

                    <div class="row">
                        <div class="col s12 m6 l5 ">
                            <div class="row" style="padding-left: 10px;">
                                <div class="input-field col s12">
                                    <input type="password" id="code_reservation" class="code_reservation" name="num_reserv" maxlength="10" pattern="[a-zA-Z0-9 \S]+" required>
                                    <label for="code_reservation">Référence Réservation </label>
                                </div>
                            </div>
							<span><?php  if((isset($_GET['err1']) AND !empty($_GET['err1']))){
      
                                ?><br><b style="color: red;" ><?php echo $_GET['err1']; ?></b>
              
                               <?php }     ?> </span> 
                        </div>


                    </div>
                    <div class="row">
                        <div class="col s12 m6 l5">
                            <div class="input-field col s12">
                                <input type="text" id="nom" class="nom"  name="nom_passager" maxlength="90" pattern="[a-zA-Z \S]+"   required>
                                <label for="nom"> Nom De Famille</label>
                            </div>
							<span><?php  if((isset($_GET['err2']) AND !empty($_GET['err2']))){
      
                                ?><br><b style="color: red;" ><?php echo $_GET['err2']; ?></b>
              
                               <?php }     ?> </span>  
                        </div>
                        <div class="col s4"><button type="submit" class="btn submit" id="bouton">Consulter</button></div>
                    </div>
                </form>

            </div>


            <!--formulaire d'enregistrement-->
            <div id="enregistrer" class="col s12">
            <span><?php
                        if(!empty($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?></span>
                <form id="enregistrement" style=" padding-left: 60px;"method="POST" action="cible.php">

                    <div class="row">
                        <div class="col s12 m6 l5 ">
                            <div class="row" style="padding-left: 10px;">
                                <div class="input-field col s12">
                                    <input type="password" id="code_reservation" class="code_reservation" name="mdp">
                                    <label for="code_reservation">Référence Réservation </label>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col s12 m6 l5">
                            <div class="input-field col s12">
                                <input type="text" id="nom" name="nom" class="nom">
                                <label for="nom"> nom de famille</label>
                            </div>
                        </div>
                        <div class="col s4"><input type="submit" class="btn submit" id="bouton" value="S'enregistrer"/></div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!---carte promotion-->
    <section class="secpromo" style="background: gainsboro;">
        <h4 class="center" id="titre" style="color:#172646;">Promotions</h4>
        <div class="container">
            <div class="row">
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="img/paris.png" id="imgcarte">
                        </div>
                        <div class="card-content">
                            <a class="card-title activator grey-text text-darken-4 center"> Alger-Paris</a>

                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l4">
                    <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="img/espagne.png" id="imgcarte">
                        </div>
                        <div class="card-content">
                            <a class="card-title activator grey-text text-darken-4 center">Oran-Espagne</a>

                        </div>

                    </div>
                </div>



                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="img/italie.png" id="imgcarte">
                        </div>
                        <div class="card-content">
                            <a class="card-title activator grey-text text-darken-4 center">Alger-Italie</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--destination-->

    <section class="secnosdest">
        <div class="incline">

        </div>
        <div class="container" style="margin-bottom: 15px;width: 100%;">
            <h4 class="center" id="titre" style="color: white;">Nos Déstinations</h4>
            <div class="row">
                <div class="col s12 m6 l3">
                    <div class=" card " style="
                    background: gainsboro;
                ">
                        <div class="card-image">
                            <img src="img/villeeuro.jfif" id="imgcarted">
                        </div>
                        <div class="card-content">
                            <a href="europe.php" style="color: black;" class="card-title activator grey-text text-darken-4">Europe</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class=" card" style="
                    background: gainsboro;
                ">
                        <div class="card-image">
                            <img src="img/elephant.jfif" id="imgcarted">
                        </div>

                        <div class="card-content">
                            <a href="afrique.php" style="color: black;" class="card-title activator grey-text text-darken-4">Afrique</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class=" card" style="
                    background: gainsboro;
                ">
                        <div class="card-image">
                            <img src="img/japan.jfif" id="imgcarted">
                        </div>
                        <div class="card-content">
                            <a href="asie.php" style="color: black;" class="card-title activator grey-text text-darken-4">Asie</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class=" card " style="
                    background: gainsboro;
                ">
                        <div class="card-image">
                            <img src="img/villeameric.jfif" id="imgcarted">
                        </div>
                        <div class="card-content">
                            <a href="amerique.php" style="color: black;" class="card-title activator grey-text text-darken-4">Amérique</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="incline2">

        </div>
    </section>
    <!--preparer votre voyage-->
    <section class="secprepare">
        <h4 class="center" id="titre" style="color:#172646;">Préparer votre voyage </h4>
        <div class="container">
            <div class="row">
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="img/avantv.jpg" id="imgcarte">
                        </div>
                        <div class="card-content">
                            <a class="card-title activator grey-text text-darken-4 center" href="preparervoyage-avant.php">Avant-Voyage</a>
                        </div>

                    </div>
                </div>
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="img/aeroport.jfif" id="imgcarte">
                        </div>
                        <div class="card-content">
                            <a class="card-title activator grey-text text-darken-4 center" href="preparervoyage_aeroport.php">A l'aéroport</a>

                        </div>
                    </div>

                </div>
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="img/arrivé.jfif" id="imgcarte">
                        </div>
                        <div class="card-content">
                            <a class="card-title activator grey-text text-darken-4 center" href="preparevoyage_arrive.php">A l'arrivée</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="secpayment">
        <div class="incline">

        </div>
        <h4 class="center" id="titre">Mode De Paiement</h4>
        </div><br>
        <div class="container" style="margin-bottom:30px;">
            <div class="row payement" style="text-align:center;">
                <div class="col s6 m3 l3">
                    <img src="img/cib.svg" class="payer" id="imagepayer" style="width: 50px;">
                </div>
                <div class="col s6 m3 l3">
                    <img src="img/AlgeriePoste.svg" class="payer" id="imagepayer" style="width: 45px;">
                </div>
                <div class="col s6 m3 l3">
                    <img src="img/MasterCard.svg" class="payer" id="imagepayer">
                </div>
                <div class="col s6 m3 l3">
                    <img src="img/Visa.svg" class="payer" id="imagepayer">
                </div>
            </div>
        </div>
        <div class="incline2">

        </div>
    </section>




    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.tabs').tabs();
            $('select').formSelect();
            $('input.autocomplete').autocomplete
            $('.slider').slider();
        });

        $(document).ready(function() {
            // $('input.autocomplete').autocomplete({
            //     data: {
            //         "Illizi": null,
            //         "Hassi Messaoud": null,
            //         "Alger": null,
            //         "Paris": null,
            //         "Espagne": null,
            //         "Annaba": null,
            //         "Merrakech": null,
            //         "Nouacer": null,
            //         "caire": null,
            //         "hammamet": null,
            //         "Carthage": null,
            //         "Abidjan": null,
            //         "Moscou": null,
            //     },
            // });
        });

        function apparaitremulti() {
            var show = document.getElementById('Multidestination');
            show.style.display = "block";

        }

        function apparaitresimple() {
            var show = document.getElementById('allersimple');
            show.style.display = "block";

        }

        function cachersimple() {
            var cacher = document.getElementById('allersimple');
            cacher.style.display = "none";
        }

        function cachermulti() {
            var cacher = document.getElementById('Multidestination');
            cacher.style.display = "none";
        }
    </script>
    <?php  
    include("footer.php");
    ?>
</body>



</html>