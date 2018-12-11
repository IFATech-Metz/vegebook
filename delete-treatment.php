
 <section id="delete-treatment">
     
    <?php 

        $id = $_GET['id'];
        $name = $_GET['name'];
        $date = $_GET['date'];
        $type = $_GET['type'];


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


            unset($array[$id]); 

            $array = array_values($array);

            for ($i=0; $i < $count-2; $i++) {

                 $array_2[] = array('id' => $i+1, 
                        'name' => $array[$i]['name'],
                        'img' => $array[$i]['img'],
                        'plantation' => $array[$i]['plantation'],
                        'quantite' => $array[$i]['quantite'],
                        'estimation' => $array[$i]['estimation'],
                        'freq_arrosage' => $array[$i]['freq_arrosage'],
                        'dernier_arrosage' => $array[$i]['dernier_arrosage'],
                        'notes' => $array[$i]['notes']);
            }


            $file_handle2 = fopen("texte/$type.txt", 'w'); 

            for($i=0; $i<$count-2; $i++){
            $file_content2 = implode('=', $array_2[$i]);

            if($i==($count-3)) {
      			$file_content2 = rtrim($file_content2);
   			 }
            fwrite($file_handle2, $file_content2);
            }

            fclose($file_handle2); 







        ?>



       <p> L'élément <?php echo $name ?>  planté le <?php echo $date ?> a bien été supprimé ! </p>

       <a href="index.php?type=<?php echo $type ?>&status=view">
           <span class="glyph3 glyphicon glyphicon-arrow-left"></span>
       </a>            




</section>



