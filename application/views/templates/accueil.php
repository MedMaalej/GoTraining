
			<div class="top-bar" style="width:850px;">
			  <h1>Paneau d'administration</h1> 
				<div class="breadcrumbs">
				  <div align="right"><a href="#"><img src="<?php echo  base_url(); ?>img/previsualiser.png" alt="previsualiser"></a> <a href="../index.php" target="_blank">Previsualiser </a><a href="#"><img src="<?php echo  base_url(); ?>img/logout.png" alt="previsualiser"> </a><a href="connexion/connexion/logout">Deconnexion</a></div>
				</div>
			</div><br />
		  <div class="select-bar">
		 <p>Vous avez maintenant <span class="Style1"><?php
		 // on definit le nombre de secondes definissant l'intervalle de temps au cours duquel on considere qu'un client est toujours en ligne (ici 3 minutes = 180 secondes)
 $tps_max_connex = 30;

// on recupere le nombre de secondes ecoulees depuis le 1er janvier 1970
 $temps_actuel = date("U");
 
 // on calcule le temps imparti pour comptabiliser les connectes au site (en fait, cela correspond a notre soustraction de tout a l'heure : on calcule la date limite pour que l'on considere que les clients soient encore connectes).
$heure_max = $temps_actuel - $tps_max_connex ;  
//$heure_max+= $tps_max_connex ;

// on prepare une requete SQL permettant de supprimer les clients que l'on considere comme n'etant plus connectes (c'est a dire ayant expire leur temps de 3 minutes defini comme etant le temps moyen de lecture d'une page WEB).
//$sql4 = 'DELETE FROM nb_online where time < "'.$heure_max.'"';

// on lance la requete SQL (mysql_query) et on affiche un message d'erreur si la requete ne se passait pas bien (or die)
//$req4 = mysql_query($sql4) or die ('Erreur SQL !<br />'.$sql4.'<br />'.mysql_error());
 
// on prepare une requete SQL permettant de compter le nombre de tuples (soit le nombre de clients connectes au site) contenu dans la table
//$sql = 'SELECT count(*) FROM nb_online';

// on lance la requete SQL (mysql_query) et on affiche un message d'erreur si la requete ne se passait pas bien (or die)
//$req =mysql_query($sql, $connexion) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on recupere le nombre de tuples obtenus
//$data = mysql_fetch_array($req);

// on libere l'espace memoire alloue pour cette requete SQL
//mysql_free_result($req);

//echo $data[0].' ' ;
/*?></span>personne(s) surfant sur le site, <span class="Style1">

<?php */ 
?>

</span>utilisateurs enregistr&eacute;s et <span class="Style1">



</span>Client inscris.</p>
	    </div>
			<table class="adminform" dwcopytype="CopyTableColumn">
              <tbody>
                <tr>
                  <td valign="top" width="55%"><div id="cpanel">
                      <div style="float: left; height: 120px; width: 150px;">
                        <div class="icon"> 
                          <p align="center"><a href="ajouter_article.php"> <img src="<?php echo  base_url(); ?>img/icon-48-article-add.png" alt="Ajouter un nouvel article"> </a></p>
                          <p align="center"><a href="ajouter_article.php"><span>Ajouter un nouvel article</span></a> </p>
                        </div>
                    </div>
                    <div style="float: left; width: 150px; height: 120px;">
                        <div class="icon"> 
                          <p align="center"><a href="articles.php"> <img src="<?php echo  base_url(); ?>img/icon-48-article.png" alt="Gestion des articles"> </a></p>
                          <p align="center"><a href="articles.php"><span>Gestion des articles</span></a> </p>
                      </div>
                    </div>
                    <div style="float: left; width: 150px; height: 120px;">
                        <div class="icon"> 
                          <p align="center"><a href="produits.php"> <img src="<?php echo  base_url(); ?>img/icon-48-category.png" alt="Gestion de la page d'accueil"> </a></p>
                          <p align="center"><a href="produits.php"><span>Gestion des produits</span></a> </p>
                      </div>
                    </div>
                    <div style="float: left;height: 120px; width: 150px;">
                        <div class="icon"> 
                        
            <p align="center"><a href="paiement.php"> <img src="<?php echo  base_url(); ?>img/icon-48-section.png" alt="Gestion des paiments"></a></p>
            <p align="center"><a href="paiement.php"> <span>Gestion des payements</span></a></p>
                          
                      </div>
                    </div> 
                   
                   <?php  /* <div style="float: left;height: 120px; width: 150px;">
                        <div class="icon"> 
                          <p align="center"><a href="message.php"> <img src="img/icon-48-frontpage.png" alt="Gestion des menus"> </a></p>
                          <p align="center"><a href="message.php"><span>Messagerie</span></a></p>
                      </div>
                    </div> */ ?>
                    <div style="float: left;height: 120px; width: 150px;">
                      <div class="icon">
                        <p align="center"><a href="configuration.php"> <img src="<?php echo  base_url(); ?>img/icon-48-config.png" alt="Configuration"> </a></p>
                        <p align="center"><a href="configuration.php"><span>Gestion Categories</span></a> </p>
                      </div>
                    </div>
                
                    <div style="float: left;height: 120px; width: 150px;">
                        <div class="icon"> 
                          <div align="center">
                            <p><a href="utilisateur.php"> <img src="<?php echo  base_url(); ?>img/icon-48-user.png" alt="Gestion des utilisateurs"></a></p>
                            <p><a href="utilisateur.php"> <span>Gestion des utilisateurs</span></a> </p>
                          </div>
                      </div>
                    </div>
                    
                  </div></td>
                  
                </tr>
              </tbody>
		  </table>
	