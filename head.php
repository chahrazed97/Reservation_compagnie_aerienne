<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/logo.PNG">
    <link rel="stylesheet" href="css/connexion-inscription.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="css/materrialize.min.css">
    <!-- Compiled and minified Jquery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="js/materialize.min.js"></script>
    <!-- Compiled and minified fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="css/fontawesome.min.css">

</head>
<style>
    * {
        font-family: "Montserrat", Helvetica, Arial, sans-serif;
    }
    .card{
    transition: 0.3s;
    }
    .card:hover{
        transform: scale(1.05);
    }
    
    body {
        overflow-y: auto;
        height: 100%;
        display: block;
        margin: 0px;
    }
    
    .logo {
        background: rgba(220, 220, 220, 0.5);
        width: 100%;
        height: 85px;
    }
    
    .menunavigation {
        background: linear-gradient(135deg, transparent 0, transparent 22.5%, #172646 22.5%, #172646 100%);
        width: 100%;
        height: 35px;
        font-size: 18px;
        margin-top: -35px;
        font-size: 16px;
        box-shadow: 0 10px 6px 0 rgba(32, 33, 36, 0.28);
        transition: .3s all ease;
    }
    
    .sticky {
        z-index: 1998;
        position: fixed;
        top: -30px;
    }
    
    .animate {
        top: 35px;
        z-index: 1998;
        background: #172646;
    }
    
    .navigation {
        height: 53px;
        padding-left: 20%;
        text-shadow: 0px 0px 2px dodgerblue;
        transition: all 0.3s ease 0s;
    }
    
    .brand {
        position: absolute;
        float: left;
    }
    
    .brand a,
    .brand a:visited {
        color: #ffffff;
        text-decoration: none;
    }
    
    .imagelogo {
        margin-top: -5px;
        width: 175px;
        height: 100px;
    }
    
    .nav-container {
        max-width: 1000px;
        margin: 0 auto;
    }
    
    nav {
        box-shadow: 0px 0px;
    }
    
    .navigmobi {
        float: right;
    }
    
    .imagelogomobile {
        display: none;
    }
    
    .threedots {
        display: none;
        position: absolute;
        top: 0px;
        right: 30px;
    }
    
    .threedotsmenu {
        display: grid;
        position: absolute;
        right: 0%;
        width: 25%;
        background-color: #172646;
        display: none;
    }
    
    .threedotsmenu a,
    .threedotsmenu a:visited {
        display: block;
        padding: 0 20px;
        line-height: 50px;
        background: #172646;
        color: #ffffff;
        text-decoration: none;
    }
    
    .threedotsmenu a:hover,
    .threedotsmenu a:visited:hover {
        background: #2581DC;
    }
    
    .navigmobi ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    
    .navigmobi ul li {
        float: left;
        position: relative;
    }
    
    .navigmobi ul li a,
    .navigmobi ul li a:visited {
        display: block;
        padding: 0 20px;
        line-height: 35px;
        color: #ffffff;
        text-decoration: none;
    }
    
    .navigmobi ul li a:hover,
    .navigmobi ul li a:visited:hover {
        color: gold;
        border-bottom: 2px solid gold;
    }
    
    .navigmobi ul li ul li {
        min-width: 190px;
    }
    
    .navigmobi ul li ul li a {
        padding: 15px;
        line-height: 20px;
    }
    
    .nav-dropdown {
        position: absolute;
        display: none;
        z-index: 1;
        background-color: #172646
    }
    
    .dessusmenu {
        display: flex;
    }
    
    .dessumenuconnexion {
        display: flex;
    }
    
    .comptedessusmenu {
        display: flex;
        position: absolute;
        left: 86%;
        top: 13px;
    }
    
    .dessumenuseconnecter {
        width: 145px;
        height: 25px;
        color: #172646;
        text-align: center;
    }
    
    .dessumenuseconnecter:hover,
    .dessumenuinscrire:hover {
        background-color: ghostwhite;
        color: gold;
    }
    
    .liencontacternous {
        text-shadow: 0px 0px 0px;
        color: #172646;
        font-size: 14px;
    }
    
    .admin:hover {
        color: gold;
    }
    
    .admin {
        color: #172646;
        margin-left: 30px;
    }
    
    .dessumenuinscrire {
        width: 125px;
        height: 25px;
        color: #172646;
        text-align: center;
        margin: 1px;
    }
    /* Search */
    
    @import "compass/css3";
    /***********************
 * Essential Structure *
 ***********************/
    
    #flexsearch--wrapper {
        height: auto;
        width: auto;
        max-width: 100%;
        overflow: hidden;
        background: transparent;
        margin: 0;
        position: static;
    }
    
    #flexsearch--form {
        overflow: hidden;
        position: relative;
    }
    
    #flexsearch--input-wrapper {
        padding: 0 6px 0 0;
        /* Right padding for submit button width */
        overflow: hidden;
    }
    
    #flexsearch--input {
        width: 100%;
    }
    /***********************
 * Configurable Styles *
 ***********************/
    
    #flexsearch {
        padding: 0 0px 0 0px;
        /* Padding for other horizontal elements */
    }
    
    #flexsearch--input {
        margin: 0px -30px 0px 10px;
        box-shadow: 1px 1px 5px 0px rgba(32, 33, 36, 0.28);
        background-color: rgba(32, 81, 117, 0.05);
        border: 1px;
        border-color: #172646;
        width: 250px;
        height: 15px;
        font-size: 13px;
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        padding: 0 45px 1px 25px;
        border-radius: 35px;
        /* (height/2) + border-width */
        color: #333;
        font-family: 'Helvetica', sans-serif;
        font-size: 16px;
        -webkit-appearance: none;
        -moz-appearance: none;
    }
    
    #flexsearch--submit {
        position: absolute;
        right: 0;
        top: 0;
        display: block;
        width: 60px;
        height: 60px;
        padding: 0;
        border: none;
        margin-top: 20px;
        /* margin-top + border-width */
        margin-right: 5px;
        /* border-width */
        background: transparent;
        color: #888;
        font-family: 'Helvetica', sans-serif;
        font-size: 40px;
        line-height: 60px;
    }
    
    #flexsearch--input:focus {
        border-color: #4dabf7;
        outline: none;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.0125), 0 0 8px rgba(34, 139, 230, 0.5);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.0125), 0 0 8px rgba(34, 139, 230, 0.5);
    }
    
    #flexsearch--input:focus.flexsearch--submit {
        color: #333;
    }
    
    .flexsearch--submit:hover {
        color: #333;
        cursor: pointer;
    }
    
     ::-webkit-input-placeholder {
        color: #888;
    }
    /* Mobile navigation */
    
    .nav-mobile {
        display: none;
        position: absolute;
        top: 80px;
        right: 20px;
        background: #172646;
        height: 53px;
        width: 53px;
    }
    
    #nav-toggle {
        position: absolute;
        left: 18px;
        top: 22px;
        cursor: pointer;
        padding: 10px 35px 16px 0px;
    }
    
    #nav-toggle span,
    #nav-toggle span:before,
    #nav-toggle span:after {
        cursor: pointer;
        border-radius: 1px;
        height: 5px;
        width: 35px;
        background: #ffffff;
        position: absolute;
        display: block;
        content: '';
        transition: all 300ms ease-in-out;
    }
    
    #nav-toggle span:before {
        top: -10px;
    }
    
    #nav-toggle span:after {
        bottom: -10px;
    }
    
    #nav-toggle.active span {
        background-color: transparent;
    }
    
    #nav-toggle.active span:before,
    #nav-toggle.active span:after {
        top: 0;
    }
    
    #nav-toggle.active span:before {
        transform: rotate(45deg);
    }
    
    #nav-toggle.active span:after {
        transform: rotate(-45deg);
    }
    
    article {
        max-width: 1000px;
        margin: 0 auto;
        padding: 10px;
    }
    
    @media only screen and (max-width: 836px) {
        .threedots {
            display: block;
        }
        .threedotsmenu {
            width: 50%;
            z-index: 1999;
        }
        .imagelogomobile {
            display: block;
            width: 88px;
            position: fixed;
            top: 0px;
            margin-left: -18%;
        }
        .nav-mobile {
            display: block;
            top: -7px;
        }
        .logo {
            display: none;
        }
        .menunavigation {
            z-index: 1998;
            margin-top: 0px;
            background: #172646;
            height: 52px;
        }
        .animate {
            top: 0px;
        }
        .nav-list {
            background-color: #172646;
            position: absolute;
            right: 0;
            width: 50%;
            z-index: 1999;
        }
        .navigmobi {
            width: 100%;
            padding: 53px 0px 0 0;
        }
        .navigmobi ul {
            display: none;
        }
        .navigmobi ul li {
            float: none;
        }
        .navigmobi ul li a {
            padding: 15px;
            line-height: 20px;
        }
        .navigmobi ul li ul li a {
            padding-left: 0px;
        }
        .nav-dropdown {
            position: static;
            font-size: 13px;
            text-align: center;
        }
    }
    
    @media screen and (min-width: 799px) {
        .nav-list {
            display: block;
        }
        .threedotsmenu {
            display: none;
        }
    }
    
    @media screen and (min-width:798px)and (max-width:836) {
        .navigmobi ul li a,
        .navigmobi ul li a:visited {
            font-size: 16px;
        }
    }
    
    @media screen and (min-width: 836px) and (max-width: 1011px) {
        .menubar {
            margin: 0px 20px;
        }
        .navigmobi ul li a,
        .navigmobi ul li a:visited {
            font-size: 12px;
            padding: 0 13px;
        }
    }
    
    @media screen and (min-width: 836px) {
        .navigmobi {
            background-color: transparent;
        }
    }
    
    @media screen and (min-width: 1138px) {
        .menubar {
            margin: 0 2em;
        }
        .imagelogo {
            width: 150px;
            height: 116px;
            margin-top: -20px;
        }
    }
</style>

<body>
    <div class="headerglobal" style="background-color: #fff;">
        <div class="logo ">

            <div class="brand">
                <a href="index.php"><img class="imagelogo" src="img/logo.svg" alt="Air Dorado"></a>
            </div>
            <div class="dessusmenu">

                <div class="comptedessusmenu">
                    <!-- <div id="flexsearch">
                        <div id="flexsearch--wrapper">
                            <form id="flexsearch--form" action="#" method="post">

                                <div id="flexsearch--input-wrapper">

                                    <input id="flexsearch--input" type="search" placeholder="Recherche">
                                    <i class="fas fa-search" style="margin-right: 13px; font-size: 13px;"></i>
                                </div>


                            </form>
                        </div>
                    </div> -->
                    <div class="dessumenucontacternous">

                        <a class="liencontacternous" href="contact.php">Contacter Nous </a>
                        <a class="liencontacternous admin" href="authentification.php">@</a>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <div class="menunavigation">
        <section class="navigation">

            <div class="nav-container">


                <div>
                    <div class="navigmobi">

                        <a href="#!"><img class="imagelogomobile" src="img/logo4.svg" alt="Air Dorado"></a>
                        <!--                         
                        <div class="threedots">
                            <a href="#!"><span style="color:#fff;font-size: 1.8em;">
                                    <i class="fas fa-ellipsis-v"></i></span></a>
                        </div>
                        <div class="threedotsmenu">
                            <a href="#!"><i class="fas fa-globe"></i> language</a>

                            <a href="#!"><i class="fas fa-sign-in-alt"></i> Se connecter</a>

                            <a href="#!"><i class="fas fa-user-check"></i> S'inscrire</a>


                        </div> -->







                        <div class="nav-mobile"><a class="liencontacternous admin" href="authentification.php">@</a><a id="nav-toggle" href="#!"><span></span></a></div>
                        <ul class="nav-list">
                            <li class="menubar">
                                <a href="index.php"><span style="font-size: 1em;"><i class="fas fa-home"></i></span> Acceuil</a>
                            </li>
                            <li class="menubar">
                                <a href="nosservices.php"><span style="font-size: 1em;"><i class="fas fa-plane-departure"></i></span> Nos Services</a>
                            </li>

                            <li class="menubar">
                                <a href="hotelvehicule.php"><span style="font-size: 1em;"><i class="fas fa-bed"></i></span> Hôtel & Véhicule</a>
                            </li>
                            <li>
                                <a href="#!"><span style="font-size: 1em;"><i class="fas fa-info-circle"></i></span> Informations<span style="padding:6px 0 0 6px"> <i class="fas fa-chevron-down" ></i></span></a>
                                <ul class="nav-dropdown">
                                    <li>
                                        <a href="destinations.php">Nos Destinations</a>
                                    </li>
                                    <li>
                                        <a href="classe-services.php">Classe & Services</a>
                                    </li>
                                    <li>
                                        <a href="infobagage.php" style="padding-right: 0px;">Informations Bagage</a>
                                    </li>
                                    <li>
                                        <a href="preparervotrevoyage.php">Préparer Voyage</a>
                                    </li>
                                    <li>
                                        <a href="faq.php">FAQ</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </div>
    </div>

</body>
<script>
    $(document).ready(function() {

        $(window).scroll(function() {
            var sc = $(this).scrollTop();
            if (sc > 80) {
                $('.menunavigation').addClass('sticky');
                $('.menunavigation').addClass('animate');

                $('.navigation').css('padding-left', '0')
            } else {
                $('.menunavigation').removeClass('sticky');
                $('.menunavigation').removeClass('animate');
                $('.navigation').css('padding-left', '20%')
            }
        });

        $('.threedots').click(function() {
            $('.threedotsmenu').slideToggle(300);
            $('.threedotsmenu').addClass('flex');
        });

    });
    $(document).ready(function() {
        $('.modal').modal();
    });
    $(function() {
        $(".bt-signup").click(function() {
            $(".nav-flow").toggleClass("nav-flow-up");
            $(".form-inscrip-left").toggleClass("form-inscrip-down");
            $(".success").toggleClass("success-left");

        });
    });

    $(function() {
        $(".bt-signin").click(function() {
            $(".bt-animate").toggleClass("bt-animate-grow");
            $(".welcome").toggleClass("welcome-left");
            $(".cover-photo").toggleClass("cover-photo-down");

            $(".profile-photo").toggleClass("profile-photo-down");
            $(".forgot").toggleClass("forgot-fade");
        });
    });
</script>

<script>
    (function($) {
        $(function() { // DOM ready
            $('.dropdown-trigger').dropdown();
            //Si un lien a une liste déroulante, ajoutez un sous-menu toggle
            // If a link has a dropdown, add sub menu toggle.
            $('.navigmobi ul li a:not(:only-child)').click(function(e) {
                $(this).siblings('.nav-dropdown').toggle();
                //Fermer un menu déroulant lors de la sélection d'un autre
                // Close one dropdown when selecting another
                $('.nav-dropdown').not($(this).siblings()).hide();
                e.stopPropagation();
            });
            //En cliquant en dehors du menu déroulant, la classe déroulante sera supprimée
            // Clicking away from dropdown will remove the dropdown class
            $('html').click(function() {
                $('.nav-dropdown').hide();
            });
            //Activer / désactiver les styles de navigation par clic
            // Toggle open and close nav styles on click
            $('#nav-toggle').click(function() {
                $('.navigmobi ul').slideToggle();
            });
            //Hamburger to X bascule
            // Hamburger to X toggle
            $('#nav-toggle').on('click', function() {
                this.classList.toggle('active');
            });

        }); // end DOM ready
    })(jQuery);
</script>

</html>