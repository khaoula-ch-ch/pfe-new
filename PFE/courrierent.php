<?php
require("config/commande.php");



session_start();
$acc_name = $_SESSION['acc_name'];

if(!isset($acc_name)){
   header('location:index.php');
};


        


        if(isset($_GET['acc_name'])){
    
            if(!empty($_GET['acc_name']) OR is_numeric($_GET['acc_name']))
            {
                $acc_name = $_GET['acc_name'];
                $cour=affichercourrier($acc_name);
            }
        }


?> 


<!doctype html>
<html lang="fran">
<head>
    <meta charset="UTF-8" />
    <title>Courrier</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="styleaccueil.css">
    <link rel="stylesheet"  href="styleformulaire.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
 </head>
<body translate="no" >
    <br>
<div class="naVbar">
        <naV>
            <ul>
			  
              <li> 
                 <a href="javascript:history.back()" >
		   <img src="home.png" width="42" height="42" class="rounded-circle" >          
	</a>	         
              </li>
              
              <li> 
                 <a href="profil.php" >
		             <img src="2.png" width="42" height="42" class="rounded-circle" >
		         </a>
              </li>
           </ul>
        </naV>
    </div>
<body>
    <div class="formulaire">
        <div class="barre"></div><br>
        <form method="post">
            <h2> Courriers</h2>
            <table class="table">
  <thead class="thead-dark">
    <tr>
    
      <th scope="col">Ref</th>
      <th scope="col">N.courrier</th>
      <th scope="col">confidentiel</th>
      <th scope="col">Date.cour</th>
      <th scope="col">Envoyer</th>
      <th scope="col">Dis</th>
      <th scope="col">Sous.dis</th>
      <th scope="col">Date.tra</th>
      <th scope="col">Rema</th>
      <th scope="col">Objet</th>
      <th scope="col">Naturedoc</th>
      <th scope="col">Fichier</th>
    </tr>
  </thead>
  <tbody>
            <?php foreach($cour as $courrierarrive): ?>
                <tr>
                
                <td><?= $courrierarrive->ref?></td>
                <td><?= $courrierarrive->naturecour?></td>
                <td><?= $courrierarrive->confidentiel ?> </td>
                <td ><?= $courrierarrive->datecourr ?></td>
                <td ><?= $courrierarrive->envoyerpar ?></td>
                <td><?= $courrierarrive->distination ?></td>
                <td ><?= $courrierarrive->sousdistination ?></td>
                <td ><?= $courrierarrive->datetraite?></td>
                <td ><?= $courrierarrive->remarque ?></td>
                <td ><?= $courrierarrive->objet ?></td>
                <td ><?= $courrierarrive->naturedoc ?></td>
                <td><?= $courrierarrive->fichier ?></td>
                </tr>      
            <?php endforeach; ?>

            </tbody>

             
           
            </table>
     
            
        </form>
    </div>















    </body>
</html>
