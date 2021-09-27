<?php
session_start();
require'connexion_bdd.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="./css/materialize.min.css">
    <link rel="stylesheet" href="./css/choixmenu.css">
    <title>Choix Menu</title>
</head>

<body>
     <?php  
    include("head.php");
    ?>
    <div class="nosservicestitre">
        <h1 class="center-align">Choix de votre menu</h1>
    </div>
    <div class="row">
        <div class="ecriture ">
            <h4>HEADING</h4>
            <p>Lorem ghxlkcjdj wnvkwdhfdlvkv nvlhdwlh</p>

        </div>
    </div>
    <form action="function_choixmenu.php" method="post">
    <?php
     $sql='SELECT nom, prenom, type FROM client_passager WHERE reservation_id=:id';
     $requete = $bdd->prepare($sql);
     $requete->execute(array('id'=> $_SESSION['id_reserv']));
     $i=1;
     
     while($donnee=$requete->fetch() AND ($i<=count($donnee)) ){
        
    ?>
    <div class="row passagers">

        <div class="col s1.5">
            <h5>
                <i class="material-icons">person</i> Passager <?php echo $i; ?> :</h5>

        </div>
        <div class=" col s4 ">
            <h5><?php echo $donnee['nom'].' '.$donnee['prenom'].' ('.$donnee['type'].')'; ?></h5>
        </div>

        <div class="col s5">
            <div class="row" style="display: flex;padding-bottom: 0%;">
                <img class="materialboxed" src="./img/repas.png" alt="repas" width="200px" height="130px">
                <img class="materialboxed" src="./img/repasprem.jpg" alt="repas" width="200px" height="130px">
            </div>
        </div>


    </div>
    <div class="row ">
        <div class="input-field col s8 m8 ">
            <div class="bordure ">
                <select class="icons " name="menu<?php echo $i; ?>">
              <option value=" " disabled selected>Choisir votre menu</option>
                    <?php
                    $sql_m='SELECT nom, lien_image FROM menu ';
                    $requete_m = $bdd->prepare($sql_m);
                    $requete_m->execute();
                    
                    while($donnee_m=$requete_m->fetch()){
                        ?>
              <option  value="<?php echo $donnee_m['nom'] ?>" data-icon="<?php echo $donnee_m['lien_image']; ?> " class="left " ><?php echo $donnee_m['nom'];  ?></option>
              <?php } ?>
             
                </select>

            </div>

        </div>
    </div>
    <?php $i++; }
        $nbr_passager=$i-1;
        $_SESSION['nbr_passager']=$nbr_passager; ?>
        <div class="col s4 m4 " id="ok ">
            <button type="submit"  class="waves-effect waves-light btn-large " id="bouton " style=" background-color: #172646;margin-top: 15px; ">OK</button>
        </div>
    </form>
 







 <?php  
    include("footer.php");
    ?>

    <!--JavaScript at end of body for optimized loading-->
    <script src="./js/jquery-3.4.1.min.js ">
    </script>
    <script src="./js/materialize.min.js "></script>

    <script>
        $(document).ready(function() {
            $('select').formSelect();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.materialboxed').materialbox();
        });
    </script>
</body>

</html>