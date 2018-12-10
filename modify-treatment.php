<section id="modify-treatement">    

    <?php



//récupération des informations de l'élément via la méthode get

$id = $_GET['id'];

$type = $_GET['type'];



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
        'plantation' => $parts[3],
        'quantite' => $parts[4],
        'estimation' => $parts[5],
        'freq_arrosage' => $parts[6],
        'dernier_arrosage' => $parts[7],
        'notes' => $parts[8]);
}


//                    echo '<pre>';
//                    print_r($elements);
//                     echo '<pre>';


fclose($file_handle);



$name_input = $elements[$id]['name'];
$img_input = $elements[$id]['img'];
$plantation_input = $elements[$id]['plantation'];
$quantite_input = $elements[$id]['quantite'];
$estimation_input = $elements[$id]['estimation'];
$frequence_input = $elements[$id]['freq_arrosage'];
$dernier_arrosage_input = $elements[$id]['dernier_arrosage'];
$notes_input = $elements[$id]['notes'];      






if(isset($_POST['validate'])){        

    $name = $_POST['nom'];
    $img = $_POST['image'];
    $plantation = $_POST['plantation'];
    $quantite = $_POST['quantite'];
    $estimation = $_POST['recolte'];
    $frequence = $_POST['frequence'];
    $dernier = $_POST['arrosage'];
    $notes = $_POST['notes'];



    unset($elements[$id]);

    $elements = array_values($elements);


    $array[] = array(
        'id' => $id,
        'name' => $name,
        'img'=> $img,
        'plantation'=> $plantation,
        'quantite' => $quantite,
        'estimation' => $estimation,
        'freq_arrosage' => $frequence,
        'dernier_arrosage' => $dernier,
        'notes' => $notes);

    //    
    //            echo '<pre>';
    //                    print_r($array);
    //                     echo '<pre>';


    unlink("texte/$type.txt");   
    fopen("texte/$type.txt", "w+"); 









    //    compteur 
    $count1 = 0;
    foreach($elements as $key=>$value){
        $count1++;
    }



    //                    
    //                    echo '<pre>';
    //                    print_r($elements);
    //                     echo '<pre>';






    foreach($array as $key=>$value){

        $elements[$key-1] = $value;

    }       

      
    $elements = array_values($elements);


    echo '<pre>';
    print_r($elements);
    echo '<pre>';



    //    echo '<pre>';
    //    print_r($elements);
    //    echo '<pre>';


    for ($i=0; $i < $count1+1; $i++) {

        $elements2[] = array('id' => $i+1, 
                             'name' => $elements[$i]['name'],
                             'img' => $elements[$i]['img'],
                             'plantation' => $elements[$i]['plantation'],
                             'quantite' => $elements[$i]['quantite'],
                             'estimation' => $elements[$i]['estimation'],
                             'freq_arrosage' => $elements[$i]['freq_arrosage'],
                             'dernier_arrosage' => $elements[$i]['dernier_arrosage'],
                             'notes' => $elements[$i]['notes']);
    }



    //    echo '<pre>';
    //    print_r($elements);
    //    echo '<pre>';







    echo "formulaire validé!";


    $file_handle = fopen("texte/$type.txt", "a");

    foreach($elements2 as $elements_write_txt){
        $file_content = implode("=", $elements_write_txt);

        if($i==($count1-3)) {
            $file_content2 = rtrim($file_content2);
        }

        fwrite($file_handle, $file_content);
    }


    fclose($file_handle);










}



    ?>




    <?php if(isset($_GET['id']) && isset($_GET['type'])) { ?>



    <div id="add_part">
        <form method='POST' action='modify-treatment.php?id=<?php echo $id ?>&type=<?php echo $type ?>&status=modify' enctype="multipart/form-data">           
            <fieldset>
                <legend> Classification </legend>
                <label for="nom" title="champs requis">* Nom :</label>
                <input type="text" name="nom" id="nom"  value="<?php echo $name_input; ?>" required><br>



                <label for="categorie" title="champs requis">* Catégorie :</label>
                <select name="categorie" id="categorie" >
                    <option value="<?php echo $type; ?>" readonly><?php echo $type; ?> </option>
                </select><br>


                <label for="image">Ajouter une photo :</label>
                <img src=" <?php echo "images/$img_input"; ?> ">
                <input type="text" name="image" id="image"  value="<?php echo $img_input; ?>" ><br>



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

