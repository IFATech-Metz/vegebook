<?php 

if(isset($_POST['add_creation']))
{
	// Envoi effectué 

	if(!empty($_POST['nom']) AND !empty($_POST['catégorie']) AND !empty($_POST['plantation']) AND !empty($_POST['recolte']) AND !empty($_POST['quantite']) AND !empty($_POST['frequence']) AND !empty($_POST['arrosage']) AND !empty($_POST['notes']) AND (isset($_FILES['file_img']) AND $_FILES['file_img']['error'] == 0))
	{
        $name = htmlspecialchars($_POST['nom']);
        $date = htmlspecialchars($_POST['plantation']);
        $type = htmlspecialchars($_POST['catégorie']);
        

		 if ($_FILES['file_img']['size'] <= 1000000)
        {
 			$infosfichier = pathinfo($_FILES['file_img']['name']);
			$extension_upload = $infosfichier['extension'];
			$extensions_autorisees = array('jpg', 'jpeg', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                	$new_nbr = rand(1, 999);

                	move_uploaded_file($_FILES['file_img']['tmp_name'], 'images/'. $new_nbr . '_' . basename($_FILES['file_img']['name']));
                	$name_file = $new_nbr . '_' . $_FILES['file_img']['name'];

                    			// PARTIE INTEGRATION
						$categorie = $_POST['catégorie'];

						$nbr_exist = 0;

						    $file_donn = fopen("texte/$categorie.txt", "r");
						    while (!feof($file_donn)) {

						        $line_of_inve = fgets($file_donn);

						        $nbr_exist ++;

						    }

						    fclose($file_donn);

							$ajout_id = $nbr_exist += 1;

							$date_changement_plantation = str_replace('-', '/', $_POST['plantation']);
							$date_plantation_final = date('d/m/Y', strtotime($date_changement_plantation));

							$date_changement_recolte = str_replace('-', '/', $_POST['recolte']);
							$date_recolte_final = date('d/m/Y', strtotime($date_changement_recolte));

							$date_changement_arrosage = str_replace('-', '/', $_POST['arrosage']);
							$date_arrosage_final = date('d/m/Y', strtotime($date_changement_arrosage));

							 $file_add = fopen("texte/$categorie.txt", "a");
					   		 $file_content = "\r\n".$ajout_id.'='.htmlspecialchars($_POST['nom']).'='.htmlspecialchars($name_file).'='.htmlspecialchars($date_plantation_final).'='.$_POST['quantite'].'='.htmlspecialchars($date_recolte_final).'='.htmlspecialchars($_POST['frequence']).'='.htmlspecialchars($date_arrosage_final).'='.htmlspecialchars($_POST['notes']);

					    fwrite($file_add, $file_content);

					    fclose($file_add);

			
    
    
         echo   "<section id='modify-confirmation'>   
                
                
               <p> L'élément $name planté le $date a bien été ajouté ! </p>

               <a href='index.php?type=$type&status=view'>
                   <span class='glyph3 glyphicon glyphicon-arrow-left'></span>
               </a>      

            </section>";
    

    

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                }
                else
                {
                	echo 'Erreur: Le fichier n\'est pas au bon format (jpg, jpeg, png)';
                }
        }
        else
        {
        	echo 'Fichier trop important';
        }

	}
	else
	{
		echo 'Tu n\'as pas tout rempli';
	}

}
else
{
	echo 'Aucun formulaire envoyé';
}
?>