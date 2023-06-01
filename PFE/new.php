<?php
session_start();
require("config/connexion.php");
require("config/commande.php");
if(isset($_POST['valider'])){
    if( isset($_POST['ref']) AND  isset($_POST['naturecour'])AND isset($_POST['confidentiel']) 
    AND isset($_POST['datecourr']) AND isset($_POST['envoyerpar']) AND isset($_POST['distination']) 
    AND isset($_POST['sousdistination'])  AND isset($_POST['datetraite']) 
     AND isset($_POST['remarque']) AND isset($_POST['objet'])  AND isset($_POST['naturedoc'])  
     AND isset($_POST['fichier'])){
        if(!empty($_POST['ref'])  AND !empty($_POST['naturecour']) AND  !empty($_POST['confidentiel']) 
        AND  !empty($_POST['datecourr']) AND !empty($_POST['envoyerpar']) AND !empty($_POST['distination']) 
        AND  !empty($_POST['sousdistination']) AND  !empty($_POST['datetraite']) 
        AND  !empty($_POST['remarque']) AND  !empty($_POST['objet']) AND !empty($_POST['naturedoc']) 
         AND  !empty($_POST['fichier'])){
        $ref=htmlspecialchars(strip_tags($_POST['ref']));
        $naturecour=htmlspecialchars(strip_tags($_POST['naturecour']));
        $confidentiel=htmlspecialchars(strip_tags($_POST['confidentiel']));
        $datecourr=htmlspecialchars(strip_tags($_POST['datecourr']));
        $envoyerpar=htmlspecialchars(strip_tags($_POST['envoyerpar']));
        $distination=htmlspecialchars(strip_tags($_POST['distination']));
        $sousdistination=htmlspecialchars(strip_tags($_POST['sousdistination']));
        $datetraite=htmlspecialchars(strip_tags($_POST['datetraite']));
        $remarque=htmlspecialchars(strip_tags($_POST['remarque']));
        $objet=htmlspecialchars(strip_tags($_POST['objet']));
        $naturedoc=htmlspecialchars(strip_tags($_POST['naturedoc']));
        $fichier=htmlspecialchars(strip_tags($_POST['fichier']));
        try{
            
                ajouter($ref,$naturecour,$confidentiel,$datecourr,$envoyerpar,$distination,$sousdistination,$datetraite,$remarque,$objet,$naturedoc,$fichier);
                $erreur = "le compte a bien ete cree";
              
        }
        catch(Exception $e){
            $erreur = "il y a un probleme  ";
          echo  $e->getMessage();
        }
        
        } 
    }
   }
?> 
<!doctype html>
<html lang="fran">
<head>
    <meta charset="UTF-8" />
    <title>Nouveau courrier</title>
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
              <a href="javascript:history.back()">
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
            <h2> Nouveau courrier</h2>
            <div class="form1">
                <label for="nomcomplet"  >Reference</label>
                <input type="text" name="ref"  required class="input"><br><br>
                <label for="nomcomplet">Envoyer par :</label>
                <input type="text" placeholder="" required class="input" name="envoyerpar"><br><br>
                <label for="nomcomplet">Distinataire :</label>
                <input type="text" placeholder="" required class="input"name="distination" ><br><br>
                <label for="nomcomplet">Sous distinataire :</label>
                <input type="text" placeholder="" required class="input" name="sousdistination" ><br><br>
                <label>Nature de doucement :</label>
                <select id="pays" class="input"   required name="naturedoc">
                <option value="odf">pdf</option>
                <option value="docx">docx</option>
                <option value="txt"> txt</option></select><br><br>
                <label>Objet :</label>
                <input type="text" placeholder="" required class="input"  name="objet"><br><br>
            </div>
            <div class="form2">
                <label for="nomcomplet">Date d'envoyer le courrier:</label>
                <input type="date" placeholder="" required class="input" name="datecourr"><br><br>
                <label for="nomcomplet">Date limité de traitement :</label>
                <input type="date" placeholder="" required class="input" name="datetraite"><br><br>
         
                <label> Nature de courrier :</label>
                <select name="naturecour"  required class="input">
                    <option value="urgent">Urgent</option>
                    <option value="normal">Normal</option>
                    <option value="tres urgent ">Tres urgent </option>
                </select><br><br>
                <label> Confidentiel :</label>
       <select name="confidentiel"   required class="input">
        <option value="oui">oui</option>
        <option value="non">non</option>
       </select>
                <label>Remarque :</label>
                <textarea cols="10" rows="5" required class="input" name="remarque"></textarea><br><br>
                <h3>Ajouter un courrier: </h3><br>
                <input type="file"  required name="fichier"><br><br>
            </div>
            <div class="buTTon">
                <input type="submit" value="Envoyer" name ="valider">
            </div>
            <?php 
        if(isset($erreur)){
            echo '<font color="black"><b>'.$erreur."</b></font>";
        }
        ?>
            
            
        </form>
    </div>
 </body>
</html>
