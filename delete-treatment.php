
 <section id="delete-treatment">
    <?php 


        $id = $_GET['id'];
        $name = $_GET['name'];
        $date = $_GET['date'];
        $type = $_GET['type'];


           $nbr_inve = 0;

            $file_handle = fopen("texte/$type.txt", "r");

            while(!feof($file_handle)) {

                fgets($file_handle);

                $nbr_inve ++;


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
                        'name_fr' => $parts[3],
                        'plantation' => $parts[4],
                        'quantite' => $parts[5],
                        'estimation' => $parts[6],
                        'freq_arrosage' => $parts[7],
                        'dernier_arrosage' => $parts[8],
                        'notes' => $parts[9]);


                        }

            fclose($file_handle);



        unlink("texte/$type.txt");   //suppression du fichier txt contenant les infos avant suppression
        fopen("texte/$type.txt", "w+"); //création d'un nouveau fichier texte






    //    for($i=0; $i>$nbr_inve; $i++){
    //        $elements[$i];    
    //    }

        unset($elements["$id"]);

                echo '<pre>';
                print_r($elements);
                echo '<pre>';



        $elements = array_values($elements);




        //echo implode("=", $elements[1]);


        $file_handle = fopen("texte/$type.txt", "a");

        for($i=0; $i<$nbr_inve-1; $i++){
            
            if($i == ($nbr_inve-1)){
                $file_content = rtrim($file_content);
            }
            
          $file_content = implode("=", $elements[$i]);
          fwrite($file_handle, $file_content);
        }

        ?>



       <p> L'élément <?php echo $name ?>  planté le <?php echo $date ?> a bien été supprimé ! </p>

       <a href="index.php?type=<?php echo $type ?>&status=view">
           <span class="glyph3 glyphicon glyphicon-arrow-left"></span>
       </a>            




</section>
     

    
 