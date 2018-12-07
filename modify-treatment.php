 <section id="modify-treatement">    
     
        <?php



           //récupération des informations de l'élément via la méthode get

            if(isset($_GET['id']) && isset($_GET['type'])){

                    $id = $_GET['id'];
                    $type = $_GET['type'];


            } 

          //récupération des informations de l'élément via la méthode get






         //Lecture du fichier texte et stockage de ses informations dans un array

            $file_handle = fopen("texte/$type.txt", "r");

            while(!feof($file_handle)) {

                fgets($file_handle);

            }

            $file_handle = fopen("texte/$type.txt", "r");

            while(!feof($file_handle)) {
                $line_of_text = fgets($file_handle);
                $parts = explode('=', $line_of_text);
                $elements[] = /*array($parts[1] =>*/
                 array(	
                    'id' => $parts[0],
                    'name' => $parts[1],
                    'img' => $parts[2],
                    'plantation' => $parts[4],
                    'quantite' => $parts[5],
                    'estimation' => $parts[6],
                    'freq_arrosage' => $parts[7],
                    'dernier_arrosage' => $parts[8],
                    'notes' => $parts[9]);
            }


            fclose($file_handle);

         //Lecture du fichier texte et stockage de ses informations dans un array




        // stockage des informations du produit dans des variables pour afficher leur contenu dans les input du formulaire (pré-selection)            


                    $name_input = $elements[$id]['name'];
                    $img_input = $elements[$id]['img'];
                    $plantation_input = $elements[$id]['plantation'];
                    $quantite_input = $elements[$id]['quantite'];
                    $estimation_input = $elements[$id]['estimation'];
                    $frequence_input = $elements[$id]['freq_arrosage'];
                    $dernier_arrosage_input = $elements[$id]['dernier_arrosage'];
                    $notes_input = $elements[$id]['notes'];                 
        // stockage des informations du produit dans des variables pour afficher leur contenu dans les input du formulaire (pré-selection)




            if(isset($_POST['validate'])){        
        // si le bouton de validation de la modification est pressé, 
                            $name = $_POST['nom'];
                            $img = $_POST['image'];
                            $plantation = $_POST['plantation'];
                            $quantite = $_POST['quantite'];
                            $estimation = $_POST['recolte'];
                            $frequence = $_POST['frequence'];
                            $dernier = $_POST['arrosage'];
                            $notes = $_POST['notes'];

        // alors récupération des valeur des inputs et stockage des variable pour traitement 


            unset($elements[$id]);
            // suppression dans l'array des informations de l'element que l'user est en train de modifier 



                   $array[] = array(
                   'name' => $name,
                   'img'=> $img,
                   'plantation'=> $civility,
                   'quantite' => $lastname,
                   'estimation' => $firstname,
                   'freq_arrosage' => $birth_date,
                   'dernier_arrosage' => $address,
                   'notes' => $postal_address);
        // création du tableau qui contiendra les informations du formulaire




                    unlink("texte/$type.txt");   //suppression du fichier txt contenant les infos avant suppression
                    fopen("texte/$type.txt", "w+"); //création d'un nouveau fichier texte vierge pour acceuillir les nouvelles informations clients (les informations identiques des autres compte + les nouvelles informations)





                    foreach($array as $key=>$value){
        // fusion des informations de la modification contenues dans $array avec les informations du fichier texte contenues dans l'array $elements
                    $elements[$key] = $value;


                    }       



                    echo "formulaire validé!";


                    $file_handle = fopen("texte/$type.txt", "a");

                    foreach($elements as $elements_write_txt){
                  $file_content = implode("=", $elements_write_txt);
                  fwrite($file_handle, $file_content);
                    }

                    fclose($file_handle);



            }



        ?>




        <?php if(isset($_GET['id']) && isset($_GET['type'])) { ?>


                <div id="add_part">
                    <form method='POST' action='modify-treatment.php'>           
                        <fieldset>
                            <legend> Classification </legend>
                            <label for="nom" title="champs requis">* Nom :</label>
                                <input type="text" name="nom" id="nom"  placeholder="<?php echo $name_input; ?>" required><br>



                            <label for="categorie" title="champs requis">* Catégorie :</label>
                                <select name="categorie" id="categorie">
                                    <option value="<?php echo $type ?>"><?php echo $type ?></option>
                                </select><br>

                            <label for="image">Ajouter une photo :</label>
                                <input type="texte" name="image" id="image" placeholder="<?php echo $img_input; ?>" required><br>
                           <img src=" <?php echo "images/$img_input";?> ">

                        </fieldset>

                        <fieldset>


                            <legend>Informations</legend>   

                            <label for="plantation">Date de plantation :</label>
                                <input type="date" name="plantation" id="plantation"  required>

                            <br>


                            <label for="recolte">Date de récolte estimée :</label>
                                <input type="date" name="recolte" id="recolte" required><br>


                            <label for="quantite">Quantité plantée :</label>
                                <input type="number" name="quantite" id="quantite" min=0 required><br>


                            <label for="frequence">Fréquence d'arrosage :</label>
                                <input type="text" name="frequence" id="frequence" required><br>


                            <label for="arrosage">Dernier arrosage :</label>
                                <input type="date" name="arrosage" id="arrosage" required><br>


                        </fieldset>
                        <fieldset>
                            <legend>Commentaires</legend>

                            <textarea name="notes" id="notes" required></textarea><br>
                        </fieldset>

                            <p>Les champs portant une * doivent être renseignés !</p>
                            <input type="submit" name="validate">
                    </form>


                </div>

              <?php }  ?>


            
    
        </section>
        
        