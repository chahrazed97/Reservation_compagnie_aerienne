<?php
session_start();
require'connexion_bdd.php';


     $sql='SELECT nom, prenom, type FROM client_passager WHERE reservation_id=:id';
     $requete = $bdd->prepare($sql);
     $requete->execute(array('id'=> $_SESSION['last_id']));
    
     $i=1;

     while(($donnee=$requete->fetch()) AND ($i<= $_SESSION['nbr_passager'])){
     $menu='menu'.$i;
     $choix_menu=$_POST[$menu];
         
          $sql_menu='SELECT id FROM menu WHERE nom=:nom';
          $requete_menu = $bdd->prepare($sql_menu);
          $requete_menu->execute(array('nom'=> $choix_menu));
          $donnee_menu=$requete_menu->fetch();
          $id_menu=$donnee_menu['id'];
         
         
          $stmt = $bdd->prepare('UPDATE client_passager SET menu_id=:menu_id WHERE nom=:nom AND prenom=:prenom AND reservation_id=:id_reserv');
          $stmt->bindValue(':menu_id',$id_menu);
          $stmt->bindValue(':nom',$donnee['nom']);
          $stmt->bindValue(':prenom',$donnee['prenom']);
          $stmt->bindValue(':id_reserv',$_SESSION['last_id']);
          $stmt->execute();
         $i++;
}
header('Location:info.php');
?>