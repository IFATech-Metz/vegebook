











<section id="modify-treatement">    

<?php
if(isset($_GET['type']) AND isset($_GET['id']))
{
            $type = $_GET['type'];
            $id = $_GET['id'];


if(isset($_POST['submit_modif']))
	{

            $count = 1;

            $file_handle = fopen("texte/$type.txt", "r");

            while(!feof($file_handle)) {

                

                $line_of_text = fgets($file_handle);

                $parts = explode('=', $line_of_text);

                $array[] = 
                 array(	
                        'id' => $parts[0],
                        'name' => $parts[1],
                        'img' => $parts[2],
                        'plantation' => $parts[3],
                        'quantite' => $parts[4],
                        'estimation' => $parts[5],
                        'freq_arrosage' => $parts[6],
                        'dernier_arrosage' => $parts[7],
                        'notes' => $parts[8]);
                 $count++;
             }

            fclose($file_handle);


            $id_array_modif = $id - 1;

            $name_img = 'images/'.$_POST['image_name'];
            $name_file = $_POST['image_name'];

if (isset($_FILES['file_img']) AND $_FILES['file_img']['error'] == 0)
	{

	 if ($_FILES['file_img']['size'] <= 1000000)
	        {
	 			$infosfichier = pathinfo($_FILES['file_img']['name']);
				$extension_upload = $infosfichier['extension'];
				$extensions_autorisees = array('jpg', 'jpeg', 'png');
	                if (in_array($extension_upload, $extensions_autorisees))
	                {
	                	    if (file_exists("$name_img")) {
						   		unlink("$name_img");
						    }
	                	$new_nbr = rand(1, 999);

	                	move_uploaded_file($_FILES['file_img']['tmp_name'], 'images/'. $new_nbr . '_' . basename($_FILES['file_img']['name']));
	                	$name_file = $new_nbr . '_' . $_FILES['file_img']['name'];
	                }
	                else
	                {
	                	echo '<center><p style="margin-top:70px; margin-bottom:30px;">Erreur: Le fichier n\'est pas au bon format (jpg, jpeg, png), l\'ancienne image a été conservée</p></center>';
	                	$name_file = $_POST['image_name'];
	                }
	        }
	        else
	        {
	        	echo '<center>Fichier trop important, l\'ancienne image a été conservée</center>';
	        	$name_file = $_POST['image_name'];
	        }
	}

	$date_changement_plantation = str_replace('-', '/', $_POST['plantation']);
	$date_plantation_final = date('d/m/Y', strtotime($date_changement_plantation));

	$date_changement_recolte = str_replace('-', '/', $_POST['recolte']);
	$date_recolte_final = date('d/m/Y', strtotime($date_changement_recolte));

	$date_changement_arrosage = str_replace('-', '/', $_POST['arrosage']);
	$date_arrosage_final = date('d/m/Y', strtotime($date_changement_arrosage));

            $name = $_POST['nom'];
            $img = $name_file;
            $plantation = $date_plantation_final;
            $quantite = $_POST['quantite'];
            $estimation = $date_recolte_final;
            $freq_arrosage = $_POST['frequence'];
            $dernier_arrosage = $date_arrosage_final;
            $notes_valid = rtrim($_POST['notes'], "\r\n");
            $notes = $notes_valid;

            for ($i=0; $i < $count; $i++) { 
                    if($i === $id_array_modif)
                    {
                        $array[$id_array_modif] =
                            array(
                                'id' => $id,
                                'name' => $name,
                                'img' => $img,
                                'plantation' => $plantation,
                                'quantite' => $quantite,
                                'estimation' => $estimation,
                                'freq_arrosage' => $freq_arrosage,
                                'dernier_arrosage' => $dernier_arrosage,
                                'notes' => $notes."\r\n");  
                           
                    }
            }

            $file_handle_2 = fopen("texte/$type.txt", 'w'); 

            for($i=0; $i<$count-1; $i++){
            $file_content_2 = implode('=', $array[$i]);

            if($i==($count-2)) {
                $file_content_2 = rtrim($file_content_2);
             }
            fwrite($file_handle_2, $file_content_2);
            }

            fclose($file_handle_2); 



	}


			$file_handle_form = fopen("texte/$type.txt", "r");

            while(!feof($file_handle_form)) {

                

                $line_of_text = fgets($file_handle_form);

                $parts = explode('=', $line_of_text);

                $array_form[] = 
                 array(	
                        'id' => $parts[0],
                        'name' => $parts[1],
                        'img' => $parts[2],
                        'plantation' => $parts[3],
                        'quantite' => $parts[4],
                        'estimation' => $parts[5],
                        'freq_arrosage' => $parts[6],
                        'dernier_arrosage' => $parts[7],
                        'notes' => $parts[8]);
                 
             }

            fclose($file_handle_form);

            $name_input = $array_form[$id-1]['name'];
            $img_input = $array_form[$id-1]['img'];
            $plantation_input = $array_form[$id-1]['plantation'];
            $quantite_input = $array_form[$id-1]['quantite'];
            $estimation_input = $array_form[$id-1]['estimation'];
            $freq_input = $array_form[$id-1]['freq_arrosage'];
            $dernier_input = $array_form[$id-1]['dernier_arrosage'];




?>

     
        <?php if(isset($_GET['id']) && isset($_GET['type'])  && isset($_GET['status']) && isset($_GET['status2']) && $_GET['status'] == 'modify'  && $_GET['status2'] == 'confirm') { ?>
    
    
            <section id="modify-confirmation">   
                
                
               <p> L'élément <?php echo $name ?>  planté le <?php echo $plantation ?> a bien été modifié ! </p>

               <a href="index.php?type=<?php echo $type ?>&status=view">
                   <span class="glyph3 glyphicon glyphicon-arrow-left"></span>
               </a>      

            </section>
    

    <?php }  ?>


    <div id="add_part">
        <form method='POST' action='index.php?id=<?php echo $id ?>&type=<?php echo $type ?>&status=modify&status2=confirm' enctype="multipart/form-data">
            
            <div class="fieldset-margin">  
                <fieldset>
                    <legend>Classification </legend>
                    <label for="nom" title="champs requis">Nom :</label>
                    <input type="text" name="nom" id="nom"  value="<?php echo $name_input; ?>" required><br>




                    
                    
                    <label for="categorie" title="champs requis">Catégorie :</label>
                    <input type="text" name="categorie" id="categorie"  value="<?php echo $type; ?>" disabled><br>

                    <label for="image">Modifier la photo :</label><br>
                    <img src=" <?php echo "images/$img_input"; ?> ">
                    <input type="hidden" name="image_name" value="<?php echo $img_input; ?>">
                    <center><input type="file" name="file_img" id="image" /></center><br>



                </fieldset>
            </div>
            
            
            <div class="fieldset-margin">  
                <fieldset>


                    <legend>Informations</legend>   

                    <label for="plantation">Date de plantation :</label>
                    <input type="date" name="plantation" id="plantation" value="<?php echo $plantation_input; ?>"  required>

                    <br>


                    <label for="recolte">Date de récolte estimée :</label>
                    <input type="date" name="recolte" id="recolte" value="<?php echo $estimation_input; ?>" required><br>


                    <label for="quantite">Quantité plantée :</label>
                    <input type="number" name="quantite" id="quantite" min=0 value="<?php echo $quantite_input; ?>" required><br>


                    <label for="frequence">Fréquence d'arrosage :</label>
                    <input type="text" name="frequence" id="frequence" value="<?php echo $freq_input; ?>" required><br>


                    <label for="arrosage">Dernier arrosage :</label>
                    <input type="date" name="arrosage" id="arrosage" value="<?php echo $dernier_input; ?>" required><br>


                </fieldset>
            </div>    
            
            <div class="fieldset-margin">  
                
                <fieldset>
                    <legend>Commentaires</legend>

                    <textarea name="notes" id="notes"required></textarea><br>
                </fieldset>
                
            </div>
            <div id="button-modify-form">
                <a href="index.php?type=<?php echo $type ?>&status=view">
                    <button id="validate-button" type="button" class="btn btn-danger">Annuler</button>
                </a> 
                <button type="submit" name="submit_modif" class="btn btn-success">Valider !</button>
            </div>
            
        </form>


    </div>

 

<?php } 
?>

    
    

</section>


