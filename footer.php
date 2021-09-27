<!DOCTYPE html>
<html>

<head>
    <title>footer</title>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">


</head>

<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
    .ftr {
        display: flex;
        width: 100%;
    }
    
    .foot {
        display: block;
        width: 100%;
        margin-left: 1%;
    }
    
    body {
        display: block;
        margin: 0px;
    }
    
    .footer-footer {
        font-size: 12px;
        letter-spacing: 0.02em;
        font-family: "Montserrat", Helvetica, Arial, sans-serif;
        height: auto;
        padding-top: 0px;
        background-color: #172646;
        padding-bottom: 0px;
    }
    
    .footer-footer p {
        display: block;
        color: #fff;
    }
    
    .footer-footer h3 {
        margin-top: 0px;
        padding-right: 20px;
        color: gold;
        font-size: 17px;
        font-family: "Montserrat";
    }
    
    .footer-footer a {
        color: #fff;
        font-size: 1.05em;
        text-decoration: none;
    }
    
    .footer-footer a:hover {
        text-decoration: underline;
        color: gold;
    }
    
    .para .text-dark {
        color: #d6d6d6;
        text-align: center;
        margin: 0px;
        font-weight: lighter;
    }
    
    h4 .text-dark:hover {
        color: gold;
    }
    
    .attrib {
        padding-left: 5%;
    }
    
    .footericon {
        list-style: none;
        display: flex;
        padding-left: 0%;
    }
    
    .footericon li {
        margin: 3%;
    }
    
    .icon-facebook:hover {
        color: #3b5999;
        padding-bottom: 5%;
    }
    
    .icon-pinterest:hover {
        color: darkred;
    }
    
    .icon-twitter:hover {
        color: deepskyblue;
    }
    
    .incline-footer {
        background: linear-gradient(135deg, transparent 0, transparent 58%, #172646 58%, #172646 100%);
        width: 100%;
        height: 20px;
    }
    
    .footer {
        margin-top: 0px;
        padding-top: 10px;
    }
    
    @media screen and (max-width: 720px) {
        .ftr {
            display: block;
        }
        .footer-footer {
            text-align: center;
        }
        .footericon {
            padding: 10%;
        }
        .attrib {
            text-align: center;
            padding-left: 0%;
        }
        .footer {
            text-align: center;
            margin-top: 0px;
            padding-top: 22px;
        }
        .footer-footer h3 {
            font-size: 1em;
            margin-top: 0px;
            margin-top: 0px;
            padding-top: 22px;
        }
    }
</style>

<body>
    <footer>

        <div class="incline-footer">

        </div>
        <div class="footer-footer">
            <div class="ftr">


                <div class="foot">
                    <h3 class="footer">Service client :</h3>
                    <div class="attrib">
                        <p><a class=" " href="faq.php" aria-hidden="true">Remboursements</a></p>
                        <p><a class=" " href="faq.php" aria-hidden="true">Réclamations</a></p>
                        <p><a class=" " href="faq.php" aria-hidden="true">Info-payements</a></p>
                    </div>
                </div>

                <div class="foot">
                    <h3 class="footer">A propos de nous :</h3>
                    <div class="attrib">
                        <p><a class=" "  aria-hidden="true">Creation de la company</a></p>
                        <p><a class=" "  aria-hidden="true">Notre politique</a></p>
                        <p><a class=" " href="flotte.php" aria-hidden="true">Notre equipe</a></p>
                        <p><a class=" "  aria-hidden="true">Reglement</a></p>
                    </div>
                </div>

                <div class="foot">
                    <h3 class="footer">Contactez-nous :</h3>
                    <div class="attrib">

                        <p>Gmail:AirDorado@gmail.com</p>
                        <p>Tél :+213673279493
                        </p>
                    </div>

                    <div class="socialNavbar">
                        <ul class="footericon" style="padding-left: 55px;">


                            <li>
                                <a href="https://www.facebook.com/" class="icon-facebook" title="Facebook">
                                    <span style="font-size: 1.5em;"><i class="fab fa-facebook-f"></i>
                           </span></a>
                            </li>

                            </li>
                            <li>
                                <a href="https://twitter.com/" class="icon-twitter" title="Twitter">
                                    <span style="font-size: 1.5em;"><i class="fab fa-twitter"></i>
                           </span></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/" class="icon-linkedin" title="LinkedIn">
                                    <span style="font-size: 1.5em;"><i class="fab fa-linkedin-in"></i>
                          </span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="foot">
                    <h3 class="footer">Liens :</h3>
                    <div class="attrib">
                        <p><a class=" "  aria-hidden="true">Newsletter</a></p>
                    </div>
                </div>

            </div>
            <div class="para">

                <h6 class="text-dark">© <span id="copyright-year">2019</span> All Rights Reserved Terms of Use and
                    <a class="text-dark">Privacy Policy</a></h6>


            </div>
        </div>
    </footer>

</body>

</html>