<?php 
session_start();
//$url_paiement=$_SESSION['url_paiement'];
//if($_SERVER['HTTP_REFERER']==$url_paiement){
 //if(isset($_SESSION['acces'])){
?>
<html xml:lang="en" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <link rel="stylesheet" href="./css/infopersopost.css">
    <title>Algerie Poste ECommerce</title>
    

</head>

<body>

    <div id="pagecontent">
        <table id="tableprincipal">
            <tbody>
                <tr>
                    <td>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="./img/AlgeriePoste.svg" style="margin:0px 0px 50px;width: 164px;height:190;">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="textsupport">
                                            This site supports 256-bit encryption. Confidentiality of the transmitted information is provided by Algerie Poste. Information entered will not be provided to third parties except as required by law.
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table cellpadding="0" cellspacing="0">
                            <tbody>

                                <tr>
                                    <td>
                                        <h1 class="poste_head">Informations personnelles</h1>
                                        <p class="poste_subhead">Veuillez entrer les informations de votre carte</p>
                                    </td>
                                </tr>

                                <tr>

                                    <td class=" payer_poste_form">
                                        <form name="Payment" action="function_paiement.php" method="post" id="Payment">
                                              <b style="color: red;"><?php if (isset($_GET['err_d'])){
	                                                                  echo $_GET['err_d'];
                                                                   } ?></b>
                                            <table cellpadding="8" id="tablepayement">
                                                <tbody>


                                                    <tr>
                                                        <td>
                                                            <div id="" class="poste_form_label" align="center"></div>
                                                        </td>
                                                        <td>
                                                            <table cellpadding="5px" cellspacing="0 " class="poste_info" width="100%">

                                                                <tbody>
                                                                    <tr style="background-color:#003c71;border: 2px solid #003c71 ; color: white;">
                                                                        <th>Order number</th>
                                                                        <th>Total</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border: 2px solid #003c71;">
                                                                            <div id="Numero">KGHJ735778231</div>
                                                                        </td>
                                                                        <td style="border: 2px solid #003c71; ">
                                                                            <div id="prix"><?php echo $_SESSION['total_t'].' '.$_SESSION['devise']; ?></div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="50%" align="right">
                                                            <span class="poste_form_label">Credit card number:</span>
                                                        </td>
                                                        <td>
                                                            <input class="poste_form_input" maxlength="19" id="" type="text" autocomplete="off" value="" name="num_card" pattern="\d+" required/>
                                                            <span style="color: red; display: inline; display: none; "  class="error_message"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right">
                                                            <span class="poste_form_label">year end card:</span>
                                                        </td>
                                                        <td>
                                                            <select name="MM" id="month" class="poste_form_input" style="width:130px" min="<?php echo date("m");?>" required>
                                                                <option value="01" selected="">1 - January</option>
                                                                <option value="02">2 - February</option>
                                                                <option value="03">3 - March</option>
                                                                <option value="04">4 - April</option>
                                                                <option value="05">5 - May</option>
                                                                <option value="06">6 - June</option>
                                                                <option value="07">7 - July</option>
                                                                <option value="08">8 - August</option>
                                                                <option value="09">9 - September</option>
                                                                <option value="10">10 - October</option>
                                                                <option value="11" >11 - November</option>
                                                                <option value="12">12 - December</option>
                                                                    </select> /
                                                            <select name="YYYY" id="year" class="poste_form_input" style="width:80px" min="<?php echo date("Y");?>" required>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2020">2020</option><option value="2021">2021</option>
                                                                    <option value="2022">2022</option><option value="2023">2023</option>
                                                                    <option value="2024">2024</option><option value="2025">2025</option>
                                                                    <option value="2026">2026</option><option value="2027">2027</option>
                                                                    <option value="2028">2028</option><option value="2029">2029</option>
                                                                    <option value="2030">2030</option><option value="2031">2031</option>
                                                                    <option value="2032">2032</option><option value="2033">2033</option>
                                                                    <option value="2034">2034</option><option value="2035">2035</option>
                                                                    <option value="2036">2036</option><option value="2037">2037</option>
                                                                    <option value="2038">2038</option><option value="2039">2039</option>
                                                                    <option value="2040">2040</option>
                                                                    
                                                                </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right">
                                                            <span class="poste_form_label">My name:</span>
                                                        </td>
                                                        <td>
                                                            <input class="poste_form_input" name="owner_card" maxlength="90" id="iTEXT" type="text" autocomplete="off" value="" placeholder="enter your name" pattern="[a-zA-Z \S]+" required>
                                                            <span style="color: red; display: inline; display: none; "  class="error_message"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="100%" align="right">
                                                            <span class="poste_form_label">Enter the code CVC2/CVV2:</span>
                                                            <br>
                                                            <span class="poste_form_label" style="font-size: .85em; font-style: italic;">(Located on the back of the card)
                                                            </span>
                                                            
                                                        </td>
                                                        <td>
                                                            <input class="poste_form_input" name="" maxlength="4" id="" type="password" value="" pattern="\d+" required>
                                                            <span style="color: red; display: inline; display: none; "  class="error_message"></span>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td width="100%" align="right">
                                                            <span class="poste_form_label"></span>
                                                            <br>
                                                            <span class="poste_form_label"></span>

                                                        </td>
                                                        <td>
                                                            <span class="poste_form_label"></span>
                                                        </td>
                                                        <td><span class="poste_form_label"></span></td>
                                                        <td><button type="submit" class="submit_button" id="buttonPayment" >Payer</button></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </form>

                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </td>

                </tr>

            </tbody>

        </table>

    </div>
    <p class="droitposte">Tous Droits Reserves. Algerie Poste © 2016</p>

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