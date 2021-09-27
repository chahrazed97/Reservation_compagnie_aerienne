<?php
session_start();
//$url_paiement=$_SESSION['url_paiement'];
//if($_SERVER['HTTP_REFERER']===$url_paiement){
//if(isset($_SESSION['acces'])){
?>
<html>

<head>
    <link rel="stylesheet" href="iconfont/material-icons.css">

    <style>
        .titre {
            text-transform: capitalize;
            color: hsl(208, 56%, 46%);
            font-size: 20px;
        }
        
        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }
        
        input[type=reset] {
            background-color: orangered;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            height: 30px;
            margin-left: 20px;
        }
        
        input[type=submit] {
            background-color: orangered;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            align: center;
            height: 30px;
            margin-left: 20px;
        }
        
        input[type=submit]:hover {
            background-color: #45a049;
        }
        
        .row.btn {
            margin-left: 10%;
        }
        
        .container {
            margin-top: 2px;
            border-radius: 2px;
            background-color: #f2f2f2;
            padding: 2px;
            border-radius: 4px;
        }
        
        input[type=password] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            width: 25%;
        }
        
        input[type=date] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            width: 25%;
        }
        
        .col-25 {
            float: left;
            width: 25%;
            margin-top: 1px;
        }
        
        .col-75 {
            float: left;
            width: 75%;
            margin-top: 1px;
        }
        /* Clear floats after the columns */
        
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        
        @media screen and (max-width: 600px) {
            .col-25,
            .col-75,
            img,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
            * {
                font-size: 11px;
            }
        }
        
        .row {
            display: flex;
            background-color: white;
            margin-left: 6px;
            margin-right: 6px;
            margin-top: 6px;
        }
        
        .haut {
            background-color: hsl(208, 56%, 46%);
            padding-top: 10px;
        }
        
        #image {
            width: 10%;
        }
        
        .titre {
            width: 80%;
            color: cornflowerblue;
            margin-top: 60px;
            margin-left: 70px;
        }
        
        #image2 {
            margin-left: 100px;
            width: 10%;
        }
        
        .pa {
            display: flex;
            color: white;
        }
        
        .droite {
            margin-left: 60%;
        }
        
        * {
            font-family: "Montserrat", Helvetica, Arial, sans-serif;
        }
        
        body {
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;
            color: #337ab7;
        }
        
        th {
            padding: 0.5%;
            height: 5%;
            width: 10%;
            margin-right: 2%;
            color: #337ab7;
        }
        
        .info {
            background-color: white;
            border: 1px solid;
            border-color: black;
            width: 100%;
            border-radius: 4px;
        }
        
        .infop {
            background-color: #337ab7;
            border: 1px solid;
            border-color: black;
            width: 100%;
            color: white;
            border-radius: 4px;
        }
        
        .paa {
            display: flex;
            background-color: #337ab7;
            color: white;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="haut">
        <div class="blanc">
            <div class="row">
                <img src="img/cib2.png" id="image">
                <h3 class="titre">Bievenue sur la plateforme de Payement par Carte InterBancaire CIB </h3>
                <img src="img/cib2.png" id="image2">
            </div>
        </div>
        <div class="pa">
            <p class="gauche">Information du payement</p>
            <p class="droite">Votre session expirera dans:9h</p>
        </div>
        <table class="info">
            <tr>
                <th>Nom de la compagnie:AirDorado</th>
            </tr>
            <tr>
                <th>Site web: https://www.Airdorado.dz</th>
            </tr>
            <tr>
                <th>montant:<?php echo $_SESSION['total_t'].' '.$_SESSION['devise']; ?></th>
            </tr>

        </table>
    </div>
    <div class="container">
        <div class="infop">
            <p class="gauche">Information Personnel</p>
        </div>
        <form action="function_paiementCib.php" method="post">
            <b style="color: red;"><?php if(isset($_GET['pay'])){
	                                    echo $_GET['pay'];
                                         } ?></b>
            <div class="row">
                <div class="col-25">
                    <label for="codecib">Entrer votre code de carte CIB*</label>
                </div>
                <div class="col-75">
                    <input type="text" id="codecib" name="code_cib" placeholder="votre code CIB.."  maxlength="19" pattern="\d+" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="cvv">Votre CVV*</label>
                </div>
                <div class="col-75">
                    <input type="password" id="cvv" name="cvv" maxlength="4"  placeholder="votre CVV.." pattern="\d+" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="date">Date d'éxpiration*</label>
                </div>
                <div class="col-75">
                    <input type="date" id="date" name="date" min="<?php echo date("Y-m-d");?>" placeholder="" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nom">Nom</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nom" name="nom_cib" placeholder="nom .." pattern="[a-zA-Z \S]+" required/>
                </div>
            </div>
            <div class="row btn">
                <button type="submit" value="Valider">Valider</button>
                <!--<button type="submit" value="Réinitialiser"></button>-->
                <button type="reset" value="Annuler">Annuler</button>
            </div>
        </form>
        <div class="paa">
            <a style="margin-top: 10px;"><img src="img/cibinfo.PNG"></a>
            <a style="margin-top: 12px;margin-left: 83%;"><img src="img/appeler.PNG"></a>
        </div>

<?php /**} else{
     //header
     include('head.php');?>
      <div class="col s12 m7">
    <h2 class="header">ERREUR</h2>
    <div class="card horizontal">
      <div class="card-image">
        <!--<img src="https://lorempixel.com/100/190/nature/6">-->
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>Echec veuillez effectuer une nouvelle recherche.</p>
        </div>
        <div class="card-action">
          <a href="index.php">nouvelle recherche</a>
        </div>
      </div>
    </div>
  </div> 
    <?php 
     //footer
     include('footer.php');
} **/
?>
</body>

</html>